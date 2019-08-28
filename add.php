<?php

include_once("dbcon.php");
//yes it is comment
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Attendance Management System</title>
     <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
	 <script src="bootstrap/bootstrap.min.js"></script>
	  <script src="bootstrap/jquery-3.4.1.min.js"></script>
</head>

<body>
      <div class="panel panel-default container">
	  <div class="panel panel-heading">
	       <h1 style="text-align:center;">Attendance Management System</h1>
	  </div>
	  <div class="panel panel-body">
	  
	    <?php
		
		       if(isset($_POST['submit']))
			   {
			   $name=$_POST['name'];
			   $roll=$_POST['roll'];
			   $mob=$_POST['mob'];
			   
			   if($name==""||$roll==""||$mob=="")
			   {
			     echo "Field must not be empty";
			   }
			   else
			   {
			   $cmd="Insert into students (s_name,s_roll,s_mob) values('$name','$roll','$mob')";
			   
			   if(mysqli_query($con,$cmd))
                 {
                  echo "Data inserted successfully";
                 }
				 else
                  {
                   echo "There is an error " .$cmd;
                  }
				}
			 }	
		
		
		?>
		
	  
	  <form method="post" action="#">
	      <a href="view.php" class="btn btn-primary">View</a>
		  <a href="index.php" class="btn btn-primary pull-right">Back</a>
		  
		  <div class="form-group">
		  <label for="name">Name:</label>
		  <input type="text" name="name" class="form-control">
		  
		  </div>
		  
		  <div class="form-group">
		  <label for="name">Roll NO:</label>
		  <input type="text" name="roll" class="form-control">
		  
		  </div>
		  
		  <div class="form-group">
		  <label for="name">Mobile No:</label>
		  <input type="text" name="mob" class="form-control">
		  
		  </div>
		  
		  <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
		  
		  
	</form>	  
	  </div>
	  <div class="panel panel-footer">
	  
	  </div>
	  </div>

</body>
</html>
