<?php
define('ROOTPATH', __DIR__);

$uploads_dir = ROOTPATH . '/home_dir';
$output = array();

if (empty($_POST['floor_level'])) {
    $output['result'] = 'missing floor level';
} else if (empty($_POST['floor_name'])) {
    $output['result'] = 'missing floor name';
} else if (is_array($_FILES) && array_key_exists('image',$_FILES)) {
        $upload = $_FILES['image'];
    if ($upload['error'] == UPLOAD_ERR_OK &&
            preg_match('#^image\/(png|jpg|jpeg|gif)$#',$upload['type']) && //ensure mime-type is image
            preg_match('#.(png|jpg|jpeg|gif)$#',$upload['name']) //ensure name ends in trusted extension

    ) {
        //echo json_encode($upload);
        $tmp_name = $upload["tmp_name"];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $parts = explode('/',$upload['tmp_name']);
        $tmpName = array_pop($parts);
        // $name = $tmpName.'_'.basename($upload["name"]);
        $floorLevel = $_POST['floor_level'];
        $floorName = $_POST['floor_name'];
        $filename = $floorLevel . '_' . $floorName . '.' . pathinfo($upload["name"], PATHINFO_EXTENSION);

        if (move_uploaded_file($tmp_name, "$uploads_dir/$filename")) {

                //after upload complete insert pic data into database
                $con=mysqli_connect("localhost","root","root","museum");
                if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
                $sql = "INSERT INTO floor (floorNo, floorName) VALUES ('".$floorLevel."', '".$floorName."');";
                if (!mysqli_query($con,$sql)) {
                die('Error: ' . mysqli_error($con));
                }
                mysqli_close($con);

                $output['result'] = '/upload_dir/' . $filename;

        }
        else {
                $output['result'] = 'upload fail';
        }

    }
    else {
         $output['result'] = 'invalid image';
    }
}
else {
        $output['result'] = 'no file selected';
}

header('Content-type: application/json');
echo json_encode($output);
?>
