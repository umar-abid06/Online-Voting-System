<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="mystyle.css"/>
	<link rel="stylesheet" type="text/css" href="css/fonts.css"/>
	


</head>
<body style="background-image: url('images/imgimg1.jpg');">
<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
				<a class="navbar-brand" href="#">ELECTLEADERS.com</a>
			</div>
            <ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="idgenerate.php">ID Generate</a></li>
			<li><a href="elections.php">Election</a></li>
			<li><a href="results.php">Results</a></li>
            <li><a href="vote.php">Vote</a></li>
            <li><a href="logout.php">Logout</a></li>
			<li><a href=""><?php echo $_SESSION['user_name']; ?></a></li>
			
			
			</ul>
		</div>
	</nav>
</div>
<div class="container">
		<div class="row">
<div class="row">
			<div class="card" style="background-color:black;opacity:0.8;">
				<h3 style="padding:100px 300px 100px 200px;color:white;">
				<div class="col-sm-13">
				<h2 class="text text-centre text-info alert bg-info">Vote Today With <span> ELECTLEADERS <span></h2>
				<img class="img-rounded" src="https://media.giphy.com/media/24FM6nyhn0k9L4v038/giphy.gif" alt="">
			</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
