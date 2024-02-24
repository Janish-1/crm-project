from django.shortcuts import render
# Importing viewsets from rest_framework
from rest_framework import viewsets
# Linking Serializers and Questions Models
from .serializers import QuestionsSerializer
from .models import Questions

# Create your views here.

# Gets all Questions data from the database
class QuestionsView(viewsets.ModelViewSet):
    # Initiate Serializers
    serializer_class = QuestionsSerializer
    # Get all Questions stored in the database
    queryset = Questions.objects.all()
