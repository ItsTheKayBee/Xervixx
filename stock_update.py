from nsetools import Nse
nse = Nse()
from pprint import pprint
import csv
import mysql.connector

class Nse_api:

	def symList():
		filename = "nifty100.csv"
		fields = [] 
		rows = []
		with open(filename, 'r') as csvfile: 
		    csvreader = csv.reader(csvfile) 
		        
		    for row in csvreader: 
		        rows.append(row) 
		      
		for row in rows[:101]: 
		    for col in row:
		    	Nse_api.totData(col)

	def totData(symbol):
		prevDict = nse.get_quote(symbol)
		stockData = {k:v for (k,v) in prevDict.items() if 'companyName' in k or 'symbol' in k or 'pChange' in k or 'lastPrice' in k}
		Nse_api.updateData(stockData)

	def addData(stockData):
		companyName=stockData['companyName']
		symbol=stockData['symbol']
		lastPrice=stockData['lastPrice']
		priceChange=stockData['pChange']

		mydb = mysql.connector.connect(
		  host="localhost",
		  user="root",
		  password="",
		  database="xervixx_test"
		)

		mycursor = mydb.cursor()

		sql = "INSERT INTO stocks (company_name,last_price,price_change,symbol) VALUES (%s,%s,%s,%s)"
		val = (companyName,lastPrice,priceChange,symbol)
		mycursor.execute(sql,val)

		mydb.commit()

	def updateData(stockData):
		companyName=stockData['companyName']
		symbol=stockData['symbol']
		lastPrice=stockData['lastPrice']
		priceChange=stockData['pChange']

		mydb = mysql.connector.connect(
		  host="localhost",
		  user="root",
		  password="",
		  database="xervixx_test"
		)

		mycursor = mydb.cursor()

		sql = "UPDATE stocks SET last_price = %s, price_change = %s where symbol=%s";
		val = (lastPrice,priceChange,symbol)
		mycursor.execute(sql,val)
		print("1 stock updated")

		mydb.commit()
 
Nse_api.symList()
