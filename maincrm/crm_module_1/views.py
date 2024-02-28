from django.shortcuts import render, get_object_or_404, redirect
from django.contrib import messages
from test_for_users.models import Careers 

def job_application(request):
    # Retrieve all job applications
    job_applications = Careers.objects.all()

    return render(request, 'job_application_form.php', {'job_applications': job_applications})

def create_job_application(request):
    if request.method == 'POST':
        form = Careers(request.POST)
        if form.is_valid():
            form.save()
            messages.success(request, 'Job application created successfully!')
            return redirect('alljobapplication')
    else:
        form = Careers()

    return render(request, 'job_application_form.php', {'form': form})

def update_job_application(request, pk):
    job_application = get_object_or_404(JobApplication, pk=pk)

    if request.method == 'POST':
        form = Careers(request.POST, instance=job_application)
        if form.is_valid():
            form.save()
            messages.success(request, 'Job application updated successfully!')
            return redirect('alljobapplication')
    else:
        form = Careers(instance=job_application)

    return render(request, 'job_application_form.php', {'form': form})

def delete_job_application(request, pk):
    job_application = get_object_or_404(Careers, pk=pk)
    job_application.delete()
    messages.success(request, 'Job application deleted successfully!')
    return redirect('alljobapplication')

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

# Attendance Views
def attendence_time_history_view(request):
    return render(request, 'attendance/attendence_time_history_view.php', {})

def attendence_time_change_request_view(request):
    return render(request, 'attendance/attendence_time_change_request_view.php', {})

def attendence_attendence_report_view(request):
    return render(request, 'attendance/attendence_attendence_report_view.php', {})

# Recruitment Views
def recruitment_jobs_posted_view(request):
    return render(request, 'recruitment/recruitment_jobs_posted_view.php', {})

def recruitment_jobs_application_view(request):
    return render(request, 'recruitment/recruitment_jobs_application_view.php', {})

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