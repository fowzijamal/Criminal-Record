<?php include("layout-top.php") ?>  

<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    
    // Prepare a select statement
    $sql = "SELECT * FROM crime WHERE id = ?";
    
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
               $data = $row['police_Id'];
               $police = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `police`  where id = $data"));
               $criminal_id =  $row['criminal_ID'];
                
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
                        <td> Case No.</td><td>:</td><td> <p class="pl-5 text-danger m-0"><?php echo $row["caseno"];  ?></p></td>
                        <td rowspan="5" style="width:200px;"><img src="<?php echo $row['image']; ?>"class="img-thumbnail" width="200px"></td>
                    </tr>
                    <tr>
                        <td> Crime Location</td><td>:</td><td> <p class="pl-5 text-danger m-0"><?php echo $row["location"]; ?></p></td>
                    </tr>                    
                    <tr>
                        <td> Crime Place</td><td>:</td><td> <p class="pl-5 text-danger m-0"><?php echo $row["place"]; ?></p></td>
                    </tr>
                    <tr>
                        <td> Crime Type</td><td>:</td><td> <p class="pl-5 text-danger m-0"><?php echo $row["crimeType"];  ?></p></td>
                    </tr>
                    <tr>
                        <td> Crime Category</td><td>:</td><td> <p class="pl-5 text-danger m-0"><?php echo $row["crimeCategory"];  ?></p></td>
                    </tr>
                    <tr>
                        <td> Date Of Crime</td><td>:</td><td> <p class="pl-5 text-danger m-0"><?php echo $row["date"];  ?></p></td>
                    </tr>
                    <tr>
                        <td> Court</td><td>:</td><td colspan="2"> <p class="pl-5 text-danger m-0"><?php echo $row["court"];  ?></p></td>
                    </tr>
                    <tr>
                        <td> Police Information</td><td>:</td><td colspan="2"> <strong>Police Name</strong> <span class="pl-2 text-danger m-0"><?php echo $police['fName']." ".$police['lName']; ?></span>  <strong>Job No</strong> <span class="pl-2 text-danger m-0"><?php echo $police['jobid'];  ?></span></td>
                    </tr>
                    <tr>
                        <td> Judge Name</td><td>:</td><td colspan="2"> <p class="pl-5 text-danger m-0"><?php echo $row['judge_name'];  ?></p></td>
                    </tr>                    
                    <tr>
                        <td> Punishment</td><td>:</td><td colspan="2"> <p class="pl-5 text-danger m-0"><?php echo $row['punishment'];  ?></p></td>
                    </tr>
                    <tr>
                        <td> Details</td><td>:</td><td colspan="2"> <p class="pl-5 text-danger m-0"><?php echo $row['description'];  ?></p></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-body">
              <div class="table-responsive">
              <?php
              // Attempt select query execution

    $sql = "SELECT * FROM criminal WHERE id=$criminal_id ";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){

        echo "<table class='"."table table-bordered"."' width='"." 100%"."'>";
            echo "<tr>";
                echo "<th></th>";
                echo "<th>Information</th>";
                echo "<th>Identity</th>";
                echo "<th>Date Of Birth</th>";
                echo "<th></th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
          //  $data = $row['police_Id'];
          // $police = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `police`  where id = $data"));
            echo "<tr>";
                echo " <td><img src='".$row['image']."'class='"."rounded-circle"."'width='"."50"."'height='"."50"."'> </td>";
                
                echo "<td>".$row['fName']." ".$row['lName']."<br>
                Father's Name: " .$row['fathersName']."<br>
                Mothers's Name: " .$row['mothersName']."<br>
                Mark Symbol: " .$row['symbol'].
                "
                </td>";
                echo "<td> NID: ".$row['poneNumber']."<br>
                Contact No:  ".$row['contactno']."
                </td>";
                echo "<td>" . $row['dateOFbirth'] . "</td>";
                echo "<td><a href='read-criminal.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
                <a href='update-criminal.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pen'></span></a></td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No Criminal records matching were found.";
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