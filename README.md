# KYOCERA Device Command Line Toolkit

This is a simple PHP command line toolkit for retrieving and controlling KYOCERA devices status.


## Installation
To run the command successfully, PHP and composer should be installed first.  
You can use
```php -v``` and ```composer -v ``` to confirm the status both in windows and linux.  
After checking out the source, please run ```composer update``` to ensure the installation of the dependency.

## Usage
It is a simple toolkit to retrieve the panel status from the device.  

```
prt -h 10.170.80.156 -a panel
```

You can replace the ip address with real machine ip address or the host name.

## RoadMap
- device control support
- usb device support