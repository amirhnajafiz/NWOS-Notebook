# dig

The ```dig``` command in Linux is used to gather DNS information.
It stands for Domain Information Groper, and it collects data about Domain Name Servers.
The ```dig``` command is helpful for troubleshooting DNS problems,
but is also used to display DNS information.

## Install

```sh
sudo apt-get install dnsutils
```

### test

```sh
dig -v
```

## Syntax

```sh
dig [server] [name] [type]
```

- ```server``` The hostname or IP address the query is directed to
- ```name``` The DNS (Domain Name Server) of the server to query
- ```type``` The type of DNS record to retrieve. By default (or if left blank), dig uses the A record type

## Example

```sh
dig internet.aut.ac.ir
```

```sh
dig -x 185.211.88.124
```

## Resources

- [phoenixnap.com](https://phoenixnap.com/kb/linux-dig-command-examples)
