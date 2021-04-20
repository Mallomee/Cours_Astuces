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

## Packagist

https://packagist.org/

il s'agit d'un site te permettant de chercher si tu as un code qui a déjà été codé pour te faciliter la tâche. On cherchera donc pour nous un code permettant de dynamiser nos routes grâce à https://packagist.org/packages/altorouter/altorouter et ainsi avoir des pages catégories qui soit dynamiques.

## Composer

pour savoir si composer est installer sur ta VM, il suffit d'entrer dans le terminal : `composer -v`. Si tu as pleins de lignes de commandes c'est bon, c'est ok.
Pour le projet actuel : 

- copier la commande composer require altorouter/altorouter présente ici https://packagist.org/packages/altorouter/altorouter en haut de la page
- La coller dans le terminal, à la racine de votre projet
- Appuyer sur entrée
- Composer fait sa tambouille et install altorouter pour vous

Il va crée le dossier ``vendor`` ainsi que deux fichiers ``composer.json`` et ``composer.lock``.

Les fichiers:

- composer.json
- composer.lock

ne sont pas a toucher. Il ne faudra JAMAIS toucher ou supprimer composer.lock. composer.json pourra être modifié plus tard, mais pas pour le moment.

Le dossier vendor est créé par composer et contient toutes les dépendances que vous pourriez installer (require machin/machin). Vous ne devez jamais modifié ce qu'il y a dedans, sauf éventuellement pour débugger. Avant de push un travail on peut ignorer le dossier vendor pour éviter de tirer sur la bande passante. Il suffira ensuite de faire un `composer install` pour le remettre ensuite dans votre dossier.

Quand je récupère un projet qui contient déjà un composer.json :

- J'ouvre le terminal à la racine de mon projet, (à l'endroit ou est présent le composer.json)
- J'execute la commande composer install
- Composer télécharge et place toutes les dépendances nécessaires dans le dossier vendor
- Ready to dev !

doc supplémentaire : http://altorouter.com/usage/install.html

### ignorer un dossier dans notre projet

Si vous avez certains fichiers ou dossiers que vous ne souhaitez pas versionner (donc pas pousser sur github), comme un fichier qui contient de mots de passe parexemple, vous pouvez créer (si ce n'est pas fait) un fichier .gitignore à la racine de votre projet.
Dans ce fichier, écrire le chemin vers le fichier ou dossier de votre choix.
Vous pouvez ajouter un fichier ou dossier par ligne.

```
# ignore tous les dossiers vendor
vendor/
# ignore le dossier vendor à la racine
/vendor
# ignore le fichier tata.php dans le dossier toto
/toto/tata.php
```

## Pour notre projet

Petite récap de ou on vient et ou on va :

- On a besoin de générer des routes complex
- On a vu que c'était compliqué à faire nous même
- On a découvert qu'alto router pouvait nous aider à faire ça
- Pour l'installer on utilise composer, un petit outil/programme en ligne de commande qui permet d'installer des dépendances (alto router en est une par exemple) (composer est déjà installé sur votre machine)
- On test tout ça
- Ça marche pas ? Oui il faut require le fichier autoload.php présent dans le dossier ``vendor`` => ``require __DIR__ . '../vendor/autoload.php';`` dans l'index.php
- Maintenant on a accès, dans notre projet, à toutes les fonctions, classes, méthodes présentes dans notre dossier ``vendor``
- On instancie la classe AltoRouter: `$router = new AltoRouter();`
- On va indiquer à AltRouter comment sont constituées nos URL et à partir d'où on souhaite qu'il commence à travailler en distinguant la différence entre le 'statique' (BASE_URI) et la partie route. ``$router->setBasePath($_SERVER['BASE_URI']);``. 
- On va ensuite crée nos routes (faire du mapping) avec la méthode `$router->map();` en y mettant les paramètres comme suit : 

```php
$router->map(
    'GET', // Méthode HTTP (GET ou POST)
    '/', // L'url que l'on saisira dans le navigateur
    [
        'method' => 'home',
        'controller' => 'MainController'
    ], 
    'main-home' // On donne un nom (un identifiant à la route)
);
```

pour une route dynamique on fera ainsi : 

```php
// On va créer une nouvelle route pour les catégories
// /catalogue/categorie/1
// /catalogue/categorie/5

$router->map(
    'GET',
    '/catalogue/categorie/[i:id]',// i pour integer, id sera la clé qui stockera cette valeur
    [
        'method' => 'category',
        'controller' => 'CatalogController' 
    ],
    'catalog-category'
);
```

- On stockera tout cela dans un tableau `$match = $router->match();`. Si la route existe il renvoit un tableau, sinon il retournera false.
- On peut donc préparer le 404 et la correction du code actuel dans l'index.php

```php
if ($match !== false) {
    // La page existe dans les routes : 
    // Alors j'affiche la vue correspondante
    // Si $pageToDisplay == home
    // $routeData = $routes[$pageToDisplay];
    $routeData = $match['target'];
    $routeParams = $match['params'];

    $methodToCall = $routeData['method']; // home
    $controllerToCall = $routeData['controller']; // MainController    
} else {
    // La page n'existe pas !
    $methodToCall = 'page404';
    $controllerToCall = 'MainController';
}
```

# Cet après midi

On as fait le plan pour la BDD sur MOCODO (http://mocodo.wingi.net/) pour définir comment allait être nos tableaux et ce qu'on allait y stocker comme données.
