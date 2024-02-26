from django.shortcuts import render
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
                     'redirectUrl': f"http://127.0.0.1:8000/quiz/{category}/{testid}"}, status=status.HTTP_200_OK)
