<?php
/**
 * Created by PhpStorm.
 * User: TOUR
 * Date: 23/01/2019
 * Time: 16:11
 */
session_start();
require"base.php";
$d=array();

if(!isset($_SESSION['pseudo']) || empty($_SESSION['pseudo']) || !isset($_POST['action'])){
    $d["erreur"] = "Vous devez être connecté pour utiliser le tchat";
}
else {


    extract($_POST);
    $pseudo = mysqli_real_escape_string($_SESSION['pseudo']);
//action :addmessage

    //premet l'ajout d'un message

    if ($_POST['action'] == "addMessage") {
        $message = mysqli_real_escape_string($message);

        $sql = "INSERT INTO message(`id`,pseudo,message,`date`) VALUE (NULL,'$pseudo','$message',date)";

        mysqli_query($sql)or die(mysqli_error());
        $d['erreur'] = "ok";
    }


}

echo json_encode($d);

