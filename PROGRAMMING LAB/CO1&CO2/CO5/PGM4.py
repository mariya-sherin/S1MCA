import csv
n=int(input("Enter the line number : ")) with open("Data.csv",'r') as f:
data=list(csv.reader(f)) print(data[n])
