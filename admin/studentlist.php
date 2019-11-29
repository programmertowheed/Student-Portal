<!-- Header -->
<?php include("header.php")?>

<!-- main menu -->
<?php include("nav.php")?>
<?php
if(!isset($_COOKIE['C_U_A'])){
	 header("Location: index.php");
}
?>

<?php include"deshheader.php";?>


<div class="top">
	<div class="row">
		<div class="col">
		    <h4 class="log-text text-center">All Student List</h4>
		</div>
	</div>	   
</div>



<div class="otersection">
	<div class="deshsec">
	
	
	<?php if(isset($_GET['msg'])){
			$msg = $_GET['msg'];
			echo "<h4 class='text-success ml-2'>".$msg."</h4>";
}?>
<?php if(isset($_GET['error'])){
	$error = $_GET['error'];
	echo "<h4 class='text-danger ml-2'>".$error."</h4>";
}?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">SL. NO</th>
				  <th scope="col">Name</th>
				  <th scope="col">Email</th>
				  <th scope="col">Student ID</th>
				  <th scope="col">Department</th>
				  <th scope="col">Action</th>
				</tr>
			  </thead>
			  <tbody>
		 <?php
			$query = "SELECT * FROM tbl_signup_info";
			$red = $db->select($query);
			$i=1;
			if($red==false){?>
			
			<td colspan="7"><h4>No Data Found</h4></td>

					
			<?php }else{
				while($resu = mysqli_fetch_assoc($red)){
					$id=$resu['id']; ?>	
				<tr>
				  <td><?php echo $i++ ;?></td>
				  <td><?php echo $resu['fname'].' '.$resu['lname'] ;?></td>
				  <td><?php echo $resu['email'] ;?></td>
				  <td><?php echo $resu['StudentID'] ;?></td>
				  <td><?php echo $resu['Department'] ;?></td>
				  <td>
				  <a href="view.php?email=<?php echo $resu['email'];?>" class="btn btn-success">View
				  </a>
				  <a href="studentdel.php?email=<?php echo $resu['email'];?>" onclick="return confirm('Are you sure you want to Delete?');" class="btn btn-danger">Delete
				  </a>
				  </td>
				</tr>
			<?php }}?>
				
			  </tbody>
			</table>
		</div>
	</div>
</div> 






<?php include"deshfooter.php";?>


<?php include"footer.php";?>
	
