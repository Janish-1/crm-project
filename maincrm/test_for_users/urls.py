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
    # Another way of calling api
    path('hello-world/',views.hello_world,name='hello_world'),

    # Career Paths
    path('createcareer',views.create_career,name='createcareer'),
    path('readcareers/{id}',views.read_career,name='readcareer'),
    path('updatecareers/{id}',views.update_career,name='updatecareer'),
    path('deletecareers/{id}',views.delete_career,name='deletecareer'),
    path('readallcareers',views.read_all_careers,name='readallcareers'),

    # Quiz Redirection Path
    path('redirecttest',views.redirect_to_test,name='redirecttotest'),

    # Quiz Paths
    path('quiz/<str:category>/<str:testid>/',views.open_quiz,name='quiz'),
    path('submit-quiz/{category}/{testid}',views.submit_quiz,name='submitquiz'),
    path('pass/{category}/{testid}',views.pass_function,name='passfunction'),
    path('fail/{category}/{testid}',views.fail_function,name='failfunction'),
    path('error',views.errorpage,name='errorpage'),
    path('passpage',views.passpage,name='passpage'),
    path('failpage',views.failpage,name='failpage'),
]