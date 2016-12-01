<?php include'inc/header.php'; ?>

<?php

  spl_autoload_register(function($class_name){
 
     include"classes/".$class_name.".php";

  });

?>


<section class = "main-left">
	
	<?php

      $std = new Student();

     if(isset($_POST['submit']))
      {
      	 $name = $_POST['name'];
      	 $dept = $_POST['department'];
      	 $age  = $_POST['age'];

      	 $std->setName($name);
      	 $std->setDept($dept);
      	 $std->setAge($age);

      	 if($std->insert())
      	 {
      	 	echo "<span style = 'color:green; font-weight:bold;'>Data inserted successfully...</span>";
      	 }
      }
      
    ?>

    <?php

       if (isset($_GET['action']) && $_GET['action'] == 'delete')
         {
            $id = $_GET['id'];
           if($std->delete($id))
           {
           	  echo "<span style = 'color:green; font-weight:bold;'>Data Deleted successfully...</span>";
           }
         }

	     if(isset($_POST['edit']))
	      {
	      	 $name = $_POST['name'];
	      	 $dept = $_POST['department'];
	      	 $age  = $_POST['age'];
	      	 $id  = $_POST['id'];

	      	 $std->setName($name);
	      	 $std->setDept($dept);
	      	 $std->setAge($age);

			if($std->update($id))
	      	 {
	      	 	echo "<span style = 'color:green; font-weight:bold;'>Data Updated successfully...</span>";
	      	 }
	      }


      if (isset($_GET['action']) && $_GET['action'] == 'edit'){
      	
            $id = $_GET['id'];
           $result = $std->readById($id);

     ?>
	    <form action = "" method = "post">
	   	  <table>
	   	  	  <input type="hidden" name = "id" value ="<?php echo $result['id'];?>" required="1">
	   	  	   <tr>
	   	  	   	  <td>Name : </td>
	   	  	   	  <td><input type="text" name = "name" value ="<?php echo $result['name'];?>" required="1"></td>
	   	  	   </tr>

	   	  	   <tr>
	   	  	   	  <td>Department : </td>
	   	  	   	  <td><input type="text" name = "department" value ="<?php echo $result['department'];?>" required="1"></td>
	   	  	   </tr>

	   	  	   <tr>
	   	  	   	  <td>Age : </td>
	   	  	   	  <td><input type="text" name = "age" value ="<?php echo $result['age'];?>" required="1"></td>
	   	  	   </tr>

	   	  	   <tr>
	   	  	   	  <td></td>
	   	  	   	  <td><input type="submit" name = "edit" value="Submit"></td>
	   	  	   </tr>

	   	  </table>
	   </form>

    <?php  }else { ?>

   <form action = "" method = "post">
   	  
   	  <table>
   	  	 
   	  	   <tr>
   	  	   	  <td>Name : </td>
   	  	   	  <td><input type="text" name = "name" placeholder="Your Name" required="1"></td>
   	  	   </tr>

   	  	   <tr>
   	  	   	  <td>Department : </td>
   	  	   	  <td><input type="text" name = "department" placeholder="Your Department" required="1"></td>
   	  	   </tr>

   	  	   <tr>
   	  	   	  <td>Age : </td>
   	  	   	  <td><input type="text" name = "age" placeholder="Your Age" required="1"></td>
   	  	   </tr>

   	  	   <tr>
   	  	   	  <td></td>
   	  	   	  <td><input type="submit" name = "submit" value="Submit"></td>
   	  	   </tr>

   	  </table>

   </form>
 <?php } ?>
</section>


<section class="main-right">
	
   <table class="tblone">
   	
     <tr>
       <th>No</th>
       <th>Name</th>
       <th>Department</th>
       <th>Age</th>
        <th>Action</th>
     </tr>

      <?php

        $i = 0;
        foreach ($std->readAll() as $key => $value) {
        	$i++;
      ?>
     <tr>
     	<td><?php echo $i; ?></td>
     	<td><?php  echo $value['name']; ?></td>
     	<td><?php echo $value['department'] ?></td>
     	<td><?php echo $value['age'] ?></td>
     	<td>
     	  <?php echo "<a href ='index.php?action=edit&id=".$value['id']."'>Edit</a>"; ?> ||
     	  <?php echo "<a href = 'index.php?action=delete&id=".$value['id']."' onClick = 'return confirm(\" Are you sure you want to Delete!!!\")'>Delete</a>";?>
     	</td>
     </tr>
  <?php } ?>
     
   </table>

</section>






<?php include'inc/footer.php'?>