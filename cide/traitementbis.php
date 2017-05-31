<?php

	session_start();
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}

    echo '<body onLoad="alert(\'debut\')">';
	if(isset($_POST["envoyer"])){
		if(!empty($_POST["nom"])){
			$nom = $_POST["nom"];
			if(!empty($_POST["prenom"])){
				$prenom = $_POST["prenom"];

				if(!empty($_POST["mail"])){
                    $reponse=$bdd->query("SELECT * FROM utilisateur WHERE adresse=\"".$_POST['mail']."\"");
	                $donnees=$reponse->fetch();
		            
		            //echo $_POST['login']." ".$donnees['adresse'];
		            if ($_POST['mail']==$donnees['adresse']) {
                        echo '<body onLoad="alert(\'Addresse e-mail déjà utilisée\')">';
                    }
                    else {
                        echo '<body onLoad="alert(\'mail ok\')">';
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
                                        $filiere = "NULL";
                                    }
                                    if(!empty($_POST["annee"])){
                                        $annee = $_POST["annee"];
                                    }else{
                                        $annee = "NULL";
                                    }

                                    if($_POST["cgu"]) {
                                        try{
                                            $insertion = $bdd->prepare("INSERT INTO utilisateur VALUES(NULL,\"".$nom."\",\"".$prenom."\",\"".$mail."\",\"".password_hash($mdp , PASSWORD_BCRYPT)."\",\"image/profil.jpg\",\"".$statut."\",\"".$filiere."\",".$annee.",\"".$date."\",NULL)");
                                            $insertion->execute();
                                            $reponse2=$bdd->query("SELECT * FROM utilisateur WHERE adresse=\"".$mail."\"");
	                                        $donnees2=$reponse2->fetch();
                                            echo '<body onLoad="alert(\'ok\')">';
                                            if ($mail==$donnees2['adresse']) {
                                                $_SESSION['id'] = $donnees['id'];
                                            }
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
                                        echo '<body onLoad="alert(\'cgu\')">';
                                    }
                                }
							}
						}
					}
				}
			}
		}
	}
	
?>
		