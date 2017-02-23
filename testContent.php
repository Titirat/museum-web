<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<header>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SPLICE WEBSITE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <link rel="stylesheet" href="css/cssAdmin/wizard/normalize.css">
    <link rel="stylesheet" href="css/canvas.css">
    <link rel="stylesheet" href="css/uploadFile.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="js/uploadFile.js"></script>
    <!--edir delete insert-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 

    <style type="text/css">
        th{
            font-family: Arial, Helvetica, sans-serif;
            
            background: #03b5a4;
            color: #FFF;
            text-align: center;
            padding: 2px 6px;
            border-collapse: separate;
        }
    </style>


</header>
<body>

<script src="https://code.jquery.com/jquery-{{JQUERY_VERSION}}.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-{{JQUERY_VERSION}}.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script src="js/circleCanvas.js"></script>


<!-- HERE -->

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
                <li><a class="active" href="testContent.php">CONTENT</a></li>
                <li><a href="gallery.html">GALLERY</a></li>
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
                    <h2 class="page-head-line">Content</h2>
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

                    <form action="content.php" method="POST" enctype="multipart/form-data">
                        <!--first row-->
                        <div class="row">
                            <div class="col-md-3">
                                <label>Content number</label>
                                <input class="form-control" name="contentNumber"  type="text" />
                            </div>
                            <div class="col-md-4">
                                <label>Category</label>
                                <input  type="text" class="form-control"  name="category" type="text">
                            </div>
                            
                            <div class="col-md-5">
                                <label>Topic</label>
                                <input class="form-control"  name="topic" type="text">
                            </div>
                        </div>
                        <!--end first row-->
                        <hr/>

                        <!--second row-->
                        <div class="row">
                            <div class="col-md-12">
                                <label>Content</label>
                                <textarea class="form-control"   name="content"  rows="3"></textarea>
                            </div>
                        </div>
                        <!--end second row-->
                        <hr/>
                        <!--third row-->
                        <div class="row" style="float: right">
                            <div class="col-md-12">
                                <button type="submit" id="submitData" value="submit" class="btn btn-info">Submit </button>
                            </div>
                        </div>

                        <!--end third row-->

                    </form>
                    <progress style="display: none;" value="237988" max="237988"> </progress>
                    <div id="errorMsg"></div>


                    <!--fourth row-->
                    <br><br>
                    <div class="row">
                    <?php 
                         $conn = mysqli_connect("localhost", "root", "root", "museum"); 
                         $output = ''; 
                         $sql = "SELECT * FROM Tcontent ORDER BY id DESC"; 
                         $result = mysqli_query($conn, $sql); 
                         $output .= ' 

                         <div align="center"> 
                         <table style="background-color:#FFFFFF; text-align: center;" border="1" bordercolor="#000000"> 
                         <tr> 
                         <th width="5%">Id</th> 
                         <th width="5%">Content No.</th>
                         <th width="20%">Category</th> 
                         <th width="20%">Topic</th> 
                         <th width="40%">Content</th> 
                         <th width="10%">Delete</th> 
                         </tr>'; 
                         if(mysqli_num_rows($result) > 0) 
                         { 
                             while($row = mysqli_fetch_array($result)) 
                             { 
                                 $output .= ' 
                                 <tr> 
                                 <td>'.$row["id"].'</td> 
                                 <td class="contentNumber" data-id1="'.$row["id"].'" contenteditable>'.$row["contentNumber"].'</td> 
                                 <td class="category" data-id2="'.$row["id"].'" contenteditable>'.$row["category"].'</td> 
                                 <td class="topic" data-id3="'.$row["id"].'" contenteditable>'.$row["topic"].'</td> 
                                 <td class="content" data-id4="'.$row["id"].'" contenteditable>'.$row["content"].'</td> 
                                 <td><button type="button" class="btn-danger" name="delete_btn" data-id5="'.$row["id"].'" id="delete">Delete</button></td> 
                                 </tr> 
                                 '; 
                             } 


                             $output .= ' 
                             <tr> 
                             <td></td> 
                             <td id="contentNumber" contenteditable></td> 
                             <td id="category" contenteditable></td> 
                             <td id="topic" contenteditable></td> 
                             <td id="content" contenteditable></td> 
                             <td><button type="button" class="btn-warning" name="add" id="add">Add</button></td> 
                             </tr> 
                             '; 
                         } 
                         else 
                         { 
                             $output .= '<tr> 
                             <td colspan="4">Data not Found</td> 
                             </tr>'; 
                         } 
                         $output .= '</table> 
                         </div>'; 
                         echo $output; 
                     ?>
                    </div>
                    <!--end fourth row-->
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

    <!-- start HERE -->

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
    $(function () {

        $('form').on('submit', function (e) {

            e.preventDefault();

            $.ajax({
                type: 'post',
                url: 'content.php',
                data: $('form').serialize(),
                success: function () {
                    $('form input').val('');
                    $('form textarea').val('');
                }
            });
        location.reload();

        });


    });
</script>

<script> 
 $(document).ready(function(){ 
     function fetch_data() 
     { 
         $.ajax({ 
             url:"Tselect.php", 
             method:"POST", 
             success:function(data)
             { 
                $('#disp_data').html(data); 
             } 
         }); 
     } 
     fetch_data(); 
     $(document).on('click', '#add', function(){ 
         var contentNumber = $('#contentNumber').text(); 
         var category = $('#category').text(); 
         var topic = $('#topic').text(); 
         var content = $('#content').text(); 

         if(contentNumber == '') 
         { 
            alert("Enter content number"); 
            return false; 
         } 
         if(category == '') 
         { 
            alert("Enter category"); 
            return false; 
         } 
         if(topic == '') 
         { 
            alert("Enter topic"); 
            return false; 
         } 
         if(content == '') 
         { 
            alert("Enter content"); 
            return false; 
         } 
         $.ajax({ 
            url:"Tinsert.php", 
            method:"POST", 
            data:{contentNumber:contentNumber, category:category, topic:topic, content:content}, 
            dataType:"text", 
            success:function(data) 
            { 
                alert(data); 
                fetch_data(); 
            } 
         }) 
     location.reload();
     }); 

    function edit_data(id, text, column_name) 
    { 
        $.ajax({ 
            url:"Tedit.php", 
            method:"POST", 
            data:{id:id, text:text, column_name:column_name}, 
            dataType:"text", 
            success:function(data)
            { 
                alert(data); 
            } 
        }); 
    } 

     $(document).on('blur', '.contentNumber', function(){ 
         var id = $(this).data("id1"); 
         var contentNumber = $(this).text(); 
         edit_data(id, contentNumber, "contentNumber"); 
     });

     $(document).on('blur', '.category', function(){ 
         var id = $(this).data("id2"); 
         var category = $(this).text(); 
         edit_data(id, category, "category"); 
     }); 

     $(document).on('blur', '.topic', function(){ 
         var id = $(this).data("id3"); 
         var topic = $(this).text(); 
         edit_data(id,topic, "topic"); 
     }); 

     $(document).on('blur', '.content', function(){ 
         var id = $(this).data("id4"); 
         var content = $(this).text(); 
         edit_data(id,content, "content"); 
     }); 


     $(document).on('click', '#delete', function(){ 
         var id=$(this).data("id5"); 
         if(confirm("Are you sure you want to delete this?")) 
         { 
            $.ajax({ 
                url:"Tdelete.php", 
                method:"POST", 
                data:{id:id}, 
                dataType:"text", 
                success:function(data)
                { 
                    alert(data); 
                    fetch_data(); 
                } 
            }); 
        } 
    location.reload();
     }); 
}); 
 </script>

<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="../../assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../../assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="../../assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="../../assets/js/custom.js"></script>

<!-- GET DATA AND MAKE TABLE -->


<!-- END HERE -->
</body>
</html>
