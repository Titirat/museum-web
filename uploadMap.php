<?php
define('ROOTPATH', __DIR__);

$uploads_dir = ROOTPATH . '/upload_dir';
$output = array();

if (empty($_POST['floor_level']))
{
    $output['result'] = 'missing floor level';
}
else if (empty($_POST['floor_name']))
{
    $output['result'] = 'missing floor name';
}
else if (is_array($_FILES) && array_key_exists('image',$_FILES))
{
        $upload_dir  = '/upload_dir/';
        $upload_path = ROOTPATH . $upload_dir;
        $upload = $_FILES['image'];
    if ($upload['error'] == UPLOAD_ERR_OK &&
            preg_match('#^image\/(png|jpg|jpeg|gif)$#',$upload['type']) && //ensure mime-type is image
            preg_match('#.(png|jpg|jpeg|gif)$#',$upload['name']) //ensure name ends in trusted extension

    ) {
        //echo json_encode($upload);
        $tmp_name = $upload["tmp_name"];
        $parts = explode('/',$upload['tmp_name']);
        $tmpName = array_pop($parts);

        // $name = $tmpName.'_'.basename($upload["name"]);
        $floorLevel = $_POST['floor_level'];
        $floorName = $_POST['floor_name'];
        $taskbar = $_POST['taskbar'];
        $header = $_POST['header'];

        $filename = $floorLevel . '_' . $floorName . '.' . pathinfo($upload["name"], PATHINFO_EXTENSION);

        if (move_uploaded_file($tmp_name, $upload_path . $filename)) {

                //after upload complete insert pic data into database
                $con=mysqli_connect("localhost","root","root","museum");
                //ไปป์เอามาเพิ่่มเพื่ออัพเดท taskbar header
                $sql = "SELECT headerColor,taskbarColor FROM general "; 
                $sql2 = "SELECT floorNo,floorName,floorImage FROM floor "; 
                $result = mysqli_query($con, $sql); 
                $result2 = mysqli_query($con, $sql2); 
                //จบตรงนี้

                if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
                $values = $upload_dir . $filename;

                if(mysqli_num_rows($result2) > 0 ) 
                {
                    $sqlfloor = "UPDATE floor SET floorNo='".$floorLevel."', floorName = '".$floorName."', floorImage='" . $values . "' 
                    WHERE floorNo='".$floorLevel."'";
                }
                else
                {
                    $sqlfloor = "INSERT INTO floor (floorNo, floorName, floorImage) VALUES ('".$floorLevel."', '".$floorName."','" . $values . "');";
                }

                /*general*/
                if(mysqli_num_rows($result) > 0) 
                {
                    $sqlgeneral = "UPDATE general SET headerColor='".$header."',taskbarColor='".$taskbar."' ";
                }
                else
                {
                    $sqlgeneral = "INSERT INTO general (headerColor,taskbarColor) VALUES ('".$header."', '".$taskbar."');";
                }
                /*end general*/

                if (!mysqli_query($con,$sqlfloor))
                {
                    die('Error: ' . mysqli_error($con));
                }

                if (!mysqli_query($con,$sqlgeneral))
                {
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
