# arp

```arp``` stands for ```Address Resolution Protocol``` is a protocol for mapping an
IP address to a physical MAC address on a local area network.
```arp``` is a program used by a computer system to find another computer's MAC address based on its IP address.

## why ```mac```?

The reason is simple, any local communications would use MAC address, not IP address.
When a computer wants to communicate with another computer on a different network, the IP address would be used.
The IP address is like your mailing address while MAC address is like your name.

## cache

```arp``` cache is a table of IP addresses with their corresponding MAC addresses.

## Example

### computer's ARP table

```sh
arp -a
```

## Reverse ARP

```rarp``` is a network layer protocol and It allows any host to obtain its IP address from the server.

## Resources

- [webservertalk.com](https://www.webservertalk.com/what-is-the-arp-command-how-to-use-it-tutorial/)
