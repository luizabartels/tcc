import serial
import time

ser = serial.Serial('COM1', 11560)

print (ser.read())

