<?php
session_start();
include("includes/loginheader.php");
if (!$_SESSION['user_id_generated']) {
    header("location:elections.php");
}
?>
<br>
<div class="container" style="color:white;">
    <div class="col-md-6 col-md-offset-0.4">
    <form method="post">
        <label>Election Name</label>
        <select name="elections_name" id="" class="form-control">
            <option selected="Selected">Select Election</option>
        <?php
        require("includes/db.php");
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
        <br>
       <input type="submit" name="search_candidate" class="btn btn-success" value="Search Candidate">
 </form>
    
    
    </div>
</div>
</div>
<?php
    date_default_timezone_set("Asia/Karachi");
    if(isset($_POST['search_candidate'])){
        $elections_name=$_POST['elections_name'];
        $select="SELECT * from elections_tbl where elections_name='$elections_name'";
        $run=$conn->query($select);
        if($run->num_rows>0){
            while ($row=$run->fetch_array()) {
                $elections_start_date=$row['elections_start_date'];
                $elections_end_date=$row['elections_end_date'];
            }
        
        }
           $current_ts=time();
          $elections_start_date_ts=strtotime($elections_start_date);
           $elections_end_date_ts=strtotime($elections_end_date);
        if ($elections_start_date_ts>$current_ts) {
            echo "Elections are not started yet..Please wait";
        }elseif ($current_ts>$elections_end_date_ts) {
            echo "Election has been closed..You did not caste your vote!";
        }
        else {
         ?>
         <a href="votecaste.php?elections_name=<?php echo str_replace(' ',"-",$elections_name);?>">CLICK HERE</a>
         
         <?php
        }
    }
?>