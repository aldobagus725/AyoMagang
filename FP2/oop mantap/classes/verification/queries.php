<?php
class queries extends db {
    public $result;
    public function query($qry, $params = []){
        if(empty($params)){
            $this->result = $this->connect->prepare($qry);
            return $this->result->execute();
        } else {
            $this->result = $this->connect->prepare($qry);
            return $this->result->execute($params);
        }
    }
    public function count(){return $this->result->rowCount();}
    public function fetch(){return $this->result->fetch(PDO::FETCH_OBJ);}
}
?>