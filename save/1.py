import cv2
import sys
import logging as log
import datetime as dt
from time import sleep
eyepath = 'eyecasc.xml'
cascPath = "haarcascade_frontalcatface_extended.xml"
eyecascade=cv2.CascadeClassifier(eyepath);
faceCascade = cv2.CascadeClassifier(cascPath)
log.basicConfig(filename='webcam.log',level=log.INFO)

video_capture = cv2.VideoCapture(0)
anterior = 0

while True:
    if not video_capture.isOpened():
        print('Unable to load camera.')
        sleep(5)
        pass

    # Capture frame-by-frame
    ret, frame = video_capture.read()

    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    eyes=eyecascade.detectMultiScale(gray,scaleFactor=2);
    for (x, y, w, h) in eyes:
         cv2.rectangle(frame, (x, y), (x+w, y+h), (0, 255, 0), 2)
    faces = faceCascade.detectMultiScale(
        gray,
        #scaleFactor=2,
        minNeighbors=0,
        minSize=(30, 30)
    )
    targetx=float(0);
    targety=float(0);
    targetw=float(0);
    targeth=float(0);
    ok=0;
    
    # Draw a rectangle around the faces
    
    if len(faces)==0 :
        for (x, y, w, h) in faces:
        
            if abs(x-targetx)<50 and abs(y-targety)<50 and abs(w-targetw)<50 and abs(h-targeth)<50 :  
                targetx=x;
                targety=y;
                targetw=w;
                targeth=h;
                ok=1;

            cv2.rectangle(frame, (x, y), (x+w, y+h), (0, 255, 0), 2)
        
        if ok==0:
            for (x, y, w, h) in faces:
                  targetx=x;
                  targety=y;
                  targetw=w;
                  targeth=h;
                  break;
    if anterior != len(faces):
        anterior = len(faces)
        log.info("faces: "+str(len(faces))+" at "+str(dt.datetime.now()))

    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

    # Display the resulting frame
    cv2.imshow('Video', frame)
    # Display the resulting frame
    cv2.imshow('Video', frame)
    print("%d %d %d %d \n",targetx,targety,targetw,targeth);
    #//input("Press Enter to continue...")



# When everything is done, release the capture
video_capture.release()
cv2.destroyAllWindows()
