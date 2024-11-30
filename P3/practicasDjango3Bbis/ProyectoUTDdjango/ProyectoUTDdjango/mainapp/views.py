from django.shortcuts import render, redirect
#from django.contrib.auth.forms import UserCreationForm
from .form import RegisterForm
from django.contrib import messages
from django.contrib.auth import authenticate, login, logout
from django.contrib.auth.decorators import login_required

# Create your views here.

def custom_404_view(request, exception):
    return redirect('mainapp:inicio')

def index(request):
    mensaje = 'hola soy un mensaje'
    return render(request, 'mainapp/index.html', {
        'title': '  Inicio',
        'content': 'Bienvenido a la pagina principal',
        'mensaje': mensaje
    })

@login_required(login_url='mainapp:inicio')
def about(request):
    return render(request, 'mainapp/about.html', {
        'title': 'Acerca de nosotros',
        'content': 'Somos un equipo de Desarrollo de SW'
    })

@login_required(login_url='mainapp:inicio')
def mision(request):
    return render(request, 'mainapp/mision.html', {
        'title': 'Mision',
        'content': 'La mision de la empresa'
    })

@login_required(login_url='mainapp:inicio')
def vision(request):
    return render(request, 'mainapp/vision.html', {
        'title': 'Vision',
        'content': 'La vision de la empresa'
    })

def registro(request):
    if request.user.is_authenticated:
        return redirect('mainapp:inicio')
    else:
        register_form = RegisterForm()

        if request.method == 'POST':
            register_form = RegisterForm(request.POST)
            if register_form.is_valid():
                register_form.save()
                messages.success(request, 'Usuario registrado correctamente')
                return redirect('mainapp:inicio')
            else:
                messages.error(request, 'Error al registrar usuario')
        
    return render(request, 'users/registro.html', {
        'title': 'Registro',
        'register_form': register_form
    })

def inicioSesion(request):
    if request.user.is_authenticated:
        return redirect('mainapp:inicio')
    else:
        if request.method == 'POST':
            username = request.POST.get('username')
            password = request.POST.get('password')

            user = authenticate(request, username=username, password=password)

            if user is not None:
                login(request, user)
                messages.success(request, 'Bienvenido al inicio de sesión {}'.format(user.username))
                return redirect('mainapp:inicio')
            else:
                messages.error(request, 'Usuario o contraseña incorrectos')
     
    return render(request, 'users/login.html', {
        'title': 'Inicio de sesion',
        'content': 'Formulario de inicio de sesion'
    })

def logout_user(request):
    logout(request)
    return redirect('mainapp:inicio')