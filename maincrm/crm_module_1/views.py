from django.shortcuts import render, get_object_or_404, redirect
from django.contrib import messages

def job_application(request):
    # Retrieve all job applications
    job_applications = JobApplication.objects.all()

    return render(request, 'job_application_list.php', {'job_applications': job_applications})

def create_job_application(request):
    if request.method == 'POST':
        form = JobApplicationForm(request.POST)
        if form.is_valid():
            form.save()
            messages.success(request, 'Job application created successfully!')
            return redirect('job_application')
    else:
        form = JobApplicationForm()

    return render(request, 'job_application_form.php', {'form': form})

def update_job_application(request, pk):
    job_application = get_object_or_404(JobApplication, pk=pk)

    if request.method == 'POST':
        form = JobApplicationForm(request.POST, instance=job_application)
        if form.is_valid():
            form.save()
            messages.success(request, 'Job application updated successfully!')
            return redirect('job_application')
    else:
        form = JobApplicationForm(instance=job_application)

    return render(request, 'job_application_form.php', {'form': form})

def delete_job_application(request, pk):
    job_application = get_object_or_404(JobApplication, pk=pk)
    job_application.delete()
    messages.success(request, 'Job application deleted successfully!')
    return redirect('job_application')