# Imported django path
from django.urls import path
# Imported all views 
from . import views
# Importing static
from django.conf.urls.static import static
# Importing static
from django.conf import settings

urlpatterns = [
    # Added path and linked views
    path('alljobapplication/', views.job_application, name='job-application'),
]