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
  * Template Name: RAMO Pvt Ltd
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
                                    <span class="d-none d-lg-block">RAMO Pvt Ltd</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="quiz-app card mb-3">
                                <form id="quiz-form" method="POST">
                                    {% csrf_token %}
                                    <div class="quiz-info">
                                        <div class="category">Category: <span>{{ category }}</span> <span>
                                                <div id="timer" class="timer"></div>
                                            </span>
                                        </div>
                                        <div class="count">Questions Count: <span>{{ questions|length }}</span></div>
                                        <br>
                                    </div>
                                    <div class="quiz-area">
                                        {% for question in questions %}
                                        <div class="question" data-question-id="{{ question.id }}">
                                            <h3>{{ question.question }}</h3>
                                            <ul class="answers">
                                                {% for answer in question.answers %}
                                                <li class="option" data-answer="{{ answer }}">
                                                    <span>{{ answer }}</span>
                                                </li>
                                                {% endfor %}
                                            </ul>
                                        </div>
                                        {% endfor %}
                                    </div>
                                    <div class="options-area">

                                    </div>
                                    <button id="submit-button" class="submit-button">Submit Quiz</button>
                                    <div class="results">
                                </form>
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
        // Define the category variable
        var category = "{{ category }}";
        var testid = "{{ testid }}";
        console.log(category, testid);

        document.addEventListener("DOMContentLoaded", function () {
            // Handle options click
            document.querySelectorAll('.quiz-area .question .answers .option').forEach(option => {
                option.addEventListener('click', function () {
                    // Clear 'selected' class from all options in the same question
                    const questionId = this.closest('.question').dataset.questionId;
                    const optionsInSameQuestion = document.querySelectorAll(`.quiz-area .question[data-question-id="${questionId}"] .answers .option`);
                    optionsInSameQuestion.forEach(opt => opt.classList.remove('selected'));

                    // Mark the clicked option as selected
                    this.classList.add('selected');
                });
            });

            // Handle submit button click
            document.querySelector('.submit-button').addEventListener('click', function () {
                // Get the selected option text
                let selectedOption = document.querySelector('.quiz-area .question .answers .option.selected');
                if (selectedOption) {
                    let selectedAnswer = selectedOption.dataset.answer;
                    console.log("Selected Answer:", selectedAnswer);

                    // Add your logic to submit the answer or proceed to the next question
                } else {
                    console.log("Please select an option before submitting.");
                }
            });
        });

        var isTestStarted = false;

        // Attach load event to the window
        window.addEventListener('load', function () {
            // Show a confirmation dialog before starting the test
            var startTestConfirmation = window.confirm('Are you sure you want to start the test?');

            if (startTestConfirmation) {
                isTestStarted = true;
                window.removeEventListener('beforeunload', beforeUnloadWarning);
                startTimer();
            } else {
                window.location.href = 'http://localhost:8001/careers/teststartpage.php';
            }
        });

        var countdown = 600; // 10 minutes in seconds
        var timer = setInterval(function () {
            countdown--;

            if (countdown <= 0) {
                clearInterval(timer);
                failTestee(); // Redirect to the fail path when the timer reaches zero
            }

            updateTimerDisplay();
        }, 1000);

        // Listen for page visibility change events
        document.addEventListener('visibilitychange', function () {
            if (document.hidden) {
                failTestee(); // Redirect to the fail path when the page is hidden
            }
        });

        // Attach a click event to the submit button
        document.getElementById('submit-button').addEventListener('click', function () {
            submitQuiz();  // Pass the category value
        });

        // Warn the user before leaving or reloading the page
        window.addEventListener('beforeunload', function (e) {
            var confirmationMessage = 'Are you sure you want to leave? Your test progress will be lost.';

            (e || window.event).returnValue = confirmationMessage; // Standard
            return confirmationMessage; // For some older browsers
        });

        function updateTimerDisplay() {
            var minutes = Math.floor(countdown / 60);
            var seconds = countdown % 60;

            // Format the time and update the display
            document.getElementById('timer').textContent =
                'Time Remaining: ' + minutes + ' minutes ' + seconds + ' seconds';
        }

        function submitQuiz() {
            event.preventDefault();  // Prevent the default form submission
            clearInterval(timer);
            var category = "{{ category }}";
            var testid = "{{ testid }}";

            console.log("Data Submit" + category + testid);

            // Collect selected answers
            let selectedAnswers = [];
            document.querySelectorAll('.quiz-area .question .answers .option.selected').forEach(selectedOption => {
                let answerText = selectedOption.dataset.answer;
                selectedAnswers.push({
                    questionId: selectedOption.parentElement.parentElement.dataset.questionId,
                    answer: answerText
                });
            });

            // Prepare the data for submission
            let formData = {
                category: category,
                testid: testid,
                answers: selectedAnswers
            };

            // Get the CSRF token from the cookie
            var csrftoken = getCookie('csrftoken');

            // Use fetch to make a POST request with the CSRF token in the headers
            fetch('/api/submit-quiz/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRFToken': csrftoken  // Include the CSRF token in the headers
                },
                body: JSON.stringify(formData)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Submit Quiz Response:', data);

                    // Check if the server response indicates success
                    if (data.success) {
                        // Handle success and redirect to the specified URL
                        console.log('Redirecting to:', data.redirect_url);
                        window.location.href = data.redirect_url;  // Redirect to the pass or fail page
                    } else {
                        // Handle other cases of the response
                        // ...
                    }
                })
                .catch(error => {
                    console.error('Submit Quiz Error:', error);
                    // Handle errors during the fetch
                });
        }

        function failTestee() {
            clearInterval(timer);
            var category = "{{ category }}";
            var testid = "{{ testid }}";

            console.log("Data fail:" + category + testid);

            // Prepare the data for submission
            let formData = {
                testid: testid
            };

            // Get the CSRF token from the cookie
            var csrftoken = getCookie('csrftoken');

            // Use fetch to make a POST request
            fetch('/api/fail/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRFToken': csrftoken  // Include the CSRF token in the headers
                },
                body: JSON.stringify(formData)
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Fail Testee Response:', data);

                    // Check if the server response indicates success
                    if (data.success) {
                        // Handle success and redirect to the specified URL
                        redirecturl = 'http://crm-project-l6cl.onrender.com/api/failpage/'
                        window.location.href = redirecturl; // Replace 'window.location.href' with the actual method to redirect
                    } else {
                        // Handle other cases of the response
                        // ...
                    }
                })
                .catch(error => {
                    console.error('Fail Testee Error:', error);
                    // Handle errors during the fetch
                });
        }
        // Function to get the CSRF token from the cookie
        function getCookie(name) {
            var cookieValue = null;
            if (document.cookie && document.cookie !== '') {
                var cookies = document.cookie.split(';');
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = cookies[i].trim();
                    // Search for the csrf token cookie
                    if (cookie.substring(0, name.length + 1) === (name + '=')) {
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