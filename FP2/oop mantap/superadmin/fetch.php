<?php
include"../koneksi.php";
    if(isset($_POST['view'])){
        if($_POST["view"] != ''){
            $update_query = "UPDATE request SET status = 1 WHERE status=0";
            mysqli_query($koneksi, $update_query);
        }
        $query = "SELECT * FROM request ORDER BY req_id DESC LIMIT 4";
        $result = mysqli_query($koneksi, $query);
        $output = '';
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $output .= '
                <li style="padding:10px 10px 10px 10px">
                    <a data-toggle="pill" href="#v-pills-request" role="tab" aria-controls="v-pills-request" aria-selected="false">
                        <strong style="font-size:13px;">'.$row["req_title"].'</strong><br />
                        <small style="font-size:10px;"><em>'.$row["req_detail"].'</em></small>
                    </a>
                </li>
                ';
            }
        }
        else{
            $output .= '
            <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
        }
        
        $status_query = "SELECT * FROM request WHERE status=0";
        $result_query = mysqli_query($koneksi, $status_query);
        $count = mysqli_num_rows($result_query);
        $data = array(
            'notification' => $output,
            'unseen_notification'  => $count
        );
        echo json_encode($data);
    }
?>