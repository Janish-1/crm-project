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