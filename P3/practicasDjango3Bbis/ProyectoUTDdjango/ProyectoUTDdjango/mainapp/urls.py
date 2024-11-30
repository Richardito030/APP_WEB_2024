# mainapp/urls.py
from django.urls import path
from . import views

app_name = 'mainapp'  # Define un espacio de nombres para tus rutas

urlpatterns = [
    path('', views.index, name='inicio'),
    path('inicio/', views.index, name='inicio_alt'),
    path('acercade/', views.about, name='acercade'),
    path('mision/', views.mision, name='mision'),
    path('vision/', views.vision, name='vision'),
    path('registro/', views.registro, name='registro'),
    path('inicioSesion/', views.inicioSesion, name='inicioSesion'),
    path('logout/', views.logout_user, name='logout'),
]
