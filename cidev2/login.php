<?php
 //dans le login.php qui vérifiera si les infos sont bonnes
	include("header.php");
	//if (isset($_POST['login']) && isset($_POST['pwd'])) {*
	if (isset($_POST['connect'])) {
	   $reponse=$bdd->query("SELECT * FROM utilisateur WHERE adresse=\"".$_POST['login']."\"");
	   $donnees=$reponse->fetch();
		 //transformer en vérifier si il y a qu'une ligne 
		 //echo $_POST['login']." ".$donnees['adresse'];
		 if ($_POST['login']==$donnees['adresse']) {
			
			 if (password_verify($_POST['pwd'] , $donnees['motdepasse'])) {
				 // dans ce cas, tout est ok, on peut démarrer notre session
				// on enregistre les paramètres de notre visiteur comme variables de session ($login) 
				$_SESSION['id'] = $donnees['id'];

				// on redirige notre visiteur vers une page de notre section membre
				header ('location: index.php');
				 
			}
			else {
				 echo '<body onLoad="alert(\'mdp non reconnu...\')">';
				// puis on le redirige vers la page d'accueil
				echo '<meta http-equiv="refresh" content="0;URL=index.php">';
				}
		   }
		else {
			// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
			echo '<body onLoad="alert(\'Login non reconnu...\')">';
			// puis on le redirige vers la page d'accueil
			echo '<meta http-equiv="refresh" content="0;URL=index.php">';
		}
	}
	else {
		echo 'Les variables du formulaire ne sont pas déclarées.';
	}
?>