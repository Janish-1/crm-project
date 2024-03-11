# Generated by Django 5.0.2 on 2024-03-11 06:14

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = []

    operations = [
        migrations.CreateModel(
            name="JobPost",
            fields=[
                (
                    "id",
                    models.BigAutoField(
                        auto_created=True,
                        primary_key=True,
                        serialize=False,
                        verbose_name="ID",
                    ),
                ),
                ("title", models.CharField(max_length=255)),
                ("company", models.CharField(max_length=255)),
                ("location", models.CharField(max_length=255)),
                ("description", models.TextField()),
                ("requirements", models.TextField()),
                (
                    "salary",
                    models.DecimalField(
                        blank=True, decimal_places=2, max_digits=10, null=True
                    ),
                ),
                ("posted_at", models.DateTimeField(auto_now_add=True)),
                (
                    "platform",
                    models.CharField(
                        choices=[
                            ("LinkedIn", "LinkedIn"),
                            ("Indeed", "Indeed"),
                            ("Monster", "Monster"),
                            ("Other", "Other"),
                        ],
                        default="Other",
                        max_length=50,
                    ),
                ),
            ],
        ),
    ]