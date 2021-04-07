# PHP

Php est un langage qui peut permettre l'emploi de données pour la création de pages internet. Grâce à lui, on peut générer des pages HTML demandé par un client au serveur. Ce dernier ira chercher tout ce qu'a commandé le client et se servira de PHP pour créer la commande et la renvoyer au client. PHP servira à chaque réactualisation de la page (quand les données seront transmises à nouveau au serveur). Celui-ci ne peut donc pas faire de contenu intéractif (contrairement à Javascript).

( http://ivmad.free.fr/pi/PHP/Modele-php-html.jpg )

## Les Bases

### Variable

Pour PHP, on peut créer une variable qu'on rappelera à chaque fois avec l'écriture avec laquelle on l'a créé. Cette variable restera stockée dans la page où elle aura été chargée.

```php
$variable = 'mon contenu';

echo $variable;
```

Il existe plusieurs types de variables :

- du texte (`string`)
- des booléens (`bool`)
- des nombres entiers (`int`)
- des nombres décimaux (`float`)

On peut aussi y inclure des calculs ou des tableaux ou même encore d'autres variables ! Bref c'est un couteau suisse ! Voyons quelques petites choses qu'il peut faire.

```php
$a = 3;
$b = 3.5;
$calcul = $a + $b;

echo $calcul;

```

Ici nous avons défini dans `$a` un **int** de *3* et dans `$b` un **float** de 3.5 ( /!\ attention à bien mettre un `.` et non une `,` à vos nombres décimaux). Enfin dans `$calcul` nous effectuons l'addition des deux et le stockons dans la variable que l'on appelle avec un écho (dans le fichier /test/test_php.php, vous aurez le résultat de cette dernière)

#### String

Le texte s'écrit soit entre `"ton texte"` ou entre `'ton texte'`. La première version demandera à PHP de vérifier son contenu et ainsi d'y voir s'il y a des variables ou autre alors que pour le second cas, il retranscrira tel quel le contenu. (voir /test/test_php.php pour un exemple concret).

#### booléen

Un booléen sert souvent dans des conditions car il retourne une valeur vrai (`true`) ou fausse (`false`). On peut l'appliquer ainsi à une variable et le changer en fonction de si les conditions sont remplis ou non. (voir /test/test_php.php pour un exemple concret)

#### Int et Float

Ces deux derniers permettent de regrouper des nombres entier (avec `int`) ou à virgule (`float`). Cela permet d'effectuer des calculs, de récupérer des données qu'on pourra aussi convertir en nombre etc comme le premier exemple avec le calcul.

## Les tableaux

Il existe plusieurs tableaux. Mais déjà il faut savoir que ce tableau sera rangé dans une variable à savoir

```php
    $tableau = []
```

la variable `$tableau` stockera le tableau et on pourra appeler les différents élements de ce tableau par la suite. A savoir que la variable peut porter le nom que vous souhaitez.

Exemple : 

```php
    $sheherazadesTeam = [
        "Atous",
        "Hugo-Jacques",
        "Clelia",
        "Céline",
    ]
```

Dans mon tableau, mes valeurs seront chacune séparé par un ',' et elles seront automatiquement rangés dans des tiroirs. Le premier tiroir sera l'index 0, le second sera l'index 1 et ainsi de suite. Si on reprend l'exemple précédent on aura :

Exemple : 

```php
    $sheherazadesTeam = [
        0 => "Atous",
        1 => "Hugo-Jacques",
        2 => "Clelia",
        3 => "Céline",
    ]
```

Avant
Ce tableau ci-dessus est un tableau associatif et dans mon premier index étiquetté 0, la clé sera 0. Si besoin on peut changer ses clés si on le souhaite en les renommant.

Exemple : 

```php
    $profTeam = [
        'Prue' => 'CharlesOclock',
        'Piper' => 'GregOclock',
        'Phoebe' => 'AlexisOclock'
    ]
```

Ainsi si l'on veut appeler AlexisOclock on fera `$profTeam['Phoebe']`. Ainsi on va chercher la valeur contenue dans la clé Phoebe qui n'est autre que AlexisOclock