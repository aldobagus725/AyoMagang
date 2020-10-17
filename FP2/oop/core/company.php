<?php
require_once 'database.php';

class company
{
    var $con;

    function __construct()
    {
        $koneksi = new database();
        $this->con = $koneksi->koneksi();
    }

    function view_lowongan($id)
    {
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from vacancies where company_id = $id");
        return $query;
    }

    function detail_lowongan($id)
    {
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from vacancies join company on vacancies.company_id = company.company_id where vacancies_id = $id");
        return $query;
    }

    function list_lowongan($id)
    {
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from company where company_id = $id");
        return $query;
    }

    function buka_lowongan($request)
    {
        foreach ($request as $key => $value) {
            $request[$key] = mysqli_real_escape_string($this->con, $value);
        }

        $id = $request['company_id'];
        $name = $request['company_name'];
        $author = $request['author'];
        $company_address = $request['company_address'];
        $phone = $request['phone'];
        $company_speciality = $request['company_speciality'];
        $intern_policies = $request['intern_policies'];

        if (empty($author) || empty($company_speciality) || empty($intern_policies)) {
            return 0;
        } else {
            mysqli_query($this->con, "insert into vacancies 
            (
                company_id,company_name,company_address,company_speciality,phone,intern_policies,author
            ) 
            
            values ('$id', '$name', '$company_address', '$company_speciality', '$phone', '$intern_policies', '$author')");
            return 1;
        }
    }

    function register_company($request)
    {
        foreach ($request as $key => $value) {
            $request[$key] = mysqli_real_escape_string($this->con, $value);
        }

        $name = $request['company_name'];
        $username = $request['username'];
        $siup = $request['siup'];
        $company_address = $request['company_address'];
        $phone = $request['phone'];
        $email = $request['email'];
        $password = $request['password'];

        if (empty($name) || empty($username) || empty($siup) || empty($company_address) || empty($phone) || empty($email) || empty($password)) {
            return 0;
        } elseif (!is_numeric($phone) || strlen($phone) > 14) {
            return 2;
        } else {
            $check = mysqli_query($this->con, "select * from company where email = '$email' or username = '$username'");
            $checkRow = mysqli_num_rows($check);
            if ($checkRow > 0) {
                return 3;
            } else {
                mysqli_query($this->con, "insert into company (company_name,username,siup,address,phone,email,password) values ('$name','$username','$siup','$company_address','$phone','$email','$password')");
                return 1;
            }
        }
    }
}
