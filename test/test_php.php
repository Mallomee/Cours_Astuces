<?php 
// Voici un exemple de calcul simple

// $a est un int
$a = 3;
// $b est un float
$b = 3.5;
// $calcul est la somme de $a + $b
$calcul = $a + $b;
// Grâce à echo, on affiche le résultat sur la page
echo $calcul;



/****** Démo String ******/


// Ici voici deux exemples de texte l'un entre " " et l'autre entre ' ' avec une variable incluse pour comprendre la différence mmême si elle est déjà visible dans le code ci-dessous

$reponse = '<stong>D</strong>';
echo '<br/> la réponse ultime c\'est la réponse $reponse' ;
echo "<br/> la réponse ultime c\'est la réponse $reponse" ;

/****** Démo Booléen ******/

$cielEstBleu = true;

//ici on met la condition que SI $cielEstBleu est vrai alors...
if ($cielEstBleu == true){
    // ... on met le premier echo
    echo 'nous sommes bien sur Terre';
}
// SINON on applique l'autre echo
else{
    echo ' O_O\' ';
}

//on retente en mettant false à notre variable $cielEstBleu

$cielEstBleu = false;

//ici on met la condition que SI $cielEstBleu est vrai alors...
if ($cielEstBleu == true){
    // ... on met le premier echo
    echo 'nous sommes bien sur Terre';
}
// SINON on applique l'autre echo
else{
    echo ' O_O\' ';
}

?>