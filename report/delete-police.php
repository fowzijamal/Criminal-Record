<?php 

$id=$_GET['id'];

$result = mysqli_query($db, "DELETE  FROM police where id='$id'");

header('location: report-police.php');

?>







