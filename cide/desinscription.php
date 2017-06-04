<?php
	include("header.php");
	
	if(isset($_POST["envoyer"])){
		
		echo '<div class="centreprofil" ><p><img src="image/dontgo.jpg" alt="Ne partez pas!">
		<br/>Es-tu sur de vouloir partir? Toutes tes données seront perdues 
		<form method="post" action="validdesinscription.php">
			<input type="submit" name="envoyer" value="Me désinscrire" />
		</form></p></div>
		';
	}
?>
		
	</body>
</html>