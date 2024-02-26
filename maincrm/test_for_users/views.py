from django.shortcuts import render,redirect
# Importing viewsets from rest_framework
from rest_framework import viewsets
# Linking Serializers and Questions Models
from .serializers import QuestionsSerializer
from .models import Questions,Careers
# Importing apiview and Response from rest framework
from rest_framework.decorators import api_view
from rest_framework.response import Response
from rest_framework import status
import random
import string
from django.core.exceptions import ObjectDoesNotExist
from django.http import JsonResponse
from django.core.files import File
import logging
import json

# Configure the logger
logging.basicConfig(level=logging.ERROR)  # Set the logging level to ERROR or another desired level
logger = logging.getLogger(__name__)

# Create your views here.

# Making this Get Request
@api_view(['GET'])
def hello_world(request):
    return Response({'message':'Hello, world'})

# Gets all Questions data from the database
class QuestionsView(viewsets.ModelViewSet):
    # Initiate Serializers
    serializer_class = QuestionsSerializer
    # Get all Questions stored in the database
    queryset = Questions.objects.all()


def random_strings(length):
    characters = string.ascii_letters + string.digits
    return ''.join(random.choice(characters) for _ in range(length))

@api_view(['POST'])
def create_career(request):
    # Validate the incoming request
    required_fields = ['name', 'mail', 'contactnumber', 'category', 'experience', 'cv']
    for field in required_fields:
        if field not in request.data:
            return Response({'success': False, 'message': f'{field} is required'}, status=status.HTTP_400_BAD_REQUEST)

    # Upload the CV file
    cv_path = request.data['cv'].name
    testid = random_strings(200)

    # Create a new Career model instance
    career = Careers(
        name=request.data['name'],
        mail=request.data['mail'],
        contactnumber=request.data['contactnumber'],
        category=request.data['category'],
        experience=request.data['experience'],
        cv=cv_path,
        testid=testid,
    )

    cv_file = request.data.get('cv')
    if cv_file:
        career.cv.save(cv_file.name,File(cv_file))

    # Save the Career model instance to the database
    career.save()

    return Response({'success': True, 'message': 'Career created successfully', 'career': {
        'id': career.id,
        'name': career.name,
        'mail': career.mail,
        'contactnumber': career.contactnumber,
        'category': career.category,
        'experience': career.experience,
        'cv': career.cv.url,
        'testid': career.testid,
    }}, status=status.HTTP_201_CREATED)

@api_view(['GET'])
def read_career(request, id):
    try:
        career = Careers.objects.get(id=id)
        return Response({'success': True, 'career': {
            'id': career.id,
            'name': career.name,
            'mail': career.mail,
            'contactnumber': career.contactnumber,
            'category': career.category,
            'experience': career.experience,
            'cv': career.cv.url,
            'testid': career.testid,
        }}, status=status.HTTP_200_OK)
    except ObjectDoesNotExist:
        return Response({'success': False, 'message': 'Career not found'}, status=status.HTTP_404_NOT_FOUND)

@api_view(['PUT'])
def update_career(request, id):
    # Validate the incoming request
    required_fields = ['name', 'mail', 'contactnumber', 'category', 'experience']
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

    # Update the CV file if a new file is provided
    if 'cv' in request.data:
        cv_path = request.data['cv'].name
        career.cv = cv_path

    # Save the updated Career model instance
    career.save()

    return Response({'success': True, 'message': 'Career updated successfully', 'career': {
        'id': career.id,
        'name': career.name,
        'mail': career.mail,
        'contactnumber': career.contactnumber,
        'category': career.category,
        'experience': career.experience,
        'cv': career.cv.url,
        'testid': career.testid,
    }}, status=status.HTTP_200_OK)

@api_view(['DELETE'])
def delete_career(request, id):
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

@api_view(['GET'])
def read_all_careers(request):
    # Retrieve all career entries
    careers = Careers.objects.all()

    # Transform the data for response
    careers_data = [{
        'id': career.id,
        'name': career.name,
        'mail': career.mail,
        'contactnumber': career.contactnumber,
        'category': career.category,
        'experience': career.experience,
        'cv': career.cv.url,
        'testid': career.testid,
    } for career in careers]

    return Response({'success': True, 'careers': careers_data}, status=status.HTTP_200_OK)

@api_view(['POST'])
def redirect_to_test(request):
    # Get the provided test ID from the request
    testid = request.data.get('testid')

    # Check if the test ID is provided
    if not testid:
        return Response({'success': False, 'message': 'Test ID is required'}, status=status.HTTP_400_BAD_REQUEST)

    # Check if the test ID exists and the status is pending in the careers database
    try:
        career = Careers.objects.get(testid=testid, teststatus='pending')
        category = career.category
    except ObjectDoesNotExist:
        return Response({'success': False, 'message': 'Invalid test ID or test status is not pending'}, status=status.HTTP_400_BAD_REQUEST)

    # Return a 200 response with a success message and the test ID
    return Response({'success': True, 'message': 'Successfully redirected to test page', 'testid': testid,
                     'redirectUrl': f"http://127.0.0.1:8000/api/quiz/{category}/{testid}"}, status=status.HTTP_200_OK)

@api_view(['GET'])
def open_quiz(request, category, testid):
    if not testid:
        return Response({'success': False, 'message': "No TestID"}, status=status.HTTP_400_BAD_REQUEST)

    check_if_done = Careers.objects.filter(testid=testid, teststatus='pending').first()

    if not check_if_done:
        return Response({'success': False, 'message': "Test Already Done"}, status=status.HTTP_400_BAD_REQUEST)

    categories = {
        'SeniorFullStack5PlusYears': ['PHP', 'Angular', 'MySQL', 'API'],
        'SeniorUnityGameDeveloper': ['Unity Developer'],
        'GameDesigner': ['Photoshop', 'Elastic', 'Figma'],
        'BackendGameDeveloper': ['MEAN'],
        'SalesAssociate(Telecaller)': ['Sales', 'Telecaller'],
        'SalesTeamLead': ['Sales', 'SalesTeamLead'],
        'SalesManager': ['Sales', 'SalesManager'],
        'IonicDeveloper': ['IonicDeveloper', 'Angular', 'React'],
        'SeniorReactNativeDeveloper': ['React Native', 'JavaScript'],
        'DigitalMarketingAssistant': ['Digital Marketing'],
        'GraphicDesigner': ['Graphic Design'],
        'DevOps': ['DevOps'],
        'QualityAssurance': ['Manual Testing', 'Quality Assurance'],
    }

    if category not in categories:
        return Response({'success': False, 'message': f"Invalid Category: {category}"}, status=status.HTTP_400_BAD_REQUEST)

    questions = []

    questions_per_category = 15 // len(categories[category])

    for individual_category in categories[category]:
        individual_questions = Questions.objects.filter(category=individual_category).order_by('?')[:questions_per_category]
        questions.extend(individual_questions)

    if not questions:
        return Response({'success': False, 'message': f"No Questions Available for {category}"}, status=status.HTTP_400_BAD_REQUEST)

    questions_data = [{'id': q.id, 'question': q.question, 'answers': q.answers, 'category': q.category} for q in questions]

    return render(request, 'quizpage.html', {'questions':questions_data, 'category': category, 'testid': testid})

@api_view(['POST'])
def submit_quiz(request):
    try:
        data = json.loads(request.body.decode('utf-8'))
        
        answers = data.get('answers')
        testid = data.get('testid')
        category = data.get('category')

        print("Data", answers, testid, category)

        total_questions = len(answers)
        correct_count = 0

        for answer_data in answers:
            answer_text = answer_data.get('answer')
            question_id = int(answer_data.get('questionId'))

            question = Questions.objects.get(id=question_id)

            if answer_text == question.correct_answer:
                correct_count += 1

        percentage_correct = (correct_count / total_questions) * 100 if total_questions > 0 else 0

        test = Careers.objects.filter(category=category, testid=testid).first()

        if percentage_correct >= 75:
            test.teststatus = 'pass'
            test.save()
            return redirect('passpage.html')  # Redirect to pass page
        else:
            test.teststatus = 'fail'
            test.save()
            return redirect('failpage.html')  # Redirect to fail page
    except Exception as e:
        # Log the exception for debugging purposes
        logger.error("An error occurred during the quiz submission: %s" % str(e))
        return Response({
            'success': False,
            'message': 'An error occurred during the quiz submission.',
            'error_details': str(e)  # Include additional error details in the response
        }, status=status.HTTP_500_INTERNAL_SERVER_ERROR)

@api_view(['POST'])
def fail_testee(request):
    try:
        testid = request.data.get('testid')

        print("TestId:", testid)

        test = Careers.objects.filter(testid=testid).first()

        if test and test.teststatus == 'pending':
            test.teststatus = 'fail'
            test.save()

        # Include the redirect URL in the response
        redirect_url = 'failpage'
        return Response({'success': True, 'message': 'Failed Successully.','redirect_url':redirect_url},status=status.HTTP_500_INTERNAL_SERVER_ERROR)
    except Exception as e:
        # Log the exception for debugging purposes
        logger.error("An error occurred during the quiz submission: %s" % str(e))
        return Response({'success': False, 'message': 'An error occurred while updating the quiz result to fail.', 'error_details': str(e)}, status=status.HTTP_500_INTERNAL_SERVER_ERROR)

@api_view(['GET'])
def passpage(request):
    return render(request, 'passpage.html')

@api_view(['GET'])
def failpage(request):
    return render(request, 'failpage.html')

@api_view(['GET'])
def errorpage(request):
    return render(request, 'errorpage.html')