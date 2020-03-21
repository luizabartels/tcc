#!/usr/bin/env python
# -*- coding: utf-8 -*-

import serial
import time

ser = serial.Serial()
ser.boudrate = 115600
ser.port = 'COM1'
ser.bytesize = 8
ser.parity = 'N'
ser.stopbits = 1
ser.xonxoff = 1
ser.rtscts = 0
ser.timeout = None
ser.open()

print (ser.read())

