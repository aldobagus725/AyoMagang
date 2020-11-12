<?php
require_once 'db.php';
class request{
    private $con;
    private $req_title;
    private $req_details;
    private $status;
    public function __construct(){$koneksi = new database();$this->con = $koneksi->koneksi();}
    //Getters -- experimental, can be unused --
    public function getters($id, $action){
        $id = mysqli_real_escape_string($this->con, $id);
        $query = mysqli_query($this->con, "select $action from request where req_id = $id");
        while ($row = $query->fetch_assoc()){return $row[$action];}
    }
}
?>