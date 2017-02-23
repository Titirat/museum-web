<?php
header('Access-Control-Allow-Origin: *');

$servername = "localhost";
$username = "root";
$password="root";
$dbname = "museum";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$contentNumber = $_GET["contentNumber"];
$category = $_GET["category"];
$topic = $_GET["topic"];
$content = $_GET["content"];



$sql = "SELECT contentNumber,category,topic,content FROM `content` ";

$result = $conn->query($sql);





if ($result->num_rows > 0) {
	$arr = array();
    // output data of each row
    $i = 0;
    while($row = $result->fetch_assoc()) {
    		$arr[$i]['contentNumber'] = $row['contentNumber'];
            $arr[$i]['category'] = $row['category'];
            $arr[$i]['topic'] = $row['topic'];
    		$arr[$i]['content'] = $row['content'];
    		$i++;
    }

    echo json_encode($arr);
}
else {
    echo "0 results";
}
$conn->close();
?>
