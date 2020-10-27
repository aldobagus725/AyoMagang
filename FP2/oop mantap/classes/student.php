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
    //__construct function
    public function __construct(){
        $koneksi = new database();
        $this->con = $koneksi->koneksi();
    }
    //Getters -- experimental, can be unused --
    public function getters($id, $action){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select $action from student where student_id = $id");
        while ($row = $query->fetch_assoc()){
            return $row[$action];
        }
    }
    //-----------more functions-------------
    public function register_student($fullname,$username,$password,$student_number,$institution_name,$course,$address,$phone,$email){
        $this->fullname = $fullname;
        $this->username = $username;
        $this->password = $password;
        $this->student_number = $student_number;
        $this->institution_name = $institution_number;
        $this->course = $course;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        if (empty($fullname) || empty($username) || empty($email) || empty($password)){
            return 0;
        } elseif (!is_numeric($phone) || strlen($phone) > 14) {
            return 2;
        } else {
            $check = mysqli_query($this->con, "select * from student where email = '$email' or username = '$username'");
            $checkRow = mysqli_num_rows($check);
            if ($checkRow > 0) {
                return 3;
            } else {
                mysqli_query($this->con, "insert into student (fullname,username,password,student_number,institution_name,address,phone,email,course) values ('$fullname','$username','$password','$student_number','$institution_name','$address','$phone','$email','$course')");
                return 1;
            }
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
        $check = mysqli_query($this->con, "select vacancies_id from application where vacancies_id = '$vacancies_id'");
        $checkRow = mysqli_num_rows($check);
        if ($checkRow > 0) {
            return 3;
        } else {
            mysqli_query($this->con, "insert into application (student_id,company_id,vacancies_id,company_name,vacancy_title,company_address,company_email,student_name,student_address,status) values ('$student_id','$company_id','$vacancies_id','$company_name','$vacancy_title','$company_address','$company_email','$student_name','$student_address','$status')");
            return 1;
        }
    }
    public function viewInternshipList(){
        $query = mysqli_query($this->con, "select * from vacancies");
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
        if (!is_numeric($phone) || strlen($phone) > 14) {
            return 2;
        }
        else{
            if($query = mysqli_query($this->con, "update student set fullname='$fullname',institution_name='$institution_name', course='$course',address='$address',phone='$phone' where student_id = $id")){return 1;}
            else{return 3;}
        }
    }
    public function changePassword($id,$password){
        $id = mysqli_real_escape_string($this->con, $id);
        if($query = mysqli_query($this->con, "update student set password = '$password' where student_id = $id")){return 1;}
        else{return 2;}
    }
}