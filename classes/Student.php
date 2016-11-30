<?php
include"DB.php";

  class Student
  {
  	private $table = "tbl_student";
    private $name;
    private $dept;
    private $age;
    
     public function  readAll()
     {
        $sql = "select * from $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
     }

     public function setName($name)
     {
     	$this->name = $name;
     }

     public function setDept($dept)
     {
     	$this->dept = $dept;
     }

     public function setAge($age)
     {
     	$this->age = $age;
     }


     public function insert()
     {
     	$sql = "insert into $this->table(name, department, age)values(:name, :dept, :age)";
     	$stmt = DB::prepare($sql);
     	$stmt->bindParam(':name', $this->name);
     	$stmt->bindParam(':dept', $this->dept);
     	$stmt->bindParam(':age', $this->age);
     	return $stmt->execute();
     }

  }

?>