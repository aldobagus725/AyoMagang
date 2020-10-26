<?php
require 'db.php';
class login{
    var $con;
    function __construct(){
        $koneksi = new database();
        $this->con = $koneksi->koneksi();
    }
    function login($request){
        foreach ($request as $key => $value) {
            $request[$key] = mysqli_real_escape_string($this->con, $value);
        }
        $username = $request['username'];
        $password = $request['password'];
        $form_id = $request['id'];

        if ($form_id === 'student') {
            return $this->student($username, $password);
        } elseif ($form_id === 'company') {
            return $this->company($username, $password);
        } else {
            return false;
        }
    }
    function student($username, $password){
        $query = mysqli_query($this->con, "select * from student where username='$username' and password='$password'");
        $exec = mysqli_num_rows($query);

        if ($exec > 0) {
            session_start();
            foreach ($query as $data) {
                $_SESSION['student'] = $data;
            }
            return true;
        } else {
            return false;
        }
    }
    function company($username, $password){
        $query = mysqli_query($this->con, "select * from company where username='$username' and password='$password'");
        $exec = mysqli_num_rows($query);

        if ($exec > 0) {
            session_start();
            foreach ($query as $data) {
                $_SESSION['company'] = $data;
            }
            return true;
        } else {
            return false;
        }
    }
}
