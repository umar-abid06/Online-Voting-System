<?php
include("includes/header.php");
?>
<?php
require("includes/db.php");
$emailError="";
$accountSuccess="";
$error="";
$success="";
if(isset($_POST['login'])){
	$user_email=$_POST['email'];
	$user_password=$_POST['password'];

	$select="select * from users_db where user_email='$user_email'and user_password='$user_password'";
	$run=$conn->query($select);
	if($run->num_rows>0){
		while($row=$run->fetch_array()) {
			$user_name=$row['user_name'];
			$success="Login Successfully";
		}
	}
	else{
		$error="Invalid Email or Password!";
	}
}
?>
<body>
<br>
<hr>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 bg-info" style="box-shadow:2px 2px 2px gray;">
					<h3 class="text text-center alert bg-primary">User Login</h3>
					<h5 class="text text-center text-danger"><?php
						if($error!=""){
							echo $error;
						}
						if($success!=""){
							echo $success;
						}
					?>	
					</h5>
					<form method="post">
					<div class="form-group">
						<label for="exampleInputEmail">Email:</label>
						<input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email" required>
					</div>
					
					<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" class="form-control" placeholder="Enter Password" required>	
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-block" name="login">Login</button>	
					</div>
				
				</form>
				<br>
			</div>
		</div>
	</div>

</body>
</html>