# tcpdump

```tcpdump``` is the world’s premier network analysis tool—combining both power and simplicity into a single command-line interface.

## Start

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
