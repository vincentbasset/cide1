<?php
	session_start();
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}
	if(isset($_POST["envoyer"])){
		
        if(empty($_FILES['photo']['name']) && $_FILES['photo']['error']>0){
			$photo = "image/profil.jpg";			
		}
		else{
			$dossier = 'image/';
			$fichier = basename($_FILES['photo']['name']);
			$taille_maxi = 5000000;
			$taille = filesize($_FILES['photo']['tmp_name']);
			$extensions = array('.png', '.gif', '.jpg', '.jpeg');
			$extension = strrchr($_FILES['photo']['name'], '.'); 	//recherche de l'extenstion de base
			//Début des vérifications de sécurité...
			if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
			{
				 alert('Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...');
			}
			if($taille>$taille_maxi)
			{
				 alert('Le fichier est trop gros...');
			}
			$fichier = "photo_id=".$_SESSION['id'].$extension;
			move_uploaded_file($_FILES["photo"]["tmp_name"],$dossier.$fichier);
			$photo= $dossier.$fichier;
		}                     
        try{ 
            $insertion = $bdd->prepare("UPDATE utilisateur SET photo=:photo WHERE id=:id");
			$insertion->execute(["photo"=>$photo,"id"=>$_SESSION['id']]);   
        }
        catch(PDOException $erreur) {
            if ($verbose) {
                echo '<body onLoad="alert(\''.$erreur->getMessage().'\')">';
            } else {
                echo '<body onLoad="alert(\'Ce service est momentanément indisponible. Veuillez nous excuser pour la gêne occasionnée.\')">';
            }
        
		}
	}else{
        echo '<body onLoad="alert(\'Fichier incompatible\')">';
    }
echo '<meta http-equiv="refresh" content="0;URL=profil.php">';
	
?>