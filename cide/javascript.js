function check()
{
    var password = document.forms["inscription"]["mot de passe"].value;
	var confirm = document.forms["inscription"]["mdp verification"].value;
	if(password != confirm){
		alert("Votre mot de passe ne correspond pas à la confirmation");
	}
}




function myFunction() {
    var txt;
    var person = prompt("ancienne adresse mail:", "truqgreqgerhqe");
    if (person == null || person == "") {
        txt = "User cancelled the prompt.";
    } else {
        txt = "Hello " + person + "! How are you today?";
    }

}







