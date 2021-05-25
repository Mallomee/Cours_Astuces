# Documentation pour l'installation d'une VM

Ce n'est pas un tuto, je joins juste la documentation qui m'a aidée et servie à installer une nouvelle VM Ubuntu avec Apache, 

## Lien d'aide à l'installation d'Ubuntu sur une vm

https://openclassrooms.com/fr/courses/43538-reprenez-le-controle-a-laide-de-linux/37630-installez-linux-dans-une-machine-virtuelle

pour moi, j'ai pris une version Ubuntu (20.04):

https://ubuntu.com/download

### Soucis lors de l'installation

- la première fut que lors de la demande du compte il est en qwerty, si c'est votre cas, pensez à mettre un mdp simple ou facilement récupérable en azerty
- pour la mise en place des *additions invités* je suis directement allée chercher l'iso sur mon disque (comme pour l'installation d'Ubuntu) et je l'ai lancé depuis Ubuntu.

## Mise en place d'Apache (et compagnie)

Pour seulement apache : 
https://www.digitalocean.com/community/tutorials/how-to-install-the-apache-web-server-on-ubuntu-20-04-fr

Pour la version LAMP (Linux, Apache, MySQL, PHP) (que j'ai trouvé après coup et que je recommande) :

https://doc.ubuntu-fr.org/lamp

## Installation de phpMyAdmin

Attention, l'affichage n'est pas le même que celui sur la VM de O'clock. Prenez bien le temps de lire le tuto.

https://doc.ubuntu-fr.org/phpmyadmin

### Soucis lors de la mise en place

- en voulant aller trop vite, je n'ai pas sélectionné Apache (il faut faire espace pour le choisir) ce qui m'a obligé à tout reprendre.
- Lors de ma première installation j'ai laissé les config et il m'a mis un nom d'utilisateur d'office (que je ne connaissais donc pas). Il semble s'agir de phpmyadmin. Pour ma part j'ai repris la config et j'ai changé ce paramètre.

## Installation VSC

Je suis passée par l'installation via snap qui a marché sans soucis car avec le fichier ça me bloquait.

https://doc.ubuntu-fr.org/visual_studio_code
