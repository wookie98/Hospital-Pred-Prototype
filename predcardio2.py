
from keras.models import load_model
model = load_model('modelos/cardiomodel.h5')
genero=sys.argv[2]
edad=sys.argv[3]
today = date.today()
edad=today.year - born.year - ((today.month, today.day) < (born.month, born.day))
hiper=sys.argv[3]
heart=sys.argv[4]
married=sys.argv[5]
work=sys.argv[6]
Res=sys.argv[7]
gluc=sys.argv[8]
bmi=sys.argv[9]
smoke=sys.argv[10]
test=[genero,edad,hiper,heart,married,work,Res,gluc,bmi,smoke]
print(smoke)
#result = model.predict(test)*100
return result;