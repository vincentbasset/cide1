<?php
	session_start();
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}
	if(isset($_POST["envoyer"])){
		
        if(empty($_FILES['cv']['name']) && $_FILES['cv']['error']>0){
			$cv = NULL;			
		}
		else{
			$dossier = 'cv/';
			$fichier = basename($_FILES['cv']['name']);
			$taille = filesize($_FILES['cv']['tmp_name']);
			$extensions = array('.pdf');
			$extension = strrchr($_FILES['cv']['name'], '.'); 
			//Début des vérifications de sécurité...
			if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
			{
				 alert('Vous devez uploader un fichier de type pdf...');
			}
			$fichier = "cv_id=".$_SESSION['id'].$extension;
			move_uploaded_file($_FILES["cv"]["tmp_name"],$dossier.$fichier);
			$cv= $dossier.$fichier;
		}                     
        try{ 
            $insertion = $bdd->prepare("UPDATE utilisateur SET cv=:cv WHERE id=:id");
			$insertion->execute(["cv"=>$cv,"id"=>$_SESSION['id']]); 
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
        echo '<body onLoad="alert(\'Fichier incompatible\')">';
    }
echo '<meta http-equiv="refresh" content="0;URL=profil.php">';
	
?>