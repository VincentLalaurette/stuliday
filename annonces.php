<?php 
    $page='annonce';
    require('inc/connect.php');
    require('inc/functions.php');
    require('assets/head.php');
    
    include('assets/nav.php');

?>
<section>
    <div class="container">
        <div class="row">  
            <h1>Liste des annonces :</h1>
        </div>
        <div class="row justify-content-center">
            <?= displayannonces(); ?>
        </div>
    </div>
</section>
<?php require('assets/footer.php'); ?>