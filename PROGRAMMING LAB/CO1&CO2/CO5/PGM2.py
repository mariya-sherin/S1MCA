import pandas
with open('file.txt','r') as f, open('o_file.txt','w') as o, open('e_file.txt','w') as e:
for i, j in enumerate(f, 1): if i%2==0:
e.write(j)
else:
o.write(j)

f_data=pandas.read_csv('file.txt') print("Original file data\n",f_data) o_data=pandas.read_csv('o_file.txt') print("Odd file data\n",o_data) e_data=pandas.read_csv('e_file.txt') print("Even file data\n",e_data)
