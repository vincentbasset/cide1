<?php
    $reponse1=$bdd->query('SELECT * FROM chat inner join utilisateur on utilisateur.id=chat.idUtil1 WHERE (idutil1='.$_SESSION['id'].' and idutil2='.$donnees['idUtil2'].') or (idUtil2='.$_SESSION['id'].' and idutil1='.$donnees['idUtil2'].') order by date desc');
    $reponse2=$bdd->query('SELECT * FROM utilisateur WHERE id='.$donnees['idUtil2'].'');
    $nom=$reponse2->fetch();
    $id=$donnees['idUtil2'];
?>
<style>
.myDIV {
    width: 100%;
    padding: 10px 0px;
    text-align: left;
    background-color: black;
    margin-top:20px;
    color: azure;
}
</style>

<?php
    echo '<button onclick="chat('.$id.')">Chat with '.$nom['nom'].' '.$nom['prenom'].'</button>';
    echo '<div id='.$id.' class="myDIV">';
    while($donnees1=$reponse1->fetch()){
        echo '<h3><i>'.$donnees1['prenom'].'</i></h3>';
        echo '<p>'.$donnees1['message'].'</p>';
    };
    echo '</div>';  
?>
<?php
echo '<form method="post" action="traitementchat.php?id='.$donnees['idUtil2'].'">
    <textarea name="message" placeholder="message..." cols="20" rows="1"></textarea>
    <input type="submit" name="envoyer" value="envoyer"/>
</form>';
?>
<script>
function chat(iddiv) {
    var x = document.getElementById(iddiv);
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>


