<?php
session_start();
include("includes/loginheader.php");
if (!$_SESSION['user_id_generated']) {
    header("location:elections.php");
}
?>
<br>
<div class="container">
    <div class="col-md-6 col-md-offset-0.2">
    <h3 class="text text-info text-center">Result Portion</h3>
    <p class="text text-danger">In this section,those election results will display which are closed or date expired</p>
    <form method="POST" >
    <div class="form-group">
    <select class="form-control" name="ename">
    <option selected="selected" value="">Select Election</option>
    <?php
    $current_ts=date("Y-m-d");
    require("includes/db.php");
        $select="SELECT * FROM elections_tbl";
        $run=$conn->query($select);
        if($run->num_rows>0){
            while ($row=$run->fetch_array()) {
               $elections_name=$row['elections_name'];
               $elections_start_date=$row['elections_start_date'];
               $elections_end_date=$row['elections_end_date'];
        
		$elections_end_date_ts=strtotime($elections_end_date);
        if ($elections_end_date>=$current_ts) {            
        ?>
        <option value="<?php echo $row['elections_name'];?>"><?php echo $row['elections_name'];?></option>
        <?php
        }
    }
}
?>
    </select>
   <br>
    <div class="form-group">
    <input type="submit" name="search_results" class="btn btn-success" value="Search Result">
   </div>
</div>
    </form>
    <table class="table table-responsive table-hover table-bordered text-center">
    <tr>
    <td>Candidate's name</td>
    <td>Obtain Votes</td>
    </tr>
    
    <?php
    
    if(isset($_POST['search_results'])){
		
        $ename = $_POST['ename'];
		$select="SELECT candidates_name, count(id) as vote FROM `results_tbl` where elections_name='$ename' group by candidates_name";
        $run1=$conn->query($select);
        if($run1->num_rows>0){
            while ($row2=$run1->fetch_array()) {
                ?>
                    <tr>
                    <td><?php echo $row2["candidates_name"]; ?></td>
                    <td><?php echo $row2["vote"]; ?></td>
					</tr>

            <?php
        }
        
	}
	}
    ?>
    </table>
    </div>
  

</div>

