# telnet

The ```telnet``` command (short for teletype network) utilizes the telnet network protocol
to connect to remote machines and manage them through a ```TCP/IP``` network.
The protocol uses port 23 to establish a connection and provides a way to manage remote systems using the CLI.

## Install

```sh
sudo apt install telnetd -y
```

### test

```sh
sudo systemctl status inetd
```

### firewall setting

```sh
sudo ufw allow 23/tcp
```

```sh
sudo ufw reload
```

## Syntax

```sh
telnet [options] [remote_server_address] [port]
```

The ```options``` and ```port``` parameters are optional.
For ```remote_server_address```, telnet accepts symbolic and numeric addresses.

## Resources

- [phoenixnap.com](https://phoenixnap.com/kb/telnet-linux#:~:text=The%20telnet%20command%20(short%20for,remote%20systems%20using%20the%20CLI.))
