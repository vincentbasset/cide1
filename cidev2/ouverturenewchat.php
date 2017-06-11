<?php

    session_start();
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}

    $reponse1 = $bdd -> prepare('INSERT INTO chatroom VALUES(NULL)');
    $reponse1 -> execute();
    $room = $bdd ->LastInsertId();
    $reponse2 = $bdd -> prepare('INSERT INTO chatdans VALUES(:idu, :idr, "black")');
    $reponse2 -> execute(['idu'=>$_GET['id'], 'idr'=>$room]);
    $reponse3 = $bdd -> prepare('INSERT INTO chatdans VALUES(:idu, :idr, "black")');
    $reponse3 -> execute(['idu'=>$_SESSION['id'], 'idr'=>$room]);
?>

<div id="<?php echo $room ?>" class="col-sm-2">   
<?php include 'chat.php'; ?>
</div>