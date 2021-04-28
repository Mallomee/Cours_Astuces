# Les Classes

Exemple:

```php

// On créer une class donjon
class Donjon{
//On y met deux paramètres
public $player1;
public $player2;
public $difficult;
// cette fonction permet de mettre des paramètres initiaux dans notre class
function __construct($joueur1='',$joueur2='', $difficulte='normal'){
    $this->player1 = $joueur1;
    $this->player2 = $joueur2;
    $this->difficult = $difficulte;
}

//On va créer un groupe pour faire une instance de notre donjon
$groupe = new Donjon('Carmen', 'Mélissa', 'easy')
```

`class Donjon` est une classe.
`function __construct` est une méthode (c'est une fonction dans une class).
`public $player1;`, `public $player2;` et  `public $difficult;`sont des propriétés car il se trouve dans une class.
`$groupe` est un objet qu'on instancie avec `new Donjon('Carmen', 'Mélissa', 'easy')`.

On peut instancier plusieurs objets `$groupe1 = new Donjon('Tom', 'Hugo', 'Hardcore !')` et on changera leurs paramètres.

`$this` deviendra donc `$groupe` dans le premier objet ou `$groupe1` dans le second.


public => accès à la propriété ou méthode depuis l'extérieur de la classe
private => accès à la propriété ou méthode seulement dans la classe qui les définis
protected => accès à la propriété ou méthode dans la classe qui la définie ainsi que dans les classes enfants