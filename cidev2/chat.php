<?php
    //gets the messages of the room $room
    $reponse1 = $bdd -> prepare('SELECT * FROM chatmsg inner join utilisateur on chatmsg.idutil=utilisateur.id inner join chatdans on utilisateur.id=chatdans.idutil WHERE chatmsg.idroom=chatdans.idroom and chatmsg.idroom = :idr ORDER BY chattime');
?>

<div class="chat live-chat" id="live-chat<?php echo $room ?>">
<header class="clearfix" id="header<?php echo $room ?>">
    <a href="#" class="chat-close" id="exit<?php echo $room ?>">x</a>
    <a href="#" onclick="ouverturechat(<?php echo $room ?>)"><h4><?php echo 'chat room n°'.$room; ?></h4></a>
    <span class="chat-message-counter">3</span>
</header>
    
<div class="wrapper" id="wrapper<?php echo $room ?>">
       
    <div class="chatbox" id="chatbox<?php echo $room ?>" style="overflow:auto;">
        <?php
            $reponse1 -> execute(['idr' => $room]);
            while($donnees1 = $reponse1 -> fetch()){
                $couleur=$donnees1['couleur'];
                $name=$donnees1['prenom'].' '.$donnees1['nom'];
                echo '<div class="msgln">('.date_format(date_create_from_format("Y-m-j H:i:s",htmlspecialchars($donnees1['chattime'])), "j/m/y \à G\hi").') <font color='.$couleur.'><b>'.$name.'</b>:  '.stripslashes(htmlspecialchars($donnees1['message'])).'</font><br></div>';
            }
        ?>
    </div>
    
    <form method="post" action="traitementchat.php?room=<?php echo $room; ?>" id="form<?php echo $room ?>" >
        <input type="text" name="usermsg" class="usermsg" id="usermsg<?php echo $room ?>">
        <input type="submit" value="envoyer" name="send" class="submitmsg" id="submitmsg<?php echo $room ?>">
    </form>
    
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
</script>
<script>
	$(document).ready(function() { //attend le chargement de la page pour executer le script
        setInterval (loadLog, 2500);	//Reload file every 2500 ms
		//If user wants to end session
        $("#exit<?php echo $room; ?>").click(function(){
            var exit = confirm("Are you sure you want to end the session?");
            if(exit==true){
                $.ajax({
                    url:"fermeturechat.php?room=<?php echo $room ?>",
                    type:"post",
                    success: $('#<?php echo $room ?>').remove()
                })    
            ;}		
        });
        //If user submits the form
        $("#form<?php echo $room; ?>").submit(function(event){
        event.preventDefault();
        var $this = $(this); // L'objet jQuery du formulaire
            // Envoi de la requête HTTP en mode asynchrone
            $.ajax({
                url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
                type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                data: $(this).serialize() , // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                success: $("#usermsg<?php echo $room ?>").attr("value", "")
            });
        });
        //Load the file containing the chat log
        function loadLog(){	
            $("#chatbox<?php echo $room; ?>").animate({ scrollTop: $("#chatbox<?php echo $room; ?>")[0].scrollHeight }, 'normal');
            //var oldscrollHeight = $("#chatbox<?php echo $room; ?>").attr("scrollHeight") - 40; //Scroll height before the request
            $.ajax({
                url: "chargementchat.php?room=<?php echo $room; ?>&couleur=<?php echo $couleur ?>",
                cache: false,
                success: function(html){		
                    $("#chatbox<?php echo $room; ?>").appendChild(html); //Insert chat log into the #chatbox div	

                    //Auto-scroll			
                    /*var newscrollHeight = $("#chatbox<?php echo $room; ?>").attr("scrollHeight") - 40; //Scroll height after the request
                    if(newscrollHeight > oldscrollHeight){
                        $("#chatbox<?php echo $room; ?>").animate({ scrollTop: $("#chatbox<?php echo $room; ?>")[0].scrollHeight }, 'normal'); //Autoscroll to bottom of div
                    }*/
                },
            });
	   }
	}); 
</script>
<script>
    function ouverturechat(idroom){
        var idwrapper = 'wrapper'+  idroom;
        var idheader = 'header' + idroom;
        var chatw = document.getElementById(idwrapper);
        var chath = document.getElementById(idheader);
        if (chatw.style.visibility === 'hidden'){
            chatw.style.visibility = 'visible';
            chath.style.position = 'initial';
        } else {
            chatw.style.visibility = 'hidden';
            chath.style.position = 'absolute';
            chath.style.bottom = '0';
        }
    }
</script>
</div>




