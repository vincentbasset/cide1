function check()
{
    var password = document.forms["inscription"]["mot de passe"].value;
	var confirm = document.forms["inscription"]["mdp verification"].value;
	if(password != confirm){
		alert("Votre mot de passe ne correspond pas à la confirmation");
	}
}
