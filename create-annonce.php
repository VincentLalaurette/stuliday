<?php

require('inc/connect.php');
require('assets/head.php');
include('assets/nav.php');

?>

 
    <div class="container">
        <h1> Create your annonce ! </h1>
                <form method="post" action="correction.php" enctype="multipart/form-data">
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

                    <div class="form-group">
                        <label for="9">starting date</label>
                        <input type="date" class="form-control" id="9" name="start_date" placeholder="starting date">
                    </div>

                    <div class="form-group">
                        <label for="10">ending date</label>
                        <input type="date" class="form-control" id="9" name="end_date" placeholder="ending date">
                    </div>




                    <input type="submit" class="btn btn-primary col" value="ajouter une annonce" name="submit"  />
                </form>
    </div>


</body>
</html>