<?php

// Llamar a la conexión una vez
require_once 'controlador/connection.php';

// 1. Definir la sentencia preparada
$delete = "DELETE FROM colores WHERE id_color = ?;";
// 2. Preparación
$delete_pre = $conn->prepare($delete);
// 3. Ejecución
$delete_pre->execute([$_GET['id']]);

$delete_pre = null;
$conn = null;

// Volver a casa -> index.php
header('location: colores.php');