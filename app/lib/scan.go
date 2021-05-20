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
	NMAPRun *nmap.Run
}

// ScanAddr is a fun and easy method to poll
// It will return what it can when it can.
//
// This nondeterministic method is useful
// for including on the home page - without
// breaking the home page.
func ScanAddr(addr string) *ScanResults {
	scanConcurrently(addr)
	if result, ok := scannedAddrs[addr]; ok {
		return result
	}
	result := &ScanResults{
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
		logger.Info("Scanning addr: %s", addr)
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
			nmap.WithOSScanGuess(),
			nmap.WithConnectScan(),
			nmap.WithOSDetection(),
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
		r := &ScanResults{
			Addr:    addr,
			NMAPRun: run,
		}
		ch <- r
	}()
	scannedAddrs[addr] = <-ch
}
