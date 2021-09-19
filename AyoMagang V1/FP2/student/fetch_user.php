<?php
    include('db_chat.php');
    include '../koneksi.php';
    if(!isset($_SESSION)){session_start();};
    $query = "SELECT * FROM superadmin ORDER BY RAND() LIMIT 1";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row){
        $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
        $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
        $user_last_activity = fetch_user_last_activity($row['superadmin_id'], $connect);
        if($user_last_activity > $current_timestamp){
            echo $output = '
                <button type="button" class="btn btn-primary start_chat" data-touserid="'.$row['superadmin_id'].'" data-tousername="'.$row['username'].'"><i class="far fa-user-circle"></i>&nbsp;Online! Langsung Chat</button></td>
            ';
        }else{
            echo $output = '
                <button type="button" class="btn btn-danger start_chat" data-touserid="'.$row['superadmin_id'].'" data-tousername="'.$row['username'].'"> <i class="far fa-user-circle"></i>&nbsp;Offline! Masih bisa di chat kok, siapa tahu nanti dibales!</button></td>
            ';
        }
    }
?>