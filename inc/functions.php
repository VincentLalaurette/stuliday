<?php

function random_images($h,$w){

    echo "https://loremflickr.com/$h/$w/houses,cottage";
}

function shorten_text($text, $max = 120, $append= '&hellip;'){
    if (strlen($text)<=$max) return $text;
    $return = substr($text,0,$max);
    if(strpos($text,' ')===false) return $return .$append;
    return preg_replace('/\w+$/','', $return) . $append;
}

function displayAllUsers(){
    global $db;
    $sql=$db->query("SELECT * FROM users ");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    while($row = $sql->fetch()){

        ?>

        <div class = "col-4">

            <div class="card p-3 ">
                <h2>User n°<?=$row ['id'] ;?></h2>

                <p><?= $row['email'];?></p>

            </div>
        </div>
<?php
    }

    }


    //faire la fonction displayannonce avec toutes les annonces et avec user et utilisdateur //
    function displayannonces(){
            global $db;
            $sql=$db->query("SELECT * FROM annonces WHERE active = 1");
            $sql->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $sql->fetch()){

            ?>
                <div class="card p-3 m-2 col-5" style="max-width:35rem;">
                    <img class="card-img-top img-fluid img-thumbnail" src="assets/uploads/<?= $row['image_url'];?>" alt="image de l'annonce n°<?= $row['id'];?>"/>
                    <h2>Annonce n°<?=$row ['id'] ;?></h2>
                    <p><?= $row['title'];?></p>
                    <a href="affichageannonce.php?id=<?= $row['id'];?> "  class="btn btn-primary mb-3" class="badge badge-primary badge-pill" >Cliquer ici</a>
                    <a href="reservations.php?id=<?= $row['id'];?>"  class="btn btn-primary mb-3" class="badge badge-primary badge-pill" >Réserver</a>
                </div>
    <?php
        }

    }
    

    function displayafficheannonce($id){
            global $db;
            $sql=$db->query("SELECT * FROM annonces WHERE id = $id");
            $sql->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $sql->fetch()){

 ?>
 <div class="container" >
        <div class = "col-12">

            <div class="card p-3 text-center">
                <img class="img-fluid" src="assets/uploads/<?= $row['image_url'];?>" alt="image de l'annonce n°<?= $row['id'];?>"/>
                <h2>Annonce n°<?=$row ['id'] ;?></h2>

                <p><?= $row['title'];?></p>
                <p><?= $row['description'];?></p>
                <p><?= $row['city'];?></p>
                <p><?= $row['image_url'];?></p>
                <p><?= $row['address_article'];?></p>
                <p><?= $row['price'];?></p>
                <p><?= $row['author_article'];?></p>
                <p><?= $row['start_date'];?></p>
                <p><?= $row['end_date'];?></p>

            
            <a href="annonces.php" class="btn btn-primary mb-3" class="badge badge-primary badge-pill" >retour</a>
            <a href="reservations.php?id=<?= $row['id'];?>"  class="btn btn-primary mb-3" class="badge badge-primary badge-pill" >Réserver</a>
            </div>
        </div>
        </div>
  <?php
    }                                                                   
    }
?>


<?php



//Affichage des annonces par l'utilisateur sur la page de profil( une autre fonction) qui incluent deux boutons edit et delete.
//*8*- codes les delete et edit (nouvelles fonctions).

    function annonceUser($userid) {
        $userid = $_SESSION['id'];
            global $db;
            $sql=$db->query("SELECT * FROM annonces WHERE author_article = $userid");
            $sql->setFetchMode(PDO::FETCH_ASSOC);
        
            while($row = $sql->fetch()){
                
                ?>
                <div class="card p-3 m-2 col-5" style="max-width:35rem;">
                    <img class="card-img-top img-fluid img-thumbnail" src="assets/uploads/<?= $row['image_url'];?>" alt="image de l'annonce n°<?= $row['id'];?>"/>
                    <h2>Annonce n°<?=$row ['id'] ;?></h2>
                    <p><?= $row['title'];?></p>


                    
                    <a href="modify.php?id=<?= $row['id'];?>" class="btn btn-primary mb-3"  >
                    Modifier edit <span class="badge badge-primary badge-pill"></span></a>

                    <a href="delete_post.php?id=<?= $row['id'];?>" class="btn btn-primary mb-3"  >
                    Delete supprimer <span class="badge badge-primary badge-pill"></span></a>

                    
                </div>
    <?php
         
            }
    
        }




            //faire la fonction displayannonce pour la partie réservation //

 
            function displayreservation(){
                global $db;
                $sql=$db->query("SELECT * FROM reservations");
                $sql->setFetchMode(PDO::FETCH_ASSOC);
        
            while($row = $sql->fetch()){
        
                ?>
                    <div class="card p-3 m-2 col-5" style="max-width:35rem;" >
                        <h2>Réservation n°<?=$row ['id'] ;?></h2>
                        <a href="affichageannonce.php?id=<?= $row['id_annonce'];?>">Voir la réservation</a>
                    </div>
        <?php
            }
        
        }

        echo 'mise à jour';
        
        