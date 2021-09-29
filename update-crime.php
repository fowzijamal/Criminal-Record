<?php 

include("layout-top.php"); 
// Define variables and initialize with empty values
$caseno = $criminal_ID = $crimeType = $prision = $court = $date = $punishment= "";
$caseno_err = $criminal_ID_err = $crimeType_err = $prision_err = $court_err = $date_err = $punishment_err="";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate caseno
    $input_name = trim($_POST["caseno"]);
    if(empty($$input_address)){
        $caseno_err = "Please enter a caseno.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $caseno_err = "Please enter a valid caseno.";
    } else{
        $caseno = $input_name;
    }
      // Validate caseno
    $input_name = trim($_POST["criminal_ID"]);
    if(empty($$input_name)){
        $criminal_ID_err = "Please enter a crminal_ID.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $criminal_ID_err = "Please enter a valid criminal_ID.";
    } else{
        $criminal_ID = $input_name;
    }
	 
    // Validate crimeType
    $input_name = trim($_POST["crimeType"]);
    if(empty($input_name)){
        $crimeType_err = "Please enter a crimetype.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $crimeType_err = "Please enter a valid crimetype.";
    } else{
        $crimeType = $input_name;
    }
	 // Validate prision
    $input_name = trim($_POST["prision"]);
    if(empty($input_name)){
        $prision_err = "Please enter a prison.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $prision_err = "Please enter a valid name.";
    } else{
        $prision = $input_name;
    }
    // Validate court
    $input_address = trim($_POST["court"]);
    if(empty($input_address)){
        $court_err = "Please enter court.";     
    } else{
        $court = $input_address;
    }
     // Validate date
    $input_address = trim($_POST["date"]);
    if(empty($input_address)){
        $date_err = "Please enter an date.";     
    } else{
        $date = $input_address;
    }
	 // Validate punishment
    $input_name = trim($_POST["punishment"]);
    if(empty($input_name)){
        $punishment_err = "Please enter a prison.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $prision_err = "Please enter a valid name.";
    } else{
        $punishment = $input_name;
    }
    // Check input errors before inserting in database
if(empty($caseno_err) && empty($criminal_ID_err) && empty($crimeType_err) && empty($prision_err) && empty($court_err) && empty($date_err) && empty($punishment_err)) {
        // Prepare an update statement
        $sql = "UPDATE crime SET caseno=?, $criminal_ID=?, crimeType=?, prision=?, court=?, date=?, punishment=?, WHERE id=?";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssi", $param_caseno, $param_criminal_ID, $param_crimeType, $param_prision, $param_court, $param_date, $param_punishment, $param_id);
            
            // Set parameters
            $param_caseno = $caseno;
			$param_criminal_ID = $criminal_ID;
			$param_crimeType = $crimeType;
			$param_prision = $prision;
            $param_court = $court;
			$param_date = $date;
			$param_punishment = $punishment;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                echo "<script> alert('Data stored successfully'); </script>";
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
      //  mysqli_stmt_close($stmt);
    }
    
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM crime WHERE id = ?";
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    // Retrieve individual field value
                    $caseno = $row["caseno"];
					$criminal_ID = $row["criminal_ID"];
					$crimeType = $row["crimeType"];
					$prision = $row["prision"];
                    $court = $row["court"];
					$date = $row["date"];
					$punishment = $row["punishment"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
       // mysqli_stmt_close($stmt);
        
        // Close connection
       // mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        //header("location: error.php");
        exit();
    }
}

?>
<div class="col-md-12">
					<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($caseno_err)) ? 'has-error' : ''; ?>">
                            <label>Case No</label>
                            <input type="text" name="caseno" class="form-control" readonly value="<?php echo $caseno; ?>">
                            <span class="help-block"><?php echo $caseno_err;?></span>
                        </div>
						  <div class="form-group <?php echo (!empty($criminal_ID_err)) ? 'has-error' : ''; ?>">
                            <label>criminal_ID</label>
                            <input type="text" name="criminal_ID" class="form-control" readonly value="<?php echo $criminal_ID; ?>">
                            <span class="help-block"><?php echo $criminal_ID_err;?></span>
                        </div>
						 <div class="form-group <?php echo (!empty($crimeType_err)) ? 'has-error' : ''; ?>">
                            <label>crimeType</label>
                            <input type="text" name="crimeType" class="form-control" readonly value="<?php echo $crimeType; ?>">
                            <span class="help-block"><?php echo $crimeType_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($prision_err)) ? 'has-error' : ''; ?>">
                            <label>prison</label>
                            <input type="text" name="prision" class="form-control" readonly value="<?php echo $prision; ?>">
                            <span class="help-block"><?php echo $prision_err;?></span>
                        </div>
						 <div class="form-group <?php echo (!empty($court_err)) ? 'has-error' : ''; ?>">
                            <label>court</label>
                            <input type="text" name="court" class="form-control" readonly value="<?php echo $court; ?>">
                            <span class="help-block"><?php echo $court_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($punishment_err)) ? 'has-error' : ''; ?>">
                            <label>punishment</label>
                            <input type="text" name="punishment" class="form-control" value="<?php echo $punishment; ?>">
                            <span class="help-block"><?php echo $punishment_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                            <label>date</label>
                             <input type="text" name="date"  id="datepicker" class="form-control" readonly  value="<?php echo $date; ?>">
                            <span class="help-block"><?php echo $date_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="home.php" class="btn btn-default">Cancel</a>
                    </form>

		
</div>
       <?php include("layout-footer.php") ?>            