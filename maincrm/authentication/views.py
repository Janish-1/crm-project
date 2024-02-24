# Importing django: render,redirect,authenticate,login,logout,
# Importing form components: UserCreationForm,LoginForm
from django.shortcuts import render,redirect
from django.contrib.auth import authenticate, login, logout 
from .forms import UserCreationForm, LoginForm

# Home page
def index(request):
    # Rendering index.html file on path
    return render(request, 'index.html')

# signup page
def user_signup(request):
    # Check if request method is POST
    if request.method == 'POST':
        # Store all data in form and check if its valid and save them
        form = UserCreationForm(request.POST)
        # Check if form is valid
        if form.is_valid():
            form.save()
            return redirect('login')
    else:
        form = UserCreationForm()
    return render(request, 'signup.html', {'form': form})

# login page
def user_login(request):
    if request.method == 'POST':
        # Get Data in post to LoginForm
        form = LoginForm(request.POST)
        # Check if form is valid
        if form.is_valid():
            # Cleaning form data
            username = form.cleaned_data['username']
            password = form.cleaned_data['password']
            # Authenticate username and password
            user = authenticate(request, username=username, password=password)
            if user:
                # Logins the user
                login(request, user)    
                return redirect('home')
    else:
        form = LoginForm()
    return render(request, 'login.html', {'form': form})

# logout page
def user_logout(request):
    # Logout the user
    logout(request)
    return redirect('login')