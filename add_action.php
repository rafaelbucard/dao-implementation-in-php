<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);





$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);

if($name && $email){

    if($usuarioDao->findByEmail($email)=== false){

    }
    //Condição simples para evitar duplicação de e-mail
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email',$email);
    $sql->execute();

    if($sql->rowCount()== 0){
    

    //Montagem da Query
    $sql = $pdo-> prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");
    $sql->bindValue(':name',$name);
    $sql->bindValue(':email',$email);
     // Fim da Montagem da Query
    $sql->execute();
    /*$sql->bindParam(':email',$email); Esse metodo serve para transformar
     todo o parametro  podento ser alterado depois , diferente do metodo bindValue()
     que altera o valor da variavel de maneira permanente*/
     header("Location: index.php");
     exit;
    } else {
        header("Location:add.php");
    exit;
    }
} else {
    header("Location:add.php");
    exit;
}