<?php
	$reponse = $bdd -> prepare("SELECT * FROM groupe WHERE groupe.id=:idgroupe");
    $reponse->execute(['idgroupe' =>$_GET['id']]);
	$reponse2 = $bdd->prepare("SELECT utilisateur.nom,utilisateur.prenom FROM `utilisateur` inner join appartient on appartient.idUtil=utilisateur.id inner join groupe on appartient.idGroupe=groupe.id WHERE groupe.id=:idgroupe and droit=\"createur\"");
	$reponse2->execute(['idgroupe' =>$_GET['id']]);
	$donnees=$reponse->fetch();
	$donnees2=$reponse2->fetch();
	echo"<div class=\"col-sm-1 col-perso\">
		<img class=\"img-circle img-demandeoff\"  src=\"".htmlspecialchars($donnees["icone"])."\" alt=\"".htmlspecialchars($donnees["nom"])."\"/>
		<br/><br/>Nom du groupe :".htmlspecialchars($donnees["nom"])."<br/>Description: ".htmlspecialchars($donnees["description"]);
	if(!empty($donnees2["nom"])){
		echo '<br/><br/>Créateur :'.htmlspecialchars($donnees2["nom"]).' '.htmlspecialchars($donnees2["prenom"]).'<br/>';
	}

	echo'<form method="post" action="traitementdemande.php?id='.$_GET['id'].'">';
?>
		<select name="choix">
			<option value="refuser">Refuser</option>
			<option value="accepter">Accepter</option>
		</select>
		<input type="submit" name="envoyer" value="Valider" />
	</form>
	</div>
	</body>
</html>