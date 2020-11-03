<?php
require_once 'db.php';
class vacancies{
    private $con;
    private $company_id;
    private $company_name;
    private $vacancy_title;
    private $company_address;
    private $company_speciality;
    private $phone;
    private $intern_policies;
    private $author;
    
    public function __construct(){$koneksi = new database();$this->con = $koneksi->koneksi();}
    //Getters -- experimental, can be unused --
    public function getters($id, $action){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select $action from vacancies where vacancies_id = $id");
        while ($row = $query->fetch_assoc()){
            return $row[$action];
        }
    }
    public function editVacancy($id,$company_id,$company_name,$company_address,$phone,$vacancy_title,$author,$company_speciality,$intern_policies){
        $id = mysqli_real_escape_string($this->con, $id);
        if($query = mysqli_query($this->con, "update vacancies set company_id='$company_id',company_name='$company_name',company_address='$company_address',phone='$phone',vacancy_title='$vacancy_title',author='$author',company_speciality='$company_speciality',intern_policies='$intern_policies' where vacancies_id = $id")){return 1;}
        else{return 2;}
    }
}