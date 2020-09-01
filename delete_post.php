<?php



require('inc/connect.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id= htmlspecialchars($_GET['id']);
        $sth = $db->prepare('DELETE FROM annonces WHERE id =?'); 
        $sth->bindValue(1, $id);
            $sth->execute();

            header('Location: profile.php');
}