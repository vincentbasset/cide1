<?php

	session_start();
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}

	if(isset($_POST["envoyer"])){
		if(!empty($_POST["nom"])){
			$nom = $_POST["nom"];
            
			if(!empty($_POST["prenom"])){
				$prenom = $_POST["prenom"];

				if(!empty($_POST["mail"])){
                    $reponse=$bdd->prepare('SELECT * FROM utilisateur WHERE adresse=:mail');
                    $reponse->execute(['mail' =>$_POST['login']]);
		            $donnees=$reponse->fetch();
		            if ($_POST['mail']==$donnees['adresse']) {
                        echo '<body onLoad="alert(\'Addresse e-mail déjà utilisée\')">';
                    }
                    else {
                        
                        $mail = $_POST["mail"];
                        if(!empty($_POST["date"])){
                            $date = $_POST["date"];
                            if(!empty($_POST["mdp"])){
                                $mdp = $_POST["mdp"];
                                if(!empty($_POST["statut"])){
                                    $statut = $_POST["statut"];
                                    if(!empty($_POST["filiere"])){
                                        $filiere = $_POST["filiere"];
                                        }
                                    else{
                                        $filiere = NULL;
                                    }
                                    if(!empty($_POST["annee"])){
                                        $annee = $_POST["annee"];
                                    }else{
                                        $annee = NULL;
                                    }
                                    
                                    try{
                                       
                                        $insertion = $bdd->prepare("INSERT INTO utilisateur VALUES(NULL, :nom, :prenom, :mail, :pwd, \"image/profil.jpg\", :statut, :filiere,:annee,:date,:cv)");
                                        
                                        $insertion->execute(['nom'=>$nom, 'prenom'=>$prenom,'mail'=>$mail, 'pwd'=>password_hash($mdp , PASSWORD_BCRYPT), 'statut'=>$statut, 'filiere'=>$filiere, 'annee'=>$annee, "date"=>$date, "cv"=>null]); 
                                        
					$id=$bdd->lastInsertId();
                                        if (is_null($filiere) && is_null($annee)){
                                            $groupe=$bdd->query("SELECT id FROM groupe WHERE nom=\"".$statut."\"");
                                            $groupeid=$groupe->fetch();
                                        }
                                        else{
                                            $groupe=$bdd->query("SELECT id FROM groupe WHERE nom=\"".$filiere."-".$annee."\"");
                                            $groupeid=$groupe->fetch();
                                        }
                                        $insertion=$bdd->prepare("INSERT INTO appartient VALUES(:idutil, :idgroupe, \"membre\")");
                                        $insertion->execute(['idutil'=>$id,'idgroupe'=>$groupeid['id']]);
										
                                        if(empty($_FILES['photo']['name']) && $_FILES['photo']['error']>0){
											$photo = "image/profil.jpg";
										}
										else{
											$dossier = 'image/';
											$fichier = basename($_FILES['photo']['name']);
											$taille_maxi = 5000000;
											$taille = filesize($_FILES['photo']['tmp_name']);
											$extensions = array('.png', '.gif', '.jpg', '.jpeg');
											$extension = strrchr($_FILES['photo']['name'], '.'); 
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
										$insertion = $bdd->prepare("UPDATE utilisateur SET photo=:photo WHERE id=:id");
										$insertion->execute(["photo"=>$photo,"id"=>$id]);
                                        header ('location: index.php');
                                        
                                    }
                                    catch(PDOException $erreur) {
                                        if ($verbose) {
                                            echo '<body onLoad="alert(\''.$erreur->getMessage().'\')">';
                                        } else {
                                            echo '<body onLoad="alert(\'Ce service est momentanément indisponible. Veuillez nous excuser pour la gêne occasionnée.\')">';
                                        }
                                    }
                                    
                                }else{
                                    echo '<body onLoad="alert(\'statut bug\')">';
                                }
							}
                            else{
                                echo '<body onLoad="alert(\'mdp\')">';
                            }
						}else{
                            echo '<body onLoad="alert(\'date\')">';
                        }
					}
				}else{
                    echo '<body onLoad="alert(\'mail\')">';
                }
			}else{
                echo '<body onLoad="alert(\'prenom\')">';
            }
		}else{
            echo '<body onLoad="alert(\'nom\')">';
        }
	}else{
        echo '<body onLoad="alert(\'envoyer\')">';
    }
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	
?>
		
