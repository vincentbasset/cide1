<style>
    footer{
        position: fixed;
        bottom: 0;
        width: 100%;
    }
body {
    background: #e9e9e9;
	color: #9a9a9a;
	font: 100%/1.5em "Droid Sans", sans-serif;
	margin: 0;
}
  
form, p, span {
    margin:0;
    padding:0; }
  
input {
	border: 0;
	color: inherit;
    font-family: inherit;
    font-size: 100%;
    line-height: normal;
    margin: 0;
}
  
a {
    color:#0000FF;
    text-decoration:none; }
  
    a:hover { text-decoration:underline; }

fieldset {
	border: 0;
	margin: 0;
	padding: 0;
}

h4, h5 {
	line-height: 1.5em;
	margin: 0;
}

hr {
	background: #e9e9e9;
    border: 0;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    height: 1px;
    margin: 0;
    min-height: 1px;
}

img {
    border: 0;
    display: block;
    height: auto;
    max-width: 100%;
}

.clearfix { *zoom: 1; } /* For IE 6/7 */
.clearfix:before, .clearfix:after {
    content: "";
    display: table;
}
.clearfix:after { clear: both; }

.live-chat {
	bottom: 0;
	font-size: 12px;
	position: fixed;
	width: 300px;
}

.live-chat header {
	background: #293239;
	border-radius: 5px 5px 0 0;
	color: #fff;
	cursor: pointer;
	padding: 16px 24px;
}

.chat-message-counter {
	background: #e62727;
	border: 1px solid #fff;
	border-radius: 50%;
	display: none;
	font-size: 12px;
	font-weight: bold;
	height: 28px;
	left: 0;
	line-height: 28px;
	margin: -15px 0 0 -15px;
	position: absolute;
	text-align: center;
	top: 0;
	width: 28px;
}

.chat-close {
	background: #1b2126;
	border-radius: 50%;
	color: #fff;
	display: block;
	float: right;
	font-size: 10px;
	height: 16px;
	line-height: 16px;
	margin: 2px 0 0 0;
	text-align: center;
	width: 16px;
}

.wrapper, .loginform {
    margin:0 auto;
    padding-bottom:25px;
    background:#EBF4FB;
    width:300px;
    border:1px solid #ACD8F0; }
  
.loginform { padding-top:18px; }
  
    .loginform p { margin: 5px; }
  
.chatbox {
    text-align:left;
    margin:0 auto;
    margin-bottom:25px;
    padding:10px;
    background:#fff;
    height:270px;
    width:250px;
    border:1px solid #ACD8F0;
    overflow:auto; }
  
.usermsg {
    margin-left: 10px;
    width:200px;
    border:1px solid #ACD8F0; }
  
.submit { width: 60px; }
  
.error { color: #ff0000; }
  
.menu { padding:12.5px 25px 12.5px 25px; }
  
.welcome { float:left; }
  
.logout { float:right; }
  
.msgln { margin:0 0 2px 0; }

.chat{
    height: 400px;
}
.chat-disp{
    display: inline-block;
    position: fixed;
}
</style>
<footer>
    <?php
        //gets the rooms in wich the user is engaged
        $reponse = $bdd -> prepare('SELECT * FROM chatdans WHERE idutil = :idu');
        $reponse -> execute(['idu' => $_SESSION['id']]);
        $reponsebis = $bdd -> prepare('SELECT * FROM chatdans WHERE idutil = :idu');
        $reponsebis -> execute(['idu' => $_SESSION['id']]);
    ?>
    <div class="container-fluid chat" id="chat">
        <?php
                while($donneesbis = $reponsebis -> fetch()){
                    $room=$donneesbis['idroom'];
                    echo '<div id='.$room.' class="col-sm-2">';    
                    include 'chat.php';
                    echo '</div>';
                }
                echo '<div id="newroom" class="col-sm-4">';
                include 'newroom.php';
                echo '</div>';
            ?>
    </div>

    
</footer>