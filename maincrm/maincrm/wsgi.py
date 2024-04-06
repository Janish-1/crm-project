"""
WSGI config for maincrm project.

It exposes the WSGI callable as a module-level variable named ``application``.

For more information on this file, see
https://docs.djangoproject.com/en/5.0/howto/deployment/wsgi/
"""
from whitenoise import WhiteNoise
import os
from pathlib import Path  # Correct import statement

from django.core.wsgi import get_wsgi_application

BASE_DIR = Path(__file__).resolve().parent.parent

os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'maincrm.settings')

application = get_wsgi_application()
application = WhiteNoise(application, root=BASE_DIR/"static/")
