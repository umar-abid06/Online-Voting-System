<?php
include("includes/header.php");
?>
<?php
require("includes/db.php");
$emailError="";
$accountSuccess="";
if(isset($_POST['register'])){
	 $user_name=$_POST['fullname'];
	 $user_email=$_POST['email'];
     $user_gender=$_POST['gender'];
 	 $user_province=$_POST['province'];
 	 $user_password=$_POST['password'];
	
	$select="SELECT * from user_db where user_email='$user_email'";
	$exe=$conn->query($select);
	if($exe->num_rows>0){
		$emailError= "<p class='text text-center text-danger'>Email already registered</p>";
	}
	else{
		$insert="INSERT into user_db (user_name,user_email,user_gender,user_province,user_password) values('$user_name','$user_email','$user_gender','$user_province','$user_password')";
	$run=$conn->query($insert);
	if($run){
		$accountSuccess="<p class='text text-center text-success'>Account created successfully</p>";
	}
	else{
		echo "error";
	}
}
}
?>
<body>
<br>
<hr>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 bg-info" style="box-shadow:2px 2px 2px gray;">
					<h3 class="text text-center alert bg-primary">User Registration</h3>
					<?php
					if ($emailError!="") {
						echo $emailError;
					}
					if ($accountSuccess!="") {
						echo $accountSuccess;
						echo "<script> alert('Congratulations! You are registered..Now go to LOGIN to proceed') </script>";
					}
					?>
					<form method="POST">
					<div class="form-group">
						<label for="exampleInputEmail">Full Name:</label>
						<input type="text" name="fullname" class="form-control" id="exampleInputEmail" placeholder="Enter Full Name" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail">Email:</label>
						<input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email" required>
					</div>
					<div class="form-group">
						<label for="gender">Gender:</label>
						<select name="gender" class="form-control">
						<option >Select</option>
						<option value="Female">Female</option>
						<option value="Male">Male</option>
						</select>
					</div>
					<div class="form-group">
						<label for="province">Province:</label>
						<select name="province" class="form-control">
						<option value="">Select</option>
						<option value="sindh">Sindh</option>
						<option value="punjab">Punjab</option>
						<option value="kpk">KPK</option>
						<option value="balochistan">Balochistan</option>
						</select>
					</div>
					<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" class="form-control">	
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-block" name="register">Submit</button>	
					</div>
				</form>
				<br>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
