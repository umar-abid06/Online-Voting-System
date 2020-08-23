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
        <form method="POST">
           <?php
            $conn =new mysqli("localhost","root","","webproject_db");
            $elections_name=$_GET['elections_name'];
            $total_candidates=$_GET['total_candidates'];
?>
            <label>ELECTION NAME:</label>
          <input type="text" name="elections_name" value="<?php echo  $elections_name;?>" class="form-control" readonly>

<?php
           for($i=1; $i<=$total_candidates ; $i++) { 
           ?>
           <div class="form-group">
           <label>Candidate name <?php echo $i;?></label>
           <input type="text" name="candidates_name<?php echo $i;?>" class="form-control">
           </div>
        <?php
           }
        ?>
           <input type="submit" name="add_details_candidates" class="btn btn-success">
           </div>
        </form>
     </div>
</body>
</html>
<?php
    if(isset($_POST['add_details_candidates'])){
        $total_candidates=$_GET['total_candidates'];
        $elections_name=$_POST['elections_name'];
       
        for ($i=1; $i<=$total_candidates; $i++) {
           
            $candidates_name[]=$_POST['candidates_name'.$i];
        }
        for ($i=0; $i<$total_candidates ; $i++) { 
            $insert="INSERT into candidates_tbl (candidates_name,elections_name) values('$candidates_name[$i]','$elections_name')";
            $run=$conn->query($insert);
        }
                if ($run) {
                    echo "Success";
                  
                }
                else {
                    echo "ERROR";
                }

            }
        
?>