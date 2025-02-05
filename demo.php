<?php

const URL_API = "https://whenisthenextmcufilm.com/api";

#Unicializar una nueva sesion en cURL; ch = cURL handle
$ch = curl_init(URL_API);

//Indicar que se reciba el resultado de la peticion y no se muestre en pantalla 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/*
Ejecutamos la peticion y guardamos
el resultado en la variable $response
 */

$response = curl_exec($ch);
$data = json_decode($response, true);
curl_close($ch);
?>


<head>
    <meta charset="UTF-8">
    <title>Proxima Pelicula de Marvel</title>
    <meta name="description" content="Proxima Pelicula de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<main>
    <pre style="font-size: 10px; overflow: scroll; height: 50vh; width: 80vw;">
        <?php var_dump($data); ?>
    </pre>

    <section>
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?> "
        style="border-radius: 10px;"
        />

        <hgroup>
            <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?></h3>
            <p>Fecha de estreno: <?=$data["release_date"]; ?></p>
            <p>La siguiente pelicula es: <?= $data["following_production"]["title"] ?></p>
            <img src="<?= $data["following_production"]["poster_url"] ?>" alt="" width="100">   
        </hgroup>
    </section>
</main>



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
    main{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

        img{
            justify-content: center;
        }
    }
</style>