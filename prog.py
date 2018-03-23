# -*- coding: UTF8 -*-
import time
import serial
from datetime import date, datetime, timedelta
import mysql.connector
#import papadakis
#program papadakis \/
def meteoDataLineToDictionary(a):                                                                                
    lex = {}
    b = a.split(",")
    if len(b)<15:
    	return 0
    else:	
	lex["day_night"]=b[0]               
   	lex["date"]=b[1]                     
    	lex["hour"]=b[2]                     
	lex["temp"]=b[3]                     
    	lex["humidity"]=b[4]                 
	lex["BARO"]=b[5]                     
  	lex["wdir"]=b[6]                     
   	lex["wind_speed"]=b[7]               
	lex["kles"]=b[8]                   	 
       	lex["insects_of_rain"]=b[9]          
    	lex["SRAD"]=b[10]          
    	lex["UV"]=b[11]          
	lex["EVPT"]=b[12]  
   	lex["BATT"]=b[13]          
    	lex["CHILL"]=b[14]          
       
   	return lex



def init_serial():
	ser = serial.Serial()
    	ser.baudrate = 9600
    
    	ser.port = '/dev/ttyUSB0' 

    	ser.timeout = 2
    	ser.open()
	
	return ser
def database(lex):

	cnx=0
	while cnx==0:
        	try:
			cnx=mysql.connector.connect(user="meteo17",
                		                password="meteo17",
                        		        host="10.8.42.10",
                                		database="gp_2017_2018")
		except error:
			time.sleep(60)
        cursor = cnx.cursor()

        sql_insert = ("INSERT INTO meteorologikos"
                        "(day_night, date, hour, temp, humidity, BARO, wdir, wind_speed, kles, insects_of_rain,SRAD,UV,EVPT,BATT,CHILL) "
                        "VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
                        ";"
                        )
        insert_data  = ( lex["day_night"], datetime.today(), lex["hour"], lex["temp"],lex["humidity"],lex["BARO"],lex["wdir"],lex["wind_speed"],lex["kles"],lex["insects_of_rain"],lex["SRAD"],lex["UV"],lex["EVPT"],lex["BATT"],lex["CHILL"] )

        cursor.execute(sql_insert, insert_data)

        cnx.commit()

        cursor.close()
        cnx.close()
        


ser = init_serial()
print "Now it's time to open the serial port"
temp =":a/n"
ser.write(temp)
while 1:    
    bytes = ser.readline()  
    lex=meteoDataLineToDictionary(bytes)
    if lex!=0:
	database(lex)
	print "write",lex
ser.close()		

    
#Ctrl+C to Close Python Window
