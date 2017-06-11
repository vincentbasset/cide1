<?php
	include("header.php");
?>

<?php
$mobilite=0;
$mobilite=1;
	if(isset($_POST["envoyer"])){
		if(!empty($_POST["nom"])){
			$nom = $_POST["nom"];
			if(!empty($_POST["metier"])){
				$metier= $_POST["metier"];
				if(!empty($_POST["lieu"])){
					$lieu= $_POST["lieu"];
					if(!empty($_POST["etranger"])){
						$etranger=1;
					}	
					if(!empty($_POST["nature"])){
						$nature = $_POST["nature"];
						if(!empty($_POST["duree"])){
							$duree= $_POST["duree"];
							if(!empty($_POST["mobilite"])){
								$mobilite=1;
							}								
							if(!empty($_POST["description"])){
								$description= $_POST["description"];	
								if(!empty($_POST["filiere"])){
									$filiere = $_POST["filiere"];
										
									$insertion = $bdd->prepare("INSERT INTO offre VALUES(NULL,:iduser,:nom,:metier,:lieu,:etranger,:nature,:duree,:mobilite,:description,:filiere,0)");
									$insertion->execute(['iduser' => $_SESSION['id'] , 'nom' => $nom , 'metier' => $metier , 'lieu' => $lieu, 'etranger' => $etranger, 'nature' => $nature, 'duree'=> $duree, 'mobilite'=> $mobilite, 'description'=> $description, 'filiere'=> $filiere ]);
								
								}
                                else{
                                    echo '<body onLoad="alert(\'filiere\')">';
                                }
							}
                            else{
                                echo '<body onLoad="alert(\'description\')">';
							}
						}
                        else{
                            echo '<body onLoad="alert(\'duree\')">';
						}
					}
                    else{
                        echo '<body onLoad="alert(\'nature\')">';
					}
				}
                else{
                    echo '<body onLoad="alert(\'lieu\')">';
				}
			}
            else{
                echo '<body onLoad="alert(\'metier\')">';
			}
		}		
        else{
			echo '<body onLoad="alert(\'nom\')">';
		}
	}	
	else{
        echo '<body onLoad="alert(\'envoyer\')">';
	}
echo '<meta http-equiv="refresh" content="0;URL=offre.php?variable=0">';
?>
</div>
</body>
</html>
