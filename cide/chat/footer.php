<footer id="footderue">
    <?php
        //gets the rooms in wich the user is engaged
        $reponse = $bdd -> prepare('SELECT * FROM chatdans WHERE idutil = :idu');
        $reponse -> execute(['idu' => $_SESSION['id']]);
        $reponsebis = $bdd -> prepare('SELECT * FROM chatdans WHERE idutil = :idu');
        $reponsebis -> execute(['idu' => $_SESSION['id']]);
    ?>

        <?php
                echo '<div id="newroom" class="col-sm-3">';
                include 'chat/newroom.php';
                echo '</div>';
        
                while($donneesbis = $reponsebis -> fetch()){
                    $room=$donneesbis['idroom'];
                    echo '<div id='.$room.' class="col-sm-3">';    
                    include 'chat/chat.php';
                    echo '</div>';
                }
                
            ?>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
    </script>
    <script>
$(document).ready(function() { //attend le chargement de la page pour executer le script
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
    
    //If user wants to end session
     $('body').on('click','.chat-close',function(){
        var idroom = $(this).attr("data-idroom");
        var exit = confirm("Êtes vous sûr de vouloir fermer cette salle de discussion?");
        if(exit==true){
            $.ajax({
                url:"chat/fermeturechat.php?room="+idroom,
                type:"post",
                success: $('#'+idroom).remove()
            });
        }		
    });
    //If form submit
    $('body').on('submit','.chatforms',function(event){
        event.preventDefault();
        var $this = $(this); // L'objet jQuery du formulaire
            // Envoi de la requête HTTP en mode asynchrone
            $.ajax({
                url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
                type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                data: $this.serialize() , // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                success: $(".chatforms > .usermsg").attr("value", "")
            });
    });
    //Load the file containing the chat log
    function loadLog(idroom,couleur){	
        $("#chatbox"+idroom).animate({ scrollTop: $("#chatbox"+idroom)[0].scrollHeight }, 'normal');
        $.ajax({
            url: "chat/chargementchat.php?room="+idroom+"&couleur="+couleur,
            cache: false,
            success: function(html){		
                $("#chatbox"+idroom).append(html); //Insert chat log into the #chatbox div
            },
        });
    }
            
    setInterval(function(){
        <?php 
            while($donnees = $reponse -> fetch()){
                $room=$donnees['idroom'];
                $couleur=$donnees['couleur']; ?>
        loadLog(<?php echo $room ?>,'<?php echo $couleur ?>');	//Reload file every 2500 ms
        <?php } ?>},2500);
   
    $('body').on('click','.newroombutton',function(){
        var idu = $(this).attr("data-idutil");
        $.ajax({
                url:"chat/ouverturenewchat.php?id="+idu,
                type:"post",
                success: function(html){$("#newroom").before(html);}
            });
    });
});
</script>
    
</footer>