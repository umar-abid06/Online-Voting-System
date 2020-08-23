<?php
session_start();
include("includes/loginheader.php");
if (!$_SESSION['user_id_generated']) {
    header("location:elections.php");
    exit();
}
?>
<br>
<div class="container">
    <div class="col-md-6 col-md-offset-0.2">
    <form method="POST">
 <?php
        require("includes/db.php");
        $elections_name=$_GET['elections_name'];
        echo $elections_name=str_replace('-',' ',$elections_name);
        ?>
            <div class="form-group"><input type="text" value="<?php echo $elections_name; ?>" class="form-control" readonly/></div>

        <?php
        $select="SELECT * FROM candidates_tbl WHERE elections_name='$elections_name'";
        $run=$conn->query($select);
        if($run->num_rows>0){
                while ($row=$run->fetch_array()) {
                    ?>
                    <div class="form-group"> <input type="radio" name="candidates_name" class="list-group" value="<?php echo $row['candidates_name'];?>">
                    <label><?php echo $row['candidates_name'];?></label>
                    </div>
                  <?php
                }
        }
?>
    <input type="submit" name="vote_caste" value="NOW CASTE YOUR VOTE!" class="btn btn-success">
 </form>
    
</div>
</div>
<?php
    if(isset($_POST['vote_caste'])) {
        $candidates_name=$_POST['candidates_name'];
        $user_email= $_SESSION['user_email'];
        $select="SELECT * from results_tbl where user_email='$user_email' and elections_name='$elections_name'";
        $exe1=$conn->query($select);
        if($exe1->num_rows>0) {
            echo "You have already caste your vote against Election".$elections_name;}
            else {
                $insert="INSERT INTO results_tbl (user_email,candidates_name,elections_name) values('$user_email','$candidates_name','$elections_name')";
                $run=$conn->query($insert);
                if($run){
                    $update="UPDATE candidates_tbl set total_votes=`total_votes`+'1' where candidates_name='$candidates_name' and elections_name='$elections_name'";
                    $exe=$conn->query($update);
                    if($exe){
                        echo "<script> alert('YOU HAVE SUCCESSFULLY CASTED YOUR VOTE!');</script>";
                    }
                    else {
                        echo "<script> alert('YOU DID NOT CASTE YOUR VOTE');</script>";
                    }
                }
                else {
                    echo "ERROR";
                }
        
                } 
            }
?>
