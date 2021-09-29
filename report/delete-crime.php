<?php 

$id=$_GET['id'];

$result = mysqli_query($db, "DELETE  FROM crime where id='$id'");

header('location: report-crime.php');

?>







