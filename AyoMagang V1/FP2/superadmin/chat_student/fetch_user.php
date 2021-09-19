<?php
    include('db_chat.php');
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/ayomagang/koneksi.php";
    include_once($path);
    if(!isset($_SESSION)){session_start();};
    $query = "SELECT * FROM student";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '
                <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr style="font-size:24px;text-align:center;">
                        <th width="50%">Akun</td>
                        <th width="30%">Status</td>
                        <th width="20%">Aksi</td>
                    </tr>
                </thead>
                ';
    foreach($result as $row){
        $status = '';
        $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
        $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
        $user_last_activity = fetch_user_last_activity($row['student_id'], $connect);
        if($user_last_activity > $current_timestamp){
            $status = '<span class="badge badge-success" style="font-size:18px;">Online</span>';
        }else{
            $status = '<span class="badge badge-danger" style="font-size:18px;">Offline</span>';
        }
        $output .= '
        <tr style="font-size:18px;">
            <td>'.$row['fullname'].' '.count_unseen_message($row['student_id'], $_SESSION['superadmin']['superadmin_id'], $connect).' '.fetch_is_type_status($row['student_id'], $connect).'</td>
            <td style="text-align:center;">'.$status.'</td>
            <td style="text-align:center;"><button type="button" class="btn btn-success start_chat" data-touserid="'.$row['student_id'].'" data-tousername="'.$row['fullname'].'">Chat</button></td>
        </tr>
        ';
    }
        $output .= '</table>';
        echo $output;
?>