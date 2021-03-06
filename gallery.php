<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<header>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <title>SPLICE WEBSITE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--splice-->
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

    <!--choose file show image-->
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <meta charset=utf-8 />
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--end choose file show image-->

    <!-- BOOTSTRAP STYLES-->
    <link href="css/cssAdmin/bootstrap.css" rel="stylesheet"/>
    <!-- FONTAWESOME STYLES-->
    <link href="css/cssAdmin/font-awesome.css" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <link href="css/cssAdmin/res.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <!--end splice-->

    <link rel="stylesheet" href="css/normalize.css">

    <link rel="stylesheet" href="css/canvas.css">
    <link rel="stylesheet" href="css/uploadFile.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="js/uploadFile.js"></script>


    <!--button for this page-->
    <script src="js/jscolor.js"></script>
    <!--start sidebar-->


    <style>
        article, aside, figure, footer, header, hgroup,
        menu, nav, section { display: block; }

        .closeImage {
            position: absolute;
            float:left;
            clear: none;
            width:15px;
            height:14px;
            background:url(https://www.secretsof.com/images/close_x.png) no-repeat center center;
        }

        .thumbnail {
            height: 100px;
            width: auto;
        }

        #uploadedImages {}



    </style>
    <!--sidebar-->

</header>
<body>

<script src="https://code.jquery.com/jquery-{{JQUERY_VERSION}}.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-{{JQUERY_VERSION}}.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script src="js/circleCanvas.js"></script>
<!--js from pizza-->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="js/custom.js"></script>

<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../pizza/chief/index.html">Welcome to</a>
        </div>
        <div style="color: white;
                padding: 0px 50px 5px 50px;
                float: left;
                font-size: 16px;">
            <h3>Interactive Museum Application</h3>


        </div>

        <div style="color: white;
                padding: 15px 50px 5px 50px;
                float: right;
                font-size: 16px;">
            <a href="login.html" class="btn btn-info square-btn-adjust">Logout</a>
        </div>

    </nav>
    <!-- /. NAV TOP  -->



    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="/img/icon.png" class="user-image img-responsive">
                </li>



                <li><a href="index.html">LOGO</a></li>
                <li><a href="default.html">DEFAULT</a></li>
                <li><a href="map.html">MAP</a></li>
                <li><a href="testContent.php">CONTENT</a></li>
                <li><a class="active" href="gallery.html">GALLERY</a></li>
                <li><a href="audio.html">AUDIO</a></li>
                <li><a href="uuid.html">UUID</a></li>
                <li><a href="arqr.html">QR & AR</a></li>

            </ul>

        </div>

    </nav>


    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-head-line">Gallery</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr/>
            <div class="row">
                <!--first column-->
                <div class="col-md-2">
                </div>
                <!--end first column-->

                <!--second column-->
                <div class="col-md-8">

                    <form action="gallery.php" method="POST" enctype="multipart/form-data">
                        <!--first row-->
                        <div class="row">
                            <div class="col-md-3">
                                <?php
                                    $con = mysqli_connect("localhost", "root", "root", "museum");
                                    //query
                                    $sql="SELECT topic FROM Tcontent";
                                    $result = mysqli_query($con, $sql); 

                                    if(mysqli_num_rows($result))
                                    {
                                        $select= '<select name="select">';
                                        while($row=mysqli_fetch_array($result))
                                        {
                                          $select.='<option value="'.$row['id'].'">'.$row['topic'].'</option>';
                                        }
                                    }
                                    $select.='</select>';
                                    echo $select;
                                ?>  
                                //
                                
                            </div>
                            <div class="col-md-5">
                                <label>Image name</label>
                                <input class="form-control"  type="text" id="imageName" name="imageName">
                            </div>
                            <hr/>

                            <div class="col-md-4">
                                <input type="file" id="image_upload_path" name="image">
                            </div>
                        </div>
                        <!--end first row-->
                        <br/>
                        <!--upload button-->
                        <div id="uploadedImages"></div>
                        <input class="btn btn-info submit1" type="button" onclick="changeText2()" value="Upload">


                    </form>
                    <progress style="display: none;" value="237988" max="237988"> </progress>
                    <div id="errorMsg"></div>

                </div>
                <!--end second column-->
                <!--third column-->
                <div class="col-md-2">
                </div>
                <!--end third column-->
            </div>
            <!-- end first big rowwwwwwwwwwwwwwwwwwwwww-->
            <!--table-->

            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
<!--ENDsidebar-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">

    var list = document.getElementById('demo');

    function changeText2() {
//    var firstname = document.getElementById('firstname').value;
//    document.getElementById('boldStuff2').innerHTML = firstname;
//    var entry = document.createElement('li');
//    entry.appendChild(document.createTextNode(firstname));
//    list.appendChild(entry);

        var data = {'image': $('#image_upload_path').val(), 'contentNumber': $('#contentNumber').val(), 'imageName': $('#imageName').val()};

        console.log(new FormData(data));

        var formData = new FormData($('form')[0]);

        $.ajax({
            url: '/gallery.php',  //Server script to process data
            type: 'POST',
            xhr: function() {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){ // Check if upload property exists
                    myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // For handling the progress of the upload
                }
                return myXhr;
            },
            //Ajax events
            beforeSend: beforeSendHandler,
            success: completeHandler,
            error: errorHandler,
            // Form data
            data: formData,
            //Options to tell jQuery not to process data or worry about content-type.
            cache: false,
            contentType: false,
            processData: false
        });
    }
    function beforeSendHandler() {
        $('progress').show();
    }
    function completeHandler(data) {
        if (data.result) {
            console.log('data.result[0]: ',data.result[0]);
            if (data.result[0] == '/') {
                var newImage = $('<img>',{
                    class: 'thumbnail',
                    src: data.result
                });

                var imageDetail = '<span>' + 'contentNumber: ' + $('#contentNumber').val() + '</span><br>';
                imageDetail += '<span>' + 'imageName: ' + $('#imageName').val() + '</span>';

                var closeLink = $('<span>', {class: "closeImage"});
                var container = $('<span>').append(closeLink, newImage, imageDetail);

                $('#contentNumber').val('');
                $('#imageName').val('');
                $('#image_upload_path').val('');


                $('#uploadedImages').append(container);
            }
            else {
                $('#errorMsg').html(data.result);
            }
        }
        $('progress').hide();
        console.log('completeHandler',data);
    }
    function errorHandler() {
        console.log('completeHandler',arguments);
    }
    function progressHandlingFunction(e){
        if(e.lengthComputable){
            $('progress').attr({value:e.loaded,max:e.total});
        }
    }
    //handle clicking on the closeImage links
    $(document).ready(function(readyEvent) {
        $(document).click(function(clickEvent) {
            if ($(clickEvent.target).hasClass('closeImage')) {
                clickEvent.target.parentNode.remove();
            }
        });
    });</script>
<!-- END HERE -->


</body>
</html>






<!-- gallery.php -->
<?php
define('ROOTPATH', __DIR__);

$uploads_dir = ROOTPATH . '/upload_dir';
$output = array();

if (empty($_POST['contentNumber']))
{
    $output['result'] = 'missing content number';
}
else if (empty($_POST['imageName']))
{
    $output['result'] = 'missing image name';
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
        $tmp_name = $upload["tmp_name"];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $parts = explode('/',$upload['tmp_name']);
        $tmpName = array_pop($parts);
        // $name = $tmpName.'_'.basename($upload["name"]);
        $contentNumber = $_POST['contentNumber'];
        $imageName = $_POST['imageName'];

        $filename = $contentNumber . '_' . $imageName . '.' . pathinfo($upload["name"], PATHINFO_EXTENSION);

        if (move_uploaded_file($tmp_name, $upload_path . $filename)) {
            //after upload complete insert pic data into database
            $con=mysqli_connect("localhost","root","root","museum");
            if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}

            $values = $upload_dir . $filename;
            $sql = "INSERT INTO gallery (imageName, contentNumber,image) VALUES ('".$imageName."', '".$contentNumber."','" . $values . "');";
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