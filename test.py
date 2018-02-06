
import sys
print("ceva");
exit(0);
import cv2
print("ceva");
exit(-11);

import logging as log
import datetime as dt
from time import sleep

import sys
print("ceva");
exit(-11);

eyepath = 'eyecasc.xml'
if len(sys.argv)<1:
    print("muie croitoru");
    exit(-1);

cascPath = "haarcascade_frontalface_alt.xml"
eyecascade=cv2.CascadeClassifier(eyepath);
faceCascade = cv2.CascadeClassifier(cascPath)
log.basicConfig(filename='webcam.log',level=log.INFO)




    # Capture frame-by-frame
frame= cv2.imread(argv[0],1);
print (argv[1])

cv2.destroyAllWindows()
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
    exit(-1);
if len(faces)>1 :
    print("more than 1 face");
    exit(-1);
    
    # Draw a rectangle around the faces
    

             
for (x, y, w, h) in faces:
    cv2.rectangle(frame, (x, y), (x+w, y+h), (0, 255, 0), 2)

    # Display the resulting frame
argv[0] =argv[0].replace(' ', '')[:-4].upper()
argv[0]+="(framed).jpg"
cv2.imwrite(argv[0],frame)
# When everything is done, release the capture
cv2.destroyAllWindows()
if(len(faces)==1)
	print("merge")
	exit(1);


