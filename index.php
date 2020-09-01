<?php
    $page='index';
    require ('inc/connect.php');
    include ('inc/functions.php');


?>
<?php
require('assets/head.php');
include('assets/nav.php'); 
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron jumbotron-fluid col-md-12 text-center my-4">
                    <h1 class="display-4">Bienvenue sur Stuliday !</h1>
                   
                    <?php if(empty($_SESSION)){ ?> <p class="lead"> <br> <a href ='login.php'> Connectez-vous </a>ou<a href ='login.php'> Inscrivez-vous</a></p> <?php } ?>
                     <p><?= shorten_text('Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero ipsum impedit rerum magni fugit iusto perspiciatis repellat ab, totam eveniet commodi sit ');?></p>
                    <hr class="my-4">
                    <img class="d-bloc w-100" src="<?= random_images(1920,1080); ?>" alt="randomly generated image"/> 
                </div>
        </div>
    </div>
</section>
<?php require('assets/footer.php'); ?>