import serial
import time

ser = serial.Serial('COM2', 11560)

while True:
    ser.write(1)