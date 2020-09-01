<?php
   
   require('inc/connect.php');

    
    if(!empty($_POST['title']) && !empty($_POST['description']) && ($_POST['city'])&& ($_POST['category'])&& ($_POST['image_url'])&& ($_POST['adresse_article'])&& ($_POST['price']) && ($_POST['start_date']) && ($_POST['end_date'])   ){
        
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $city = htmlspecialchars($_POST['city']);
        $category = htmlspecialchars($_POST['category']);
        $image_url = htmlspecialchars($_POST['image_url']);
        $adresse_article = htmlspecialchars($_POST['adresse_article']);
        $price = htmlspecialchars($_POST['price']);
        $start_date = htmlspecialchars($_POST['start_date']);
        $end_date = htmlspecialchars($_POST['end_date']);
        

        if(isset($_FILES['picture']) && $_FILES['image']['error'] == 0) {
            if($_FILES['picture']['size'] <= 1024000){
                $picture = pathinfo($_FILES['picture']['name']);
                $extensionUpload = $image['extension'];
                $extensionsAllowed =['jpg','jpeg','gif','png'];
                if(in_array($extensionUpload, $extensionsAllowed)){
                    move_uploaded_file($_FILES['picture']['tmp_name'], 'assets/upload' .basename($_FILES['picture']['name']));
                    echo "Le fichier a bien été envoyé!";
                }else{
                    echo "Somtething went wrong";
                }
            }
        }




        $sth = $db->prepare("INSERT INTO users(id,title,description,city,category,image_url,adresse_article,price,publish_date) VALUES (?,?,?,?,?,?,?,?,?)");
    
           
            $sth->bindValue(1, $title);
            $sth->bindValue(2, $description);
            $sth->bindValue(3, $city);
            $sth->bindValue(4, $category);
            $sth->bindValue(5, $image_url);
            $sth->bindValue(6, $adresse_article);
            $sth->bindValue(7, $price);
            $sth->bindValue(8, $start_date);
            $sth->bindValue(8, $end_date);
            
            
            $sth->execute();
            echo '<div class="alert alert-info"> Vous avez bien été ajouté à la base de données</div>';
            echo '<a class="btn btn-success col" href="index.php">Retour à la page d\'accueil</a>';
        }else{
            echo 'Un problème est survenu !';
            echo '<a class="btn btn-danger col" href="create anonce.php">Retour à la page d\'inscription</a>';
        }
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
