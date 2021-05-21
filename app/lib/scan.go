// Copyright © 2021 Kris Nóva <kris@nivenly.com>
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

package lib

import (
	"time"

	"github.com/Ullaakut/nmap/v2"
	"github.com/kris-nova/logger"
)

// ActiveScanLimit is used as a simple way
// to prevent DoS attacks and to deal with
// the fact that we *always* kick off a new
// scan whenever a page is loaded
//
// If we are hitting more 250 of these
// on the regular, then have more heavy
// lifting to do here such as to cache
// what scans/addrs are currently processing.
const ActiveScanLimit = 250

// Package level state - deal with it
var (
	scannedAddrs = make(map[string]*ScanResults)
	activeScans  = 0
)

// Raw results we send back to the client
type ScanResults struct {
	Addr    string
	NMAPRun nmap.Run
}

// ScanAddr is a fun and easy method to poll
// It will return what it can when it can.
//
// This nondeterministic method is useful
// for including on the home page - without
// breaking the home page.
func ScanAddr(addr string) *ScanResults {
	go scanConcurrently(addr)
	var result *ScanResults
	if result, ok := scannedAddrs[addr]; ok {
		return result
	}
	result = &ScanResults{
		Addr: addr,
	}
	return result
}

// scanConcurrently is used to NMAP scan (with options)
// against a host.
func scanConcurrently(addr string) {
	for activeScans >= ActiveScanLimit {
		logger.Info("Scan Limit: %d", ActiveScanLimit)
		logger.Info("Current scans: %d", activeScans)
		time.Sleep(2 * time.Second)
	}
	// logic for hanging
	ch := make(chan *ScanResults)
	go func() {
		activeScans++
		defer func() {
			activeScans--
		}()
		scanner, err := nmap.NewScanner(
			// There are a lot of options here
			// and we could very easily add more
			// depending on what we want the API
			// to serve to the user
			nmap.WithTargets(addr),

			// Enable OS detection nmap attempt to guess the OS more aggressively.
			nmap.WithOSScanGuess(),

			// Enable OS detection
			nmap.WithOSDetection(),

			// Enable Traceroute
			nmap.WithTraceRoute(),
			// WithDecoys causes a decoy scan to be performed, which makes it appear to the
			// remote host that the host(s) you specify as decoys are scanning the target
			// network too. Thus their IDS might report 5–10 port scans from unique IP
			// addresses, but they won't know which IP was scanning them and which were
			// innocent decoys.
			// While this can be defeated through router path tracing, response-dropping,
			// and other active mechanisms, it is generally an effective technique for
			// hiding your IP address.
			// You can optionally use ME as one of the decoys to represent the position
			// for your real IP address.
			// If you put ME in the sixth position or later, some common port scan
			// detectors are unlikely to show your IP address at all.
			//
			// 160.153.77.70 dinos pizza
			// 75.2.104.223 space jam
			// 174.138.63.167 animal diversity
			// 173.255.226.133 nrdc.org
			nmap.WithDecoys("160.153.77.70", "75.2.104.223", "174.138.63.167", "173.255.226.133"),

			// WithSYNScan sets the scan technique to use SYN packets over TCP.
			// This is the default method, as it is fast, stealthy and not
			// hampered by restrictive firewalls.
			nmap.WithSYNScan(),

			// enables the probing of open ports to determine service and version
			// info.
			nmap.WithServiceInfo(),
		)
		if err != nil {
			logger.Warning("unable to setup port scan: %v", err)
			return
		}
		run, warnings, err := scanner.Run()
		if err != nil {
			logger.Warning("unable to scan addr: %s", addr)
		}
		if len(warnings) > 0 {
			for _, warn := range warnings {
				logger.Warning(warn)
			}
		}
		if run == nil {
			return
		}
		logger.Info("Scan complete for: %s", addr)
		r := &ScanResults{
			Addr:    addr,
			NMAPRun: *run,
		}
		ch <- r
	}()
	scannedAddrs[addr] = <-ch
}
