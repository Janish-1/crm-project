{% load static %}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Quiz</title>
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

    <!-- Quiz Main CSS File -->
    <link href="{% static 'assets/css/style_quiz.css' %}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-10 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="{% url 'home' %}" class="logo d-flex align-items-center w-auto">
                                    <img src="{% static 'assets/img/logo.png' %}" alt="">
                                    <span class="d-none d-lg-block">NiceAdmin</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="quiz-app card mb-3">
                                <div class="quiz-info">
                                    <div class="category">Category: <span>{{ category }}</span> <span>
                                            <div id="timer" class="timer"></div>
                                        </span>
                                    </div>
                                    <div class="count">Questions Count: <span>{{ questions|length }}</span></div><br>
                                </div>
                                <div class="quiz-area">
                                    {% for question in questions %}
                                    <div class="question" data-question-id="{{ question.id }}">
                                        <h3>{{ question.question }}</h3>
                                        <ul class="answers">
                                            {% for answer in question.answers %}
                                            <li>{{ answer }}</li>
                                            {% endfor %}
                                        </ul>
                                    </div>
                                    {% endfor %}
                                </div>
                                <div class="options-area">

                                </div>
                                <button id="submit-button" class="submit-button">Submit Quiz</button>
                                <div class="bullets">
                                    <div class="spans"></div>
                                    <div class="countdown"></div>
                                </div>
                                <div class="results">

                                </div>
                                <div class="credits">
                                    <!-- All the links in the footer should remain intact. -->
                                    <!-- You can delete the links only if you purchased the pro version. -->
                                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                    <!-- Purchase the pro version with a working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main><!-- End #main -->

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
        var isTestStarted = false;

        // Attach load event to the window
        window.addEventListener('load', function () {
            // Show a confirmation dialog before starting the test
            var startTestConfirmation = window.confirm('Are you sure you want to start the test?');

            if (startTestConfirmation) {
                isTestStarted = true;

                // You can continue with your existing logic to start the test
                // For example, you can remove the warning listener if the test has started
                window.removeEventListener('beforeunload', beforeUnloadWarning);

                // Start the timer or any other logic you have
                startTimer();
            } else {
                // If the user chose not to start the test, keep the warning on leaving the page
                window.location.href = 'http://localhost:8000/careers/teststartpage.php';
            }
        });

        var countdown = 600; // 10 minutes in seconds
        var timer = setInterval(function () {
            countdown--;

            if (countdown <= 0) {
                clearInterval(timer);
                submitQuiz('fail'); // Redirect to the fail path when the timer reaches zero
            }

            // Update the timer display
            updateTimerDisplay();
        }, 1000);

        // // Listen for page visibility change events
        // document.addEventListener('visibilitychange', function () {
        //     if (document.hidden) {
        //         submitQuiz('fail'); // Redirect to the fail path when the page is hidden
        //     }
        // });

        // Attach a click event to the submit button
        document.getElementById('submit-button').addEventListener('click', function () {
            submitQuiz('submit-quiz'); // Updated to use 'submit-quiz' as the default path
        });

        // // Warn the user before leaving or reloading the page
        // window.addEventListener('beforeunload', function (e) {
        //     var confirmationMessage = 'Are you sure you want to leave? Your test progress will be lost.';

        //     (e || window.event).returnValue = confirmationMessage; // Standard
        //     return confirmationMessage; // For some older browsers
        // });

        function submitQuiz(path) {
            clearInterval(timer);

            // Clear all selected options
            var radioButtons = document.querySelectorAll('input[type="radio"]');
            radioButtons.forEach(function (radioButton) {
                radioButton.checked = false;
            });

            // Construct the path URL with category and testid parameters
            var constructedPath = '/' + path + '/{{ category }}/{{ testid }}';

            // Redirect to the constructed path
            window.location.href = constructedPath;
        }

        function updateTimerDisplay() {
            var minutes = Math.floor(countdown / 60);
            var seconds = countdown % 60;

            // Format the time and update the display
            document.getElementById('timer').textContent =
                'Time Remaining: ' + minutes + ' minutes ' + seconds + ' seconds';
        }

        // Add this to your existing JavaScript
        document.getElementById('show-rules').addEventListener('click', function () {
            document.getElementById('rules-popup').style.display = 'block';
        });

        function closeRulesPopup() {
            document.getElementById('rules-popup').style.display = 'none';
        }
    </script>

</body>

</html>