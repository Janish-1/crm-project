from django.contrib import admin
from django.urls import path,include
# Importing Routers 
from rest_framework import routers
# Importing Views
from . import views

# Selecting Default Router
router = routers.DefaultRouter()
# Register the router and testquestions are the calling path
# Example: http://localhost:8000/api/testquestions
router.register(r'testquestions',views.QuestionsView,'testquestions')

urlpatterns = [
    # This creates a api for the routes
    path('api/',include(router.urls)),
]