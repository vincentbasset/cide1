<?php
	session_start();
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}
	if(isset($_POST["envoyer"])){
		if(!empty($_POST["description"])){
			$description = $_POST["description"];
		}
		else{
			$description = NULL;
		}                           
        try{ 
            $insertion = $bdd->prepare("UPDATE utilisateur SET description=:description WHERE id=:id");
			$insertion->execute(["description"=>$description,"id"=>$_SESSION['id']]); 
			//header ('location: index.php');  
        }
        catch(PDOException $erreur) {
            if ($verbose) {
                echo '<body onLoad="alert(\''.$erreur->getMessage().'\')">';
            } else {
                echo '<body onLoad="alert(\'Ce service est momentanément indisponible. Veuillez nous excuser pour la gêne occasionnée.\')">';
            }
        
		}
	}
echo '<meta http-equiv="refresh" content="0;URL=profil.php">';
	
?>