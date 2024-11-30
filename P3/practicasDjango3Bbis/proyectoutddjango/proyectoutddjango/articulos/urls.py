# articulos/urls.py
from django.urls import path
from . import views

app_name = 'articulos'  # Define un espacio de nombres para tus rutas

urlpatterns = [
    path('listado_articulos/', views.list_art, name='listado_articulos'),    
    path('listado_categorias/', views.list_cat, name='listado_categorias'), 
]