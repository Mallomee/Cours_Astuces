# La Syntaxe Alternative

## Pour la condition

Pour implémenter du PHP avec du html on priviligiera la synthaxe alternative qui permet de limiter le php dans le HTML et évitera ainsi de passer à côté d'erreur qui ne pourraient être visible dans l'un et l'autre des codes.

Ainsi en bonne pratique on priviligiera

```php
<?php if ($verite): ?>
    <p>Alors la vérité est vrai</p>
<?php else : ?>
    <p>la vérité est fausse</p>
<?php endif ?>
 ```

 Ici vous avons mis un if dans une balise php : `<?php if ($verite):?>`. L'accolade d'ouverture est faite par le `:` puis on ferme la balise et on saisi notre code en html. On rouvre ensuite un code PHP pour mettre le else (qui fermera ainsi le **IF** plus haut) où on lui donne aussi un code HTLM à l'intérieur. Enfin on ferme complètement notre condition en mettant à la fin un `<?php endif ?>` qui clôture l'ensemble.

## Pour les boucles


