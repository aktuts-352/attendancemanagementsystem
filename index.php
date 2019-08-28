<?php

include_once("dbcon.php");
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
	      <a href="view.php" class="btn btn-primary">View</a>
		  <a href="add.php" class="btn btn-primary pull-right">Add</a>
		  
		  
		  <table class="table">
		    <form method="post" action="#">
		  <thead>
		  <tr>
		    <th>Name</th>
			 <th>Roll No.</th>
			  <th>Mobile No.</th>
			   <th>Attendance Status</th>
		  </tr>
		  </thead>
		  
		  <tbody>
		     <?php
			     $query="select * from students";
				 $result=$con->query($query);
				 while($show=$result->fetch_assoc())
				 {
			 
			 ?>
		  
		  
		       <tr>
			      <td><?php echo $show['s_name'];?></td>
				   <td><?php echo $show['s_roll'];?></td>
				    <td><?php echo $show['s_mob'];?></td>
					 <td>
					    Present<input required type="radio" value="Present" name="attendance[<?php echo $show['s_id'];?>]"/>
						Absent<input required type="radio" value="Absent" name="attendance[<?php echo $show['s_id'];?>]"/>
					 
					 </td>
			   </tr>
			   <?php }?>
		      
			  <input type="submit" class="btn btn-primary" value="Take Attendance" name="attend">
			  
		  </tbody>
		  </form>
		  
		  <?php
		    if(isset($_POST['attend']))
			{
			$att=$_POST['attendance'];
			$date=date('y-m-d');
			$query="select distinct date from attend";
			$result=$con->query($query);
			$b=false;
			if($result->num_rows>0)
			{
			  while($check=$result->fetch_assoc())
			  {
			    if($date==$check['date'])
				{
				$b=true;
				echo "Attendance already taken!!";
				}
			  }
			}  
			     if(!$b)
				 {
				    foreach($att as $key =>$value)
					{
					   if($value=="Present")
					   {
					      $query="insert into attend(at_status,s_id,at_date) values('Present',$key,'$date')";
						  $insertResult=$con->query($query);
					   }
					   else
					   {
					    $query="insert into attend(at_status,s_id,at_date) values('Absent',$key,'$date')";
						  $insertResult=$con->query($query);
					   }
					}
					if($insertResult)
					{
					  echo "Attendance taken successfully!";
					}
				 }
			
			}
			/*$name=$_POST['name'];
			$roll=$_POST['roll'];
			$mob=$_POST['mob'];
			*/
			 
			
			
		  
		  ?>
		  
		  </table>
	  </div>
	  <div class="panel panel-footer">
	  
	  </div>
	  </div>

</body>
</html>
