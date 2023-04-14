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

The ```traceroute``` report lists data pertaining to every router the packets pass through as
they head to their destination.
The hops get numbered on the left side of the report window. Each line in the report has the domain name—if
that was included—as well as the IP address belonging to the router.

### vs ping

The primary difference between ```ping``` and ```traceroute``` is that while ```ping``` simply tells you if a
server is reachable and the time it takes to transmit and receive data, ```traceroute``` details the precise route info,
router by router, as well as the time it took for each hop.

## Resources

- [ibm.com](https://www.ibm.com/docs/en/aix/7.2?topic=t-traceroute-command)
- [fortinet.com](https://www.fortinet.com/resources/cyberglossary/traceroutes#:~:text=A%20traceroute%20provides%20a%20map,its%20source%20to%20its%20destination.)
