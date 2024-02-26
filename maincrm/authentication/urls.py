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
    path('', views.index, name='home'),
    path('login/', views.user_login, name='login'),
    path('signup/', views.user_signup, name='signup'),
    path('logout/', views.user_logout, name='logout'),
]