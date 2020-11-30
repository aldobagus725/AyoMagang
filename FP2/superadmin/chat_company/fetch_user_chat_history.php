<?php
    include('db_chat.php');
    if(!isset($_SESSION)){session_start();}
    echo fetch_user_chat_history($_SESSION['superadmin']['superadmin_id'], $_POST['to_user_id'], $connect);
?>