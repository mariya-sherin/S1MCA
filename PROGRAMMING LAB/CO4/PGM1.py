class Rectangle:
	def __init__(self, length, breadth):
    	self.length = length
    	self.breadth = breadth

	def area(self):
    	return self.length * self.breadth

	def perimeter(self):
    	return 2 * (self.length + self.breadth)

	def compare_area(self, other_rectangle):
    	if self.area() > other_rectangle.area():
        	return "The first rectangle has a larger area."
    	elif self.area() < other_rectangle.area():
        	return "The second rectangle has a larger area."
    	else:
        	return "Both rectangles have the same area."

print("RECTANGLE 1 \n")
length = int(input("Enter length: "))
breadth = int(input("Enter breadth: "))

rectangle1 = Rectangle(length, breadth)
print("\nArea = ", rectangle1.area())
print("Perimeter = ", rectangle1.perimeter())

print("\n\n RECTANGLE 2 \n")
length = int(input("Enter length: "))
breadth = int(input("Enter breadth: "))

rectangle2 = Rectangle(length, breadth)
print("\nArea = ", rectangle2.area())
print("Perimeter = ", rectangle2.perimeter())

comparison_result = rectangle1.compare_area(rectangle2)
print("\nComparison of areas: ", comparison_result)
