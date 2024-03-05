# Imported django path
from django.urls import path
# Imported all views 
from . import views
# Importing static
from django.conf.urls.static import static
# Importing static
from django.conf import settings

urlpatterns = [
    # Header Navigation URLs
    path('search/', views.search_view, name='search'),
    path('notification/', views.notification_view, name='notification'),
    path('viewallnotifications/', views.view_all_notifications_view, name='viewallnotifications'),
    path('messages/', views.messages_view, name='messages'),
    path('seeallmessages/', views.see_all_messages_view, name='seeallmessages'),
    path('profileimage/', views.profile_image_view, name='profileimage'),
    path('profile/', views.profile_view, name='profile'),
    path('accountsettings/', views.account_settings_view, name='accountsettings'),
    path('faq/', views.faq_view, name='faq'),

    # Sidebar Navigation URLs
    path('customer/', views.customer_view, name='customer'),
    path('customer-add/', views.add_customer_view, name='customer-add'),
    path('customer-list/', views.list_customers_view, name='customer-list'),
    path('customer-group/', views.group_customers_view, name='customer-group'),
    path('transactions/', views.transactions_view, name='transactions'),
    path('transactions-newdeposit/', views.new_deposit_view, name='transactions-newdeposit'),
    path('transactions-newexpense/', views.new_expense_view, name='transactions-newexpense'),
    path('transactions-transfer/', views.transfer_view, name='transactions-transfer'),
    path('transactions-viewtransactions/', views.view_transactions_view, name='transactions-viewtransactions'),
    path('transactions-balancesheet/', views.balance_sheet_view, name='transactions-balancesheet'),
    path('transactions-transferreport/', views.transfer_report_view, name='transactions-transferreport'),
    
    # Sales URLs
    path('sales/', views.sales_view, name='sales'),
    path('sales-invoices/', views.sales_invoices_view, name='sales-invoices'),
    path('sales-newinvoices/', views.sales_new_invoices_view, name='sales-newinvoices'),
    path('sales-recurringinvoices/', views.sales_recurring_invoices_view, name='sales-recurringinvoices'),
    path('sales-newrecurringinvoices/', views.sales_new_recurring_invoices_view, name='sales-newrecurringinvoices'),
    path('sales-quotes/', views.sales_quotes_view, name='sales-quotes'),
    path('sales-newquotes/', views.sales_new_quotes_view, name='sales-newquotes'),
    path('sales-payments/', views.sales_payments_view, name='sales-payments'),
    path('sales-taxrates/', views.sales_tax_rates_view, name='sales-taxrates'),

    # Tasks URLs
    path('tasks-runningrask/', views.tasks_running_task_view, name='tasks-runningrask'),
    path('tasks-archivetask/', views.tasks_archive_task_view, name='tasks-archivetask'),

    # Accounting URLs
    path('accounting-clientpayment/', views.accounting_client_payment_view, name='accounting-clientpayment'),
    path('accounting-expensemanagement/', views.accounting_expense_management_view, name='accounting-expensemanagement'),
    path('accounting-expensecategory/', views.accounting_expense_category_view, name='accounting-expensecategory'),

    # Report URLs
    path('report-projectreport/', views.report_project_report_view, name='report-projectreport'),
    path('report-clientreport/', views.report_client_report_view, name='report-clientreport'),
    path('report-expensereport/', views.report_expense_report_view, name='report-expensereport'),
    path('report-incomeexpensecomparison/', views.report_income_expense_comparison_view, name='report-incomeexpensecomparison'),

    # Attendance URLs
    path('attendence-timehistory/', views.attendence_time_history_view, name='attendence-timehistory'),
    path('attendence-timechangerequest/', views.attendence_time_change_request_view, name='attendence-timechangerequest'),
    path('attendence-attendencereport/', views.attendence_attendence_report_view, name='attendence-attendencereport'),

    # Recruitment URLs
    path('recruitment-jobsposted/', views.recruitment_jobs_posted_view, name='recruitment-jobsposted'),
    path('recruitment-jobsapplication/', views.job_application, name='recruitment-jobsapplication'),
    path('recruitment-update-jobsapplication/',views.update_job_application,name='recruitment-update-jobsapplication'),
    path('rectuitmenet-delete-jobsapplication/',views.delete_job_application,name='recruitment-delete-jobsapplication'),

    # Payroll URLs
    path('payroll-salarytemplate/', views.payroll_salary_template_view, name='payroll-salarytemplate'),
    path('payroll-hourly/', views.payroll_hourly_view, name='payroll-hourly'),
    path('payroll-managesalary/', views.payroll_manage_salary_view, name='payroll-managesalary'),
    path('payroll-employeesalarylist/', views.payroll_employee_salary_list_view, name='payroll-employeesalarylist'),
    path('payroll-makepayment/', views.payroll_make_payment_view, name='payroll-makepayment'),
    path('payroll-generatepayslip/', views.payroll_generate_payslip_view, name='payroll-generatepayslip'),
    path('payroll-payrollsummary/', views.payroll_payroll_summary_view, name='payroll-payrollsummary'),

    # Stock URLs
    path('stock-stockcategory/', views.stock_stock_category_view, name='stock-stockcategory'),
    path('stock-managestock/', views.stock_manage_stock_view, name='stock-managestock'),
    path('stock-asignstock/', views.stock_assign_stock_view, name='stock-asignstock'),

    # Tickets URLs
    path('tickets-answered/', views.tickets_answered_view, name='tickets-answered'),
    path('tickets-open/', views.tickets_open_view, name='tickets-open'),
    path('tickets-ongoing/', views.tickets_ongoing_view, name='tickets-ongoing'),
    path('tickets-closed/', views.tickets_closed_view, name='tickets-closed'),
    path('tickets-alltickets/', views.tickets_all_tickets_view, name='tickets-alltickets'),

    # Pages URLs
    path('companies/', views.companies_view, name='companies'),
    path('publicholiday/', views.public_holiday_view, name='publicholiday'),
    path('user/', views.user_view, name='user'),
    path('items/', views.items_view, name='items'),
    path('departments/', views.departments_view, name='departments'),
    path('documents/', views.documents_view, name='documents'),
    path('training/', views.training_view, name='training'),
    path('calendar/', views.calendar_view, name='calendar'),
    path('noticeboard/', views.notice_board_view, name='noticeboard'),
    path('message/', views.message_view, name='message'),
    path('notes/', views.notes_view, name='notes'),
]