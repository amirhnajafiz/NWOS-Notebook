# ip

The ```ip``` command is a Linux net-tool for system and network administrators.
IP stands for Internet Protocol and as the name suggests, the tool is used for configuring network interfaces.

Older Linux distributions used the ```ifconfig``` command, which operates similarly.
However, ```ifconfig``` has a limited range of capabilities compared to the ```ip``` command.

## Syntax

```sh
ip [OPTION] OBJECT {COMMAND | help}
```

```OBJECTS``` (or subcommands) that you will use most often include:

- link (l): used to display and modify network interfaces.
- address (addr/a): used to display and modify protocol addresses (IP, IPv6).
- route (r): used to display and alter the routing table.
- neigh (n): used to display and manipulate neighbor objects (ARP table).

## Example

### Get Network Interface Information

```sh
ip link show
```

```sh
ip link show dev en0
```

### Monitor IP Addresses

```sh
ip addr show
```

### Display IP Routing Table

```sh
ip route list
```

### Display IP Neighbor Entries

```sh
ip neigh show
```

## Resources

-[phoenixnap.com](https://phoenixnap.com/kb/linux-ip-command-examples)
