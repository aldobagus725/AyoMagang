<?php
    include('db_chat.php');
    if(!isset($_SESSION)){session_start();}
    $query = "UPDATE login_details SET last_activity = now() WHERE login_details_id = '".$_SESSION["login_details_id"]."'";
    $statement = $connect->prepare($query);
    $statement->execute();
?>