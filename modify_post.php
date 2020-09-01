<?php

require('inc/connect.php');



    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];

         $title  = htmlspecialchars ($_POST['title']);
         $description = htmlspecialchars($_POST['description']);
         $city = htmlspecialchars($_POST['city']);
         $category = htmlspecialchars($_POST['category']);
         $image_url = $_FILES['image_url'];
         $adresse_article = htmlspecialchars($_POST['adresse_article']);
         $price = htmlspecialchars($_POST['price']);
         $start_date = htmlspecialchars($_POST['start_date']);
         $end_date = htmlspecialchars($_POST['end_date']);
  
     
         if(isset($image_url) && $image_url['error'] == 0) {
            if($image_url['size'] <= 1024000){
                $picture = uniqid().'_'.$image_url['name'];
                $extensionUpload = $image['extension'];
                $extensionsAllowed =['jpg','jpeg','gif','png'];
                if(in_array($extensionUpload, $extensionsAllowed)){
                    move_uploaded_file($image_url['tmp_name'], 'assets/upload' .basename($image_url['name']));
                    echo "Le fichier a bien été envoyé!";
                }else{
                    echo "Somtething went wrong";
                }
            }
        }


        $sth = $db->prepare("UPDATE annonces SET title=:title, description=:description, city=:city, category=:category, image_url=:image_url, address_article=:adresse_article, price=:price, start_date=:start_date, end_date=:end_date WHERE id=$id");
    
            $sth->bindValue(':title', $title);
            $sth->bindValue(':description',$description);
            $sth->bindValue(':city',$city);
            $sth->bindValue(':category',$category);
            $sth->bindValue(':image_url',$picture);
            $sth->bindValue(':adresse_article',$adresse_article);
            $sth->bindValue(':price',$price);
            $sth->bindValue(':start_date',$start_date);
            $sth->bindValue(':end_date',$end_date);
      
    
            $sth->execute();




            header('Location: profile.php');
    }else{
        echo 'Un problème est survenu !';
        echo '<a class="btn btn-danger col" href="index.php">Retour à la page d\'inscription</a>';
    }
        
    ?>
