<?php
require_once 'db.php';
class student{
    private $con;
    private $fullname;
    private $username;
    private $password;
    private $student_number;
    private $institution_name;
    private $course;
    private $address;
    private $phone;
    private $email;
    private $token;
    private $aktif;
    //__construct function
    public function __construct(){$koneksi = new database();$this->con = $koneksi->koneksi();}
    //Getters -- experimental, can be unused --
    public function getters($id, $action){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select $action from student where student_id = $id");
        while ($row = $query->fetch_assoc()){return $row[$action];}
    }
    //-----------more functions-------------
    public function register_student_first($fullname,$username,$password,$email,$token,$aktif){
        $this->fullname = $fullname;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->token = $token;
        $this->aktif = $aktif;
        $check = mysqli_query($this->con, "select * from student where email = '$email' or username = '$username'");
        $checkRow = mysqli_num_rows($check);
        if ($checkRow > 0) {return 3;} 
        elseif(mysqli_query($this->con, "insert into student (fullname,username,password,email,token,aktif) values 
            ('$fullname','$username','$password','$email','$token','$aktif')")){return 1;}
        else{return 2;}
    }
    public function register_student_second($id,$student_number,$institution_name,$course,$address,$phone){
        $this->student_number = $student_number;
        $this->institution_name = $institution_name;
        $this->course = $course;
        $this->address = $address;
        $this->phone = $phone;
        if (!is_numeric($phone) || strlen($phone) > 14|| strlen($phone) < 11) {return 2;} 
        elseif(mysqli_query($this->con, "update student set institution_name='$institution_name',student_number='$student_number', course='$course',address='$address',phone='$phone' where student_id = $id")){
                return 1;
        }
        else{
            return 3;
        }
    }
    public function ApplyInternship($student_id,$company_id,$vacancies_id,$company_name,$vacancy_title,$company_address,$company_email,$student_name,$student_address,$status){
        $this->student_id = $student_id;
        $this->company_id = $company_id;
        $this->vacancies_id = $vacancies_id;
        $this->company_name = $company_name;
        $this->vacancy_title = $vacancy_title;
        $this->company_address = $company_address;
        $this->company_email = $company_email;
        $this->student_name = $student_name;
        $this->student_address = $student_address;
        $this->status = $status;
        mysqli_query($this->con, "insert into application (student_id,company_id,vacancies_id,company_name,vacancy_title,company_address,company_email,student_name,student_address,status) values ('$student_id','$company_id','$vacancies_id','$company_name','$vacancy_title','$company_address','$company_email','$student_name','$student_address','$status')");
        return 1;
    }
    public function viewInternshipList(){
        $query = mysqli_query($this->con, "select * from vacancies");
        return $query;
    }
    public function viewRecommendedInternshipList($course){
        $query = mysqli_query($this->con, "select * from vacancies where company_speciality = '$course' limit 3");
        return $query;
    }
    public function viewApplication($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from application where student_id = $id");
        return $query;
    }
    public function viewProfile($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from student where student_id = $id");
        return $query;
    }
    public function editProfile($id,$username,$fullname,$institution_name,$course,$address,$phone){
        $id = mysqli_real_escape_string($this->con, $id);
        if (!is_numeric($phone) || strlen($phone) > 14|| strlen($phone) < 11) {return 2;}
        else{
            if($query = mysqli_query($this->con, "update student set fullname='$fullname', username='$username',institution_name='$institution_name', course='$course',address='$address',phone='$phone' where student_id = $id")){return 1;}
            else{return 3;}
        }
    }
    public function changePassword($id,$password){
        $id = mysqli_real_escape_string($this->con, $id);
        if($query = mysqli_query($this->con, "update student set password = '$password' where student_id = $id")){return 1;}
        else{return 2;}
    }
    public function ResetPassword($email,$password){
        $email = mysqli_real_escape_string($this->con, $email);
        if($query = mysqli_query($this->con, "update student set password = '$password' where email = '$email'")){return 1;}
        else{return 2;}
    }
    public function CreateRequest($req_title,$req_detail,$status){
        if($query = mysqli_query($this->con, "insert into request (req_title,req_detail,status) values ('$req_title','$req_detail','$status')")){return 1;}
        else{return 2;}
    }
}