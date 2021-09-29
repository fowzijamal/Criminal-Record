<?php 

include("layout-top.php"); 
// Define variables and initialize with empty values
$fName = $lName = $fathersName = $mothersName = $symbol = $poneNumber = $contactno = $dateOFbirth = "";
$fName_err = $lName_err = $fathersName_err = $mothersName_err = $symbol_err = $poneNumber_err = $contactno_err = $dateOFbirth_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate fname
    $input_name = trim($_POST["fName"]);
    if(empty($input_name)){
        $fName_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $fName_err = "Please enter a valid name.";
    } else{
        $fName = $input_name;
    }
     // Validate Lname
    $input_name = trim($_POST["lName"]);
    if(empty($input_name)){
        $lName_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lName_err = "Please enter a valid name.";
    } else{
        $lName = $input_name;
    }
	 
    // Validate Fathers name
    $input_name = trim($_POST["fathersName"]);
    if(empty($input_name)){
        $fathersName_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $fathersName_err = "Please enter a valid name.";
    } else{
        $fathersName = $input_name;
    }
	 
    // Validate Mother's name
    $input_name = trim($_POST["mothersName"]);
    if(empty($input_name)){
        $mothersName_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $mothersName_err = "Please enter a valid name.";
    } else{
        $mothersName = $input_name;
    }
	 // Validate Mother's name
    $input_name = trim($_POST["symbol"]);
    if(empty($input_name)){
        $symbol_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $symbol_err = "Please enter a valid name.";
    } else{
        $symbol = $input_name;
    }
    // Validate NID
    $input_address = trim($_POST["poneNumber"]);
    if(empty($input_address)){
        $poneNumber_err = "Please enter an address.";     
    } else{
        $poneNumber = $input_address;
    }
     // Validate ContectNo
    $input_address = trim($_POST["contactno"]);
    if(empty($input_address)){
        $contactno_err = "Please enter an address.";     
    } else{
        $contactno = $input_address;
    }
    // Validate date of birth
    $input_salary = trim($_POST["dateOFbirth"]);
    if(empty($input_salary)){
        $dateOFbirth_err = "Please enter the Value.";     
    } else{
        $dateOFbirth = $input_salary;
    }
    
    // Check input errors before inserting in database
    if(empty($fName_err) && empty($lName_err) && empty($fathersName_err) && empty($mothersName_err) && empty($symbol_err) && empty($poneNumber_err) &&empty($contactno_err) && empty($dateOFbirth_err)){
        // Prepare an update statement
        $sql = "UPDATE criminal SET fName=?, lName=?, fathersName=?, mothersName=?, symbol=?, poneNumber=?, contactno=?, dateOFbirth=? WHERE id=?";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssi", $param_fname, $param_lName, $param_fathers, $param_mothers, $param_symbols, $param_phone, $param_contactnos, $param_dateOFbirth, $param_id);
            
            // Set parameters
            $param_fname = $fName;
			$param_lName = $lName;
			$param_fathers = $fathersName;
			$param_mothers = $mothersName;
			$param_symbols = $symbol;
            $param_phone = $poneNumber;
			$param_contactnos = $contactno;
            $param_dateOFbirth = $dateOFbirth;
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
        $sql = "SELECT * FROM criminal WHERE id = ?";
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
                    $fName = $row["fName"];
					$lName = $row["lName"];
					$fathersName = $row["fathersName"];
					$mothersName = $row["mothersName"];
					$symbol = $row["symbol"];
                    $poneNumber = $row["poneNumber"];
					$contactno = $row["contactno"];
                    $dateOFbirth = $row["dateOFbirth"];
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
                        <div class="form-group <?php echo (!empty($fName_err)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="fName" class="form-control" value="<?php echo $fName; ?>">
                            <span class="help-block"><?php echo $fName_err;?></span>
                        </div>
						 <div class="form-group <?php echo (!empty($lName_err)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="text" name="lName" class="form-control" value="<?php echo $lName; ?>">
                            <span class="help-block"><?php echo $lName_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($fathersName_err)) ? 'has-error' : ''; ?>">
                            <label>Father's Name</label>
                            <input type="text" name="fathersName" class="form-control" value="<?php echo $fathersName; ?>">
                            <span class="help-block"><?php echo $fathersName_err;?></span>
                        </div>
						 <div class="form-group <?php echo (!empty($mothersName_err)) ? 'has-error' : ''; ?>">
                            <label>Mother's Name</label>
                            <input type="text" name="mothersName" class="form-control" value="<?php echo $mothersName; ?>">
                            <span class="help-block"><?php echo $mothersName_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($symbol_err)) ? 'has-error' : ''; ?>">
                            <label>Symbol</label>
                            <input type="text" name="symbol" class="form-control" value="<?php echo $symbol; ?>">
                            <span class="help-block"><?php echo $symbol_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($poneNumber_err)) ? 'has-error' : ''; ?>">
                            <label>NID Number</label>
                            <textarea name="poneNumber" class="form-control"><?php echo $poneNumber; ?></textarea>
                            <span class="help-block"><?php echo $poneNumber_err;?></span>
                        </div>
						 <div class="form-group <?php echo (!empty($contactno_err)) ? 'has-error' : ''; ?>">
                            <label>Contect Number</label>
                            <textarea name="contactno" class="form-control"><?php echo $contactno; ?></textarea>
                            <span class="help-block"><?php echo $contactno_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Date OF Birth</label>
                            <input type="text" name="dateOFbirth"  id="datepicker" class="form-control" value="<?php echo $dateOFbirth; ?>">
                            <span class="help-block"><?php echo $dateOFbirth_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="home.php" class="btn btn-default">Cancel</a>
                    </form>

</div>
       <?php include("layout-footer.php") ?>            