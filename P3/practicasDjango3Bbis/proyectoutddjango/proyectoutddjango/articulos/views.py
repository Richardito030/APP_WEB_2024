from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from articulos.models import Category, Article

@login_required(login_url='mainapp:inicio')
def list_art(request):
    articles = Article.objects.all()
    return render(request, "articulos/listado_art.html", {
        'title': 'Articulos',
        'content': 'Listado de articulos',
        'articles': articles
    })

@login_required(login_url='mainapp:inicio')
def list_cat(request):
    categories = Category.objects.all()
    return render(request, "categorias/listado_cat.html", {
        'title': 'Categorias',
        'content': 'Listado de categorias',
        'categories': categories
    })