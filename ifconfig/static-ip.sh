#!/usr/bin/env bash

# set a new ip for interface of aut internet
# set a new netmask
# broadcast it over network
sudo ifconfig en0 172.24.56.1 netmask 255.255.248.0 broadcast 172.24.56.1
