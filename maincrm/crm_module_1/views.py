# Importing Django
from django.shortcuts import render, get_object_or_404, redirect
from django.contrib import messages
from django.core.exceptions import ObjectDoesNotExist
from datetime import datetime
# Importing Models
from test_for_users.models import Careers
from .models import *
from .serializers import *
# Rest Framework
from rest_framework.decorators import api_view
from rest_framework.response import Response
from rest_framework import status,serializers
from rest_framework.views import APIView
from rest_framework.response import Response

def search_view(request):
    return render(request, 'your_template.php', {})

def notification_view(request):
    return render(request, 'your_template.php', {})

def view_all_notifications_view(request):
    return render(request, 'your_template.php', {})

def messages_view(request):
    return render(request, 'your_template.php', {})

def see_all_messages_view(request):
    return render(request, 'your_template.php', {})

def profile_image_view(request):
    return render(request, 'your_template.php', {})

def profile_view(request):
    return render(request, 'your_template.php', {})

def account_settings_view(request):
    return render(request, 'your_template.php', {})

def faq_view(request):
    return render(request, 'your_template.php', {})

# Sidebar Navigation Views
def customer_view(request):
    return render(request, 'your_template.php', {})

def add_customer_view(request):
    # Your implementation for the 'customer-add' view goes here
    return render(request, 'your_template.php', {})

def list_customers_view(request):
    # Your implementation for the 'customer-list' view goes here
    return render(request, 'your_template.php', {})

def group_customers_view(request):
    # Your implementation for the 'customer-group' view goes here
    return render(request, 'your_template.php', {})

def transactions_view(request):
    # Your implementation for the 'transactions' view goes here
    return render(request, 'your_template.php', {})

def new_deposit_view(request):
    # Your implementation for the 'transactions-newdeposit' view goes here
    return render(request, 'your_template.php', {})

def new_expense_view(request):
    # Your implementation for the 'transactions-newexpense' view goes here
    return render(request, 'your_template.php', {})

def transfer_view(request):
    # Your implementation for the 'transactions-transfer' view goes here
    return render(request, 'your_template.php', {})

def view_transactions_view(request):
    # Your implementation for the 'transactions-viewtransactions' view goes here
    return render(request, 'your_template.php', {})

def balance_sheet_view(request):
    # Your implementation for the 'transactions-balancesheet' view goes here
    return render(request, 'your_template.php', {})

def transfer_report_view(request):
    # Your implementation for the 'transactions-transferreport' view goes here
    return render(request, 'your_template.php', {})

# Sales Views
def sales_view(request):
    return render(request, 'sales/sales_view.php', {})

def sales_invoices_view(request):
    return render(request, 'sales/sales_invoices_view.php', {})

def sales_new_invoices_view(request):
    return render(request, 'sales/sales_new_invoices_view.php', {})

def sales_recurring_invoices_view(request):
    return render(request, 'sales/sales_recurring_invoices_view.php', {})

def sales_new_recurring_invoices_view(request):
    return render(request, 'sales/sales_new_recurring_invoices_view.php', {})

def sales_quotes_view(request):
    return render(request, 'sales/sales_quotes_view.php', {})

def sales_new_quotes_view(request):
    return render(request, 'sales/sales_new_quotes_view.php', {})

def sales_payments_view(request):
    return render(request, 'sales/sales_payments_view.php', {})

def sales_tax_rates_view(request):
    return render(request, 'sales/sales_tax_rates_view.php', {})

# Tasks Views
def tasks_running_task_view(request):
    return render(request, 'tasks/tasks_running_task_view.php', {})

def tasks_archive_task_view(request):
    return render(request, 'tasks/tasks_archive_task_view.php', {})

# Accounting Views
def accounting_client_payment_view(request):
    return render(request, 'accounting/accounting_client_payment_view.php', {})

def accounting_expense_management_view(request):
    return render(request, 'accounting/accounting_expense_management_view.php', {})

def accounting_expense_category_view(request):
    return render(request, 'accounting/accounting_expense_category_view.php', {})

# Report Views
def report_project_report_view(request):
    return render(request, 'report/report_project_report_view.php', {})

def report_client_report_view(request):
    return render(request, 'report/report_client_report_view.php', {})

def report_expense_report_view(request):
    return render(request, 'report/report_expense_report_view.php', {})

def report_income_expense_comparison_view(request):
    return render(request, 'report/report_income_expense_comparison_view.php', {})

class ProjectReportAPIView(APIView):
    def get(self,request):
        data = ProjectReport.objects.all()
        return Response({'success':True,'data':data},status= HTTP_200_CREATED)

    def post(self,request):
        serializers = ProjectReportSerializer(data=request.data)
        if serializers.is_valid():
            serializers.save()
            return Response({'success':True},status=HTTP_201_CREATED)
        return Response({'success':False},status=HTTP_400_BAD_REQUEST)

    def put(self,request,project_id):
        ProjectReport = get_object_or_404(ProjectReport, pk=project_id)
        serializer = ProjectReportSerializer(ProjectReport, data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response({'success': True, 'time_history': serializer.data},status=HTTP_201_CREATED)
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)

    def delete(self,request,project_id):
        try:
            ProjectReport = get_object_or_404(ProjectReport,pk=project_id)
            ProjectReport.delete()
            return Response({'success':True},status=HTTP_200_CREATED)
        except:
            return Response({'success':False},status=HTTP_400_BAD_REQUEST)

# Attendance Views
def attendence_time_history_view(request):
    time_histories = TimeHistory.objects.all()
    return render(request, 'Attendence/time_history.php', {'time_histories':time_histories})

def attendence_time_change_request_view(request):
    time_histories = TimeHistory.objects.filter(status=2)
    all_names = TimeHistory.objects.values_list("name",flat=True).distinct()
    return render(request, 'Attendence/time_change_request.php', {'time_histories':time_histories,'all_names':all_names})

def attendence_attendence_report_view(request):    
    time_histories = TimeHistory.objects.all()
    all_names = TimeHistory.objects.values_list("name",flat=True).distinct()
    return render(request, 'Attendence/attendence_report.php', {'time_histories':time_histories,'all_names':all_names})

class TimeHistoryAPIView(APIView):
    def get(self, request):
        date = request.query_params.get('date')
        name = request.query_params.get('name')

        # Convert date string to datetime object
        if date:
            try:
                date = datetime.strptime(date, '%Y-%m-%d').date()
            except ValueError:
                return Response({'error': 'Invalid date format. Use YYYY-MM-DD.'}, status=400)
        
        print(date,name)

        # Filtering based on conditions
        if date and name:
            time_histories = TimeHistory.objects.filter(date=date, name=name)
        elif date:
            time_histories = TimeHistory.objects.filter(date=date)
        elif name:
            time_histories = TimeHistory.objects.filter(name=name)
        else:
            return Response({'success':True},status=status.HTTP_204_NO_CONTENT)

        serializer = TimeHistorySerializer(time_histories, many=True)

        return Response({'success':True,'time_history':serializer.data},status=status.HTTP_201_CREATED)

    def post(self, request):
        serializer = TimeHistorySerializer(data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response({'success': True, 'time_history': serializer.data}, status=status.HTTP_201_CREATED)
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)

    def put(self, request, time_history_id):
        time_history = get_object_or_404(TimeHistory, pk=time_history_id)
        serializer = TimeHistorySerializer(time_history, data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response({'success': True, 'time_history': serializer.data})
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)

    def patch(self, request):
        name = request.data.get('name')
        date = request.data.get('date')
        time_history = TimeHistory.objects.filter(name=name, date=date).first()
        
        if time_history:
            serializer = TimeHistorySerializer(time_history, data=request.data, partial=True)
            if serializer.is_valid():
                serializer.save(status=2)  # Update status to 2
                return Response({'success': True, 'time_history': serializer.data})
            return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)
        else:
            return Response({'error': 'Attendance not found.'}, status=status.HTTP_404_NOT_FOUND)

    def delete(self, request, time_history_id):
        time_history = get_object_or_404(TimeHistory, pk=time_history_id)
        time_history.delete()
        return Response({'success': True, 'time_history': serializer.data}, status=status.HTTP_204_NO_CONTENT)

# Recruitment Views
def recruitment_jobs_posted_view(request):
    job_posts = JobPost.objects.all()
    return render(request, 'recruitments/job_posted.php', {'job_posts': job_posts})

class JobPostAPIView(APIView):
    def get(self, request, job_post_id=None):
        if job_post_id:
            job_post = get_object_or_404(JobPost, pk=job_post_id)
            serializer = JobPostSerializer(job_post)
            return Response(serializer.data)
        else:
            job_posts = JobPost.objects.all()
            serializer = JobPostSerializer(job_posts, many=True)
            return Response(serializer.data)

    def post(self, request):
        serializer = JobPostSerializer(data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response({'success': True, 'job_post': serializer.data}, status=status.HTTP_201_CREATED)
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)

    def put(self, request, job_post_id):
        job_post = get_object_or_404(JobPost, pk=job_post_id)
        serializer = JobPostSerializer(job_post, data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response({'success': True, 'job_post': serializer.data})
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)

    def delete(self, request, job_post_id):
        job_post = get_object_or_404(JobPost, pk=job_post_id)
        job_post.delete()
        return Response({'success': True, 'job_post': serializer.data},status=status.HTTP_204_NO_CONTENT)    

def job_application(request):
    # Retrieve all job applications
    job_applications = Careers.objects.all()

    return render(request, 'recruitments/job_application_form.php', {'job_applications': job_applications})

@api_view(['PUT'])
def update_job_application(request,id):
    # Validate the incoming request
    required_fields = ['name', 'mail', 'contactnumber', 'category', 'experience', 'status']
    for field in required_fields:
        if field not in request.data:
            return Response({'success': False, 'message': f'{field} is required'}, status=status.HTTP_400_BAD_REQUEST)

    # Find the Career model instance by ID
    try:
        career = Careers.objects.get(id=id)
    except ObjectDoesNotExist:
        return Response({'success': False, 'message': 'Career not found'}, status=status.HTTP_404_NOT_FOUND)

    # Update the Career model instance with the new data
    career.name = request.data['name']
    career.mail = request.data['mail']
    career.contactnumber = request.data['contactnumber']
    career.category = request.data['category']
    career.experience = request.data['experience']
    career.status = request.data['status']

    # Update the CV file if a new file is provided
    if 'cv' in request.data and request.data['cv']:
        cv_file = request.data['cv']
        career.cv.save(cv_file.name, cv_file, save=True)

    # Save the updated Career model instance
    career.save()

    return Response({'success': True, 'message': 'Career updated successfully'}, status=status.HTTP_200_OK)

@api_view(['DELETE'])
def delete_job_application(request,id):
    # Find the Career model instance by ID
    try:
        career = Careers.objects.get(id=id)
    except ObjectDoesNotExist:
        return Response({'success': False, 'message': 'Career not found'}, status=status.HTTP_404_NOT_FOUND)

    # Delete the CV file
    if career.cv:
        career.cv.delete()

    # Delete the Career model instance
    career.delete()

    return Response({'success': True, 'message': 'Career deleted successfully'}, status=status.HTTP_200_OK)

# Payroll Views
def payroll_salary_template_view(request):
    return render(request, 'payroll/payroll_salary_template_view.php', {})

def payroll_hourly_view(request):
    return render(request, 'payroll/payroll_hourly_view.php', {})

def payroll_manage_salary_view(request):
    return render(request, 'payroll/payroll_manage_salary_view.php', {})

def payroll_employee_salary_list_view(request):
    return render(request, 'payroll/payroll_employee_salary_list_view.php', {})

def payroll_make_payment_view(request):
    return render(request, 'payroll/payroll_make_payment_view.php', {})

def payroll_generate_payslip_view(request):
    return render(request, 'payroll/payroll_generate_payslip_view.php', {})

def payroll_payroll_summary_view(request):
    return render(request, 'payroll/payroll_payroll_summary_view.php', {})

# Stock Views
def stock_stock_category_view(request):
    return render(request, 'stock/stock_stock_category_view.php', {})

def stock_manage_stock_view(request):
    return render(request, 'stock/stock_manage_stock_view.php', {})

def stock_assign_stock_view(request):
    return render(request, 'stock/stock_assign_stock_view.php', {})

# Tickets Views
def tickets_answered_view(request):
    return render(request, 'tickets/tickets_answered_view.php', {})

def tickets_open_view(request):
    return render(request, 'tickets/tickets_open_view.php', {})

def tickets_ongoing_view(request):
    return render(request, 'tickets/tickets_ongoing_view.php', {})

def tickets_closed_view(request):
    return render(request, 'tickets/tickets_closed_view.php', {})

def tickets_all_tickets_view(request):
    return render(request, 'tickets/tickets_all_tickets_view.php', {})

# Pages Views
def companies_view(request):
    return render(request, 'pages/companies_view.php', {})

def public_holiday_view(request):
    return render(request, 'pages/public_holiday_view.php', {})

def user_view(request):
    return render(request, 'pages/user_view.php', {})

def items_view(request):
    return render(request, 'pages/items_view.php', {})

def departments_view(request):
    return render(request, 'pages/departments_view.php', {})

def documents_view(request):
    return render(request, 'pages/documents_view.php', {})

def training_view(request):
    return render(request, 'pages/training_view.php', {})

def calendar_view(request):
    return render(request, 'pages/calendar_view.php', {})

def notice_board_view(request):
    return render(request, 'pages/notice_board_view.php', {})

def message_view(request):
    return render(request, 'pages/message_view.php', {})

def notes_view(request):
    return render(request, 'pages/notes_view.php', {})