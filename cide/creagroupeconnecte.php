
		<div class="centreprofil">
			<p>
				<h2>Création d'un groupe</h2>
				
					<form method="post" action="creergroupe.php" enctype="multipart/form-data">
						<p>
						<label for="nom">Nom du groupe:<br/>>></label>
						<input type="varchar" name="nom" required>
						<br/>
						<label for="description">Description du groupe:<br/></label>
						<textarea name="description" rows="10" cols="70" required></textarea>
						<br/>
						<label for="photo">Ajouter une photo de profil:</label>
						<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
						<input type="file" name="photo" accept="image/gif, image/jpeg, image/png">
						<br/>
						<select name="type">
							<option value="prive">Privé</option>
							<option value="club">Club</option>
							<option value="officiel">Groupe Officiel</option>
							<option value="public">Public</option>
						</select>
						<br/>
						<input type="submit" value="Créer" name="envoyer"/>
						</p>
					</form>
			</p>
		</div>
	</body>
</html>
