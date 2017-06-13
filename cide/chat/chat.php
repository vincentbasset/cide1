<?php
    //gets the messages of the room $room
    $reponse1 = $bdd -> prepare('SELECT * FROM chatmsg inner join utilisateur on chatmsg.idutil=utilisateur.id inner join chatdans on utilisateur.id=chatdans.idutil WHERE chatmsg.idroom=chatdans.idroom and chatmsg.idroom = :idr ORDER BY chattime ');
    //gets the name of the other user
    $reponse2 = $bdd -> prepare('SELECT * FROM utilisateur inner join chatdans on utilisateur.id=chatdans.idutil WHERE chatdans.idroom = :idr and chatdans.idutil != :idu');
    $reponse2 -> execute(['idr'=>$room,'idu'=>$_SESSION['id']]);
    $name = $reponse2 -> fetch();
?>

<div class=" panel-group" style="position:absolute;bottom:0;">
<header class="clearfix">
    <a href="#" class="chat-close" data-idroom="<?php echo $room ?>" >x</a>
    <a data-toggle="collapse" href="#collapse<?php echo $room ?>"><h4 class="titre-chat"><?php echo '<img src="'.$name['photo'].'" alt="'.$name['prenom'].' '.$name['nom'].'" class="img-circle" width=40 height=40 style="margin-right:10px;">'.$name['prenom'].' '.$name['nom'] ?></h4></a>
    <span class="chat-message-counter">3</span>
</header>
<div id="collapse<?php echo $room ?>" class="panel-collapse collapse">
<div class="panel-body">
       
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
    
    <form method="post" action="chat/traitementchat.php?room=<?php echo $room; ?>" class="chatforms" id="form<?php echo $room ?>" >
        <input type="text" name="usermsg" class="usermsg" id="usermsg<?php echo $room ?>">
        <input type="submit" value="envoyer" name="send" class="submitmsg" id="submitmsg<?php echo $room ?>">
    </form>
    
</div>
</div>
</div>




