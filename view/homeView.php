<?php 
$title = '';
ob_start();
?>

<main id="main-home">
<p>HOME VIEW HERE !</p>

</main>

<?php $content = ob_get_clean(); ?>
<?php require('parts/template.php'); ?>