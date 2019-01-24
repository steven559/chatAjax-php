<?php

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

if(!empty($_POST) && isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
    session_start();
    $_SESSION['pseudo'] = $_POST['pseudo'];
    header('location:tchat.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CHAT</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<header>
    <h1>
CHAT UPTOFOURMIES
</h1>
</header>
<section class="chat">





    <div class="message-user">
<form action="pagination.php" method="post" >
    Pseudo : <input type="text" name="pseudo" id="pseudo" placeholder="username">
    <input type="submit" value="chatter">


</form>

    </div>
</section>
</body>
</html>