##Abstract

Abstract permet de déclarer des fonctions sans contenu qui devront cependant être rempli par les class enfants. 

Exemple : 

```php
<?php 

/* petite explication du static */

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

    /**
     * Get the value of ingredient
     */ 
    public function getIngredient()
    {
        return $this->ingredient;
    }

    /**
     * Set the value of ingredient
     *
     * @return  self
     */ 
    public function setIngredient($ingredient)
    {
        $this->ingredient = $ingredient;

        return $this;
    }
}

$pateCarbo = new Recette() ;
$pateCarbo->setIngredient('Pate et lardons');
$pateCarbo->cuisson();

$recetteObj = new Recette();
$ratatouille = $recetteObj->findBy(3);

$ratatouille = Recette::findBy(3);

echo 'L\'ingrédient secret du chef est : ' . Recette::$ingredientSecret;


```

##Static

Static permet de mettre des méthodes en static et donc de ne pas créer de nouvel objet. Cela permet d'accéder à des données qu'on ne modifiera pas depuis cette méthode.
On peut ainsi passer des paramètres en static si besoin.