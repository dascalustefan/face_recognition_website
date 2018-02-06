#!/usr/bin/python
import sys

#get the arguments passed
argList = sys.argv
print("muie croitoru");
print(" muie croitoru");
#Not enough arguments. Exit with a value of 1.
if len(argList) < 3:
    #Return with a value of 1.
    sys.exit(3)
print ("ceva");
arg1 = argList[1]
arg2 = argList[2]

#Check arguments. Exit with the appropriate value.
if len(arg1) > 255:
    #Exit with a value of 4.
    sys.exit(4)
if len(arg2) < 2:
    #Exit with a value of 8.
    sys.exit(8)

#Do further coding using the arguments------

#If program works successfully, exit with a value of 0