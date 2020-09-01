<?php
   
   require('inc/connect.php');
   $user_id = $_SESSION['id'];
   $annonce_id = $_GET['id'];
    
    if(isset($_GET['id'])){
        
        $sth = $db->prepare("INSERT INTO `reservations`(`id_user`, `id_annonce`) VALUES ($user_id,$annonce_id)");
        
    
        $sth->execute();
        
        $sth2 = $db->prepare("UPDATE annonces SET active = 0 WHERE id = $annonce_id"); 
        
        $sth2->execute();
    }




?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
