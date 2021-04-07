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
- des boléens (`bool`)
- des nombres entiers (`int`)
- des nombres décimaux (`float`)

On peut aussi y inclure des calculs ou des tableaux ou même encore d'autres variables ! Bref c'est un couteau suisse ! Voyons quelques petites choses de sa part.

```php
$a = 3;
$b = 3.5;
$calcul = $a + $b;

echo $calcul;

```

Ici nous avons défini dans `$a` un **int** de *3* et dans `$b` un **float** de 3.5 ( /!\ attention à bien mettre un `.` et non une `,` à vos nombres). Enfin dans `$calcul` nous effectuons l'addition des deux et le stockons dans la variable que l'on appelle avec un écho (dans le dossier test et dans test_php.php, vous aurez le résultat de cette dernière)


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

Dans mon tableau, mes valeurs seront chacune séparer par un ',' et elles seront automatiquement rangés dans des tiroirs. Le premier tiroir sera l'index 0, le second sera l'index 1 et ainsi de suite. Si on reprend l'exemple précédent on aura :

Exemple : 

```php
    $sheherazadesTeam = [
        0 => "Atous",
        1 => "Hugo-Jacques",
        2 => "Clelia",
        3 => "Céline",
    ]
```

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