<?php
require 'config.php';
require 'dao/DaoMysql.php';

$usuarioDao = new DaoMysql($pdo);
$id = filter_input(INPUT_POST,'id');
$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);

if($id && $name && $email) {
    $usuario = $usuarioDao->findById($id);
    $usuario->setNome($name);
    $usuario->setEmail($email);
    $dao = new DaoMysql($pdo);
    $dao->update($usuario);
    header("Location: index.php");
    exit;  
} else {
    header("Location: editar.php".$id);
    exit;
}

