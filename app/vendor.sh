#!/bin/bash

echo "Hacking go modules for local development..."
rm -rf vendor
cp -rvf ${GOPATH}/src/github.com/kris-nova/bjorno vendor/github.com/kris-nova/bjorno
