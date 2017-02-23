<?php
define('ROOTPATH', __DIR__);

$uploads_dir = ROOTPATH . '/upload_dir';
$output = array();

if (empty($_POST['enable']))
{
    $output['result'] = 'missing enable';
}
else if (empty($_POST['unable']))
{
    $output['result'] = 'missing unable';
}
else if (is_array($_FILES) && array_key_exists('image',$_FILES))
{
        $upload_dir  = '/upload_dir/';
        $upload_path = ROOTPATH . $upload_dir;

        $upload = $_FILES['image'];
    if ($upload['error'] == UPLOAD_ERR_OK &&
            preg_match('#^image\/(png|jpg|jpeg|gif)$#',$upload['type']) && //ensure mime-type is image
            preg_match('#.(png|jpg|jpeg|gif)$#',$upload['name']) //ensure name ends in trusted extension

    )
    {
        $tmp_name = $upload["tmp_name"];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate

        $parts = explode('/',$upload['tmp_name']);
        $tmpName = array_pop($parts);

        // $name = $tmpName.'_'.basename($upload["name"]);
        $enable = $_POST['enable'];
        $unable = $_POST['unable'];

        $filename = "bgDefault" .'.' . pathinfo($upload["name"], PATHINFO_EXTENSION);

        if (move_uploaded_file($tmp_name, $upload_path . $filename))
        {


            //after upload complete insert pic data into database
            $con=mysqli_connect("localhost","root","root","museum");
            $sql = "SELECT bgDefault,enable,unable FROM general "; 
            $result = mysqli_query($con, $sql); 

            if (mysqli_connect_errno())
            {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $values = $upload_dir . $filename;
            /* Select queries return a resultset */
            if ($result = mysqli_query($con, $sql)) {
            printf("Select returned %d rows.\n", mysqli_num_rows($result));

            }
            print_r($result);

            if(mysqli_num_rows($result) > 0) 
            {

                $sql = "UPDATE general SET bgDefault='" . $values . "', enable='".$enable."', unable='".$unable."' ";
            }
            else
            {
                $sql = "INSERT INTO general (unable, enable,bgDefault) VALUES ('".$unable."', '".$enable."','" . $values . "');";
            }

            if (!mysqli_query($con,$sql)) {
            die('Error: ' . mysqli_error($con));
            }
            mysqli_close($con);

            $output['result'] = '/upload_dir/' . $filename;
        }


        else
        {
                $output['result'] = 'upload fail';
        }
    }
    else
    {
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