<?php
require_once 'db.php';
class company{
    private $con;
    private $company_name;
    private $username;
    private $password;
    private $siup;
    private $address;
    private $phone;
    private $email;
    private $token;
    private $aktif;
    public function __construct(){$koneksi = new database();$this->con = $koneksi->koneksi();}
    //Getters -- experimental, can be unused --
    public function getters($id, $action){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select $action from company where company_id = $id");
        while ($row = $query->fetch_assoc()){
            return $row[$action];
        }
    }
    //-----------more functions-------------
    public function register_company($company_name,$username,$password,$siup,$address,$phone,$email,$token,$aktif){
        $this->company_name = $company_name;
        $this->username = $username;
        $this->password = $password;
        $this->siup = $siup;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->token = $token;
        $this->aktif = $aktif;
        if (empty($name) || empty($username) || empty($email) || empty($password)) {return 0;} 
        elseif (!is_numeric($phone) || strlen($phone) > 14) {return 2;} 
        else {
            $check = mysqli_query($this->con, "select * from company where email = '$email' or username = '$username'");
            $checkRow = mysqli_num_rows($check);
            if ($checkRow > 0) {return 3;} 
            else {
                $check_siup = mysqli_query($this->con, "select * from company where siup = '$siup'");
                $checkRow_siup = mysqli_num_rows($check_siup);
                if ($checkRow_siup > 0) {return 4;}
                else{
                mysqli_query($this->con, "insert into company (company_name,username,siup,address,phone,email,password,token,aktif) 
                                                values ('$company_name','$username','$siup','$address','$phone','$email','$password','$token','$aktif')");
                return 1;                   
                }
            }
        }
    }
    public function viewInternshipList($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from vacancies where company_id = $id");
        return $query;
    }
    public function viewInternshipDetail($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from vacancies join company on vacancies.company_id = company.company_id where vacancies_id = $id");
        return $query;
    }
    public function viewApplication($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from application where company_id = $id");
        return $query;
    }
    public function viewProfile($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from company where company_id = $id");
        return $query;
    }
    public function OpenVacancy($company_id,$company_name,$vacancy_title,$company_address,$company_speciality,$phone,$intern_policies,$author){
        $this->company_id = $company_id;
        $this->company_name = $company_name;
        $this->vacancy_title = $vacancy_title;
        $this->company_address = $company_address;
        $this->company_speciality = $company_speciality;
        $this->phone = $phone;
        $this->intern_policies = $intern_policies;
        $this->author = $author;
        if (empty($author) || empty($intern_policies)) {
            return 0;
        } else {
            mysqli_query($this->con, "insert into vacancies (company_id,company_name,vacancy_title,company_address,company_speciality,phone,intern_policies,author) 
                            values ('$company_id','$company_name','$vacancy_title','$company_address','$company_speciality','$phone','$intern_policies','$author')"
                        );
            return 1;
        }
    }
    public function editProfileC($id,$username,$company_name,$address,$phone){
        $id = mysqli_real_escape_string($this->con, $id);
        if (!is_numeric($phone) || strlen($phone) > 14) {
            return 2;
        }
        else{
            if($query = mysqli_query($this->con, "update company set company_name='$company_name', username='$username',address='$address',phone='$phone' where company_id = $id")){return 1;}
            else{return 3;}
        }
    }
    public function changePasswordC($id,$password){
        $id = mysqli_real_escape_string($this->con, $id);
        if($query = mysqli_query($this->con, "update company set password = '$password' where company_id = '$id'")){return 1;}
        else{return 2;}
    }
    public function CreateRequest($req_title,$req_detail,$status){
        if($query = mysqli_query($this->con, "insert into request (req_title,req_detail,status) values ('$req_title','$req_detail','$status')")){return 1;}
        else{return 2;}
    }
    
}
