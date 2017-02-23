<?php
	$con = mysqli_connect("localhost", "root", "root", "test");
	//query
$sql="SELECT first_name FROM empinfo";
    $result = mysqli_query($con, $sql); 

if(mysqli_num_rows($result)){
$select= '<select name="select">';
while($row=mysqli_fetch_array($result)){
      $select.='<option value="'.$row['first_name'].'">'.$row['first_name'].'</option>';
  }
}
$select.='</select>';
echo $select;
?>	