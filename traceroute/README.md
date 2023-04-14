# traceroute

```traceroute``` provides a map of how data on the internet travels from its source to its destination.
A ```traceroute``` works by sending ```Internet Control Message Protocol (ICMP)``` packets,
and every router involved in transferring the data gets these packets.
The ICMP packets provide information about whether the routers used in the transmission
are able to effectively transfer the data.

The ```traceroute``` command attempts to trace the route an IP packet follows to an Internet host by
launching UDP probe packets with a small maximum time-to-live (Max_ttl variable),
then listening for an ICMP TIME_EXCEEDED response from gateways along the way.

Because of the load it imposes on the network, the ```traceroute``` command should not be used during
normal operations or from automated scripts.

## Syntax

```sh
traceroute [ -m Max_ttl ] [ -n ] [ -p Port ] [ -q Nqueries ] [ -r ] [ -d ] [ -g gateway_addr ] [ -s SRC_Addr ] [  -t TypeOfService ] [ -f flow ] [ -v ] [  -w WaitTime ] Host [ PacketSize ]
```
