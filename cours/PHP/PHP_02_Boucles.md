# Les Boucles

Les boucles permettent de boucler en répétant leur contenu jusqu'à ce qu'on leur demande d'arrêter ou que la condition est rempli.
En car de risque de répétition infini  inclure une sécurité peut être un ebonne pratique à prendre. Une condition dans lequel on met un `break` sera à envisager lors d'essai.

## While

Cette boucle est la plus simple. Tant que l'expression de la boucle n'est pas validé, la boucle continuera et sera évaluée comme true.

Exemple

```php
$a = 1

while($a <= 10){
    echo $a++; // on ajoute +1 à $a
}
```

Dans notre exemple ci dessus, notre boucle continuera de boucler tant que **$a** ne sera pas arrivé à **10**. 

## For

## Foreach

### Un tableau simple

Cette boucle sert principalement à effectuer une énumération du contenu d'un tableau. Elle se présente ainsi

```php
foreach($arrayName as $key => $value){

}
```

`$arrayName` sera la variable contenant le tableau, `$key` sera la clé si le tableau en contient ou prendra les index de base du tableau (0,1,2...). Quant à  `$value` il représente chaque élément du tableau.