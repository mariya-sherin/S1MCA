import csv
with open("Data.csv",'r') as f: data=csv.reader(f)
for i in data:
print(i)
