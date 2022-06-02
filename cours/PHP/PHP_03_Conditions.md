# PHP

## Les Conditions

### Opérateur de comparaison

Les opérateurs de comparaison servent entre autre pour les conditions et comparent deux valeurs. Le tableau de PHP me semble très parlant pour le coup.

https://www.php.net/manual/fr/language.operators.comparison.php

https://www.php.net/manual/fr/types.comparisons.php

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