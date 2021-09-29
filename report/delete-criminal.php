<?php 

$id=$_GET['id'];

$result = mysqli_query($db, "DELETE  FROM criminal where id='$id'");

header('location: report-criminal.php');

?>







