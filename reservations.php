<?php 
   
    require('inc/connect.php');
    require('inc/functions.php');
    require('assets/head.php');
    include('assets/nav.php');

    $id = $_GET['id'];

?>

<div class="container text-center">
    <h2> Voulez vous faire cette réservation ? </h2>
    <a class = 'btn btn-success' href="reservation_post.php?id=<?= $id; ?>"> OUI </a>
    <a class = 'btn btn-danger' href="annonces.php"> NON </a>
</div>