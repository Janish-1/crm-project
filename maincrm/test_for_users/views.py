from django.shortcuts import render
# Importing viewsets from rest_framework
from rest_framework import viewsets
# Linking Serializers and Questions Models
from .serializers import QuestionsSerializer
from .models import Questions
# Importing apiview and Response from rest framework
from rest_framework.decorators import api_view
from rest_framework.response import Response

# Create your views here.

# Making this Get Request
@api_view(['GET'])
def hello_world(request):
    return Response({'message':'Hello, world'})

# Gets all Questions data from the database
class QuestionsView(viewsets.ModelViewSet):
    # Initiate Serializers
    serializer_class = QuestionsSerializer
    # Get all Questions stored in the database
    queryset = Questions.objects.all()
