<?php
require_once 'db.php';
class application{
    private $con;
    private $student_id;
    private $company_id;
    private $vacancies_id;
    private $company_name;
    private $vacancy_title;
    private $company_address;
    private $company_email;
    private $student_name;
    private $student_address;
    private $status;
    public function __construct(){$koneksi = new database();$this->con = $koneksi->koneksi();}
    //Getters -- experimental, can be unused --
    public function getters($id, $action){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select $action from vacation where student_id = $id");
        while ($row = $query->fetch_assoc()){return $row[$action];}
    }
}
?>