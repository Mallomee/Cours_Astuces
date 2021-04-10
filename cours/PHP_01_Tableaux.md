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