<?php
	include("header.php");
		$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";   
		$recherche = substr($url, strpos($url, "?search=") + 8);
		$mot1 = strtok($recherche, '%20');
		echo "<div class=\"centreprofil\"> <p>";
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
		echo "<a href=\"murprofil.php?id=".$donnees["id"]."\"><img src=\"".$donnees["photo"]."\" alt=\"".$donnees["nom"]." ".$donnees["prenom"]."\" width=\"50px\" height=\"50px\"/>".$donnees["nom"]." ".$donnees["prenom"]."</a><br />";
		}
		while($donnees2 = $recherchegroupe->fetch()){
			echo "<a href=\"groupe.php?id=".$donnees2["id"]."\"><img src=\"".$donnees2["icone"]."\" alt=\"".$donnees["nom"]."\" width=\"50px\" height=\"50px\"/>".$donnees2["nom"]."</a><br />";
		}
		echo "</p></div>";
?>