#!/urs/bin/env bash

# checkout all of the people who are connected to aut internet
# get the results in hosts.txt
sudo nmap -sP -v -oN hosts.txt 172.24.56.0/21
