<?= $this->extend('Layouts/mainLayout') ?>

<?= $this->section('conteudo') ?>

<header class="container" style="background-image:url('<?=base_url('img/eyejpg.jpg')?>'); border-bottom:solid 1px white; background-position: center; background-repeat:no-repeat; background-color: white;
    height: 176px;
    border-radius: 29px;
    margin-top: 17px;">
    <div class="row">
        <div class='p-3'></div>
        <h3>All List</h3>
    </div>
    <div class="col text-right">
        <a href="<?php echo site_url('main/newJob') ?>" class="btn btn-dark" style="margin-top:35px">Criar nova tarefa</a>
    </div>
</header>

<hr>

<?php if (count($jobs) == 0) : ?>
    <p style="text-align:center;"><strong>Não existe tarefa.</strong></p>
<?php else : ?>
    <?php ?>
    
<div class="container">
    <table class="table table-striped table-sm" style="text-align:center ;">
        <thead class="table-dark">
            <tr>
                <th>Tarefa</th>
                <th>Data de Criação</th>
                <th>Data de Finalização</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job):?>
                <tr>
                   <td><?=$job->job?></td> 
                   <td><?=$job->dateTimeCreated?></td> 
                   <td><?=$job->dateTimeFinished?></td>
                   <td>
                       <!-- Tarefa Realizada -->
                       <?php if(empty($job->dateTimeFinished)): ?>
                       <a href="<?= site_url('main/jobDone/'.$job->idJob) ?>" class="btn btn-success btn-sm mx-2">&#10004;</a>
                       <?php else: ?>
                        <span class="btn mx-2 btn-light btn-sm">&#10060;</span>
                       <?php endif; ?>
                       
                       <!-- Editar Tarefa -->
                       <?php if(empty($job->dateTimeFinished)): ?>
                       <a href="<?= site_url('main/editJob/'.$job->idJob) ?>" class="btn btn-outline-success btn-sm mx-2">&#9998;</a>
                       <?php else:?>
                         <span class="mx-2 btn btn-outline-danger btn-sm">&#9998; </span>
                       <?php endif;?>

                        <!-- Excluir Tarefa -->
                       <a href="<?= site_url('main/deleteJob/'.$job->idJob)?>" class="btn btn-outline-warning btn-sm mx-2">🗑</a>
                  
                   </td>
                </tr>
            <?php endforeach;?>
        </tbody>
        <p>N° de Tarefas: <strong><?php echo count($jobs); ?></strong></p>
    </table>
<?php endif; ?>
<?= $this->endSection() ?>
</div>