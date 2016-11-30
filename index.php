<?php include'inc/header.php'; ?>

<?php

  spl_autoload_register(function($class_name){
 
     include"classes/".$class_name.".php";

  });

?>

<?php

  $std = new Student();

?>




<section class = "main-left">
	
   <form action = "" method="">
   	  
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
     		<a href="#">Edit</a>||
     		<a href="#">Delete</a>
     	</td>
     </tr>
  <?php   }  ?>
     
   </table>

</section>






















<?php include'inc/footer.php'?>