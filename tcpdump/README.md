# tcpdump

```tcpdump``` is the world’s premier network analysis tool—combining both power and simplicity into a single command-line interface.

```tcpdump``` is a command line utility that allows you to capture and analyze network traffic
going through your system. It is often used to help troubleshoot network issues, as well as a security tool.

## Start

### Get all interfaces

```sh
tcpdump -D
```

### Capture packets

```sh
tcpdump --interface any
```

```sh
tcpdump -i any -c5 -nn
```

### HTTPS traffic

```sh
tcpdump -nnSX port 443
```

### Just see what’s going on, by looking at what’s hitting your interface

```sh
tcpdump -i en0
```

### Find Traffic by IP

```sh
tcpdump host 1.1.1.1
```

### Finding Packets by Network

```sh
tcpdump net 1.2.3.0/24
```

## Resources

- [danielmiessler.com](https://danielmiessler.com/study/tcpdump/)
- [tcpdump.org](https://www.tcpdump.org/)
- [opensource.com](https://opensource.com/article/18/10/introduction-tcpdump)
