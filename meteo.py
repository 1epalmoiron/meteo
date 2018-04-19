#!/usr/bin/env python
#-*- coding: UTF-8 -*-
#!/usr/bin/env python

#enable debugging

import mysql.connector
cnx = mysql.connector.connect(user="meteo17",
	password="meteo17",
	host="localhost",
	database="gp_2017_2018")
my_cursor = cnx.cursor(named_tuple=True)
s1="select * From meteorologikos Order by id DESC LIMIT 1;"
my_cursor.execute(s1)

print "Content-type: text/html\n\n"

print "<html>"
print"<head>"
print"<meta charset='UTF-8'>"
print"<title>Μετέο Μεσσαράς</title>"
print"<link href='meteo.css' rel='stylesheet'/>"
print"<style>"
print" table,th,td {border:2px solid black; border-collapse: collapse;}</style>"
print"</head>"
print"<body id='bd'>"
print"<h1 align='center'><mark>1<sup>o</sup> Επάλ Μοιρών</mark></h1>"
print "<table id='img'>"

print"<tr id='names'>"
print"<th>Ημέρα ή Νύχτα</th>"
print"<th>Ημερομηνία</th>"
print"<th>Ώρα</th>"
print"<th>Θερμοκρασία</th>"
print"<th>Υγρασία</th>"
print"<th>Βαρομετρική Πίεση</th>"
print"<th>Κατεύθηνση Ανέμου</th>"
print"<th>Ταχύτητα Ανέμου</th>"
print"<th>Μέγιστη Ταχύτητα Ανέμου</th>"
print"<th>Χιλιοστά Βροχής</th>"
print"<th>Ραδιενέργια</th>"
print"<th>Δείκτης Υπεριώδους Ακτινοβολία</th>"
print"<th>Σημείο Εξάτμισης</th>"
print"<th>Μπαταρία</th>"
print"<th>Ψύχρα</th>"
print"</tr>"

for i in my_cursor:
	print "<tr>"
	u=float(i.wind_speed) * 1.609344 #metatropi apo m/h se km/h
        B=0
	if u==0:
	        B=0
	elif u<=5:
	        B=1
	elif u<=11:
		B=2
	elif u<=19:
		B=3
	elif u<=28:
		B=4
	elif u<=38:
		B=5
	elif u<=49:
		B=6
	elif u<=61:
		B=7
	elif u<=74:
		B=8
	elif u<=88:
 		B=9
	elif u<=102:
		B=10
	elif u<=117:
		B=11
	elif u>118:
		B=12
	b=float(i.BARO) * 25.4
	p=float (1.33322368*b)
	tx=float(i.kles)* 1.609344	
        if tx==0:
                BR=0
        elif tx<=5:
                BR=1
        elif tx<=11:
                BR=2
        elif tx<=19:
                BR=3
        elif tx<=28:
                BR=4
        elif tx<=38:
                BR=5
        elif tx<=49:
                BR=6
        elif tx<=61:
                BR=7
        elif tx<=74:
                BR=8
        elif tx<=88:
                BR=9
        elif tx<=102:
                BR=10
        elif tx<=117:
                BR=11
        elif tx>118:
                BR=12

	y=float(i.insects_of_rain) * 25.4
	t=float(i.temp)
	t=(t-32)* 5/9
	s=float(i.EVPT)
	s=(s-32)* 5/9 
	d=i.date.split(" ")
	n=d[1].index(".")
	print "<td align='center'>", i.day_night, "</td>"
	print "<td align='center'>", d[0], "</td>"
	print "<td align='center'>", d[1][0:n-3], "</td>"
	print "<td align='center'>",str(round(t,2)),"oC</td>"
	print "<td align='center'>", i.humidity, "%</td>"
	print "<td align='center'>", str(round(p,2)), "hPa</td>"
	print "<td align='center'>", i.wdir, "μοίρες</td>"
	print "<td align='center'>", round(u),"km/h  ή ",round(B),"B</td>"
	print "<td align='center'>", round(tx),"km/h ή ",round(BR)," B</td>"
	print "<td align='center'>", y, "mm</td>"
	print "<td align='center'>",i.SRAD,"W/m<sup>2</sup></td>"
	print "<td align='center'>",i.UV,"</td>"
	print "<td align='center'>",str(round(s,2)),"oC</td>"
	print "<td align='center'>",i.BATT,"</td>"
	print "<td align='center'>",i.CHILL,"</td>"
        print "</tr>"

if t<14:
	print "<body style='background-color:#3bc8ef;'>"
elif t<22:
	print "<body style='background-color:#59e01f;'>"
elif t<30:
	print "<body style='background-color:#f99a1d;'>"
else:
	print "<body style='background-color:#f91d1d;'>"
print "</table>"

print " <br><br><a href='meteo_all.py'><font size='5'><strong>Ιστορικό Δεδομένων</strong></font></a>"
print "<br><a href='index.html'><font size='5'><strong>Πίσω</strong></font></a>"
print "</body>"
print "</html>"



cnx.close()

