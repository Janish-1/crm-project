from django.contrib import admin
from .models import Questions

# Register your models here.

# You can make CRUD Quickly with this method
# Creating the Admin Class for the model Questions
class QuestionsAdmin(admin.ModelAdmin):
    # Decide what will show in crud database on django adminstration
    list_display = ('question','answers','correct_answer','category',
                    'difficulty')
     
# Add to django admin
admin.site.register(Questions,QuestionsAdmin)