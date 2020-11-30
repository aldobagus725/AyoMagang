<?php
    if(!isset($_SESSION)){session_start();}
    else{
        if(!isset($_SESSION['superadmin'])){
            echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
            echo "<script>location='login.php';</script>";
        }
    }
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/ayomagang/koneksi.php";
    include_once($path);
    $path2 = $_SERVER['DOCUMENT_ROOT'];
    $path2 .= "/ayomagang/classes/superadmin.php";
    require($path2);
    $superadmin = new superadmin();
    $id = $_SESSION['superadmin']["superadmin_id"];
?>

<html>
    <head>
        <title>Live Chat - Company</title>
        <link rel="stylesheet" type="text/css" href="/ayomagang/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/ayomagang/assets/css/ayomagang.css">
        <link rel="shortcut icon" href="/ayomagang/assets/ico/favicon.png">
        <link type="text/css" href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' rel='stylesheet'>
        <link type="text/css" href='https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css' rel='stylesheet'>
        <link type="text/css" href='https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/Start/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
        <style>
            .chat_message_area{
                position: relative;
                width: 100%;
                height: auto;
                background-color: #FFF;
                border: 1px solid #CCC;
                border-radius: 3px;
            }
            .image_upload{position: absolute;top:3px;right:3px;}
            .image_upload > form > input{display: none;}
            .image_upload img{width: 24px;cursor: pointer;}
            .form-rounded {border-radius: 50rem;}
            .btn-rounded {color: #fff;background-color: #007bff;border-radius: 50rem;}
            .btn-rounded-success {color: #fff;background-color: #28a745;border-radius: 50rem;}
            .btn-rounded-danger {color: #fff;background-color: #dc3545;border-radius: 35rem;}
            .btn-rounded-info {color: #fff;background-color: #17a2b8;border-radius: 50rem;}
            .btn-rounded-light {color: #343a40;background-color: #f8f9fa;border-radius: 50rem;}
            .btn-rounded-dark {color: #fff;background-color: #343a40;border-radius: 50rem;}
            .btn-rounded-warning {color: #fff;background-color: #ffc107;border-radius: 50rem;}
            .btn-rounded-secondary {color: #fff;background-color: #868e96;border-radius: 50rem;}
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php include ("local_navbar.php"); ?>
        <div class="container-fluid">
            <div class="container">
                <div class="row" style="padding:40px;">
                    <div class="col">
                        <div class="table table-responsive-sm">
                            <div id="user_details"></div>
                            <div id="user_model_details"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $path3 = $_SERVER['DOCUMENT_ROOT'];
            $path3 .= "/ayomagang/footer.php";
            include ($path3); 
        ?>
    </body>
    <script src="/ayomagang/assets/js/jquery-3.4.1.min.js"></script>
    <script src="/ayomagang/assets/js/wow.min.js"></script>
    <script src="/ayomagang/assets/js/scripts.js"></script>
    <script src="/ayomagang/assets/js/chat_scripts-admin.js"></script>
    <script src="/ayomagang/assets/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
</html>