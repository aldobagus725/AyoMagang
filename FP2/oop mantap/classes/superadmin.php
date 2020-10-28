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
    //Getters
    public function getters($id, $action){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select $action from superadmin where superadmin_id = $id");
        while ($row = $query->fetch_assoc()){
            return $row[$action];
        }
    }
    //Views
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
    public function viewRequest(){
        $query = mysqli_query($this->con, "select * from request");
        return $query;
    }
    //Detail
    public function viewVacancyDetail($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from vacancies where vacancies_id = '$id'");
        return $query;
    }
    public function viewStudentDetail($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from student where student_id = '$id'");
        return $query;
    }
    public function viewApplicationDetail($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from application where application_id = '$id'");
        return $query;
    }
    public function viewCompanyDetail($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from company where company_id = '$id'");
        return $query;
    }
    public function viewRequestDetail($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select * from request where req_id = '$id'");
        return $query;
    }
    //Update & delete
    public function editStudent($id,$fullname,$username,$student_number,$institution_name,$course,$address,$phone,$email){
        $id = mysqli_real_escape_string($this->con, $id);
        if (!is_numeric($phone) || strlen($phone) > 14) {
            return 2;
        }
        else{
            if($query = mysqli_query($this->con, "update student set fullname='$fullname',username='$username',student_number='$student_number',institution_name='$institution_name', course='$course',address='$address',phone='$phone',email='$email' where student_id = $id")){return 1;}
            else{return 4;}
        }
    }
    public function deleteStudent($id){
        $id = mysqli_real_escape_string($this->con, $id);
        if ($query = mysqli_query($this->con, "delete from student where student_id = '$id'")){return 1;}
        else{return 2;}
    }
    public function editCompany($id,$company_name,$username,$siup,$address,$phone,$email){
        $id = mysqli_real_escape_string($this->con, $id);
        if (!is_numeric($phone) || strlen($phone) > 14) {
            return 2;
        }
        else{
            if($query = mysqli_query($this->con, "update company set company_name='$company_name',username='$username',siup='$siup',address='$address',phone='$phone',email='$email' where company_id = $id")){return 1;}
            else{return 4;}
        }
    }
    public function deleteCompany($id){
        $id = mysqli_real_escape_string($this->con, $id);
        if ($query = mysqli_query($this->con, "delete from company where company_id = '$id'")){return 1;}
        else{return 2;}
    }
    public function editVacancy($id,$company_id,$company_name,$vacancy_title,$company_address,$phone,$intern_policies,$author){
        $id = mysqli_real_escape_string($this->con, $id);
        if (!is_numeric($phone) || strlen($phone) > 14) {
            return 2;
        }
        else{
            if($query = mysqli_query($this->con, "update vacancies set company_id='$company_id',company_name='$company_name',vacancy_title='$vacancy_title',company_address='$company_address',phone='$phone',intern_policies='$intern_policies',author='$author' where vacancies_id = $id")){return 1;}
            else{return 4;}
        }
    }
    public function deleteVacancy($id){
        $id = mysqli_real_escape_string($this->con, $id);
        if ($query = mysqli_query($this->con, "delete from vacancy where vacancies_id = '$id'")){return 1;}
        else{return 2;}
    }
    public function editApplication($id,$student_id,$company_id,$vacancies_id,$company_name,$vacancy_title,$company_address,$company_email,$student_name,$student_address,$status){
        $id = mysqli_real_escape_string($this->con, $id);
        if($query = mysqli_query($this->con, "update application set student_id = '$student_id',company_id='$company_id',vacancies_id='$vacancies_id',company_name='$company_name',vacancy_title='$vacancy_title',company_address='$company_address',company_email='$company_email',student_name='$student_name',student_address='$student_address',status='$status' where application_id = $id")){return 1;}
        else{return 4;}
    }
    public function deleteApplication($id){
        $id = mysqli_real_escape_string($this->con, $id);
        if ($query = mysqli_query($this->con, "delete from application where application_id = '$id'")){return 1;}
        else{return 2;}
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