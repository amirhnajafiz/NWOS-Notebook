#!/usr/bin/env bash

# set a new ip for interface
# set a new netmask
# broadcast it over network
sudo ifconfig eth0 192.168.2.5 netmask 255.255.255.0 broadcast 192.168.2.7