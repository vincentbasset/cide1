<div class="chat live-chat" id="live-chatnew">
<header class="clearfix" id="headernew">
    <a href="#" onclick="ouverturenewroom()"><h4>new room</h4></a>
    <span class="chat-message-counter">3</span>
</header>
    
<div class="wrapper" id="wrappernew">
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
    <script>
        function ouverturenewroom(){
            var idwrapper = 'wrappernew';
            var idheader = 'headernew';
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
    <script>
        function ouverturenewchat(idu){
            $.ajax({
                    url:"ouverturenewchat.php?id="+idu,
                    type:"post",
                    success: function(html){$("#newroom").before(html);}
                });
        }
    </script>
</div>
</div>