from django.db import models

# Made the Questions model for the database
class Questions(models.Model):
    id = models.BigAutoField(primary_key=True)
    question = models.TextField()
    answers = models.JSONField()
    correct_answer = models.TextField()
    category = models.TextField()
    difficulty = models.TextField()

    # Save validation
    def save(self, *args, **kwargs):
        # Ensure that the correct_answer is in the list of answers
        if self.correct_answer not in self.answers:
            raise ValueError("Correct answer must be one of the provided answers.")
        super().save(*args, **kwargs)

    # Returned a String for validation
    def _str_(self):
        return self.question

# Creating the careers models for the career database
class Careers(models.Model):
    id = models.BigAutoField(primary_key=True)
    name = models.TextField()
    mail = models.EmailField()
    contactnumber = models.BigIntegerField()
    category = models.TextField()
    experience = models.IntegerField()
    # Upload to CV Files
    cv = models.FileField(upload_to='cv_files/')
    status = models.TextField(default="pending")
    appliedto = models.TextField(default="RAMO")
    teststatus = models.TextField(default="pending")
    testid = models.TextField(unique=True)
