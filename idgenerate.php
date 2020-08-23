<?php
session_start();
include("includes/loginheader.php");
if (!$_SESSION['user_email']) {
   header('location:login.php');
}
?>
<br>
<div class="container">
<?php
require("includes/db.php");
$user_email=$_SESSION['user_email'];
$select="SELECT * from id_request_tbl where user_email='$user_email'";
$run=$conn->query($select);
if($run->num_rows>0) {
	
	?>
	<br>
<div class="col-sm-6 col-sm-offset-0,4 bg-success alert" style="color:black;">
	<h4>You Request has been <b>submitted.</b></h4>
	</div>
	<?php
}
else {
?>
	<?php
$select="SELECT * from user_db where user_email='$user_email'";
$run=$conn->query($select);
if ($run->num_rows>0) {
    while($row=$run->fetch_array()) {
        $user_name=$row['user_name'];
        $user_email=$row['user_email'];
		$user_province=$row['user_province'];
		$user_id_generated =$row['user_id_generated'];
}
}
if ($user_id_generated!="") {
	?>
	<div class="col-sm-6 col-sm-offset-0.4 bg-success alert"style="color:black;">
		<h4>Your ID is "<b class="text text-danger"><?php echo $user_id_generated;?></b> "</h4>
		<p><b>NOTE:</b>USE THIS ID WITH YOUR LOGIN PASSWORD TO CASTE YOUR VOTE!</p>
		
	<?php
}
else{
?>	
<div class="col-sm-7 col-sm-offset-0.4 bg-success alert">
<form method="POST">
					<div class="form-group" style="color:black;">
						<label for="exampleInputEmail">User name</label>
						<input type="text" name="user_name" class="form-control" id="exampleInputEmail" placeholder="Enter User NameS"
                        required value="<?php echo $user_name;?>"readonly>
					</div>
                    <div class="form-group"style="color:black;">
						<label for="exampleInputEmail">Email address</label>
						<input type="email" name="user_email" class="form-control" id="exampleInputEmail" placeholder="Enter Email" required
                        required value="<?php echo $user_email;?>"readonly>
					</div>
                    <div class="form-group"style="color:black;">
						<label for="exampleInputEmail">Province</label>
						<input type="text" name="user_province" class="form-control" id="exampleInputEmail" placeholder="Enter Province"
                        required value="<?php echo $user_province;?>"readonly>
					</div>
                  
					<div class="form-group">
						<button type="submit" class="btn btn-info btn-block" name="idrequest">ID Request</button>	
					</div>
				
				</form>
</div>
</div>
<?php
if(isset($_POST['idrequest'])){
	 $user_email=$_POST['user_email'];
	 $user_province=$_POST['user_province'];
	 require("includes/db.php");
	
		$insert= "INSERT into id_request_tbl (user_email,user_province) values('$user_email','$user_province')";

		$run=$conn->query($insert);
		if($run){
			echo "<script> alert('Your request has been submitted successfully'); </script>";
			header("location:idgenerate.php");
		}
		else{
			echo "Error";
		}
	}
}
}
?>







