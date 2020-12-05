<?php

session_start();

//echo 'salut';

$toto_a_la_plage = 'Salut les potes';

//echo $toto_a_la_plage;

$chiffre= 3;
$boolean = true;
$array= ['test', 1, true];

/*Pour afficher le contenu d'un tableau */

echo "<pre>";
var_dump($array);
echo "</pre>";

echo "<pre>";
print_r($array);
echo "</pre>";

$multi_dimensional_array = [
    'toto' => 'Salut les gars',
    'tata' => 34,
    'titi' => false,
    'tonton' => function($papa = 'de taré') {
        if (is_string($papa)){
            $content = 'je suis une fonction ' . $papa . " mais pas trop ...";
        }else{
            $content = 'Tu t\'es raté mon copain, car "$papa" est de type <b>' . gettype($papa) . '</b>';
        }
        return $content;
    },
    'tutu' => [
        'bof' => 'Je sais plus quoi mettre ...',
        'bif' => 45
    ]
];

echo "<pre>";
var_dump($multi_dimensional_array);
echo "</pre>";

?>

    <br>
    <hr>
    <br>

<?php

echo $array[0];

echo "<pre>";
echo $multi_dimensional_array['toto'];
echo "</pre>";

echo "<pre>";
echo $multi_dimensional_array['tutu']['bof'];
echo "</pre>";

echo "<pre>";
echo $multi_dimensional_array['tonton']();
echo "</pre>";

echo "<pre>";
echo $multi_dimensional_array['tonton']('de foufou');
echo "</pre>";

echo "<pre>";
echo $multi_dimensional_array['tonton'](24);
echo "</pre>";
?>

    <br>
    <hr>
    <br>

<?php

echo "<pre>";
echo var_dump($_GET); //Super globaale
echo "</pre>";

?>

<?php
if (isset($_POST['logout'])) { // On vérifie si on s'est déconnecté
    session_destroy();
    header('Location: index.php');
}
?>

<?php
if (!isset($_SESSION['firstname']) && isset($_POST['firstname']) && !empty($_POST['firstname'])){ // On vérifie si on  est connecté
    $_SESSION['firstname'] = $_POST['firstname'];
}
?>

<?php
if (!isset($_SESSION['firstname']) || isset($_POST['logout'])) {
    // Si $_SESSION['firstname'] n'existe pas ou que l'on s'est déconnecté alors
    ?>

    <form method="post">
        <label>Mon Prénom:</label>
        <input type="text" name="firstname">
        <label>Mon MDP:</label>
        <input type="password" name="password">
        <button type="submit">Valider</button>
    </form>

<?php }else{ //SINON ?>


    <p>Salut <b><?= $_SESSION['firstname'] ?></b></p>

    <form method="post">
        <input type="hidden" name="logout" value="bisou">
        <button type="submit">Déconnexion</button>
    </form>

<?php } ?>