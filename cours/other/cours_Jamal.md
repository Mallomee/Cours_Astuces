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

# l'après midi

On as fait le plan pour la BDD sur MOCODO (http://mocodo.wingi.net/) pour définir comment allait être nos tableaux et ce qu'on allait y stocker comme données. Cela permet d'avoir un plan pour savoir quoi mettre dans la BDD et comment agencer l'ensemble avec les intéractions entre les différents tableaux (donc données) pour les reprendre ensuite dans notre site.


# Cour du 21/04

## Les routes

Sur ce cour nous avons mises en place toutes les routes comme suit :

```php
// Route pour l'affichage des produits d'une catégorie
// /catalogue/type/5
$router->map(
    'GET', // la méthode HTTP qui est autorisée 

    // i pour integer, 
    // id sera la clé utilisée pour stocker la partie dynamique
    '/catalogue/type/[i:id]',
    [
        'method' => 'type',
        'controller' => 'CatalogController' 
    ],
    'catalog-type' // Ce nom doit être unique
);
```

## Les Controllers

nous stockons plusieurs paramètres dans notre fonction dont la method (ici c'est `type`) ainsi que le `controller`. Si nous avons bien effectué le require, dans l'index, cela nous fait donc quitter le `index.php` pour nous rendre dans le `CatalogController.php` pour trouver l'objet du même nom.

```php
class CatalogController {
        /**
        * Méthode permettant l'affichage d'un type selon son identifiant
        *
        * @param Array $params
        * @return void
        */

        public function type($params) {

        $id = $params['id'];

        // On instancie le model (Classe Product)
        $typeObjet = new Type();

        // On appelle la méthode findAll de la classe Product
        $type = $typeObjet->findAll();
        // views/type.tpl.php
        $this->show('type', [
            'id' => $id,
            'allTypes' => $type
        ]);
    }

    /**
     * Méthode qui s'occupe d'afficher la page grace aux différents templates
     *
     * @param string $viewName
     * @param array $viewVars
     * @return void
     */

    private function show($viewName, $viewVars=[]) {
        // $viewVars est disponible dans chaque fichier de vue
        require_once __DIR__.'/../views/header.tpl.php';
        require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
        require_once __DIR__.'/../views/footer.tpl.php';
    }
}
```

Comme l'on peut le voir dans cet extrait repris du repo du cour, nous avons deux fonction : `type` et `show`. Dans un premier temps, nous déclencherons la méthode type appeler plus tôt dans l'index grâce à la fonction `$router->map()`. L'on constate que nous stockons l'id dans une variable `$id`, ensuite nous stockons un objet dans une variable nommé `$typeObject`. 

## Les Models

Cependant nous allons voir ce que c'est que cette objet pour bien comprendre les étapes. Un require dans `l'index.php` des models est nécessaire au bon fonctionnement de la machine.
Ainsi cela nous permettra d'aller dans le model `Type.php`

```php
class Type{
    private $id;
    private $name;
    private $footerOrder;
    private $createdAt;
    private $updatedAt;

    public function findAll(){
        // 1) On se connecte à la BDD en créer un objet PDO        
        $pdo = Database::getPDO();

        // 2) On prépare la requete SQL
        $sql = 'SELECT * FROM type';

        // 3) On execute la requete SQL
        $pdoStatement = $pdo->query($sql);
        
        // 4) On récupère les résultats
        // $results = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'type');

        // 5) On retourne le résultat
        return $results;
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
```

dans cet extrait raccourci, nous voyons les propriétés de la class `Type` que nous avons repris dans la BDD sur Adminer. Nous avons passé toutes ses fonctions en private. Il faudra donc prévoir des get pour pouvoir les récupérer ainsi que des set pour les changer si nécessaire (l'`$id` par exemple n'en ayant pas besoin vu qu'il ne doit pas être changé).

Nous créerons aussi une fonction `findAll()` dans laquelle nous appellerons un code placé dans le dossier `Utils` et dans lequel nous irons chercher toutes les infos dans la BDD. Il s'agit de `$pdo = Database::getPDO();`. Cela nous permet ensuite de préparer une commande pour localiser ce que l'on veut avec la commande `$sql = 'SELECT * FROM type';` qui n'est autre qu'une requête en SQL que l'on fait ensuite avec `$pdoStatement = $pdo->query($sql);`. On stockera ensuite les résultats avec la dernière commande `$results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'type');` qu'on retourne avec le `return $results` de fin.


## Retour dans le CatalogController

On revient donc dans notre fonction `type` qui est dans la `class CatalogController `

```php
class CatalogController {
        /**
        * Méthode permettant l'affichage d'un type selon son identifiant
        *
        * @param Array $params
        * @return void
        */

        public function type($params) {

        $id = $params['id'];

        // On instancie le model (Classe Type)
        $typeObjet = new Type();

        // On appelle la méthode findAll de la classe Type
        $type = $typeObjet->findAll();
        // views/type.tpl.php
        $this->show('type', [
            'id' => $id,
            'allTypes' => $type
        ]);
    }

    /**
     * Méthode qui s'occupe d'afficher la page grace aux différents templates
     *
     * @param string $viewName
     * @param array $viewVars
     * @return void
     */

    private function show($viewName, $viewVars=[]) {
        // $viewVars est disponible dans chaque fichier de vue
        require_once __DIR__.'/../views/header.tpl.php';
        require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
        require_once __DIR__.'/../views/footer.tpl.php';
    }
}
```

Toutes les données de notre tableau `type` situé dans notre BDD est donc stocké dans `$typeObjet` puis dans `$type`. Ensuite on va appeler la fonction show de notre objet en y saisissant les paramètres souhaités : `$this->show('type', ['id' => $id, 'allTypes' => $type ]);`. Icinous avons le paramètre `'type'` qui sera stocké dans la variable `$viewName` ainsi que les données `'id' => $id` et `'allTypes' => $type` qui seront stockées dans la variable ` $viewVars=[]` qui est un tableau. Elles seront donc stockées sous cette forme :
```php
$viewVars = [
    'id' => $id,
    'allTypes' => $type
]
```

Show lancera ensuite les trois require en prenant le `viewName` pour afficher le template demandé.

## Et dans les Views, ça donne quoi ? 

```html
<h2>
Je suis la catégorie <?= $viewVars['id'] ?>
</h2>

<ul>
<?php foreach($viewVars['allTypes'] as $typeObj): ?>
    <li>
        <?= $typeObj->getId() ?> - <?= $typeObj->getName() ?>
    </li>
<?php endforeach; ?>
</ul>
```

On pourra avoir ainsi dans notre page `type.tpl.php` une boucle par exmple où l'on récupèrera les données de notre BDD qui sont stockés dans `$viewVars['allTypes']` sous forme d'objet qu'on appelera comme suit $typeObj->getId() qui ira donc chercher la fonction de la class `Type` et ainsi donner son contenu.