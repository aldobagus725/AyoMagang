<?php
class database{
    var $host = 'localhost';
    var $username = 'root';
    var $password = '';
    var $database = 'ayomagang';
    var $koneksi;

    function koneksi(){
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        if(mysqli_connect_error()){
            echo "Tidak Dapat Terhubung Ke Database (MySql) : " . mysqli_connect_error();
            die;
        }else{
            return $this->koneksi;
        }
    }

}