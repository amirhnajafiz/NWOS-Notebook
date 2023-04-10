# nmap

```nmap``` is short for Network Mapper.
It is an open-source Linux command-line tool that is used to scan IP addresses
and ports in a network and to detect installed applications.

```nmap``` allows network admins to find which devices are running on their network,
discover open ports and services, and detect vulnerabilities.

## Commands

### ping scan

Scans the list of devices up and running on a given subnet.

```sh
nmap -sP 192.168.1.1/24
```

### scan a single host

Scans a single host for 1000 well-known ports.
These ports are the ones used by popular services like SQL, SNTP, apache, and others.

```sh
nmap internet.aut.ac.ir
```

### other scannings

- stealth scan
- version scan
- aggressive scan

### port scan

Port scanning is one of the most fundamental features of Nmap. You can scan for ports in several ways.

```sh
nmap -p 973 192.164.0.1
```

```sh
nmap -p 76–973 192.164.0.1
```

## Verbose output

The verbose output provides additional information about the scan being performed.
It is useful to monitor step by step actions Nmap performs on a network, especially if you are an outsider scanning a client’s network.

```sh
nmap -v scanme.nmap.org
```

## Normal output

```sh
nmap -oN output.txt scanme.nmap.org
```

## Resource

- [freedocecamp.org](https://www.freecodecamp.org/news/what-is-nmap-and-how-to-use-it-a-tutorial-for-the-greatest-scanning-tool-of-all-time/)
