<html>
<head>
<title>Online Voting</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="mystyle.css"/>
	<link rel="stylesheet" type="text/css" href="css/fonts.css"/>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

</head>
<body>
    <div class="container">
    <div class="col-sm-6">
        <h3>ADD NEW ELECTION:</h3>
        <form method="post">
            <div class="form-group">
                <label >ADD ELECTION NAME:</label>
                <input type="text" name="elections_name" class="form-control">
             </div>
             <div class="form-group">
                <label >ELECTION START DATE</label>
                <input type="date" name="elections_start_date" class="form-control">
             </div>
             <div class="form-group">
                <label >ELECTION END DATE:</label>
                <input type="date" name="elections_end_date" class="form-control">
             </div>
                <input type="submit" name="add_elections" class="bt btn-success"s>
        </form>
    </div>
    </div>
</body>
</html>
<?php
    $conn=new mysqli("localhost","root","","webproject_db");
    if(isset($_POST['add_elections'])){
        $elections_name=$_POST['elections_name'];
        $elections_start_date=$_POST['elections_start_date'];
        $elections_end_date=$_POST['elections_end_date'];
        $insert="INSERT INTO elections_tbl (elections_name,elections_start_date,elections_end_date) values('$elections_name','$elections_start_date','$elections_end_date')";
        $run=$conn->query($insert);
        if($run){
            echo "<script> alert('Successfully scheduled the election!..Now add about the candidates');</script>";
            header("location:add_candidates.php");
        }
        else {
            echo "error";
        }

    }




?>