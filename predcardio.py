import sys
import numpy as np
from sklearn.preprocessing import OrdinalEncoder
from sklearn.preprocessing import OneHotEncoder
import pandas as pd
from keras.models import load_model
from datetime import date
from datetime import datetime
model = load_model('modelos/cardiomodel.h5')

genero=sys.argv[1]

born=sys.argv[2]

#born=date.today()
today = date.today()
#print(today)
born="".join([born," 00:00:00"])
#print(born)

born=datetime.strptime(born,'%Y-%m-%d %H:%M:%S')
#print(born)
edad=today.year - born.year - ((today.month, today.day) < (born.month, born.day))
#print(edad)
hiper=sys.argv[3]
heart=sys.argv[4]
married=sys.argv[5]
work=sys.argv[6]
Res=sys.argv[7]
gluc=sys.argv[8]
bmi=sys.argv[9]
#print(bmi)
smoke=sys.argv[10]
test=np.zeros(14)
if genero=="0":
    test[0]=0.
    test[1]=1.
    test[2]=0.
else:
    test[0]=1.
    test[1]=0.
    test[2]=0.
    
if married=="1":
    test[3]=0.
    test[4]=1.
else:
    test[3]=1.
    test[4]=0.

if Res=="Rural":
    test[5]=1.
    test[6]=0.
else:
    test[5]=0.
    test[6]=1.
test[7]=edad
test[8]=hiper
test[9]=heart
if work=="Private":
    test[10]=2.
if work=="Self-employed":
    test[10]=3.
if work=="Govt_job":
    test[10]=0.
if work=="children":
    test[10]=4.

test[11]=gluc
test[12]=bmi

if smoke=="Unknown":
    test[13]=0.
if smoke=="formerly smoked":
    test[13]=1.
if smoke=="never smoked":
    test[13]=2.
if smoke=="smokes":
    test[13]=3.

#print(test)
test=np.reshape(test,(1,14))
result = model.predict(test)*100
print(result[0,0])