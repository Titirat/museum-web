
<?php 
 $conn = mysqli_connect("localhost", "root", "root", "museum"); 
 $sql = "DELETE FROM Tcontent WHERE id = '".$_POST["id"]."'"; 
 if(mysqli_query($conn, $sql)) 
 { 
 echo 'Data Deleted Successufully!'; 
 } 
 ?>