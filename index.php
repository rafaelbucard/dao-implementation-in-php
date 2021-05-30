<?php
require 'config.php';
require 'dao/DaoMysql.php';

$usuarioDao = new DaoMysql($pdo);
$lista = $usuarioDao->findAll();

?> 

<a href="add.php">ADICIONAR USUÁRIO</a>

<table border = "1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th> 
        <th>AÇOES</th> 
    </tr>

    <?php foreach($lista as $usuario): ?>
        <tr>
            <td><?=$usuario->getId();?></td>
            <td><?=$usuario->getNome();?></td>
            <td><?=$usuario->getEmail();?></td>
            <td>
                <a href="editar.php?id=<?=$usuario->getId();?>">[ Editar ]</a>
                <a href="excluir.php?id=<?=$usuario->getId();?>" onclick="return confirm('Tem certeza que quer excluir o item?')">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>