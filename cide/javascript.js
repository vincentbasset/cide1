

function check()
{
    var password = document.forms["inscription"]["mdp"].value;
	var confirm = document.forms["inscription"]["mdp verification"].value;
	if(password != confirm){
		alert("Votre mot de passe ne correspond pas à la confirmation");
	}
}


function checkStatut(){
	var statut = document.forms["inscription"]["statut"].value;
	if(statut != "etudiant"){
		document.forms["inscription"]["filiere"].style.display='none';
		document.forms["inscription"]["annee"].style.display='none';
	}
	else{
		document.forms["inscription"]["filiere"].style.display='block';
		document.forms["inscription"]["annee"].style.display='block';
	}
	
}