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


## Les paramètres

- public => accès à la propriété ou méthode depuis l'extérieur de la classe
- private => accès à la propriété ou méthode seulement dans la classe qui les définis
- protected => accès à la propriété ou méthode dans la classe qui la définie ainsi que dans les classes enfants

## Les méthodes

## Les particularités

### Abstract

Exemple :

```php
abstract class CoreModel {
    protected $person1;
    protected $person2;
    abstract public function love();
}

class Couple extends CoreModel {
    public function love(){
        return 'in love';
    }
}
```

Abstract permet de déclarer des méthodes sans contenu qui devront cependant être rempli par les class enfants. Une class Abstraite ne peut être instanciée vu que ces méthodes sont non définies. Ainsi on ne verra pas `$AngelinaBrad = new Coremodel;`, il faudra passer par `$AngelinaBrad = new Couple;`
Ci-dessus par exemple on voit que dans la class `Couple` on a été obligé de déclarer une méthode love car c'est une méthode abstraite qui se trouve dans le Coremodel.
De même dans le Coremodel, on pourra imposer des paramètres dans notre fonction qui seront nécessaire dans les class filles.

Résumé :

- Cela permet d'éviter l'instansiation de la class Coremodel vu que cette dernière est en abstraite
- On peut imposer des méthodes récurrentes dans la class Mère que devront avoir les class filles

### Static

```php
class Recette {
    private $ingredient;
    private $duree;
    static public $ingredientSecret = 'curcuma';

    public static function findBy($id) {
        /*
        dans le code de cette fonction 
        je ne fais pas appel à une propriété (je n'utilise pas $this)
        je peux la passer en static

        cela aura comme conséquence que : 
        Je ne peux appeler que d'autres méthodes static de cette classe
        Je peux utiliser des propriétés static
        */
    }

    public function cuisson() {
        /*
            Dans cette fonction non statique je peux accéder à :
            toutes les propriétés static ou non de la classe
            toutes les méthodes static ou non de la classe
        */
    }
}

$pateCarbo = new Recette() ;
$pateCarbo->setIngredient('Pate et lardons');
$pateCarbo->cuisson();

// On remplace :
//$recetteObj = new Recette();
//$ratatouille = $recetteObj->findBy(3);
// Par :

$ratatouille = Recette::findBy(3);

echo 'L\'ingrédient secret du chef est : ' . Recette::$ingredientSecret;


```

Static permet de mettre des méthodes en static et donc de ne pas créer de nouvel objet. Cela permet d'accéder à des données qu'on ne modifiera pas depuis cette méthode.
On peut ainsi passer des paramètres en static si besoin.
Il est plus difficile de changer le contenu d'une méthode static 