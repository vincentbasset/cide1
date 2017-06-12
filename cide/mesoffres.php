<?php
	include("header.php");
	$reponse = $bdd -> prepare("SELECT offre.*,utilisateur.nom as utilnom,utilisateur.prenom,utilisateur.id as utilid FROM utilisateur,offre WHERE offre.idUtil=utilisateur.id AND utilisateur.id=:idutil ORDER BY offre.id DESC");
	$reponse->execute(['idutil' =>$_SESSION['id']]);

echo"
<div class=\"col-sm-1 col-perso\">
	<h3>Mes offres</h3>";

	while($donnees=$reponse->fetch()){
	echo "
		<div class=\"media\">
			<div class=\"offre\">
				<form method=\"post\" action=\"traitementmesoffres.php?id=".htmlspecialchars($donnees['id'])."\">
					<input type=\"submit\" name=\"envoyer\" value=\"supprimer\"/>
				</form>
				<div class=\"offreleft\">
					<br>
					<span>Nom de l'entreprise: </span>".htmlspecialchars($donnees["nom"])."
					<br>
					<span>Métier: </span>".htmlspecialchars($donnees["metier"])."
					<br>
					<span>Nature de l'offre: </span>".htmlspecialchars($donnees["nature"])."
					<br>
					pour ".htmlspecialchars($donnees["duree"])." semaines
					<br>
				</div>
				<div class=\"offreright\">
					<br>
					<span>Filière concernée: </span>".htmlspecialchars($donnees["filiere"])."
					<br>
					<span>Lieu: </span>".htmlspecialchars($donnees["lieu"])."
					<br>";
					if(htmlspecialchars($donnees["etranger"])==1){
						echo"offre à l'étranger";
					}
					else{
						echo"France";
					}
					echo"<br>";
					if(htmlspecialchars($donnees["mobilite"])==1){
						echo"Transport personnel fortement conseillé";
					}
					else{
						echo"Lieu accessible en transport en commun";
					}
					echo"<br>
				</div>
				<div class=\"cache\">
					<span>Voir plus...</span>
					<div class=\"offreplus\" style=\"display:none\">	
						<span>Description: </span></br>".htmlspecialchars($donnees["description"])."
						<br>
						<i>Posté par <a href=\"murprofil.php?id=".htmlspecialchars($donnees["utilid"])."\">".htmlspecialchars($donnees["prenom"])." ".htmlspecialchars($donnees["utilnom"])."</a></i>
					</div>
				</div>
			</div>
		</div>";
	}
?>

<script>
	$(document).ready(function(){
		$(".cache").click(function(){
			$(this).find(".offreplus").toggle(700);
		});
	});
</script>



	</div>
</body>
</html>