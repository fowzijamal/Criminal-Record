<?php include("layout-top.php") ?>  

<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    
    // Prepare a select statement
    $sql = "SELECT * FROM police WHERE id = ?";
    
    if($stmt = mysqli_prepare($db, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
               $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
            //    // Retrieve individual field value
            //    $name = $row["name"];
            //    $address = $row["address"];
            //    $salary = $row["salary"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     


} else{
    exit();
}
?>
<!-- body content incluade in heare -->

<div class="container">
    <div class="col-sm-12">
        <div >
            <table class="table table-bordered">
                <!-- <thead> <tr><th></th><th></th><th></th> </tr></thead> -->
                <tbody>
                    <tr>
                        <td>Job ID</td><td>:</td><td> <p class="pl-5 text-danger m-0"><?php echo $row["jobid"];  ?></p></td>
                        <td rowspan="5" style="width:200px;"><img src="<?php echo $row['image']; ?>"class="img-thumbnail" width="200px"></td>
                    </tr>
                    <tr>
                        <td> Police Station</td><td>:</td><td> <p class="pl-5 text-danger m-0"><?php echo $row["polisestation"];  ?></p></td>
                    </tr>
                    <tr>
                        <td> NID No. </td><td>:</td><td> <p class="pl-5 text-danger m-0"><?php echo $row["poneNumber"];   ?></p></td>
                    </tr>
                    <tr>
                        <td> Police Name</td><td>:</td><td> <p class="pl-5 text-danger m-0"><?php echo $row["fName"]." ".$row["lName"];  ?></p></td>
                    </tr>
                    <tr>
                        <td> Date Of Bith</td><td>:</td><td> <p class="pl-5 text-danger m-0"><?php echo $row["dateOFbirth"];  ?></p></td>
                    </tr>
                    <tr>
                        <td> Email Address</td><td>:</td><td colspan="2"> <p class="pl-5 text-danger m-0"><?php echo $row["email"];  ?></p></td>
                    </tr>
                   
                    <tr>
                        <td> Address</td><td>:</td><td colspan="2"> <p class="pl-5 text-danger m-0"><?php echo $row["address"];  ?></p></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-body">
              <div class="table-responsive">
              <?php
              // Attempt select query execution
$sql = "SELECT * FROM crime WHERE police_Id=$param_id ";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='"."table table-bordered"."' width='"." 100%"."'>";
            echo "<tr>";
                echo "<th>Case No</th>";
                echo "<th>Crime Location</th>";
                echo "<th>Crime Type</th>";
                echo "<th>Crime Category</th>";
                echo "<th>Court</th>";
                echo "<th>Duty Police</th>";
                echo "<th>Punishment</th>";
                echo "<th>Crime Date</th>";
                echo "<th></th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            $data = $row['police_Id'];
            $police = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `police`  where id = $data"));
            echo "<tr>";
                echo "<td>" . $row['caseno'] . "</td>";
                echo "<td>" . $row['place'] . "</td>";
                echo "<td>" . $row['crimeType'] . "</td>";
                echo "<td>" . $row['crimeCategory'] . "</td>";
                echo "<td>" . $row['court'] . "</td>";
                echo "<td>" . $police['fName']." ".$police['lName']. "</td>";
                echo "<td>" . $row['punishment'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo " <td><a href='read-crime.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a></td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No crime records matching were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}?>
              </div>
            </div>
</div>





<?php 

    // Close statement
    mysqli_stmt_close($stmt);

include("layout-footer.php") 


?>