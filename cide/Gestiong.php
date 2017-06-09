<?php
    include 'header.php';
    $groupe = $bdd -> query('SELECT nom FROM groupe WHERE id='.$_GET['id'].'');
    $nomgroupe = $groupe->fetch();
    $reponse = $bdd -> query('SELECT * FROM utilisateur inner join appartient on utilisateur.id=appartient.idUtil WHERE appartient.idGroupe='.$_GET['id'].'');
?>

<div class="centreprofil">
    <h2>Gestion de "<?php echo $nomgroupe['nom'] ?>"</h2>
    <br>
    <br>
    <h3>Membres :</h3>
    <br>
	
	<?php 
		echo '<form method="post" action="traitementicone.php?id='.$_GET['id'].'" enctype="multipart/form-data"> 

		<label for="icone">Changer l\'icone du groupe: </label>
		<input type="file" name="icone" accept="image/gif, image/jpeg, image/png" />
		<input type="submit" name="envoyer" value="Changer l\'icone"/>
	</form>';
    
        while($donnees=$reponse->fetch()){
            $membre='';
            $admin='';
            $createur='';
            if ($donnees['droit']=="membre"){
                $membre="checked";
            }
            if ($donnees['droit']=="admin"){
                $admin="checked";
            }
            if ($donnees['droit']=="createur"){
                $createur="checked";
            }
            echo '<div>
                <p>'.$donnees['nom'].' '.$donnees['prenom'].'</p>
                <p>
                    <form method="post" action="traitementmembre.php?id='.$donnees['id'].'&groupe='.$_GET['id'].'">
                      <input type="radio" name="membre" value="membre" '.$membre.'> Membre<br>
                      <input type="radio" name="membre" value="admin" '.$admin.'> Admin<br>
                      <input type="radio" name="membre" value="createur" '.$createur.'> Créateur<br><br>
                      <input type="submit" name="modifier" value=" modifier ">
                    </form> 
                </p>
            
            </div>';
        }
    ?>
    
</div>
</body>
</html>