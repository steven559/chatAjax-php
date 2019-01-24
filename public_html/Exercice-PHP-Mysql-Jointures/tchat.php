<?php
/**
 * Created by PhpStorm.
 * User: TOUR
 * Date: 23/01/2019
 * Time: 13:42
 */
session_start();
if(!isset($_SESSION['pseudo']) || empty($_SESSION['pseudo'])){
    header("location:pagination.php");
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tchat";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

} else {

    $conn->select_db($dbname);
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CHAT</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="tchat.js"></script>


</head>
<body>
<div id="conteneur" style="width:94%">
    <h1>
        CHAT UPTOFOURMIES, connectez en tant que <?php echo $_SESSION['pseudo'];?>
    </h1>
    <div id="tchat">
        <?php
        $sql = "SELECT * FROM `message` ORDER BY `date`DESC LIMIT 15 ";

        $result = $conn->query($sql);
              $d=array();
        while ($row = $result->fetch_assoc() ) {
            $d[] = $row;
        }
        for($i =count($d)-1;$i>=0;$i--){
            ?>
<p><strong><?php echo $d[$i]['pseudo']?></strong> : <?php echo $d[$i]['message']?></p>

        <?php

        }

        ?>

    </div>
</div>

<div id="tchatForm" style="position:fixed;bottom:0;width:100%;"></div>
<form id="valid" method="post" action="#">
    <div style="margin-right: 110px">
    <textarea name="message" style="width:100%;"></textarea>
    </div>
    <div style="position:absolute; top:12px;right:0; ">
        <input type="submit" id="send" value="envoyer"/>

    </div>



</form>
</body>
