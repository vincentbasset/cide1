
		<div class="col-sm-1 col-perso">
			<div class="media">
				<h2>Création de votre groupe</h2>
					<br/>
					<br/>
					<form method="post" action="creergroupe.php" enctype="multipart/form-data">
						<input id="nomgroupe" type="text" name="nom" placeholder="Le nom" required>
						<br/>
						<br/>
						<textarea name="description" rows="10" cols="70" placeholder="Description..." required></textarea>
						<br/>
						<br/>
						<label for="photo">Ajouter une photo de profil:</label>
						<br/>
						<br/>
						<input type="file" name="photo" id="photo" accept="image/gif, image/jpeg, image/png">
						<br/>
						<br/>
						<select name="type">
							<option value="prive">Privé</option>
							<option value="club">Club</option>
							<option value="officiel">Groupe Officiel</option>
							<option value="public">Public</option>
						</select>
						<br/>
						<input type="submit" value="Créer" name="envoyer"/>
						
					</form>
			</div>
		</div>
		
	</div>
	</body>
</html>
