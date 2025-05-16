<?php
session_start(); // -> $_SESSION
$_SESSION['token'] = bin2hex(random_bytes(64));

$num_random = random_int(0,4);
$imagenes = [
    ['src'=> 'colibri.jpg','alt'=>'colibri de colores'],
    ['src'=> 'colores.webp','alt'=>'colores de colores'],
    ['src'=> 'fila.jpg','alt'=>'fila de colores'],
    ['src'=> 'mancha.jpg','alt'=>'mancha de colores'],
    ['src'=> 'pinkFloyd.jpg','alt'=>'pinkFloyd de colores']
];


// include 'connection.php';
// require 'connection.php';
// include_once 'connection.php';

// Llamar a la conexión una vez
require_once 'controlador/connection.php';

$idiomesJSON = "idiomas.json";
$file = file_get_contents($idiomesJSON);
$idiomas = json_decode($file, true);
$idioma = $_SESSION['idioma'] ?? "CAT";

?>

<!DOCTYPE html>
<html lang="<?= $idiomas[$idioma]['lang'] ?>">

<head>
<?php include_once 'modulos/meta.php';?>
    <title>Colores</title>
      
</head>

<body>
<?php include_once 'modulos/header.php';?>
    <main class="main-index">
        <section>
            <img src="img/<?= $imagenes[$num_random]['src']?>" alt="<?= $imagenes[$num_random]['alt']?>">
        </section>
        <section >
<?php
$formulario = $_GET['formulario'] ?? 'login';

switch ($formulario) {
    case "login":
        include_once 'formularios/form_login.php';
        break;
    case "crear_cuenta":
        include_once 'formularios/form_crear_usuario.php';
        break;
    case "reset":
        include_once 'formularios/form_reset_password.php';
        break;
}

?>
           
        </section>
    </main>

    <script src="js/index.js"></script>
</body>

</html>
<?php
