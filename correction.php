<?php
   
   require('inc/connect.php');

    
    if(isset($_POST['submit'])  ){

        var_dump($_POST);
        var_dump($_FILES);
        
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $city = htmlspecialchars($_POST['city']);
        $category = htmlspecialchars($_POST['category']);
        $file =  $_FILES['image_url'];
        $adresse_article = htmlspecialchars($_POST['adresse_article']);
        $price = htmlspecialchars($_POST['price']);
        $start_date =  ($_POST['start_date']);
        $end_date = ($_POST['end_date']);
        $user_id = $_SESSION['id'];

        if($file['size'] <= 1000000){

            $valid_ext=array('jpg','jpeg','gif','png');
            $check_ext = strtolower(substr(strrchr($file['name'], '.'),1));

            echo 'check size ok';

            if(in_array($check_ext, $valid_ext)){

                echo 'check ext ok';

                $imgname  = uniqid() .'_' . $file['name'];
                $upload_dir = "./assets/uploads/";
                $upload_name = $upload_dir .$imgname;
                $move_result = move_uploaded_file($file['tmp_name'], $upload_name);
                

                if($move_result){


                    echo 'check upload ok';


                    $sth = $db->prepare("INSERT INTO annonces(title,description,city,category,image_url,address_article,price,author_article,start_date,end_date) VALUES (:title,:description,:city,:category,:image_url,:adresse_article,:price,:author_article,:start_date,:end_date)");
                
                    
                        $sth->bindValue(':title', $title);
                        $sth->bindValue(':description', $description);
                        $sth->bindValue(':city', $city);
                        $sth->bindValue(':category', $category);
                        $sth->bindValue(':image_url', $imgname);
                        $sth->bindValue(':adresse_article', $adresse_article);
                        $sth->bindValue(':price', $price);
                        $sth->bindValue(':author_article', $user_id);
                        $sth->bindValue(':start_date', $start_date);
                        $sth->bindValue(':end_date', $end_date);
                        
                        
                        $sth->execute();
                        echo '<div class="alert alert-info"> Vous avez bien été ajouté à la base de données</div>';
                        echo '<a class="btn btn-success col" href="index.php">Retour à la page d\'accueil</a>';
                }else{
                        echo 'Un problème est survenu !';
                        echo '<a class="btn btn-danger col" href="create anonce.php">Retour à la page d\'inscription</a>';
                }
            }
        }
    }

include('assets/footer.php');
