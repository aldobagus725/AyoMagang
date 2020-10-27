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
}
?>