import csv import pandas

field_names=['Roll_No', 'Name', 'Age'] stud_dict=[{'Roll_No':'1', 'Name': 'Anirudh','Age': 20},
{'Roll_No':'1', 'Name': 'Alex','Age': 22},
{'Roll_No':'2', 'Name': 'Hari','Age': 23},
{'Roll_No':'3', 'Name': 'Rohit','Age': 20},
{'Roll_No':'4', 'Name': 'Alan','Age': 21}
]

with open('Names.csv','w') as f: writer=csv.DictWriter(f,fieldnames=field_names) writer.writeheader()
writer.writerows(stud_dict)

data=pandas.read_csv('Names.csv') print(data)
