<?php
 //dans le login.php qui vérifiera si les infos sont bonnes

$bdd = new PDO("mysql:host=localhost; dbname=cide; charset=utf8","root","");

if (isset($_POST['login']) && isset($_POST['pwd'])) {
   $reponse=$bdd->query("SELECT * FROM utilisateur WHERE mail=\"".$_POST['login'])
   while ($données=$reponseId->fetch()){
 	 //transformer en vérifier si il y a qu'une ligne 
 	 if ($_POST['login']=$donnéesId['mail']) {
 		
         if (password_verify ( $_POST['pwd'] , $donnéesId['motdepasse'] )) {
             // dans ce cas, tout est ok, on peut démarrer notre session
 		    // on la démarre :)
 		    session_start ();
 		    // on enregistre les paramètres de notre visiteur comme variables de session ($login) 
 		    $_SESSION['login'] = $donnéesId['id'];

 		    // on redirige notre visiteur vers une page de notre section membre
 		    header ('location: index.html');
             
             }
            else {
             
             mot de passe non reconnu
            }
 	   }
 	else {
 		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
 		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
 		// puis on le redirige vers la page d'accueil
 		echo '<meta http-equiv="refresh" content="0;URL=index.htm">';
 	}
  }
}
else {
 	echo 'Les variables du formulaire ne sont pas déclarées.';
}
?>
