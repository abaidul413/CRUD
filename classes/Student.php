<?php
include "BD.php";

  class Student
  {
  	private $table = "tbl_student";
     public function  readAll()
     {
        $sql = "select * from $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
     }
  }

?>