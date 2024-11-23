from django.shortcuts import render, HttpResponse, redirect
""" from django.contrib.auth.forms import UserCreationForm """
from mainapp.forms import RegisterForm
from django.contrib import messages
from django.contrib.auth import authenticate, login, logout
from django.contrib.auth.decorators import login_required

# Create your views here.
def index(requets):
    return render(requets,'mainapp/index.html',{
        'tittle':'Inicio',
        'content':'Bienvenido a mi pagina de incio',
    })

def acercade(requets):
    return render(requets,'mainapp/about.html',{
        'tittle':'Acerca de ...',
        'content':'Somos una empresa de desarrollo de SW Multiplataforma con Django',
    })

def mision(requets):

    return render(requets,'mainapp/mision.html',{
        'tittle':'Mision',
    })

def vision(requets):
    return render(requets,'mainapp/vision.html',{
        'tittle':'Vision',
    })

def registro(requets):

    if requets.user.is_authenticated:
        return redirect ('inicio')
    else: 
        register_form=RegisterForm()

        if requets.method == "POST":
            register_form=RegisterForm(requets.POST)

            if register_form.is_valid():
                register_form.save()
                messages.success(requets,"¡registro Exitoso!")
                return redirect('inicio')

        return render(requets,'mainapp/registro.html',{
            'tittle':'registro de sesion',
            'register_form':register_form
        })






def inicioS(request):
    if request.user.is_authenticated:
        return redirect('inicio')
    else:
        if request.method == "POST":
            username=request.POST.get('username')
            password=request.POST.get('pass')

            user = authenticate(request,username=username, password=password)
            if user is not None:
                login(request,user)
                messages.warning(request, "bienvenido al inicio de sesion")
                return redirect('inicio')
            else:
                messages.warning(request, "no se puede iniciar")
        return render(request, 'mainapp/inicioS.html', {
            'title': 'Registro',
            'content': 'Formulario de inicio de sesión'
        })
    

def logout_user(request):
    logout(request)
    
    return redirect('inicio')
# En views.py

#Redireccion 404
def redireccion_404(request, exception):
    # Redirige a la URL deseada, por ejemplo, la página de inicio
    return redirect('inicio') 
#redireccion segunda forma
def error_404_2(request, exception):
    return render(request, 'mainapp/404.html')

