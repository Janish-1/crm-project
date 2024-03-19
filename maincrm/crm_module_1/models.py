from django.db import models

class JobPost(models.Model):
    PLATFORM_CHOICES = [
        ('LinkedIn', 'LinkedIn'),
        ('Indeed', 'Indeed'),
        ('Monster', 'Monster'),
        ('Other', 'Other'),
    ]

    title = models.CharField(max_length=255)
    company = models.CharField(max_length=255)
    location = models.CharField(max_length=255)
    description = models.TextField()
    requirements = models.TextField()
    salary = models.DecimalField(max_digits=10, decimal_places=2, null=True, blank=True)
    posted_at = models.DateTimeField(auto_now_add=True)
    platform = models.CharField(max_length=50, choices=PLATFORM_CHOICES, default='Other')

    def __str__(self):
        return f"{self.title} at {self.company} - {self.platform}"

class TimeHistory(models.Model):
    date = models.DateField()
    name = models.TextField()
    clockin = models.TimeField()
    clockout = models.TimeField(null=True)
    description = models.TextField(null=True)
    attendence = models.BooleanField(default=True)
    late = models.BooleanField(default=False)
    time_change_request = models.TextField(default="Pending",choices=[("Pending","Pending"),("Approved","Approved"),("Rejected","Rejected")])
    time_change_message = models.TextField(null=True)
    status = models.IntegerField(default=1)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __str__(self):
        return f"{self.name} at {self.date} - {self.attendence}"

class ProjectReport(models.Model):
    project_name = models.CharField(max_length=100)
    start_date = models.DateField()
    end_date = models.DateField()
    project_manager = models.CharField(max_length=100)
    project_description = models.TextField()
    budget_allocated = models.DecimalField(max_digits=10, decimal_places=2)
    actual_cost = models.DecimalField(max_digits=10, decimal_places=2)
    progress_percentage = models.PositiveIntegerField(default=0, help_text="Progress in percentage")
    issues = models.TextField(blank=True, null=True)
    accomplishments = models.TextField(blank=True, null=True)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __str__(self):
        return self.project_name

class ClientReport(models.Model):
    name = models.CharField(max_length=100)
    email = models.EmailField()
    phone_number = models.CharField(max_length=20)
    company = models.CharField(max_length=100)
    address = models.CharField(max_length=255)
    city = models.CharField(max_length=100)
    country = models.CharField(max_length=100)
    postal_code = models.CharField(max_length=20)
    total_payments = models.DecimalField(max_digits=10, decimal_places=2, default=0)
    total_changes_requested = models.IntegerField(default=0)
    project_notes = models.TextField(blank=True)
    project_requirements = models.TextField()
    project_status = models.CharField(max_length=50, choices=[('Pending', 'Pending'), ('Ongoing', 'Ongoing'), ('Completed', 'Completed')], default='Pending')
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __str__(self):
        return self.name

class ExpenseReport(models.Model):
    description = models.CharField(max_length=255)
    amount = models.DecimalField(max_digits=10, decimal_places=2)
    date = models.DateField()
    expense_type = models.CharField(max_length=100, choices=[
        ('Travel', 'Travel'),
        ('Supplies', 'Supplies'),
        ('Equipment', 'Equipment'),
        ('Services', 'Services'),
        ('Other', 'Other')
    ])
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __str__(self):
        return f"{self.description} - {self.amount}"
    