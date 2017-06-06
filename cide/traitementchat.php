<?php
include "header.php";
if(isset($_POST['envoyer'])){
    if(isset($_POST['message'])){
        $insertion=$bdd->prepare('INSERT INTO chat VALUES(NULL,:envoyeur,:recepteur,:message,NULL,NULL)');
        $insertion->execute(['envoyeur'=>$_SESSION['id'],'recepteur'=>$_GET['id'],'message'=>$_POST['message']]);
    }
}
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
?>