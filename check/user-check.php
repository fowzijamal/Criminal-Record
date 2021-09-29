<?php //include("layout-top.php") 
	$db = mysqli_connect('localhost', 'crime', '', 'criminal_database');
?> 

<?php  
//check.php  
//$connect = mysqli_connect("localhost", "root", "", "testing"); 
if(isset($_POST["user_name"]))
{
 $username = mysqli_real_escape_string($db, $_POST["user_name"]);
 //$username = 'devoooo';
 $query = "SELECT * FROM users WHERE username = '".$username."'";
 $result = mysqli_query($db, $query);
 if(mysqli_num_rows($result)){
    echo '<span class="text-danger">Username not available</span>';
 }else{
    echo '<span class="text-success">Username Available</span>';  
 } ;
}
?>

