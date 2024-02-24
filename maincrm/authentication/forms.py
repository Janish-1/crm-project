# Importing django forms, UserCreatingForm and User
from django import forms 
from django.contrib.auth.forms import UserCreationForm
from django.contrib.auth.models import User

# Creating Class SignupForm
class SignupForm(UserCreationForm):
    # Creating Class Meta with model and fields
    class Meta:
        model = User 
        fields = ['username', 'password1', 'password2']

# Creating Class LoginForm
class LoginForm(forms.Form):
    # Making two fields username and password for the database
    username = forms.CharField()
    password = forms.CharField(widget=forms.PasswordInput)