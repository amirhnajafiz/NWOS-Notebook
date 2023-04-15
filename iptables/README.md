# iptables

```iptables``` is a command line interface used to set up and maintain tables for the Netfilter firewall for IPv4,
included in the Linux kernel.
The firewall matches packets with rules defined in these tables and then takes the specified action on a possible match.

## Syntax

```sh
iptables --table TABLE -A/-C/-D... CHAIN rule --jump Target
```

## Tables

There are five possible tables:

- ```filter```: Default used table for packet filtering. It includes chains like INPUT, OUTPUT and FORWARD.
- ```nat``` : Related to Network Address Translation. It includes PREROUTING and POSTROUTING chains.
- ```mangle``` : For specialised packet alteration. Inbuilt chains include PREROUTING and OUTPUT.
- ```raw``` : Configures exemptions from connection tracking. Built-in chains are PREROUTING and OUTPUT.
- ```security``` : Used for Mandatory Access Control

## Chains

There are few built-in chains that are included in tables. They are:

- INPUT :set of rules for packets destined to localhost sockets.
- FORWARD :for packets routed through the device.
- OUTPUT :for locally generated packets, meant to be transmitted outside.
- PREROUTING :for modifying packets as they arrive.
- POSTROUTING :for modifying packets as they are leaving.

## Example

### drop all the traffic coming on any port

```sh
iptables -t filter --append INPUT -j DROP
```

```sh
iptables --flush
```

## Resources

- [geeksforgeeks.org](https://www.geeksforgeeks.org/iptables-command-in-linux-with-examples/)
