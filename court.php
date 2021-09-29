                <!-- Begin Page Content -->
                <div class="container-fluid d-flex justify-content-between">
                    <div class="body-area w-100 pr-5">
                        <h1 class="text-center">Add Crime Punishment</h1>
                        <hr>
                        <form method="GET">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Case No</label>
                                <input type="text" class="form-control" id="exampleFormControlSelect1" name="search_case_no" required>
                            </div>

                            <button type="submit" class="btn btn-primary" value="true" name="searchcrime">Search</button>
                        </form>
                    

                    <?php if (isset($_GET['searchcrime']) &&  isset($_GET['search_case_no']) ) { 

                    $sql = "SELECT * FROM crime WHERE id = ? ";
                    $hold = trim($_GET["search_case_no"]);

                    $search = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `crime`  where caseno = '$hold ' and punishment IS NULL "));

                    if($stmt = mysqli_prepare($db, $sql)){                    

                    $param_id = trim($_GET["search_case_no"]);

                    mysqli_stmt_bind_param($stmt, "i", $search['id']);

                    if(mysqli_stmt_execute($stmt)){

                    $result = mysqli_stmt_get_result($stmt);

                    if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $data = $row['police_Id'];
                    $police = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `police`  where id = $data"));
                    $criminal_id =  $row['criminal_ID'];
                    ?>



    <br/>

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
                        <td> Details</td><td>:</td><td colspan="2"> <p class="pl-5 text-danger m-0"><?php echo $row['description'];  ?></p></td>
                    </tr>
                </tbody>
            </table>





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

            echo "</tr>";
        while($rs = mysqli_fetch_array($result)){
          //  $data = $row['police_Id'];
          // $police = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `police`  where id = $data"));
            echo "<tr>";
                echo " <td><img src='".$rs['image']."'class='"."rounded-circle"."'width='"."50"."'height='"."50"."'> </td>";
                
                echo "<td>".$rs['fName']." ".$rs['lName']."<br>
                Father's Name: " .$rs['fathersName']."<br>
                Mothers's Name: " .$rs['mothersName']."<br>
                Mark Symbol: " .$rs['symbol'].
                "
                </td>";
                echo "<td> NID: ".$rs['poneNumber']."<br>
                Contact No:  ".$rs['contactno']."
                </td>";
                echo "<td>" . $rs['dateOFbirth'] . "</td>";

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



                            <form method="POST">


                            <div class="form-group">
                                <label for="judge_name">Judge Name</label>
                                <input type="text" class="form-control" id="judge_name" name="judge_name" required>
                            </div>

                            <div class="form-group">
                                <label for="punishment">Punishment</label>
                                <textarea class="form-control" name="punishment" rows="3" required></textarea>
                            </div>
                            
                            <input type="hidden" name="id" value="<?php echo $row["id"];  ?>">

                            <button type="submit" class="btn btn-primary" value="true" name="punishcrime">Submit</button>

                            <form>

                            <br/>
                            <br/>
                            <br/>








                     <?php }else{ ?>   

                    <h2 align="center">Incorrect Case No or This Case No is already punished</h2>

    
                    <?php 
                        
                        }

                        }

                        }

                        }


                        ?>

                     </div>



                    <div class="right-body">
                        <!-- Sidebar -->
                        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark ">

                            <!-- Sidebar - Brand -->
                            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                                <div class="sidebar-brand-icon rotate-n-15">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="sidebar-brand-text mx-3">Quick Link</div>
                            </a>

                            <!-- Divider -->
                            <hr class="sidebar-divider my-0">

                            <!-- Nav Item - Dashboard -->
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="fas fa-fw fa-tachometer-alt"></i>
                                    <span>Link</span></a>
                                <a class="nav-link" href="">
                                    <i class="fas fa-fw fa-tachometer-alt"></i>
                                    <span>Link</span></a>
                            </li>
                        </ul>
                        <!-- End of Sidebar -->
                    </div>
                </div>
                <!-- /.container-fluid -->
                <?php                   
                    if(! $db ) {
                        die('Could not connect: ' . mysql_error());
                     }

                	if (isset($_POST['punishcrime'])) {

						$id = mysqli_real_escape_string($db, $_POST['id']);
                        $punish = mysqli_real_escape_string($db, $_POST['punishment']);
                        $judge = mysqli_real_escape_string($db, $_POST['judge_name']);
						$insert = $db->query("UPDATE crime SET judge_name = '$judge',punishment = '$punish' WHERE id = $id"); 
                        
                        echo "<script> alert('Data stored successfully'); </script>";
                        header('location: home.php');  
                            
                    } else{
                        $statusMsg = 'Please select ';
                    }
                    
                    // Display status message
                   // echo $statusMsg;              
                ?>