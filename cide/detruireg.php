<?php
	include("header.php");
	
	if(isset($_POST["envoyer"])){
		if(isset($_GET['id'])){ 
			echo '<div class="col-sm-1 col-perso">
					<p><img class="img-circle" src="image/detruiregroupe.jpg" alt="Ne le détruisez pas!">
						<br/>
						<br/>
						Es-tu sur de vouloir détruire ce groupe? Toutes les données seront perdues!
						<br/>
						<form method="post" action="validdestructiong.php?id='.$_GET['id'].'">
							<input type="submit" name="envoyer" value="Me désinscrire" />
						</form>
					</p>
				</div>';
		}
	}
?>
		</div>
	</body>
</html>