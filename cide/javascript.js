

function check()
{
	//on prends les deux valeurs rentrés dans mdp et mdp verif pour les comparer
    var password = document.forms["inscription"]["mdp"].value;
	var confirm = document.forms["inscription"]["mdp verification"].value;
	if(password != confirm){
		alert("Votre mot de passe ne correspond pas à la confirmation");
	}
}


function checkStatut(){
	//on prends la valeur dans statut
	var statut = document.forms["inscription"]["statut"].value;
	if(statut != "etudiant"){
		//on cache les entree filiere et annee
		document.forms["inscription"]["filiere"].style.display='none';
		document.forms["inscription"]["annee"].style.display='none';
	}
	else{
		//on les affiches
		document.forms["inscription"]["filiere"].style.display='block';
		document.forms["inscription"]["annee"].style.display='block';
	}
	
}