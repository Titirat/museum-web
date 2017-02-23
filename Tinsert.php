<?php 
$conn = mysqli_connect("localhost", "root", "root", "museum"); 
$sql = "INSERT INTO Tcontent(contentNumber,category,topic,content) VALUES('".$_POST["contentNumber"]."','".$_POST["category"]."', '".$_POST["topic"]."','".$_POST["content"]."')"; 
if(mysqli_query($conn, $sql)) 
{ 
echo 'Record Inserted Successfully!'; 
} 
?> 