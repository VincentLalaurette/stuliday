<?php 
    $page='afficheannonce';
    require('inc/connect.php');
    require('inc/functions.php');
    require('assets/head.php');
    include('assets/nav.php');

    $id = $_GET['id'];

 ?>

 <?php displayafficheannonce($id); ?>

    