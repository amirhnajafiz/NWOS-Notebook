# ifconfig

```ifconfig``` stands for Interface Configuration.
The ```ifconfig``` function displays the current configuration for a ```network interface```
when no optional parameters are supplied. If a protocol family is specified,
```ifconfig``` reports only the details specific to that protocol family.

```ifconfig``` is used to configure, or view the configuration of, a network interface.

```ifconfig``` is used to configure the system's kernel-resident network interfaces. It is used at boot time to set up interfaces as necessary. After that, it is usually only needed when debugging, or when system tuning is needed.

Note:

> On modern Linux systems, the ```ip``` command has replaced ```ifconfig``` command.

## Commands

### Display all interface

```sh
ifconfig -a
```

### Active or deactive an interface

```sh
sudo ifconfig en0 up
```
