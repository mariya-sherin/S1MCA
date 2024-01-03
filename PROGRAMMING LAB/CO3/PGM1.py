# CO3/Graphics/Rectangle.py

def area(Rlength,Rbreadth):
 	return Rlength*Rbreadth
def perimeter(Rlength,Rbreadth):
return 2*Rlength+Rbreadth

# CO3/Graphics/Circle.py

import math
def area(Ciradius):
 	return math.pi*Ciradius**2
def circumference(Ciradius):
 	return 2*math.pi*Ciradius

# CO3/Graphics/3DGraphics/Cuboid.py

def surf_area(Culength,Cuwidth,Cuheight):
 	return 2*((Culength*Cuwidth)+(Culength*Cuheight)+(Cuwidth*Cuheight))
def volume(Culength,Cuwidth,Cuheight):
 	return Culength*Cuwidth*Cuheight

# CO3/Graphics/3DGraphics/Sphere.py

import math

def surf_area(Sradius):
 	return 4*math.pi*Sradius**2
def volume(Sradius):
 	return (4/3)*(math.pi*Sradius**3)

# CO3/CO3PGM2.py

from Graphics import rectangle,circle
from Graphics.threeD_Graphics import cuboid,sphere

#rectangle
print (" RECTANGLE ")
Rlength=int(input("Enter length = "))
Rbreadth=int(input("Enter breadth = "))

print ("\nArea of rectangle = ",rectangle.area(Rlength,Rbreadth))
print ("Perimeter of rectangle = ",rectangle.perimeter(Rlength,Rbreadth))

#circle
print ( "\n\n CIRCLE ")
Ciradius=int(input("Enter radius = "))

print ("\nArea of circle = ",circle.area(Ciradius))
print ("Circumference of circle = ",circle.circumference(Ciradius))

#sphere
print ( "\n\n SPHERE ")
Sradius=int(input("Enter radius = "))

print ("\nSurface area of sphere = ",sphere.surf_area(Sradius))
print ("Volume of sphere = ",sphere.volume(Sradius))

#cuboid
print ( "\n\n CUBOID ")
Culength=int(input("Enter length = "))
Cuheight=int(input("Enter height = "))
Cuwidth=int(input("Enter width = "))


print ("\nSurface area of cuboid = ",cuboid.surf_area(Culength,Cuwidth,Cuheight))
print ("Volume of cuboid = ",cuboid.volume(Culength,Cuwidth,Cuheight))
