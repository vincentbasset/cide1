<?php
if(isset($_POST["search"])){
		$recherche=$_POST['search'];
	}
session_start();
	try{
	$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}
	$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$mot1 = strtok($recherche, '%20');
		echo "<p>";
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
		while($donnees = $rechercheutil->fetch()){
		echo "<div class='col-sm-7' style='padding-top:5px;'>".htmlspecialchars($donnees["nom"])." ".htmlspecialchars($donnees["prenom"])."</div>
        
        <form method='post' action='chat/ouverturenewchat.php?id=".$donnees["id"]."'>
        <input type='submit' name='newroom' value='open room'>
        </form>
        
        <hr>";
		}
		echo "</p>";
?>