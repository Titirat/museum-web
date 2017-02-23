<?php
$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 5000*100; //100 kb
$path = __DIR__ . '/'; // Upload directory
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
// Loop $_FILES to exeicute all files

$applicationName = $_POST['applicationName'];
$sql_field_list  = ['applicationName'];
$sql_value_list  = [$applicationName];
$message = [];

        foreach( $_FILES as $key => $upload){

            $name = $upload['name'];
            if( $key != 'image' && $key != 'logo'){
                continue;
            }

            if ($_FILES[$key]['error'] == 0) {
                if ($_FILES[$key]['size'] > $max_file_size) {
                    $message[] = "$name is too large!.";
                    echo "$name is too large!.";
                    continue; // Skip large files
                }
                elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
                    $message[] = "$name is not a valid format";
                    echo "$name is not a valid format";
                    continue; // Skip invalid file formats
                }
                else{ // No error found! Move uploaded files

                    $tmp_name  = $upload["tmp_name"];

                    $fieldname = ($key == 'image') ? 'bgBNPage' : 'logo';

                    $filename  = $applicationName . '_' . $fieldname . '.' . pathinfo($upload["name"], PATHINFO_EXTENSION);
                    //เราย้ายวงเล็บมา
                }

                if(move_uploaded_file($upload["tmp_name"], $path . '/' . $filename)) {
                    $count++; // Number of successfully uploaded file
                    $message[] = "$name is uploaded";
                    echo "$filename is uploaded";
                } else {
                    $message[] = "$name is fail to uplaod";
                    echo "$filename is fail to uplaod";

                }
            }
        }

        return $message;
}
