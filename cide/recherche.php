<?php
	include("header.php");
		$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";   
		$recherche = substr($url, strpos($url, "?search=") + 8);
		$mot1 = strtok($recherche, '+');
		echo "<div class=\"centreprofil\"> <p>";
		if (strpos($recherche, '+') !== false) {
			$mot2 = substr($recherche, strpos($recherche, "+") + 1);
		}
		else{
			$mot2="";
		}
		if (strpos($mot2, '+') !== false){
			$mot2 = strtok($mot2, '+');
			echo "trop de mot dans recherche<br/>";
		}
		$rechercheutil = $bdd -> query("SELECT * FROM utilisateur where nom like '%".$mot1."%' and prenom like '%".$mot2."%' or nom like '%".$mot2."%' and prenom like '%".$mot1."%'");
		if(strpos($recherche, '+') !==false){
			$recherchegroupe = $bdd -> query("SELECT * FROM groupe where nom like '%".$mot1."%".$mot2."%' or nom like '%".$mot2." ".$mot1."%'");
		}
		else{
			$recherchegroupe = $bdd -> query("SELECT * FROM groupe where nom like '%".$recherche."%'");
		}
		while($donnees = $rechercheutil->fetch()){
			echo $donnees["nom"]." ".$donnees["prenom"]."<br />";
		}
		while($donnees2 = $recherchegroupe->fetch()){
			echo $donnees2["nom"]."<br />";
		}
		echo "</p></div>";
?>