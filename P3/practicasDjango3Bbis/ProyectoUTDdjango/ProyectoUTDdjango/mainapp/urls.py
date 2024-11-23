from django.urls import path
from . import views

urlpatterns = [
    path('', views.index,name='inicio'),
    path('inicio/', views.index,name='inicio'),
    path('acercade/', views.acercade,name='acercade'),
    path('mision/', views.mision,name='mision'),
    path('vision/', views.vision,name='vision'),
    path('inicioS/', views.inicioS,name='inicioS'),
    path('registro/', views.registro,name='registro'),
    path('logout/', views.logout_user,name='logout'),


]