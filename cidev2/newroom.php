<div class="chat live-chat" id="live-chatnew">
<header class="clearfix">
    <h4>new chat room</h4>
    <span class="chat-message-counter">3</span>
</header>
    
<div class="wrapper" id="wrapper<?php echo $room ?>">
    <div class="chatbox" id="chatboxnew" style="overflow:auto;">
    </div>
    <form method="post" action="chargementrecherchechat.php" id="formchat">
        <input class="usermsg" id="recherchechat" type="text" name="search" placeholder="Rechercher..">
        <input type="submit" value="rechercher">
    </form>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $("#formchat").submit(function(event){
            event.preventDefault();
            var $this = $(this); // L'objet jQuery du formulaire
                // Envoi de la requête HTTP en mode asynchrone
                $.ajax({
                    url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
                    type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                    data: $(this).serialize() , // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    cache: false,
                    success: function(html){		
                        $("#chatboxnew").html(html);
                    },
                });
            });
        });
    </script>
</div>
</div>