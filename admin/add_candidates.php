<!DOCTYPE html>
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
        <h3>ADD CANDIDATES:</h3>
        <form method="GET" action="add_details_candidates.php">
            <div class="form-group">
                <label>SELECT ELECTION NAME:</label>
                <select class="form-control" name="elections_name">
            <option value="" selected="Selected">Select Election</option>
        <?php
        $conn =new mysqli("localhost","root","","webproject_db");
        $select="SELECT * FROM elections_tbl";
        $run=$conn->query($select);
        if($run->num_rows>0){
            while ($row=$run->fetch_array()) {
        ?>
        <option value="<?php echo $row['elections_name'];?>"><?php echo $row['elections_name'];?></option>
        <?php
     }
    }
?>
        </select>
        </div>
               <div class="form-group">
                   <label>No. Of Candidates</label>
                   <input type="text" name="total_candidates" class="form-control">
               </div> 
                <input type="submit" name="add_elections" class="btn btn-success">
        </form>
    </div>
    </div>
</body>
</html>