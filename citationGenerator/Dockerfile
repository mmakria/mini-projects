# Utiliser l’image officielle PHP avec Apache
FROM php:8.2-apache

# Activer les modules Apache nécessaires
RUN a2enmod rewrite

# Copier la configuration Apache personnalisée
COPY config/vhost.conf /etc/apache2/sites-available/000-default.conf

# Redémarrer Apache pour appliquer la configuration
RUN service apache2 restart