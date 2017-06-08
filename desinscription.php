<?php
	include("header.php");
	
	if(isset($_POST["envoyer"])){
		echo '<div class="col-sm-1 col-perso">
				<p><img src="image/dontgo.jpg" alt="Ne partez pas!">
					<br/>
					<br/>
					Es-tu sur de vouloir partir? Toutes tes données seront perdues
					<br/>
					<form method="post" action="validdesinscription.php">
						<input type="submit" name="envoyer" value="Me désinscrire" />
					</form>
				</p>
			</div>';
	}
?>
		</div>
	</body>
</html>