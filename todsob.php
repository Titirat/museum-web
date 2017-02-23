<?php
define('ROOTPATH', __DIR__);

$uploads_dir = ROOTPATH . '/upload_dir';
$output = array();

if (empty($_POST['valueInput']))
{
    $output['result'] = 'missing enable code color';
}
else if (empty($_POST['valueInput2']))
{
    $output['result'] = 'missing unable code color';
}
else if (is_array($_FILES) && array_key_exists('imageLoader',$_FILES))
{
        $upload = $_FILES['image'];
    if ($upload['error'] == UPLOAD_ERR_OK &&
            preg_match('#^image\/(png|jpg|jpeg|gif)$#',$upload['type']) && //ensure mime-type is image
            preg_match('#.(png|jpg|jpeg|gif)$#',$upload['name']) //ensure name ends in trusted extension

    ) {
        $tmp_name = $upload["tmp_name"];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $parts = explode('/',$upload['tmp_name']);
        $tmpName = array_pop($parts);
        // $name = $tmpName.'_'.basename($upload["name"]);
        $valueInput = $_POST['valueInput'];
        $valueInput2 = $_POST['valueInput2'];

        $filename = $valueInput . '_' . $valueInput2 . '.' . pathinfo($upload["name"], PATHINFO_EXTENSION);

        if (move_uploaded_file($tmp_name, "$uploads_dir/$filename")) {
            //after upload complete insert pic data into database
            $con=mysqli_connect("localhost","root","root","museum");
            if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
            $sql = "INSERT INTO general (valueInput, valueInput2) VALUES ('".$valueInput."', '".$valueInput2."');";
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
else
{
        $output['result'] = 'no file selected';
}
header('Content-type: application/json');
echo json_encode($output);
?>