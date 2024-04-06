# Importing Rest Framework
from  rest_framework import serializers
from .models import Questions

# This will convert model instances to JSON Format for frontend
class QuestionsSerializer(serializers.ModelSerializer):
    class Meta:
        # Database and fields to show in frontend
        model = Questions
        fields = ('question','answers','correct_answer','category',
                    'difficulty')
