<?php
$name = "Yesid"; 
$age = 18;
$isDev = true;

define('IMAGE', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1200px-PHP-logo.svg.png');

$output = " Hola $name, tienes $age años";

$outputAge = match (true){
    $age < 2 => "Eres un bebe, $name",
    $age < 10 => "Eres un niño, $name",
    $age < 18 => "Eres un adolecente, $name",
    $age === 18 => "Eres un adulto, $name",
    defaul => "Eres un adulto, $name",
};


$betsLanguages = [
    'PHP',
    'JavaScript',
    'Python',
    'Java',
    'C#',
    'C++',
];

$person = [
    'name' => 'Yesid',
    'age' => 18,
    'isDev' => true,
];

?>

<h2> Mejores lenguajes: </h2>
<ul>
    <?php foreach ($betsLanguages as $Key => $language) : ?>
        <li><?= $Key . " " . $language?></li>
    <?php endforeach; ?>
</ul>

<h2> <?= $outputAge ?> </h2>

<img src="<?= IMAGE ?>" alt="Logo php" width="200">
<h1>
    <?= $output; ?>
</h1>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
</style>