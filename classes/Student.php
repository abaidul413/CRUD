<?php
include"DB.php";

  class Student
  {
  	private $table = "tbl_student";
    private $name;
    private $dept;
    private $age;

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

     public function  readAll()
     {
        $sql = "select * from $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
     }

    public function readById($id)
    {
    	$sql = "select * from $this->table where id = :id";
    	$stmt = DB::prepare($sql);
    	$stmt->bindParam(':id', $id);
    	$stmt->execute();
    	return $stmt->fetch();
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

     public function update($id)
     {
     	$sql = "update $this->table set name = :name, department = :dept, age =:age where id = :id ";
     	$stmt = DB::prepare($sql);
     	$stmt->bindParam(':name', $this->name);
     	$stmt->bindParam(':dept', $this->dept);
     	$stmt->bindParam(':age', $this->age);
     	$stmt->bindParam(':id', $id);
     	return $stmt->execute();
     }

     public function delete($id)
     {
     	$sql = "DELETE from $this->table where id = :id";
     	$stmt = DB::prepare($sql);
     	$stmt->bindParam(':id', $id);
     	return $stmt->execute();

     }

  }

?>