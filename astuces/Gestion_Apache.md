# Apache

## installation sur Ubuntu

https://www.digitalocean.com/community/tutorials/how-to-install-the-apache-web-server-on-ubuntu-20-04-fr

## Les commandes de base de Apache

Pour arrêter votre serveur Web, tapez :

```sudo systemctl stop apache2```
 
Pour démarrer le serveur web lorsqu'il est arrêté, tapez :

```sudo systemctl start apache2```
 
Pour arrêter puis redémarrer le service, tapez :

``sudo systemctl restart apache2``
 
Si vous procédez uniquement à des modifications de configuration, il se peut qu’Apache recharge souvent sans interrompre les connexions. Pour ce faire, utilisez cette commande :

``sudo systemctl reload apache2``
 
Par défaut, Apache est configuré pour un lancement automatique au démarrage du serveur. Si ce n'est pas ce que vous souhaitez, désactivez ce comportement en tapant :

``sudo systemctl disable apache2``
 
Pour réactiver le service de lancement automatique au démarrage, tapez :

``sudo systemctl enable apache2``
 
Désormais, Apache devrait démarrer automatiquement au redémarrage du serveur.