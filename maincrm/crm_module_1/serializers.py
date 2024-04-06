from rest_framework import serializers
from .models import JobPost,TimeHistory,ProjectReport,ClientReport,ExpenseReport

class JobPostSerializer(serializers.ModelSerializer):
    class Meta:
        model = JobPost
        fields = '__all__'

class TimeHistorySerializer(serializers.ModelSerializer):
    class Meta:
        model = TimeHistory
        fields = '__all__'

class ProjectReportSerializer(serializers.ModelSerializer):
    class Meta:
        model = ProjectReport
        fields = '__all__'

class ClientReportSerializer(serializers.ModelSerializer):
    class Meta:
        model =  ClientReport
        fields = '__all__'

class ExpenseReportSerializer(serializers.ModelSerializer):
    class Meta:
        model = ExpenseReport
        fields = '__all__'
