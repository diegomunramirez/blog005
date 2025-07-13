<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<section>
    <h1>Id to edit: <?= $id ?></h1>

    <form action="">
        <fieldset>
            <legend>Titulo</legend>
            <input type="text">
        </fieldset>

        <fieldset>
            <legend>Contenido</legend>
            <input type="text">
        </fieldset>
    </form>
</section>

<?= $this->endSection('') ?>