<?php

require('inc/connect.php');

$servername = "localhost"; $dbname="pdodb";$user="root"; $pass='';
try{
$db = new PDO("mysql:host=$servername;dbname=$dbname",$user,$pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}catch(Exception $ex){
    echo "Error : " . $ex->getMessage();
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id= htmlspecialchars($_GET['id']);

    $sth = $db->prepare('SELECT prenom,nom,mail FROM users WHERE id =?');
    $sth->bindValue(1, $id);

    $sth->execute();

    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>Modification</title>
</head>
<body>
<div class="container">
        <h1> Modifier votre annonce ! </h1>
                <form method="post" action="modify_post.php?id=<?= $_GET['id']; ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="2">title</label>
                        <input type="text" class="form-control" id="2" name="title" placeholder="title">
                    </div>
                    <div class="form-group">
                        <label for="3">description</label>
                        <input type="description" class="form-control" id="3" name="description" placeholder="description">
                    </div>
                    <div class="form-group">
                        <label for="4">city</label>
                        <input type="city" class="form-control" id="4" name="city" placeholder="city">
                    </div>

                    <div class="form-group">
                        <label for="5">category</label>
                        <input type="text" class="form-control" id="5" name="category" placeholder="category">
                    </div>

                    <div class="form-group">
                        <label for="6">image_url</label>
                        <input type="file" class="form-control" id="6" name="image_url" placeholder="image_url">
                    </div>

                    <div class="form-group">
                        <label for="7">adresse_article</label>
                        <input type="text" class="form-control" id="7" name="adresse_article" placeholder="adresse_article">
                    </div>

                    <div class="form-group">
                        <label for="8">price</label>
                        <input type="number" class="form-control" id="8" name="price" placeholder="price">
                    </div>

                    <div class="form-group">test 
                        <label for="9">starting date</label>
                        <input type="date" class="form-control" id="9" name="start_date" placeholder="starting date">
                    </div>

                    <div class="form-group">
                        <label for="10">ending date</label>
                        <input type="date" class="form-control" id="9" name="end_date" placeholder="ending date">
                    </div>




                    <input type="submit" class="btn btn-primary col" value="Valider la  annonce" name="submit"  />
                </form>
    </div>

            </form>

</div>

</body>
</html>
