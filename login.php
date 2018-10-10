<?php

session_start(); // inicia la sesion del navegador en el servidor php
                 //o la continua si ya estuviera iniciada


include ('./misFunciones.php');

function limpiaPalabra($palabra){
    $palabra = trim($palabra, "'");
    $palabra = trim($palabra, " ");
    $palabra = trim($palabra, "-");
    $palabra = trim($palabra, "`");
    $palabra = trim($palabra, '"');
    return $palabra;
}



$mysqli = conectaBBDD();

$cajaNombre = limpiaPalabra( $_POST['cajaNombre']);

$cajaPassword = limpiaPalabra( $_POST['cajaPassword']);
    

//filtro super basico para evitar la inyeccion sql
//    $cajaNombre = trim($cajaNombre, "'");
//    $cajaPassword = trim($cajaPassword, "'");
//    $cajaNombre = trim($cajaNombre, " ");
//    $cajaPassword = trim($cajaPassword, " ");
//    $cajaNombre = trim($cajaNombre, "-");
//    $cajaPassword = trim($cajaPassword, "-");

// echo 'Has escrito el usuario: '.$cajaNombre.' y la contraseña: '.$cajaPassword;
$resultadoQuery = $mysqli ->query(" SELECT * FROM usuarios WHERE nombreUsuario = '$cajaNombre' AND userPassword = '$cajaPassword' ");

$numUsuarios = $resultadoQuery -> num_rows;

if($numUsuarios > 0){
    $r = $resultadoQuery -> fetch_array();
    //muestro la pantalla de la aplicacion
    $_SESSION['nombreUsuario'] = $cajaNombre;
    
    //en la variable de sesion idUsuario guardo el id de usuario leido de la BBDD
    $_SESSION['idUsuario'] = $r['idUsuario'];
    
    //muestro la pantalla de la aplicacion
    require 'app.php';
}
else{
    //muestro una pantalla de error
    require 'error.php';
}