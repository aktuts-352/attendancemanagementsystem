<?php

include_once("dbcon.php");//connection establish
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
	      <a href="index.php" class="btn btn-primary">Back</a>
		  
		  
		  
		  <table class="table">
		    <thead>
		  <tr>
		    <th>Sr No.</th>
			 <th>Date</th>
			  <th>View</th>   
		  </tr>
		  </thead>
		            <?php
					
					    $query="select distinct at_date from attend";
						$result=$con->query($query);
						
						if($result->num_rows>0)
						{
						   $i=0;
						   while($val=$result->fetch_assoc())
						   {
						      $i++;
						   
						
					
						
					?>
			   
			   
			   
			   
		  <tr>
		      <td><?php echo $i;?></td>
			  <td><?php echo $val['at_date'];?></td>
			  <td><a href="viewp.php?at_date=<?php echo $val['at_date']?>" class="btn btn-primary">View</a></td>
		  </tr>
		 
		   <?php }}?>
		  </table>
	  </div>
	  <div class="panel panel-footer">
	  
	  </div>
	  </div>

</body>
</html>
