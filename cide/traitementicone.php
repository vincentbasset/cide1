<?php
	session_start();
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}
	
	if(isset($_POST["envoyer"])){
		
        if(empty($_FILES['icone']['name']) && $_FILES['icone']['error']>0){
			$icone = "image/icone.jpg";			
		}
		else{
			$dossier = 'image/';
			$fichier = basename($_FILES['icone']['name']);
			$taille_maxi = 5000000;
			$taille = filesize($_FILES['icone']['tmp_name']);
			$extensions = array('.png', '.gif', '.jpg', '.jpeg');
			$extension = strrchr($_FILES['icone']['name'], '.'); 
			//Début des vérifications de sécurité...
			if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
			{
				 echo"<script>alert('Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...')</script>";
			}
			if($taille>$taille_maxi)
			{
				 echo"<script>alert('Le fichier est trop gros...')</script>";
			}
			$fichier = "icone_id=".$_GET['id'].$extension;
			move_uploaded_file($_FILES["icone"]["tmp_name"],$dossier.$fichier);
			$icone= $dossier.$fichier;
		}                     
        try{ 
            $insertion = $bdd->prepare("UPDATE groupe SET icone=:icone WHERE id=:id");
			$insertion->execute(["icone"=>$icone,"id"=>$_GET['id']]);  
        }
        catch(PDOException $erreur) {
            if ($verbose) {
                echo '<body onLoad="alert(\''.$erreur->getMessage().'\')">';
            } else {
                echo '<body onLoad="alert(\'Ce service est momentanément indisponible. Veuillez nous excuser pour la gêne occasionnée.\')">';
            }
        
		}
	}else{
        //echo '<body onLoad="alert(\'Fichier incompatible\')">';
    }
echo '<meta http-equiv="refresh" content="0;URL=groupe.php?id='.$_GET['id'].'">'; 
	
?>