from django.shortcuts import render

# Create your views here.
def index(request):
    return render(request,'mainapp/index.html',{
        'tittle':'inicio',
        'content':'.:: !Bienvenido a la pagina principal! ::.',
        'mensaje':'?(Azotatobillos indica que el enemigo ha desaparecido)'
    })

def about(request):
     return render(request,'mainapp/about.html',{
        'tittle':'Acerca de mi',
        'content':'.:: somos un equipo  profesional de lol::.'
    })

def mision(request):
    return render(request, 'mainapp/Mision.html', {
        'title': 'Misión',
        'content': 'Nuestra misión es proporcionar un excelente servicio y valor a nuestros usuarios.'
    })

def vision(request):
    return render(request, 'mainapp/Vision.html', {
        'title': 'Visión',
        'content': 'Nuestra visión es convertirnos en líderes en nuestro campo, ofreciendo innovación y calidad.'
    })

