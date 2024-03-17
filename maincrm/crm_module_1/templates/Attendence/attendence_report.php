<!-- {% if request.user.is_authenticated %} -->
<!-- <p>{{ request.user.username }}</p>
<a href="{% url 'logout' %}">Logout</a>
{% else %}
<a href="{% url 'login' %}">Login</a>
<a href="{% url 'signup' %}">Signup</a>
{% endif %}

<h1>Welcome!</h1> -->

{% load static %}
{% if request.user.is_authenticated %}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Attendence Report</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{% static 'assets/img/favicon.png' %}" rel="icon">
    <link href="{% static 'assets/img/apple-touch-icon.png' %}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{% static 'assets/vendor/bootstrap/css/bootstrap.min.css' %}" rel="stylesheet">
    <link href="{% static 'assets/vendor/bootstrap-icons/bootstrap-icons.css' %}" rel="stylesheet">
    <link href="{% static 'assets/vendor/boxicons/css/boxicons.min.css' %}" rel="stylesheet">
    <link href="{% static 'assets/vendor/quill/quill.snow.css' %}" rel="stylesheet">
    <link href="{% static 'assets/vendor/quill/quill.bubble.css' %}" rel="stylesheet">
    <link href="{% static 'assets/vendor/remixicon/remixicon.css' %}" rel="stylesheet">
    <link href="{% static 'assets/vendor/simple-datatables/style.css' %}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{% static 'assets/css/style.css' %}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: RAMO Pvt Ltd
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{% url 'home' %}" class="logo d-flex align-items-center w-auto">
                <img src="{% static 'assets/img/logo.png' %}" alt="">
                <span class="d-none d-lg-block">RAMO Pvt Ltd</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="{% url 'search' %}">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="{% url 'notification' %}" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="{% url 'viewallnotifications' %}"><span
                                    class="badge rounded-pill bg-primary p-2 ms-2">View
                                    all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="{% url 'messages' %}" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="{% url 'seeallmessages' %}"><span
                                    class="badge rounded-pill bg-primary p-2 ms-2">View
                                    all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{% static 'assets/img/messages-1.jpg' %}" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{% static 'assets/img/messages-2.jpg' %}" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{% static 'assets/img/messages-3.jpg' %}" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{% url 'profileimage' %}"
                        data-bs-toggle="dropdown">
                        <img src="{% static 'assets/img/profile-img.jpg' %}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ request.user.username }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{% url 'profile' %}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{% url 'accountsettings' %}">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{% url 'faq' %}">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{% url 'logout' %}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="{% url 'home' %}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#customers-nav" data-bs-toggle="collapse" href="">
                    <i class="bi bi-menu-button-wide"></i><span>Customers</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="customers-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{% url 'customer-add' %}">
                            <i class="bi bi-circle"></i><span>Add Customers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'customer-list' %}">
                            <i class="bi bi-circle"></i><span>List Customers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'customer-group' %}">
                            <i class="bi bi-circle"></i><span>Group Customers</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#transactions-nav" data-bs-toggle="collapse" href="">
                    <i class="bi bi-journal-text"></i><span>Transactions</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="transactions-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{% url 'transactions-newdeposit' %}">
                            <i class="bi bi-circle"></i><span>New Deposit</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'transactions-newexpense' %}">
                            <i class="bi bi-circle"></i><span>New Expense</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'transactions-transfer' %}">
                            <i class="bi bi-circle"></i><span>Transfer</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'transactions-viewtransactions' %}">
                            <i class="bi bi-circle"></i><span>View Transaction</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'transactions-balancesheet' %}">
                            <i class="bi bi-circle"></i><span>Balance Sheet</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'transactions-transferreport' %}">
                            <i class="bi bi-circle"></i><span>Transfer Report</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#sales-nav" data-bs-toggle="collapse" href="">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Sales</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="sales-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{% url 'sales-invoices' %}">
                            <i class="bi bi-circle"></i><span>Invoices</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'sales-newinvoices' %}">
                            <i class="bi bi-circle"></i><span>New Invoices</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'sales-recurringinvoices' %}">
                            <i class="bi bi-circle"></i><span>Recurring Invoices</span>
                        </a>
                    </li>

                    <li>
                        <a href="{% url 'sales-newrecurringinvoices' %}">
                            <i class="bi bi-circle"></i><span>New Recurring Invoices</span>
                        </a>
                    </li>

                    <li>
                        <a href="{% url 'sales-quotes' %}">
                            <i class="bi bi-circle"></i><span>Quotes</span>
                        </a>
                    </li>

                    <li>
                        <a href="{% url 'sales-newquotes' %}">
                            <i class="bi bi-circle"></i><span>New Quotes</span>
                        </a>
                    </li>

                    <li>
                        <a href="{% url 'sales-payments' %}">
                            <i class="bi bi-circle"></i><span>Payments</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'sales-taxrates' %}">
                            <i class="bi bi-circle"></i><span>Tax Rates</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tasks-nav" data-bs-toggle="collapse" href="">
                    <i class="bi bi-bar-chart"></i><span>Tasks</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tasks-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{% url 'tasks-runningrask' %}">
                            <i class="bi bi-circle"></i><span>Running Task</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'tasks-archivetask' %}">
                            <i class="bi bi-circle"></i><span>Archive Task</span>
                        </a>
                    </li>
                    <!-- <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li> -->
                </ul>
            </li><!-- End Charts Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#accounting-nav" data-bs-toggle="collapse" href="">
                    <i class="bi bi-gem"></i><span>Accounting</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="accounting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{% url 'accounting-clientpayment' %}">
                            <i class="bi bi-circle"></i><span>Client Payment</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'accounting-expensemanagement' %}">
                            <i class="bi bi-circle"></i><span>Expense Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'accounting-expensecategory' %}">
                            <i class="bi bi-circle"></i><span>Expense Category</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="">
                    <i class="bi bi-bar-chart"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="report-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{% url 'report-projectreport' %}">
                            <i class="bi bi-circle"></i><span>Project Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'report-clientreport' %}">
                            <i class="bi bi-circle"></i><span>Client Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'report-expensereport' %}">
                            <i class="bi bi-circle"></i><span>Expense Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'report-incomeexpensecomparison' %}">
                            <i class="bi bi-circle"></i><span>Income Expense Comparison</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->
            <li class="nav-item">
                <a class="nav-link" data-bs-target="#attendence-nav" data-bs-toggle="collapse" href="">
                    <i class="bi bi-bar-chart"></i><span>Attendence</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="attendence-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{% url 'attendence-timehistory' %}">
                            <i class="bi bi-circle"></i><span>Time History</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'attendence-timechangerequest' %}">
                            <i class="bi bi-circle"></i><span>Time Change Request</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'attendence-attendencereport' %}">
                            <i class="bi bi-circle"></i><span>Attendence Report</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#recruitment-nav" data-bs-toggle="collapse" href="">
                    <i class="bi bi-bar-chart"></i><span>Recruitment</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="recruitment-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{% url 'recruitment-jobsposted' %}">
                            <i class="bi bi-circle"></i><span>Jobs Posted</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'recruitment-jobsapplication' %}">
                            <i class="bi bi-circle"></i><span>Jobs Application</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#payroll-nav" data-bs-toggle="collapse" href="">
                    <i class="bi bi-bar-chart"></i><span>Payroll</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="payroll-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{% url 'payroll-salarytemplate' %}">
                            <i class="bi bi-circle"></i><span>Salary Template</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'payroll-hourly' %}">
                            <i class="bi bi-circle"></i><span>Hourly</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'payroll-managesalary' %}">
                            <i class="bi bi-circle"></i><span>Manage Salary</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'payroll-employeesalarylist' %}">
                            <i class="bi bi-circle"></i><span>Employee Salary List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'payroll-makepayment' %}">
                            <i class="bi bi-circle"></i><span>Make Payment</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'payroll-generatepayslip' %}">
                            <i class="bi bi-circle"></i><span>Generate Payslip</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'payroll-payrollsummary' %}">
                            <i class="bi bi-circle"></i><span>Payroll Summary</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#stock-nav" data-bs-toggle="collapse" href="">
                    <i class="bi bi-bar-chart"></i><span>Stock</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="stock-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{% url 'stock-stockcategory' %}">
                            <i class="bi bi-circle"></i><span>Stock Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'stock-managestock' %}">
                            <i class="bi bi-circle"></i><span>Manage Stock</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'stock-asignstock' %}">
                            <i class="bi bi-circle"></i><span>Assign Stock</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tickets-nav" data-bs-toggle="collapse" href="">
                    <i class="bi bi-bar-chart"></i><span>Tickets</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tickets-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{% url 'tickets-answered' %}">
                            <i class="bi bi-circle"></i><span>Answered</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'tickets-open' %}">
                            <i class="bi bi-circle"></i><span>Open</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'tickets-ongoing' %}">
                            <i class="bi bi-circle"></i><span>Ongoing</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'tickets-closed' %}">
                            <i class="bi bi-circle"></i><span>Closed</span>
                        </a>
                    </li>
                    <li>
                        <a href="{% url 'tickets-alltickets' %}">
                            <i class="bi bi-circle"></i><span>All Tickets</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{% url 'companies' %}">
                    <i class="bi bi-person"></i>
                    <span>Companies</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{% url 'faq' %}">
                    <i class="bi bi-question-circle"></i>
                    <span>Public Holiday</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{% url 'user' %}">
                    <i class="bi bi-envelope"></i>
                    <span>User</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{% url 'items' %}">
                    <i class="bi bi-card-list"></i>
                    <span>Items</span>
                </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{% url 'departments' %}">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Departments</span>
                </a>
            </li><!-- End Login Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{% url 'documents' %}">
                    <i class="bi bi-dash-circle"></i>
                    <span>Documents</span>
                </a>
            </li><!-- End Error 404 Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{% url 'training' %}">
                    <i class="bi bi-file-earmark"></i>
                    <span>Training</span>
                </a>
            </li><!-- End Blank Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{% url 'calendar' %}">
                    <i class="bi bi-file-earmark"></i>
                    <span>Calendar</span>
                </a>
            </li><!-- End Blank Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{% url 'noticeboard' %}">
                    <i class="bi bi-file-earmark"></i>
                    <span>Notice Board</span>
                </a>
            </li><!-- End Blank Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{% url 'message' %}">
                    <i class="bi bi-file-earmark"></i>
                    <span>Message</span>
                </a>
            </li><!-- End Blank Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{% url 'notes' %}">
                    <i class="bi bi-file-earmark"></i>
                    <span>Notes</span>
                </a>
            </li><!-- End Blank Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Attendence Report</h1>
            <nav class="row">
                <div class="col-lg">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Attendence Report</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Attendence Report</h5>
                <!-- Horizontal Form -->
                <form id="attendenceForm">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Your Name</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="inputname">
                                {% for name in all_names %}
                                <option value="">Select Option</option>
                                <option value="{{ name }}">{{ name }}</option>
                                {% endfor %}
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputDate">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
        </div>
        <!-- Modal to display details -->
        <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailsModalLabel">Attendence Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Details will be displayed here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>RAMO Pvt Ltd</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{% static 'assets/vendor/apexcharts/apexcharts.min.js' %}"></script>
    <script src="{% static 'assets/vendor/bootstrap/js/bootstrap.bundle.min.js' %}"></script>
    <script src="{% static 'assets/vendor/chart.js/chart.umd.js' %}"></script>
    <script src="{% static 'assets/vendor/echarts/echarts.min.js' %}"></script>
    <script src="{% static 'assets/vendor/quill/quill.min.js' %}"></script>
    <script src="{% static 'assets/vendor/simple-datatables/simple-datatables.js' %}"></script>
    <script src="{% static 'assets/vendor/tinymce/tinymce.min.js' %}"></script>
    <script src="{% static 'assets/vendor/php-email-form/validate.js' %}"></script>

    <!-- Template Main JS File -->
    <script src="{% static 'assets/js/main.js' %}"></script>
    <script>
        // Function to handle form submission
        $('#attendenceForm').submit(function (e) {
            e.preventDefault(); // Prevent default form submission

            // Get form data
            var formData = $(this).serialize();

            // AJAX request to fetch details
            $.ajax({
                type: 'POST',
                data: formData,
                success: function (response) {
                    // Display modal with fetched details
                    $('#detailsModal .modal-body').html(response);
                    $('#detailsModal').modal('show');
                },
                error: function () {
                    alert('Error fetching details.');
                }
            });
        });
    </script>
    <script>
        function getCookie(name) {
            let cookieValue = null;
            if (document.cookie && document.cookie !== '') {
                const cookies = document.cookie.split(';');
                for (let i = 0; i < cookies.length; i++) {
                    const cookie = cookies[i].trim();
                    // Does this cookie string begin with the name we want?
                    if (cookie.substring(0, name.length + 1) === name + '=') {
                        cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                        break;
                    }
                }
            }
            return cookieValue;
        }
    </script>

</body>

</html>
{% else %}
<script>
    window.location.replace("login");
</script>
{% endif %}s