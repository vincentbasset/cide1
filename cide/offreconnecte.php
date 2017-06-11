<?php
	if($_GET['variable']==0){
		$rep = $bdd -> query("UPDATE offre SET visible = 1");
		$reponse = $bdd -> query("SELECT offre.*,utilisateur.nom as utilnom,utilisateur.prenom,utilisateur.id as utilid FROM utilisateur,offre WHERE offre.idUtil=utilisateur.id ORDER BY offre.id");
	}
	else{
		$reponse = $bdd -> query("SELECT offre.*,utilisateur.nom as utilnom,utilisateur.prenom,utilisateur.id as utilid FROM utilisateur,offre WHERE offre.idUtil=utilisateur.id AND visible=1 ORDER BY offre.id");
	}
	

?>
<script>
	$(document).ready(function(){
		$(".cache").click(function(){
			$(this).find(".offreplus").toggle(700);
		});
	});
</script>


	<div class="col-sm-7 col-perso">
		<h3>Déposer une offre</h3>
		<div class=\"media\">
			<p>Une nouvelle offre à partager?<a data-toggle="modal" data-target="#myModal"> Ajoute la!</a></p>
		</div>
		
		
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
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
						<input type="checkbox" name="etranger" />
						<label for="mobilite">offre à l'étranger</label>
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
						<input type="int" name="duree" placeholder="durée(en semaine)">
						</br>
						</br>
						<input type="checkbox" name="mobilite" />
						<label for="mobilite">transport personnel conseillé</label>
						
						<textarea name="description" rows="12" cols="75" placeholder="Description"></textarea>
						</br>
						</br>
						<select name="filiere" required>
							<option value="">Filière principalement concernée</option>
							<option value="toutes">Toutes</option>
							<option value="informatique">Informatique</option>
							<option value="automatique">Automatique</option>
							<option value="mécanique">Mécanique</option>
							<option value="textile">textile</option>
							<option value="master">Master</option>
							<option value="prepas">Prépas</option>
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

	<hr>
	<hr>
	</br>
	<h3>Rechercher une offre</h3>
	</br>
	<?php
	
	
	while($donnees=$reponse->fetch()){
	echo "
		<div class=\"media\">
			<div class=\"offre\">
				<div class=\"offreleft\">
					</br>
					<span>Nom de l'entreprise: </span>".htmlspecialchars($donnees["nom"])."
					</br>
					<span>Métier: </span>".htmlspecialchars($donnees["metier"])."
					</br>
					<span>Nature de l'offre: </span>".htmlspecialchars($donnees["nature"])."
					</br>
					pour ".htmlspecialchars($donnees["duree"])." semaines
					</br>
				</div>
				<div class=\"offreright\">
					</br>
					<span>Filière concernée: </span>".htmlspecialchars($donnees["filiere"])."
					</br>
					<span>Lieu: </span>".htmlspecialchars($donnees["lieu"])."
					</br>";
					if(htmlspecialchars($donnees["etranger"])==1){
						echo"offre à l'étranger";
					}
					else{
						echo"France";
					}
					echo"</br>";
					if(htmlspecialchars($donnees["mobilite"])==1){
						echo"Transport personnel fortement conseillé";
					}
					else{
						echo"Lieu accessible en transport en commun";
					}
					echo"</br>
				</div>
				<div class=\"cache\">
					<span>Voir plus...</span>
					<div class=\"offreplus\" style=\"display:none\">	
						<span>Description: </span></br>".htmlspecialchars($donnees["description"])."
						</br>
						<i>Posté par <a href=\"murprofil.php?id=".htmlspecialchars($donnees["utilid"])."\">".htmlspecialchars($donnees["prenom"])." ".htmlspecialchars($donnees["utilnom"])."</a></i>
					</div>
				</div>
			</div>
		</div>";
	}
	
	?>
	</div>				
					
	<div class="col-sm-3 col-perso">
		<div class="media filtre">
		<a id="liengestion" href="mesoffres.php">Gérer mes offres</a><br><br>
		<h3>Filtrer les offres</h3>
			</br>
			<form method="post" action="traitementfiltre.php">
				<input type="checkbox" name="stage" />
				<label for="stage">Stage</label>
				</br>
				<input type="checkbox" name="job" />
				<label for="job">Job</label>
				</br>
				<input type="checkbox" name="cdd" />
				<label for="cdd">CDD</label>
				</br>
				<input type="checkbox" name="cdi" />
				<label for="cdi">CDI</label>
				</br>
				<input type="checkbox" name="alternance" />
				<label for="alternance">Alternance</label>
				</br>
				</br>
				<input type="checkbox" name="etranger" />
				<label for="etranger">offre à l'étranger</label>
				</br>
				</br>
				<input type="checkbox" name="info" />
				<label for="info">Informatique</label>
				</br>
				<input type="checkbox" name="auto" />
				<label for="auto">Automatique</label>
				</br>
				<input type="checkbox" name="meca" />
				<label for="meca">Mecanique</label>
				</br>
				<input type="checkbox" name="textile" />
				<label for="textile">Textile</label>
				</br>
				<input type="checkbox" name="master" />
				<label for="master">Master</label>
				</br>
				<input type="checkbox" name="prepas" />
				<label for="prepas">Prépas</label>
				</br>
				</br>
				<input type="checkbox" name="court" />
				<label for="court">1 mois ou moins</label>
				</br>
				<input type="checkbox" name="moyen" />
				<label for="moyen">1-2 mois</label>
				</br>
				<input type="checkbox" name="long" />
				<label for="long">plus de 2 mois</label>
				</br>
				</br>
				<input type="checkbox" name="mobilite" />
				<label for="mobilite">transport en commun</label>
				</br>
				</br>
				<input type="submit" name="envoyer" value="filtrer"/>
				</br>
				<input type="submit" name="annuler" value="retirer le filtre"/>
				
			</form>
		</div>
	</div>

