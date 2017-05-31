
function test() {
	var password = document.forms["inscription"]["mdp"].value;
	var confirm = document.forms["inscription"]["mdp verification"].value;
	if(password != confirm){
		alert("Votre mot de passe ne correspond pas à la confirmation");
	}
    /*var txt;
    var person = prompt("ancienne adresse mail:", "truqgreqgerhqe");
    if (person == null || person == "") {
        txt = "User cancelled the prompt.";
    } else {
        txt = "Hello " + person + "! How are you today?";
    }*/

}

function check()
{
    var password = document.forms["inscription"]["mdp"].value;
	var confirm = document.forms["inscription"]["mdp verification"].value;
	if(password != confirm){
		alert("Votre mot de passe ne correspond pas à la confirmation");
	}
}






/*function filiere(){
	var statut = document.forms["inscription"]["statut"].value;
	if(statut != "etudiant"){
		document.forms["inscription"]["filiere"].style.display='none';
	}
	else{
		document.forms["inscription"]["filiere"].style.display='block';
	}
	
}*/