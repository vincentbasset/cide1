
<?php
	include("header.php");
?>

<?php
	$visible=0;
	$important=0;

	if(isset($_POST["envoyer"])){
		if(!empty($_POST["message"])){
			if(isset($_POST["public"])){
				$visible=1;	
			}
			if(isset($_POST['important'])){
				$important=1;	
			}
			$message = $_POST["message"];
			$insertion = $bdd->prepare("INSERT INTO post VALUES(NULL,:iduser,:idgroupe,0,0,:visible,:important,:message,:lien,CURRENT_TIMESTAMP, :fichier)");
			$insertion->execute(['iduser' => $_SESSION['id'] , 'idgroupe' => $_GET['id'] , 'visible' => $visible , 'important' => $important, 'message' => $message, 'lien'=> $_POST['lien'], 'fichier'=>null ]);
            $idpost=$bdd->lastInsertId();
            if(empty($_FILES['photo']['name']) && $_FILES['photo']['error']>0){
                $photo = null;
            }
            else{
                $dossier = 'image/';
                $fichier = basename($_FILES['photo']['name']);
                $taille_maxi = 5000000;
                $taille = filesize($_FILES['photo']['tmp_name']);
                //Début des vérifications de sécurité...
                $fichier = $dossier."doc_id".$idpost."_".$fichier;
                if(strlen($fichier)>100) //Si l'extension n'est pas dans le tableau
                {
                     alert('Vous devez uploader un fichier avec un nom plus court');
                }
                if($taille>$taille_maxi)
                {
                     alert('Le fichier est trop gros...');
                }
                move_uploaded_file($_FILES["photo"]["tmp_name"],$fichier);
                $photo= $fichier;
            }
            $insertion = $bdd->prepare("UPDATE post SET fichier=:fichier WHERE id=:id");
            $insertion->execute(["fichier"=>$photo,"id"=>$idpost]);
		}
	}
	echo '<meta http-equiv="refresh" content="0;URL=groupe.php?id='.htmlspecialchars($_GET["id"]).'">';
?>

</div>
</body>
</html>
