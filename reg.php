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

	$select="select * from users_db where user_email='$user_email'";
	$exe=$conn->query($select);
	if($exe->num_rows>0){
		$emailError= "<p class='text text-center text-danger'>Email already registered</p>";
	}
	else{
		$insert="insert into users_db (user_name,user_email,user_gender,user_province,user_password) values ('$user_name','$user_email','$user_gender','$user_province','$user_password')";
	$run=$conn->query($insert);
	if($run){
		$accountSuccess= "<p class='text text-center text-success'>Account created successfully</p>";
	}
	else{
		echo "Error";
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
					<h3 class="text text-center alert bg-primary">User Registeration</h3>
					<?php
					if($emailError!=""){
						echo $emailError;
					}
					if($accountSuccess!=""){
						echo $accountSuccess;
					}
					?>
					<form method="post">
					<div class="form-group">
						<label for="exampleInputEmail">Full Name:</label>
						<input type="text" name="fullname" class="form-control" id="exampleInputEmail" placeholder="Enter Full Name" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail">Email:</label>
						<input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email" required>
					</div>
					<div class="form-group">
						<label for="Gender">Gender:</label>
						<select name="gender" class="form-control">
						<option value="">Select</option>
						<option value="Female">Female</option>
						<option value="Male">Male</option>
						</select>
					</div>
					<div class="form-group">
						<label for="Province">Province:</label>
						<select name="province" class="form-control">
						<option value="">Select</option>
						<option value="Sindh">Sindh</option>
						<option value="Punjab">Punjab</option>
						<option value="KPK">KPK</option>
						<option value="Balochistan">Balochistan</option>
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

</body>
</html>