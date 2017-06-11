<?php
    include "header.php";
    
    $reponse = $bdd -> prepare('DELETE FROM chatdans WHERE idutil=:idu AND idroom=:idr');
    $reponse -> execute(['idu'=>$_SESSION['id'], 'idr'=>$_GET['room']]);



?>