from django.db import models

# create your model here.
class contact(models.Model):
    name = models.CharField(max_length=30)
    email = models.CharField(max_length=30)