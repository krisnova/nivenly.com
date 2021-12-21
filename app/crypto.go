// Copyright © 2017 The Kubicorn Authors
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

package nivenly

import (
	"context"
	"net/http"

	"github.com/ethereum/go-ethereum/common"

	"github.com/ethereum/go-ethereum"

	"github.com/ethereum/go-ethereum/ethclient"
	"github.com/kris-nova/logger"
)

const (
	wellKnownLocalGethAddr string = "http://10.0.0.188:8545"
	wellKnownNovaEthAddr   string = "0x860bee26cd1913e29387a9d0a04561e09383130d"
)

type Crypto struct {
	Status       string
	Addr         string
	SyncProgress *ethereum.SyncProgress
	BalanceWei   int64
}

func GetCrypto(r *http.Request, client Client) Crypto {
	// Anchovies is initialized
	c := Crypto{
		Status: "NOT RUNNING",
		Addr:   wellKnownNovaEthAddr,
		SyncProgress: &ethereum.SyncProgress{
			HighestBlock: 0,
			CurrentBlock: 0,
		},
	}

	geth, err := ethclient.Dial(wellKnownLocalGethAddr)
	if err != nil {
		logger.Warning("unable to dial eth client: %v", err)
		return c
	}
	sync, err := geth.SyncProgress(context.TODO())
	if err != nil {
		logger.Warning("unable to dial eth client: %v", err)
		return c
	}
	addr, err := common.NewMixedcaseAddressFromString(wellKnownNovaEthAddr)
	if err != nil {
		logger.Warning("unable to find addr: %v", err)
		return c
	}
	balance, err := geth.PendingBalanceAt(context.TODO(), addr.Address())
	if err != nil {
		logger.Warning("unable to find balance: %v", err)
		return c
	}

	logger.Info("%+v", sync)
	c.Status = "ACTIVE"
	c.BalanceWei = balance.Int64()
	c.SyncProgress = sync
	return c
}
