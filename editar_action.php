<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$id = filter_input(INPUT_POST,'id');
$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);

if($id && $name && $email) {
    $usuario = $usuarioDao->findById($id);
    $usuario->setId($name);
    $usuario->seNtame($name);
    $ususario->setEmail($email);
    $usuario->update($usuario);
    header("Location: index.php");
    exit;  
} else {
    header("Location: editar.php".$id);
    exit;
}

