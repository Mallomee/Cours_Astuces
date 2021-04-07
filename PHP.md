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
        "Atouss",
        "Hugo-Jacques",
        "Clelia",
        "Céline",
    ]
```

Avant de poursuivre il faut parler des différents tableaux. Il existe :
- **le tableau simple** regroupant juste les données à l'intérieur. Ses clés ne seront pas nommées et seront donc les clés de base (0,1,2,3).
- **le tableau associatif** dont les clés ont été renommées.
- **le tableau multidimensionnel** où on peut trouver des tableaux dans nos tableaux (IKEA power !)

Ces derniers seront détaillés plus tard, revenons donc à notre exemple.

Dans mon tableau, mes valeurs seront chacune séparées par un ',' et elles seront automatiquement rangés dans des tiroirs. Le premier tiroir sera l'index 0, le second sera l'index 1 et ainsi de suite. Si on reprend l'exemple précédent on aura :

Exemple : 

```php
    $sheherazadesTeam = [
        0 => "Atouss",
        1 => "Hugo-Jacques",
        2 => "Clelia",
        3 => "Céline",
    ]
```

Ce tableau ci-dessus est devenu un tableau associatif (en mettant `0 =>` on a défini une clé avant sa valeur) et dans mon premier index étiquetté 0, la clé sera 0. Si besoin on peut changer ses clés si on le souhaite en les renommant. (Voir tableau associatif)

il faut bien penser à fermer le tableau par des `[]` sinon on a tôt fait de s'y perdre. ^-^

Pour appeler un élement du tableau on a besoin d'identifier ton index où il est stocké et de l'appeler. Si aucune clé n'a été attribuée, PHP affecte des chiffres en clé aux valeur.

Exemple : 

```php
    $sheherazadesTeam = [
        "Atouss", // son index sera 0
        "Hugo-Jacques", // son index sera 1
        "Clelia", // 2
        "Céline", // 3
    ]
```

Ainsi, si l'on souhaite appeler `"Atouss"` on devra faire : `$sheherazadeTeam[0]` car notre valeur se trouve dans le tiroir indéxé par la clé 0. et pour `"Céline"` ce sera : `$sheherazadeTeam[3]`

### Tableau Associatif

Comme dit plus tôt le tableau associatif est un tableau auquel on a ajouté des clés afin de pouvoir faciliter sa lecture.

Exemple : 

```php
    $profTeam = [
        'Prue' => 'CharlesOclock',
        'Piper' => 'GregOclock',
        'Phoebe' => 'AlexisOclock'
    ]
```

Ainsi si l'on veut appeler AlexisOclock on fera `$profTeam['Phoebe']` et on ira chercher la valeur contenue dans la clé Phoebe qui n'est autre que AlexisOclock.

Cela est avantageux si l'on a des tableaux long car ça nous permet de se repérer plus facilement plutôt que compter à quel index on en est (*le dev est flemmard m'a-t-on dit un jour et moi je ne compte pas plus loin de mes doigts*).

### Tableau Multidimensionnel

Alors lui c'est le plus vil et complet des tableaux PHP. Il s'agit d'un tableau dans lequel on peut avoir d'autres tableaux.

```php
    $bestOfTeam = [
        $sheherazadesTeam => [
            "Atouss", // son index sera 0
            "Hugo-Jacques", // son index sera 1
            "Clelia", // 2
            "Céline", // 3
        ],
        $profTeam => [
            'Prue' => 'CharlesOclock',
            'Piper' => 'GregOclock',
            'Phoebe' => 'AlexisOclock'
        ]
    ]
```
