<?php

session_start();
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}
	$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    if(isset($_POST['usermsg'])){
        $idu=$_SESSION['id'];
        $idr=$_GET['room'];
        $message=$_POST['usermsg'];
        $insertion=$bdd->prepare('INSERT INTO chatmsg VALUES(NULL,:idu,:idr,:message,CURRENT_TIMESTAMP)');
        $insertion->execute(['idu' => $idu, 'idr' => $idr, 'message' => $message]);
       
    }
?>
 <p>INSERT INTO chatmsg VALUES(NULL,<?php echo $_SESSION['id'] ?>,<?php echo $_GET['room'] ?>,<?php echo $_POST['usermsg'] ?>,CURRENT_TIMESTAMP)</p>