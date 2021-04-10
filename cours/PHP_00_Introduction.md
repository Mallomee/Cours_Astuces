# PHP

Cette fiche contient :

- Introduction
- Les Bases

## Introduction

Php est un langage qui peut permettre l'emploi de données pour la création de pages internet. Grâce à lui, on peut générer des pages HTML demandé par un client au serveur. Ce dernier ira chercher tout ce qu'a commandé le client et se servira de PHP pour créer la commande et la renvoyer au client. PHP servira à chaque réactualisation de la page (quand les données seront transmises à nouveau au serveur). Celui-ci ne peut donc pas faire de contenu intéractif (contrairement à Javascript).

( http://ivmad.free.fr/pi/PHP/Modele-php-html.jpg )



## Les Bases

### Avant toute chose

PHP est un langage donc comme tout langage, avant de s'y mettre c'est toujours sympa de dire comment on parle. En effet dans des feuilles PHP on pourra inclure du HTML et y ajouter des éléments de PHP aussi il faut savoir que pour commencer à coder en PHP, il faut ouvrir une balise comme suit : `<?php` et la fermer ainsi : `?>`.

Il existe aussi un raccourci si l'on ne souhaite que faire un echo. Il s'agit de : `<?=` qui se fermera comme une balise PHP standard.

Autre information à bien connaître : il faut que vos données en PHP (tableau, variable etc) soit placé avant le HTML qui sera appelé à s'en servir. Sinon vous aurez le droit au magnifique panneau de PHP (reconnaissable entre tous, il est orange et moche).

### Variable

Pour PHP, on peut créer une variable qu'on rappelera à chaque fois avec l'écriture avec laquelle on l'a créé. Cette variable restera stockée dans la page où elle aura été chargée.

```php
$variable = 'mon contenu';

echo $variable;
// l'echo permet d'afficher le contenue de la variable. Ici on aura 'mon contenu' qui s'affichera
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
// on aura ainsi le résultat du calcul qui s'affichera à savoir 6.5

```

Ici nous avons défini dans `$a` un **int** de *3* et dans `$b` un **float** de 3.5 ( /!\ attention à bien mettre un `.` et non une `,` à vos nombres décimaux). Enfin dans `$calcul` nous effectuons l'addition des deux et le stockons dans la variable que l'on appelle avec un écho (dans le fichier /test/test_php.php, vous aurez le résultat de cette dernière)

#### String

Le texte s'écrit soit entre `"ton texte"` ou entre `'ton texte'`. La première version demandera à PHP de vérifier son contenu et ainsi d'y voir s'il y a des variables ou autre alors que pour le second cas, il retranscrira tel quel le contenu. (voir /test/test_php.php pour un exemple concret).

#### booléen

Un booléen sert souvent dans des conditions car il retourne une valeur vrai (`true`) ou fausse (`false`). On peut l'appliquer ainsi à une variable et le changer en fonction de si les conditions sont remplis ou non. (voir /test/test_php.php pour un exemple concret)

#### Int et Float

Ces deux derniers permettent de regrouper des nombres entier (avec `int`) ou à virgule (`float`). Cela permet d'effectuer des calculs, de récupérer des données qu'on pourra aussi convertir en nombre etc comme le premier exemple avec le calcul.

### La cancaténation

Maintenant qu'on a notre belle variable, ça serait bien de s'en servir ou même de l'enrichir ! Et quoi de mieux que la cancaténation pour cela ! La cancaténation permet d'ajouter plusieurs éléments dans une variable (entre autre). Elle se fait en mettant simplement un `.` entre deux élements distincts.

Exemple :

```php

$bestOfTeam = 'Shéhérazade';

echo 'Qui sont les meilleurs : ' . $bestOfTeam . ' Bien sûr !'
// l'echo affichera Qui sont les meilleurs : Shéhérazade Bien sûr !
// ! pour la cancaténation de phrase, pensez bien à mettre des espaces car PHP ne les fait pas de lui-même
// entre les mots ou les éléments cancaténés ensemble
```

A savoir que pour la cancaténation seul le `.` est nécessaire. Cependant pour la lisibilité (surtout au début) il est recommendé d'ajouter des espaces. Cependant le code fonctionnera très bien sans.

### Opérateurs d'incrémentation et décrémentation

S'ils sonnent comme la légende du Yéti, cela n'en est rien. Ces petites choses ne sont ni plus, ni moins que des éléments permettant d'ajouter ou de soustraire à nos variables.

ainsi nous aurons :

```php
$a=5;
$a++ //qui correspond à 5 + 1
++$a //qui correspond à 1 + 5
$a-- //qui correspond à 5 - 1
--$a //qui correspond à 5 - 1
```

la différence entre incrémentation à l'avant et à l'arrière est que si le résultat revient au même