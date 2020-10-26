<?php
require_once 'db.php';
class superadmin{
    private $con;
    private $fullname;
    private $username;
    private $email;
    public function __construct(){
        $koneksi = new database();
        $this->con = $koneksi->koneksi();
    }
    public function getters($id, $action){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select $action from superadmin where superadmin_id = $id");
        while ($row = $query->fetch_assoc()){
            return $row[$action];
        }
    }
    public function viewVacancy(){
        $query = mysqli_query($this->con, "select * from vacancies");
        return $query;
    }
    public function viewStudent(){
        $query = mysqli_query($this->con, "select * from student");
        return $query;
    }
    public function viewApplication(){
        $query = mysqli_query($this->con, "select * from application");
        return $query;
    }
    public function viewCompany(){
        $query = mysqli_query($this->con, "select * from company");
        return $query;
    }
//more statistic function
// JUMLAH DATA
    public function countStudent(){
        $student_result = mysqli_query($this->con, "SELECT count(*) FROM student");
        $student_num_rows = mysqli_fetch_row($student_result)[0];
        return $student_num_rows;
    }
    public function countCompany(){
        $company_result = mysqli_query($this->con, "SELECT count(*) FROM company");
        $company_num_rows = mysqli_fetch_row($company_result)[0];
        return $company_num_rows;
    }
    public function countVacancy(){
        $vacancy_result = mysqli_query($this->con, "SELECT count(*) FROM vacancies");
        $vacancy_num_rows = mysqli_fetch_row($vacancy_result)[0];
        return $vacancy_num_rows;
    }
    public function countApplication(){
        $application_result = mysqli_query($this->con, "SELECT count(*) FROM application");
        $application_num_rows = mysqli_fetch_row($application_result)[0];
        return $application_num_rows;
    }
    public function countUsers($student_num_rows,$company_num_rows){
        $total_user = $student_num_rows + $company_num_rows;
        return $total_user;
    }
//Data terakhir (tanggal)
    public function lastEntryStudent(){
        $student_date_result = mysqli_query($this->con, "SELECT MAX(create_time) FROM student");
        $student_date = mysqli_fetch_row($student_date_result)[0];
        if ($student_date==NULL){return "N/A";}
        else{return $student_date;}
    }
    public function lastEntryCompany(){
        $company_date_result = mysqli_query($this->con, "SELECT MAX(create_time) FROM company");
        $company_date = mysqli_fetch_row($company_date_result)[0];
        if ($company_date==NULL){return "N/A";}
        else{return $company_date;}
    }
    public function lastEntryVacancy(){
        $vacancy_date_result = mysqli_query($this->con, "SELECT MAX(create_time) FROM vacancies");
        $vacancy_date = mysqli_fetch_row($vacancy_date_result)[0];
        if ($vacancy_date==NULL){return "N/A";}
        else{return $vacancy_date;}
    }
    public function lastEntryApplication(){
        $application_date_result = mysqli_query($this->con, "SELECT MAX(create_time) FROM application");
        $application_date = mysqli_fetch_row($application_date_result)[0];
        if ($application_date==NULL){return "N/A";}
        else{return $application_date;}
    }
}
?>