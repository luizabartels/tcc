#!/usr/bin/env python
# -*- coding: utf-8 -*-

import serial
import time

ser = serial.Serial()
ser.boudrate = 115600
ser.port = 'COM2'
ser.bytesize = 8
ser.parity = 'N'
ser.stopbits = 1
ser.xonxoff = 1
ser.rtscts = 0
ser.timeout = None
ser.open()

command = b'\x00'

while True:
    ser.write(b"A")
