<?php
session_start();
include("conexion.php");
$codigo_captcha = $_POST['captcha'];

if ($codigo_captcha == $_SESSION['codigo_captcha']) {
$nombre_per = $_POST ['nombre']; 
$apellido_per = $_POST ['apellido'];
$funcion_per = $_POST ['funcion'];
//$imagen_per = $_POST ['imagen'];
$descripcion_per = $_POST ['descripcion'];
$estado_per = $_POST ['estado'];
$nombre_img = $_FILES['image']['name'];
echo $nombre_img;
$tamanio_img = $_FILES['image']['size'];
$tipo_img = $_FILES['image']['type'];
echo $tipo_img;
$tmp_img = $_FILES['image']['tmp name'];
$destino =  'imagenes/' . $nombre_img;

if (($tipo_img != 'image/jpeg' && $tipo_img != 'image/jpg' && $tipo_img != 'image/png' && $tipo_img != 'image/gif') or $tamanio_img > 2000000){
    header("Location: cargar.php?error");
    }else{
        move_uploaded_file($tmp_img, $destino);
        mysqli_query($conexion_db, "INSERT INTO componentes VALUES (DEFAULT, '$nombre_per', '$apellido_per', '$funcion_per' , '$nombre_img' , '$descripcion_per' , '$estado_per')");
        header("Location:cargar.php?ok");
        mysqli_close($conexion_db);
    }
} else {
header("Location:cargar.php?error_codigo");
}
?>