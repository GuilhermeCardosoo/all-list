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
        <h3 style="margin-top:35px" >Nova Tarefa</h3>
    </div>
</header>
<hr>
<?php
helper('form');
echo form_open('main/newJobSubmit')
?>

<div class="container">
    <div class="row">
        <div class="col-4 offset-4">
            <div class="form-group">
                <label> Tarefa: </label>
                <input name="jobName" type="text" placeholder="Nome da tarefa" class="form-control" required>
            </div><br>
            <div>
                <a class="btn btn-secondary" href="<?= site_url('main')?>">Voltar</a>

                <input type="submit" value="Gravar" class="btn btn btn-dark" style="float:right;">
            </div>
        </div>
    </div>
</div>

<?= form_close() ?>

<?= $this->endSection() ?>