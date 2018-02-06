
import logging as log
import datetime as dt
from time import sleep

import sys
#import OpenCV module
import cv2
#import os module for reading training data directories and paths
import os
#import numpy to convert python lists to numpy arrays as 
#it is needed by OpenCV face recognizers
import numpy as np
def detect_face(img):
    
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    
    
    face_cascade = cv2.CascadeClassifier('opencv-files/lbpcascade_frontalface.xml')

   
    faces = face_cascade.detectMultiScale(gray, scaleFactor=1.2, minNeighbors=3);
    
   
    if (len(faces) == 0):
        return None, None
   
    
    (x, y, w, h) = faces[0]
    
   
    return gray[y:y+w, x:x+h], faces[0]



def prepare_training_data(data_folder_path,array,picture):
    
   
    dirs = os.listdir(data_folder_path)
    
   
    faces = []
   
    labels = []
    
   
        
      
    # if not dir_name.startswith("s"):
         #continue;
         
    
     
     #label = int(dir_name.replace("s", ""))
     
    
    subject_dir_path = data_folder_path 
     
    
    subject_images_names = os.listdir(subject_dir_path)
    
    
    for image_name in subject_images_names:
        
        
        if image_name.startswith(".") or image_name==picture or not image_name.endswith(".jpg"):
            continue;
        
       
        image_path = subject_dir_path + "/" + image_name
    
        
        image = cv2.imread(image_path)
        
        
       
     
        
       
        face, rect = detect_face(image)
        
        
      
        if face is not None:
          
            faces.append(face)
            if image_name in array:
             labels.append( 1)
            else:
              labels.append(2)
               
        cv2.destroyAllWindows()
        cv2.waitKey(1)
        cv2.destroyAllWindows()
        
    return faces, labels



def draw_rectangle(img, rect):
    (x, y, w, h) = rect
    cv2.rectangle(img, (x, y), (x+w, y+h), (0, 255, 0), 2)
    

def draw_text(img, text, x, y):
    cv2.putText(img, text, (x, y), cv2.FONT_HERSHEY_PLAIN, 1.5, (0, 255, 0), 2)



def predict(test_img):
   
    img = test_img.copy()
    
    face, rect = detect_face(img)
    if face is None:
        print("noface");
        sys.exit(1);
    label, confidence = face_recognizer.predict(face)
   
    label_text = subjects[label]
	
    print(subjects[label])
    sys.exit(1)
  
    draw_rectangle(img, rect)
    
    draw_text(img, label_text, rect[0], rect[1]-5)
    
    return img
argList = sys.argv
array=[] 
for x in range (1,7) :
	pic=argList[x][12:]
	
	array.append(pic)

subjects = ["", "people", "others"]
folder= "C:\\xampp\\htdocs\\webcamImage"#folder with the faces
picture=argList[7][12:]



faces, labels = prepare_training_data(folder,array,picture)





face_recognizer =cv2.face.LBPHFaceRecognizer_create()

face_recognizer.train(faces, np.array(labels))



folderpic=folder+"\\"+picture;
test_img1 = cv2.imread(folderpic)
if test_img1 is None:
	sys.exit(-3);
#test_img2 = cv2.imread("test-data/test2.jpg")
predicted_img1 = predict(test_img1)
#predicted_img2 = predict(test_img2)
print("nonok")
sys.exit(1)

#cv2.imshow(subjects[2], cv2.resize(predicted_img2, (400, 500)))










