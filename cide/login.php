<?php
 //dans le login.php qui vérifiera si les infos sont bonnes

$bdd = new PDO("mysql:host=localhost; dbname=siteweb; charset=utf8","root","");

if (isset($_POST['login']) && isset($_POST['pwd'])) {
   $reponse=$bdd->query("SELECT * FROM utilisateur WHERE adresse=\"".$_POST['login']."\"");
   $donnees=$reponse->fetch();
 	 //transformer en vérifier si il y a qu'une ligne 
 	 if ($_POST['login']==$donnees['adresse']) {
 		
         if (password_verify($_POST['pwd'] , $donnees['motdepasse'])) {
             // dans ce cas, tout est ok, on peut démarrer notre session
 		    // on la démarre :)
 		    session_start();
 		    // on enregistre les paramètres de notre visiteur comme variables de session ($login) 
 		    $_SESSION['login'] = $donnéesId['id'];

 		    // on redirige notre visiteur vers une page de notre section membre
 		    header ('location: index.php');
             
             }
            else {
             echo '<body onLoad="alert(\'mdp non reconnu...\')">';
 		// puis on le redirige vers la page d'accueil
 		echo '<meta http-equiv="refresh" content="0;URL=index.html">';
            }
 	   }
 	else {
 		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
 		echo '<body onLoad="alert(\'Login non reconnu...\')">';
 		// puis on le redirige vers la page d'accueil
 		echo '<meta http-equiv="refresh" content="0;URL=index.html">';
 	}
  }

else {
 	echo 'Les variables du formulaire ne sont pas déclarées.';
}
?>
