<?php
require 'config.php';
require 'dao/DaoMysql.php';

$userDao = new DaoMysql($pdo);
$list = $userDao->findAll();

?>
<main >
    <section class="d-flex  ">
        <a href="create.php">
            <button class="btn btn-success">Novo Orçamento</button>
        </a>
        <a href="index.php">
             <button class="btn btn-primary align-items-end ml-2">Limpar pesquisa</button>
        </a>
    </section>
    <section class="d-flex">
        <form method="get" class="d-flex align-items-end" >
            <div class="row my-4">
                <div class="col ">
                    <label>Buscar Mecânico</label>
                    <input type="text" name="search" class="form-control" value="">
                </div>
                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary mt-1">Filtrar</button>
                </div>
            </div>
        </form>
        <form method="get" class="d-flex align-items-end">
            <div class="row my-4">
                <div class="col ml-2">
                    <label>Buscar Cliente</label>
                    <input type="text" name="searchClient" class="form-control" value="">
                 </div>
                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary mt-1">Filtrar</button>
                </div>
            </div>
        </form>
        <form method="get" class="d-flex align-items-end">
            <div class="row my-4">
                <div class="col ml-2">
                    <label>Por Data</label>
                    <select name="date" class="form-control">
                       
                    </select>
                 </div>
                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary mt-1">Filtrar</button>
                </div>
            </div>
        </form>
    </section>
    <section>
        <table class="table bg-light text-dark table-responsive mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mecânico</th>
                    <th>Cliente</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Status</th>
                    <th>Data e Hora</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody >
            <?php foreach($list as $usuario): ?>
                <tr>
                    <td><?=$usuario->getId();?></td>
                    <td><?=$usuario->getName();?></td>
                    <td><?=$usuario->getClient();?></td>
                    <td><?=$usuario->getDesc();?></td>
                    <td><?=$usuario->getPrice();?></td>
                    <td><?=($usuario->getStatus() == 's' ? 'Concluido' : 'Em andamento');?></td>
                    <td><?=date('d/m/Y à\s H:i:s',strtotime($usuario->getDate()));?></td>
                    <td class="d-flex">
                        <a href="edit.php?id=<?=$usuario->getId();?>">
                             <button type="button" class="btn btn-primary">Editar&nbsp;</button>
                        </a>
                        <a href="delete.php?id=<?=$usuario->getId();?>" onclick="return confirm('Tem certeza que quer excluir o item?')">
                             <button type="button" class="btn btn-danger align-items-end ml-2 ">Excluir</button>
                        </a>
                    </td>
                </tr>
    <?php endforeach; ?>

             </tbody>    
        </table>
    </section>
</main>