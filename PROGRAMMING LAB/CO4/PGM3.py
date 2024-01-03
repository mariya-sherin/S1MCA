class Rectangle:
	def __init__(self, length, breadth):
    	self.length = length
    	self.breadth = breadth

	def area(self):
    	return self.length * self.breadth

	def __lt__(self, other):
    	return self.area() < other.area()

l1=int(input("Enter the length of 1st rectangle : "))
b1=int(input("Enter the breadth of 1st rectangle : "))
rectangle1 = Rectangle(l1 , b1)

l2=int(input("Enter the length of 2nd rectangle : "))
b2=int(input("Enter the breadth of 2nd rectangle : "))
rectangle2 = Rectangle(l2 , b2)

if rectangle1 < rectangle2:
	print("Area of Rectangle 1 is less than the area of Rectangle 2.")
else:
	print("Area of Rectangle 1 is not less than the area of Rectangle 2.")
