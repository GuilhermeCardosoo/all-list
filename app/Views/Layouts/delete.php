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
        <h3 style="margin-top:35px">Exluir Tarefa</h3>
    </div>
</header>
<hr>
<?php

helper('form');
echo form_open('main/editJobSubmit')
?>
<div class="container">
    <div class="row">
        <div class="row" style="text-align:center;">
            <h3>Deseja eliminar a tarefa:</h3><br><br>
            <div class="card p-3 bg-light">
              <h4><?=$job->job?></h4>
            </div>

        </div>
    </div>
</div> <br> 
<div class="row">
        <div class="col" style="text-align:center;">
            <a href="<?=base_url('main') ?>" class="btn btn-secondary" style="margin-right: 130px;">Não</a>
            <a href="<?=base_url('main/deleteJobConfirm/'.$job->idJob) ?>" class="btn btn btn-dark">Sim</a>
        </div>
    </div>
</div>
<?= form_close() ?>

<?= $this->endSection() ?>