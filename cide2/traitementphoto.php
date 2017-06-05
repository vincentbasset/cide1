<?php
	session_start();
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}
	if(isset($_POST["envoyer"])){
        if(empty($_FILES['photo']['name'])){
			$photo = "image/profil.jpg";			
		}
		else{
			$dossier = "image/";
			$fichier = "photo_id=".$_SESSION['id'];
			move_uploaded_file($_FILES["photo"]["tmp_name"],$dossier.$fichier);
			$photo= $dossier.$fichier;
		}                     
        try{ 
            $insertion = $bdd->prepare("UPDATE utilisateur SET photo=:photo WHERE id=:id");
			$insertion->execute(["photo"=>$photo,"id"=>$_SESSION['id']]); 
			//header ('location: index.php');  
        }
        catch(PDOException $erreur) {
            if ($verbose) {
                echo '<body onLoad="alert(\''.$erreur->getMessage().'\')">';
            } else {
                echo '<body onLoad="alert(\'Ce service est momentanément indisponible. Veuillez nous excuser pour la gêne occasionnée.\')">';
            }
        
		}
	}else{
        echo '<body onLoad="alert(\'envoyer\')">';
    }
echo '<meta http-equiv="refresh" content="0;URL=profil.php">';
	
?>