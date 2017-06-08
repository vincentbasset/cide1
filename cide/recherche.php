<?php
	include("header.php");
		$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";   
		$recherche = substr($url, strpos($url, "?search=") + 8);
		$mot1 = strtok($recherche, '%20');
		echo "<div class=\"col-sm-1 col-perso\" id=\"rech\"><p>";
		if (strpos($recherche, '%20') !== false) {
			$mot2 = substr($recherche, strpos($recherche, "%20") + 3);
		}
		else{
			$mot2="";
		}
		if (strpos($mot2, '%20') !== false){
			$mot2 = strtok($mot2, '%20');
			echo "trop de mot dans recherche<br/>";
		}
		$rechercheutil = $bdd -> query("SELECT * FROM utilisateur where nom like '%".$mot1."%' and prenom like '%".$mot2."%' or nom like '%".$mot2."%' and prenom like '%".$mot1."%'");
		if(strpos($recherche, '%20') !==false){
			$recherchegroupe = $bdd -> query("SELECT * FROM groupe where nom like '%".$mot1."%".$mot2."%' or nom like '%".$mot2." ".$mot1."%'");
		}
		else{
			$recherchegroupe = $bdd -> query("SELECT * FROM groupe where nom like '%".$recherche."%'");
		}
		while($donnees = $rechercheutil->fetch()){
		echo "<a href=\"murprofil.php?id=".htmlspecialchars($donnees["id"])."\"><img class=\"img-circle\"  src=\"".htmlspecialchars($donnees["photo"])."\" alt=\"".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."\" width=\"70px\" height=\"70px\"/><br/>".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."</a><br/><hr><br/>";
		}
		while($donnees2 = $recherchegroupe->fetch()){
			echo "<a href=\"groupe.php?id=".htmlspecialchars($donnees2["id"])."\"><img class=\"img-circle\" src=\"".htmlspecialchars($donnees2["icone"])."\" alt=\"".htmlspecialchars($donnees["nom"])."\" width=\"70px\" height=\"70px\"/><br/>".htmlspecialchars($donnees2["nom"])."</a><br/><hr><br/>";
		}
		echo "</p></div>";
?>