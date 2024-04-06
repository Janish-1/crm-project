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

    <title>Project Report</title>
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
                <a class="nav-link" data-bs-target="#report-nav" data-bs-toggle="collapse" href="">
                    <i class="bi bi-bar-chart"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="report-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
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
                <a class="nav-link collapsed" data-bs-target="#attendence-nav" data-bs-toggle="collapse" href="">
                    <i class="bi bi-bar-chart"></i><span>Attendence</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="attendence-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
            <h1>Project Report</h1>
            <nav class="row">
                <div class="col-lg">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Project Report</li>
                    </ol>
                </div>
                <div class="col-sm text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        Create Project Report
                    </button>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Project Reports</h5>
                <div class="table-responsive">
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Project Name</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Project Manager</th>
                                <th scope="col">Description</th>
                                <th scope="col">Budget Allocated</th>
                                <th scope="col">Actual Cost</th>
                                <th scope="col">Progress Percentage</th>
                                <th scope="col">Issues</th>
                                <th scope="col">Accomplishments</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for data in alldata %}
                            <tr>
                                <th scope="row">{{ data.id }}</th>
                                <td>{{ data.project_name }}</td>
                                <td>{{ data.start_date }}</td>
                                <td>{{ data.end_date }}</td>
                                <td>{{ data.project_manager }}</td>
                                <td>{{ data.project_description }}</td>
                                <td>{{ data.budget_allocated }}</td>
                                <td>{{ data.actual_cost }}</td>
                                <td>{{ data.progress_percentage }}</td>
                                <td>{{ data.issues }}</td>
                                <td>{{ data.accomplishments }}</td>
                                <td>{{ data.created_at }}</td>
                                <td>{{ data.updated_at }}</td>
                                <td>
                                    <!-- Action Dropdown -->
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="actionDropdown">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#updateModal{{ data.id }}">Update</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ data.id }}">Delete</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#readModal{{ data.id }}">Read</a></li>
                                        </ul>
                                    </div>
                                    <!-- End Action Dropdown -->
                                </td>
                            </tr>

                            <!-- Update Modal -->
                            <div class="modal fade" id="updateModal{{ data.id }}" tabindex="-1"
                                aria-labelledby="updateModalLabel{{ data.id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update Project Report</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="updateForm" method="PUT"
                                                action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                <div class="row mb-3">
                                                    <label for="inputProjectName"
                                                        class="col-sm-2 col-form-label">Project Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="project_name"
                                                            value="{{ data.project_name }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputStartDate" class="col-sm-2 col-form-label">Start
                                                        Date</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" name="start_date"
                                                            value="{{ data.start_date }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputEndDate" class="col-sm-2 col-form-label">End
                                                        Date</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" name="end_date"
                                                            value="{{ data.end_date }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputProjectManager"
                                                        class="col-sm-2 col-form-label">Project Manager</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="project_manager"
                                                            value="{{ data.project_manager }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputProjectDescription"
                                                        class="col-sm-2 col-form-label">Project Description</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="project_description"
                                                            rows="4">{{ data.project_description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputBudgetAllocated"
                                                        class="col-sm-2 col-form-label">Budget Allocated</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control"
                                                            name="budget_allocated" value="{{ data.budget_allocated }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputActualCost" class="col-sm-2 col-form-label">Actual
                                                        Cost</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="actual_cost"
                                                            value="{{ data.actual_cost }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputProgressPercentage"
                                                        class="col-sm-2 col-form-label">Progress Percentage</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control"
                                                            name="progress_percentage"
                                                            value="{{ data.progress_percentage }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputIssues"
                                                        class="col-sm-2 col-form-label">Issues</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="issues"
                                                            rows="4">{{ data.issues }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAccomplishments"
                                                        class="col-sm-2 col-form-label">Accomplishments</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="accomplishments"
                                                            rows="4">{{ data.accomplishments }}</textarea>
                                                    </div>
                                                </div>
                                            </form><!-- End Update Form -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary"
                                                onclick="confirmUpdate({{ data.id }})">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ data.id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ data.id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this entry?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary"
                                                onclick="confirmDelete({{ data.id }})">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Delete Modal -->

                            <!-- Read Modal -->
                            <div class="modal fade" id="readModal{{ data.id }}" tabindex="-1"
                                aria-labelledby="readModalLabel{{ data.id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Details about {{ data.project_name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Project Name:</strong> {{ data.project_name }}</p>
                                            <p><strong>Start Date:</strong> {{ data.start_date }}</p>
                                            <p><strong>End Date:</strong> {{ data.end_date }}</p>
                                            <p><strong>Project Manager:</strong> {{ data.project_manager }}</p>
                                            <p><strong>Description:</strong> {{ data.project_description }}</p>
                                            <p><strong>Budget Allocated:</strong> {{ data.budget_allocated }}</p>
                                            <p><strong>Actual Cost:</strong> {{ data.actual_cost }}</p>
                                            <p><strong>Progress Percentage:</strong> {{ data.progress_percentage }}</p>
                                            <p><strong>Issues:</strong> {{ data.issues }}</p>
                                            <p><strong>Accomplishments:</strong> {{ data.accomplishments }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Read Modal-->
                            {% endfor %}
                        </tbody>
                    </table>
                    <!-- End Table with hoverable rows -->
                </div>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="createModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Project Report</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="CreateForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="row mb-3">
                                <label for="inputProjectName" class="col-sm-2 col-form-label">Project Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="project_name" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputStartDate" class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="start_date" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEndDate" class="col-sm-2 col-form-label">End Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="end_date" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputProjectManager" class="col-sm-2 col-form-label">Project Manager</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="project_manager" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputProjectDescription" class="col-sm-2 col-form-label">Project
                                    Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="project_description" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputBudgetAllocated" class="col-sm-2 col-form-label">Budget
                                    Allocated</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="budget_allocated" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputActualCost" class="col-sm-2 col-form-label">Actual Cost</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="actual_cost" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputProgressPercentage" class="col-sm-2 col-form-label">Progress
                                    Percentage</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="progress_percentage" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputIssues" class="col-sm-2 col-form-label">Issues</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="issues" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAccomplishments"
                                    class="col-sm-2 col-form-label">Accomplishments</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="accomplishments" rows="4"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="confirmCreate()">Create</button>
                    </div>
                </div>
            </div>
        </div><!-- End Create Modal-->

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
        function confirmCreate() {
            var formData = new FormData(document.getElementById('CreateForm'));

            fetch("/api/project-reports/", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRFToken': getCookie('csrftoken'),
                },
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network Error');
                    }
                    return response.json();
                })
                .then(response => {
                    console.log(response);

                    if (response.success) {
                        console.log('Project Report Created Successfully', response.job_post);
                        window.location.reload();
                    } else {
                        alert("Error: " + (response.message ? response.message : "Unknown error"));
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert("Fetch error: " + error.message);
                });
        }

        function confirmUpdate(projectid) {
            // Get form data
            var formData = new FormData(document.getElementById('updateForm'));

            // Convert FormData to a plain object
            var inputData = {};
            formData.forEach((value, key) => {
                inputData[key] = value;
            });

            // Use Fetch API to submit the form data as a PUT request
            fetch('/api/project-reports/' + projectid + '/', {
                method: 'PUT',
                body: JSON.stringify(inputData),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRFToken': getCookie('csrftoken'),
                },
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network Error');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Job Post Updated Successfully', data);
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error updating job post:', error);
                    alert('Error updating job post. Please try again.');
                });
        }

        function confirmDelete(projectid) {
            fetch('/api/project-reports/' + projectid + '/', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRFToken': getCookie('csrftoken'),
                },
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Job Post Deleted Successfully:', data);
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error deleting job post:', error);
                    alert('Error deleting job post. Please try again.');
                });
        }

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