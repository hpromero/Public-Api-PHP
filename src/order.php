<?php
namespace hpromero\ApiEjercicio1;
include 'dbConn.php';


class order extends DBconn{

    public function getAll(){
        $result = $this->connect()->query('SELECT * FROM orders');
        $this->disconnect();
        return $result;
    }

    public function getCompany($company){
        $sql = 'SELECT * FROM orders WHERE company LIKE "%'.$company.'%"';
        $result = $this->connect()->query($sql);
        $this->disconnect();
        return $result;
    }

    public function getDate($date){
        $sql = 'SELECT * FROM orders WHERE date LIKE "'.$date.'"';
        $result = $this->connect()->query($sql);
        $this->disconnect();
        return $result;
    }
    

    public function getDateCompany($date, $company){
        $sql = 'SELECT * FROM orders WHERE date LIKE "'.$date.'" AND company LIKE "%'.$company.'%"';
        $result = $this->connect()->query($sql);
        $this->disconnect();
        return $result;
    }

    
    

}
?>