# PHP

Cette fiche contient :

- Introduction
- Les Bases
- Les Tableaux
- Les Conditions
- Les Boucles (à venir)
- La Syntaxe Alternative

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

## Les tableaux

Il existe plusieurs tableaux. Mais déjà il faut savoir que ce tableau sera rangé dans une variable à savoir :

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
        'sheherazadesTeam' => [
            "Atouss", // son index sera 0
            "Hugo-Jacques", // son index sera 1
            "Clelia", // 2
            "Céline", // 3
        ],
        'profTeam' => [
            'Prue' => 'CharlesOclock',
            'Piper' => 'GregOclock',
            'Phoebe' => 'AlexisOclock'
        ]
    ]
```

Ce tableau est très utile pour compacter des données dans des tableaux et appeler un des ses éléments se fait comme suit : `$bestOfTeam['profTeam']['Piper']` ce qui me donnera : `"GregOclock"`.

Ce tableau n'est pas souvent appelé comme cela et l'on priviligiera l'emploi de `foreach` à cet égard. (voir exemple dans /test/test.php ou le sujet consacré aux boucles pour plus d'informations).

Comme vous pouvez aussi le constater, le tableau multidimmensionnel peut aussi être associatif, enrichissant ainsi les possibilités. A vous de voir lequel convient le mieux à votre situation et vos besoins.

## Les Conditions

### IF et ELSE

Comme le porte leurs noms, IF correspond à **si** et ElSE à **sinon**. Ces derniers permettent de poser des conditions du style :

'SI le ciel est bleu, ALORS je suis sur Terre ! SINON je suis ailleurs O_O !'

qu'on pourrait traduire en PHP par :

```php
if ($ciel == 'bleu'){
    echo 'je suis sur Terre';
}else{
    echo 'je suis ailleurs O_O !';
}
 ```

Vous pouvez aussi mettre plusieurs conditions comme :

```php
if ($ciel == 'bleu' && $herbe == 'verte'){
    echo 'je suis sur Terre';
}elseif ($ciel == 'rouge' || $sol == 'cailloux'){
    echo 'je suis sur Mars';
}else{
    echo 'je suis ailleurs O_O !';
}
 ```

 Ici il y a un `elseif` en plus qui pourrait se traduire par **sinon si**. Si la première condition n'est pas rempli, on vérifie la seconde et sinon on passe à else. Dans mes conditions il y a deux élements : `&&` et `||`.

 `&&` se traduit par **ET**. Il faut donc que toutes les conditions soient remplis pour valider le **IF**. L'on peut très bien en ajouter plusieurs.

  `||` se traduit par **OU**. Il permet de valider le **IF** si l'un ou l'autre des conditions est remplis. L'on peut très bien en ajouter plusieurs.

Exemple de conditions plus complexes :

```php
if ($ciel == 'bleu' && $herbe == 'verte' && ($soleil == 'brille' || $nuit == 'lune')){
    echo 'je suis sur Terre';
}else{
    echo 'je suis ailleurs O_O !';
}
 ```

Ici j'oblige le **IF** à avoir la condition `$ciel == 'bleu'`, `$herbe == 'verte'`  mais aussi : **SOIT** `$soleil == 'brille'` **OU** `$nuit == 'lune'`. Si le soleil ne brille pas, mais que la nuit il y a la lune, il validera quand même ma condition et vice-versa.

**A Noter** 

Il est bon de savoir que si vous avez une condition avec un booléen(true ou false), vous pouvez afficher votre condition ainsi :

```php
if ($verite){
    echo 'alors la vérité est vrai';
}else{
    echo 'la vérité est fausse';
}
 ```

 ici la condition sera lu par PHP comme suit `if ($verite == true){...}`

## Les Boucles

## La Syntaxe Alternative

Pour implémenter du PHP avec du html on priviligiera la synthaxe alternative qui permet de limiter le php dans le HTML et évitera ainsi de passer à côté d'erreur qui ne pourraient être visible dans l'un et l'autre des codes.

Ainsi en bonne pratique on priviligiera 
```php
<?php if ($verite): ?>
    <p>Alors la vérité est vrai</p>
<?php else : ?>
    <p>la vérité est fausse</p>
<?php endif ?>
 ```

 Ici vous avons mis un if qui comment dans une balise php : `<?php if ($verite):?>`. L'accolade d'ouverture est faite par le `:` puis on ferme la balise et on saisi notre code en html. On rouvre ensuite un code PHP pour mettre le else (qui fermera ainsi le **IF** plus haut) où on lui donne aussi un code HTLM à l'intérieur et enfin on ferme complètement notre condition en mettant à la fin un `<?php endif ?>` qui clôture l'ensemble.