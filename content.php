<html>
<body>

</body>
</html>

<?php
$con=mysqli_connect("localhost","root","root","museum");
if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
$contentNumber= mysqli_real_escape_string($con, $_POST['contentNumber']);
$topic= mysqli_real_escape_string($con, $_POST['topic']);
$content = mysqli_real_escape_string($con, $_POST['content']);
$category = mysqli_real_escape_string($con, $_POST['category']);

$sql = "INSERT INTO Tcontent (contentNumber, topic, content, category) VALUES ('".$contentNumber."', '".$topic."','".$content."','".$category."');";
if (!mysqli_query($con,$sql)) {
die('Error: ' . mysqli_error($con));
}
echo "The data has been added into the database.";
mysqli_close($con);
?>