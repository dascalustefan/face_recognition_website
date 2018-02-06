#!/usr/bin/python
import cv2

import logging as log
import datetime as dt
from time import sleep

import sys

#get the arguments passed
argList = sys.argv
string=argList[1]
string=string.replace('/','\\')

eyepath = 'eyecasc.xml'
cascPath = "haarcascade_frontalface_alt.xml"
eyecascade=cv2.CascadeClassifier(eyepath);
faceCascade = cv2.CascadeClassifier(cascPath)
log.basicConfig(filename='webcam.log',level=log.INFO)

    # Capture frame-by-frame
frame= cv2.imread(argList[1],1);
if frame is None:
 sys.exit(-3);
gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
eyes=eyecascade.detectMultiScale(gray,scaleFactor=2,minNeighbors=2, minSize=(70, 70));
faces = faceCascade.detectMultiScale(
        gray,
        #scaleFactor=2,
        minNeighbors=3,
        minSize=(90, 90)
)
for (x, y, w, h) in eyes:
    cv2.rectangle(frame, (x, y), (x+w, y+h), (0, 255, 0), 2)
if len(faces)==0 :
    print("noface");
    sys.exit(-1);
if len(faces)>1 :
    print("more than 1 face");
    sys.exit(-1);
    
    # Draw a rectangle around the faces




for (x, y, w, h) in faces:
    cv2.rectangle(frame, (x, y), (x+w, y+h), (0, 255, 0), 2)

    # Display the resulting frame
#argList[1] =argList[1].replace(' ', '')[:-4].upper()
#argList[1]+="(framed).jpg"
#cv2.imwrite(argList[1],frame)
if len(faces)==1:
	print("merge")

sys.exit(1);

#Not enough arguments. Exit with a value of 1.
