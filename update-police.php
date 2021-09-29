<?php 

include("layout-top.php"); 
// Define variables and initialize with empty values
$fName = $NID = $email = "";
$fName_err = $NID_err = $email_err ="";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["fName"]);
    if(empty($input_name)){
        $fName_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $fName_err = "Please enter a valid name.";
    } else{
        $fName = $input_name;
    }
    
    // Validate address address
    $input_address = trim($_POST["NID"]);
    if(empty($input_address)){
        $NID_err = "Please enter an address.";     
    } else{
        $NID = $input_address;
    }

    
    
    // Validate salary
    $input_salary = trim($_POST["email"]);
    if(empty($input_salary)){
        $email_err = "Please enter the Value.";     
    } else{
        $email = $input_salary;
    }
    
    // Check input errors before inserting in database
    if(empty($fName_err) && empty($poneNumber_err) && empty($email_err)){
        // Prepare an update statement
        $sql = "UPDATE police SET fName=?, NID=?, email=? WHERE id=?";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_fname, $param_NID, $param_email, $param_id);
            
            // Set parameters
            $param_fname = $fName;
            $param_NID = $NID;
            $param_email = $email;
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
        $sql = "SELECT * FROM police WHERE id = ?";
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
                    $NID = $row["NID"];
                    $email = $row["email"];
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
                        <div class="form-group <?php echo (!empty($NID_err)) ? 'has-error' : ''; ?>">
                            <label>NID Number</label>
                            <textarea name="poneNumber" class="form-control"><?php echo $NID; ?></textarea>
                            <span class="help-block"><?php echo $NID_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>

				</div>
        <?php include("layout-footer.php") ?>           