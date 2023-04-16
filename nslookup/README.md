# nslookup

Name server lookup (```nslookup```) is a command-line tool that lets you find the internet protocol (IP)
address or domain name system (DNS) record of a specific hostname.
This command also allows reverse DNS lookup by inputting the IP addresses of the corresponding domains.

The ```nslookup``` tool is useful for DNS-related tasks, such as server testing or troubleshooting issues.

## types

Each record type serves a different purpose:

- ```A```: responsible for mapping a domain name to an IP address.
- ```AAA```: same as A record, but using IPv6 instead of IPv4.
- ```CNAME```: information about a domain's alternative name.
- ```LOC```: specifies the geographical location of a domain name.
- ```PTR```: maps an IP address to a hostname and is also responsible for mail exchange. PTR records require the domain to have a dedicated IP address.
- ```MX```: responsible for mail exchange. MX records map domains to mail servers.

## Install

```sh
sudo apt install dnsutils
```

## Syntax

```sh
nslookup [options] [domain-name]
```

## Example

### ns records

```sh
nslookup -type=ns [domain-name]
```

### reverse lookup

```sh
nslookup [ip-address]
```

### specific dns

```sh
nslookup [domain-name] [name-server]
```

### non default port

```sh
nslookup -port=[port-number] [domain-name]
```

## Resources

- [hostinger.com](https://www.hostinger.com/tutorials/what-is-nslookup#:~:text=nslookup%20is%20a%20command%2Dline,the%20Command%20Prompt%20or%20Terminal.)
- [phoenixnap.com](https://phoenixnap.com/kb/nslookup-command)
