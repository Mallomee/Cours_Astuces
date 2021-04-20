# Cour du 20/04/2021

On a constaté qu'en changeant l'URL en y ajoutant par exemple `http://localhost/S05/e02/S05-projet-oShop-Mallomee/public/category/5`, cela crée un chemin avec un dossier vituel category changeant ainsi les lien css `http://localhost/S05/e02/S05-projet-oShop-Mallomee/public/css/style.css` en `http://localhost/S05/e02/S05-projet-oShop-Mallomee/public/category/css/style.css`. Ainsi on pourrait récupérer le chemin dans l'url et le changer mais ce sera donc des chemins statiques. On va donc chercher à créer des chemins qui s'adaptent.

On ajoutera donc dans le .htacess

```php
# On commence par activer la réécriture d'URL dans Apache
RewriteEngine On 

# ces deux lignes de code
RewriteCond %{REQUEST_URI}::$1 ^(/.+)/(.*)::\2$
RewriteRule ^(.*) - [E=BASE_URI:%1]

# Apache si tu vois des requetes vers des dossiers qui existent déjà (css, img, vendor, ...)
# Fais comme d'habitude
# Mais activer la réécriture d'URL SEULEMENT si l'URL demandée
# n'est pas un dossier qui existe.
RewriteCond %{REQUEST_FILENAME} !-d

# Mais activer la réécriture d'URL SEULEMENT si l'URL demandée
# n'est pas un fichier qui existe.
RewriteCond %{REQUEST_FILENAME} !-f

# Réécrire l'URL pour la correspondance 
# entre nos chemins "virtuels" (/products) et les vrais chemins (index.php?page=products)
# /products ==> index.php?page=products
# /store    ==> index.php?page=store
# /blog    ==> index.php?page=blog
# /blabla    ==> index.php?page=blabla
RewriteRule ^(.*)$ index.php?page=$1 [QSA,L]
```

ces deux lignes de code

```php
# 
RewriteCond %{REQUEST_URI}::$1 ^(/.+)/(.*)::\2$
RewriteRule ^(.*) - [E=BASE_URI:%1]
```

Apache va extraire la partie de l'URL et la stocker dans une variable d'environnement (la mémoire du serveur). On pourra ensuite la récupérer dans la variable super globale de PHP `$_SERVER['BASE_URI']` afin de la réemployer dans le html sous cette forme.

```html
<link rel="stylesheet" href="<?=$_SERVER['BASE_URI'] ?>/css/styles.css">
```

```php
<?=$_SERVER['BASE_URI'] ?>
```

On va donc changer les chemins relatifs (les link du header, les scripts du footer etc....).