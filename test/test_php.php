<?php 
// Avant de commencer
$texte = 'Ce texte est en PHP, n\'est-ce pas surprenant ? Il a été posté avant afin de ne pas créer d\'erreur';
?>

<h1>Les bases de PHP</h1>
<strong>Exemple</strong>
<p><?= $texte?></p>

<strong>Exemple 2</strong>
<p>ce qui suit est dans une balise PHP complète.</p>

<?php 
// Voici un exemple de calcul simple

// $a est un int
$a = 3;
// $b est un float
$b = 3.5;
// $calcul est la somme de $a + $b
$calcul = $a + $b;
// Grâce à echo, on affiche le résultat sur la page soit 6.5
echo $calcul;



/****** Démo String ******/


// Ici voici deux exemples de texte l'un entre " " et l'autre entre ' ' avec une variable incluse pour comprendre la différence mmême si elle est déjà visible dans le code ci-dessous

$reponse = '<stong>D</strong>';
echo '<p> la réponse ultime c\'est la réponse $reponse.' ;
echo "<br/> la réponse ultime c\'est la réponse $reponse. </p>" ;

/****** Démo Booléen ******/

$cielEstBleu = true;

echo 'Pour mon premier IF avec TRUE : <br/>';
//ici on met la condition que SI $cielEstBleu est vrai alors...
if ($cielEstBleu == true){
    // ... on met le premier echo
    echo 'nous sommes bien sur Terre. <br/>';
}
// SINON on applique l'autre echo
else{
    echo ' O_O\' <br/>';
}

//on retente en mettant false à notre variable $cielEstBleu

$cielEstBleu = false;

echo '<br/> Pour mon second IF avec FALSE : <br/>';
//ici on met la condition que SI $cielEstBleu est vrai alors...
if ($cielEstBleu == true){
    // ... on met le premier echo
    echo 'nous sommes bien sur Terre. <br/>';
}
// SINON on applique l'autre echo
else{
    echo ' O_O\' <br/>';
}


/****** Tableau mon ami (ou pas) ! ******/

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
];

// On fait un premier foreach qui prend notre tableau $bestOfTeam où on va chercher la clé avec $nameTeam (donc sheherazadesTeam et profTeam ) et leurs tableaux respectifs
foreach($bestOfTeam as $nameTeam => $tableau ){
    // On affiche les clés dans $nameTeam
    echo '<ul>' . $nameTeam;
    //On refait un autre foreach pour récupérer les valeurs dans les tableaux de sheherazadesTeam et profTeam
    foreach ($tableau as $value){
        // et on affiche toutes leurs valeurs
        echo '<li>' . $value . '</li>';
    }
    echo '</ul>';
}


$a=5;
$a++; //qui correspond à 5 + 1
echo $a . '<br/>';
++$a; //qui correspond à 1 + 5
echo $a . '<br/>';
$a--; //qui correspond à 5 - 1
echo $a . '<br/>';
--$a; //qui correspond à 1 - 5
