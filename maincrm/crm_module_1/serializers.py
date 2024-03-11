from rest_framework import serializers
from .models import JobPost,TimeHistory

class JobPostSerializer(serializers.ModelSerializer):
    class Meta:
        model = JobPost
        fields = '__all__'

class TimeHistorySerializer(serializers.ModelSerializer):
    class Meta:
        model = TimeHistory
        fields = '__all__'