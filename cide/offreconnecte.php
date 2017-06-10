<?php

	
?>

	<div class="col-sm-7 col-perso">
		<h3>Déposer une offre</h3>
		<div class=\"media\">
			<p>Une nouvelle offre à partager?<a data-toggle="modal" data-target="#myModal"> Ajoute la!</a></p>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Nouvelle offre</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="traitementoffre.php">
						</br>
							<input type="varchar" name="nom" placeholder="Nom de l'entreprise" required>
						</br>
						</br>
						<input type="varchar" name="metier" placeholder="Métier" required>
						</br>
						</br>
						<input type="varchar" name="lieu" placeholder="Lieu" required>
						</br>
						</br>
						<select name="nature" required>
							<option value="">Nature de l'offre</option>
							<option value="stage">Stage</option>
							<option value="job">Job</option>
							<option value="cdd">CDD</option>
							<option value="cdi">CDI</option>
							<option value="alternance">Alternance</option>
						</select>
						</br>
						</br>
						<input type="varchar" name="duree" placeholder="durée(en semaine)">
						</br>
						</br>
						<input type="checkbox" name="mobilite" />
						<label for="mobilite">Lieu facile d'accès en tranport en commun</label>
						
						<textarea name="description" rows="12" cols="75" placeholder="Description"></textarea>
						</br>
						</br>
						<select name="filiere" required>
							<option value="">Filière principalement concernée</option>
							<option value="stage">Toutes</option>
							<option value="stage">Informatique</option>
							<option value="cdd">Automatique</option>
							<option value="cdi">Mécanique</option>
							<option value="alternance">textile</option>
							<option value="alternance">Master</option>
							<option value="alternance">Prépas</option>
						</select>
						</br>
						</br>
					</div>
					<div class="modal-footer">
						<input type="submit" name="envoyer" value="valider"/>
					</div>
					</form>
				</div>
			</div>
		</div>		

			
			
			
			
			
	<hr><hr>
	</br>
	<h3>Rechercher une offre</h3>
	</div>				
					
	<div class="col-sm-3 col-perso">

	</div>

