from django.shortcuts import render, HttpResponse
from gb import models

def index(request):
    return render(request, 'index.html')