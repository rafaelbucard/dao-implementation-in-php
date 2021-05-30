<?php
require 'config.php';
require 'dao/DaoMysql.php';

$usuarioDao = new DaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id) {
    $usuarioDao->delete($id);
} 
header("Location: index.php");
exit;
