# Factorisation dans CoreModel (MVC)

Il existe la possibilité de n'avoir des `findAll` et `find($id)` que dans le Coremodel sur lequel on effectuera un héritage (ex: `class Product extends Coremodel`).

Pour cela il faut :

- Ajouter une propriété ``protected $table_name`` dans votre classe à vide

``protected $table_name = '';``

vous mettez ça dans votre CoreModel et ensuite pour chacun des modèles tout en la redéfinissant pour les autres. 
Exemple pour product :


```php
class Product extends CoreModel {
protected $table_name = 'product';
}
```

Ce qui fait que les méthodes find($id) et findAll() peuvent être dans votre CoreModel (et plus dans chacune des classes) mais il faut prendre en compte la propriété $table_name dans vos requêtes du coup.

Exemple :

```php
 public function findAll() {
        // 1) On déclare la requete SQL
        $sql = 'SELECT * FROM '. $this->table_name;

        // 2) On récupère l'objet PDO
        $pdo = Database::getPDO();

        // 3) On execute la requete
        $pdoStatement = $pdo->query($sql);

        // 4) On récupère les résultats
        // Un tableau d'objets de la classe Brand
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Brand');

        // 5) On retourne le résultat
        return $results;
    }
```

Vous avez plus qu'à enlever tous les findAll de tous les modèles enfants
ils utilseront tous le findAll de CoreModel qui prend en compte la propriété table_name de chacun

Et dans CoreModel vous pouvez même ajouter une méthode

```php
findAllByColumn($columnName, $columnValue) {
  
        $sql = "SELECT * FROM product WHERE $columnName = $columnValue";
      
        // 2) J'instance PDO
        $pdo = Database::getPDO();

        // 3) J'execute la requete SQL
        $pdoStatement = $pdo->query($sql);


        // 4) On récupère le résultat
        // $result = $pdoStatement->fetch(PDO::FETCH_OBJ);
        $result = $pdoStatement->fetchObject(self::class);

        // 5) On retourne le résultat
        return $result;
}
```

Utilisation :

```php
$id = 1;
$productModel = new Product();

$productModel->findAllByColumn('id', $id);
$productModel->findAllByColumn('brand_id', $id);
```

Ah et petite modification :

il faut utiliser ``self::class`` dans les fetchs pour que ça soit dynamique ``$result = $pdoStatement->fetchObject(self::class);``

Il y aura trois model mais quasi-vide et qui ne définissent que les propriétés et getter et setter.