<?php

define('ROOTPATH', __DIR__);
$output = [];
$output['result'] = [];
$output['image_path'] = [];
$applicationName = (isset($_POST) && array_key_exists('applicationName', $_POST)) ? $_POST['applicationName'] : 'applicationName';

if (empty($applicationName)) {
    $output['result'][] = 'missing application name';
}
else if (is_array($_FILES) && array_key_exists('image', $_FILES) && array_key_exists('logo', $_FILES))
{

    $upload_dir  = '/upload_dir/';
    $upload_path = ROOTPATH . $upload_dir;

    $applicationName = $_POST['applicationName'];

    $sql_field_list  = ['applicationName'];
    $sql_value_list  = [$applicationName];

    foreach ( $_FILES as $key => $upload) {

        if($key != 'image' && $key != 'logo')
        {
            $output['result'][] = $key . ' is invalid image';
        }
        else
        {

            if ($upload['error'] == UPLOAD_ERR_OK &&
                preg_match('#^image\/(png|jpg|jpeg|gif)$#', strtolower($upload['type'])) && //ensure mime-type is image
                preg_match('#.(png|jpg|jpeg|gif)$#', strtolower($upload['name'])) ) //ensure name ends in trusted extension
            {
                $parts     = explode('/', $upload['tmp_name']);
                $tmpName   = array_pop($parts);
                $fieldname = ($key == 'image') ? 'bgBNPage' : 'logo';
                //$filename  = $applicationName . '_' . $fieldname . '.' . pathinfo($upload["name"], PATHINFO_EXTENSION);
                $filename  = $fieldname . '.' . pathinfo($upload["name"], PATHINFO_EXTENSION);

                if (move_uploaded_file($upload["tmp_name"], $upload_path . $filename))
                {

                    $sql_field_list[] = $fieldname;
                    $sql_value_list[] = $upload_dir . $filename;

                    $output['image_path'][$key] = $upload_dir . $filename;
                }
                else
                {
                    $output['result'][] = $key . ' upload fail';
                }

            }
            else
            {
                $output['result'][] = $key . ' error while upload';
            }
        }

    }




    //after upload complete insert pic data into database
    $con = mysqli_connect("localhost", "root", "root", "museum");
    $sql = "SELECT logo,bgBNPage FROM general "; 
    $result = mysqli_query($con, $sql); 


    if (!$con) {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $fields = implode(', ', $sql_field_list);
    $values = implode("', '", $sql_value_list);

    if(mysqli_num_rows($result) > 0) 
    {
        $str_array = [];
        for($i =0; $i < count($sql_field_list); $i++) 
        {
            $str_array[] = $sql_field_list[$i] . "='" .  $sql_value_list[$i] ."'";
        }

        $sql = 'UPDATE general SET ' . implode(',', $str_array);
        //$sql = "UPDATE general SET (" . $fields . ") = ('" . $values . "');";
    }
    else 
    {
        $sql = "INSERT INTO general (" . $fields . ") VALUES ('" . $values . "');";
    }


    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }

    mysqli_close($con);


} else {

    $output['result'][] = 'no file selected';
}

    header('Content-type: application/json');
    echo json_encode($output);
    echo json_encode('finish');

?>
