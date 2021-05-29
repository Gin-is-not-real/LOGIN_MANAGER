<?php 
$title = '';
ob_start();
?>

<main id="main-home">
    <p>HOME VIEW HERE !</p>

    <!-- activer le mode admin -->
    <div id="div-admin-door">
        <p>test</p>
        <input class="round-btn super blue " id="btn-admin-mode" type="button" name="action" value="ADMIN">
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('parts/template.php'); ?>