<?php
session_start();
include("includes/loginheader.php");
if (!$_SESSION['user_email']) {
   header('location:login.php');
}
?>
<br>
<div class="container">
<div class="col-sm-6">
<h1 class="text text-center text-info bg-primary alert"> How to cast Your Vote?</h1>
<ul style="font-size:1.8rem;">
<li>Firstly Select <b>ID Generate</b> From navigation Bar</li>
<li>Generate your ID to<b>VOTE</b>And Proceed Ahead with ELECTIONS</li>

</ul>
<div class="col-sm-6">
<img src="images/1.jpg" class="img img-responsive" alt="error loading">

</div>
</div>
