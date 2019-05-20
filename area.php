<?php
header('Content-Type: text/html; charset=utf-8');
require_once('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en-US">
    <head class="head">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content ="IE-edge, IE">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>“সারা দেশের শিক্ষা প্রতিষ্ঠানে কম্পিউটার ও ভাষা প্রশিক্ষণ ল্যাব স্থাপন” প্রকল্প</title>

        <!-- Favicons -->
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
       
        <link href="css/style.css" rel="stylesheet">
    </head>


    <body class="body">


        <?php
        // $i=1;
        // $res=read("district_division");
        // while($val=mysqli_fetch_assoc($res)){

        //  echo  $val['division'];
        //  echo "<br>";
        // } ?>


        <!-- Top Bar -->
        <div class="container top-bar">
            <div class="row">
                <div class="col-md-12">
                    <p class="top-bar-text pull-left">
                        <!--<span>Department of Information and Communication Department</span>-->
                        <span>“সারা দেশের শিক্ষা প্রতিষ্ঠানে কম্পিউটার ও ভাষা প্রশিক্ষণ ল্যাব স্থাপন” প্রকল্প</span>
                    </p>

<!--                    <p class="top-bar-text pull-right">-->
<!--                        <a href="http://www.bangladesh.gov.bd">Bangladesh National Portal</a>-->
<!--                    </p>-->
                </div>
            </div>
        </div>


        <!-- Banner Section -->
        <div class="container banner-slider">
            <div id="slides">
                <img src="img/Banner APIS.jpg" class="img-responsive" alt="banner 1">

                <img src="img/Banner1.jpg" class="img-responsive" alt="banner 2">

                <img src="img/BPO Jassore _Press_02_Print-01.jpg" class="img-responsive" alt="banner 3">

                <img src="img/BPO Summit 2018 (2).jpg" class="img-responsive" alt="banner 4">

                <img src="img/final.jpg" class="img-responsive" alt="banner 5">

                <img src="img/PM2.jpg" class="img-responsive" alt="banner 6">

                <img src="img/WEB Banner-4th Dev Fair.jpg" class="img-responsive" alt="banner 7">
            </div>
        </div>


        <!-- Navigation Bar -->
        <div class="container navigation">
            <div class="row">
                <div class="col-md-12 no-padding">
                    <nav class="navbar navbar-expand-sm   navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
<!--                            <span style="font-size: 13px;">মেনু নির্বাচন করুন</span>-->
                        </button>

                        <div class="collapse navbar-collapse tutorial" id="navbarTogglerDemo03">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="http://localhost/workstation/"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://localhost/workstation/trainees.php" target="_blank"> Trainees </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://www.doict.gov.bd" target="_blank"> DoICT <span class="sr-only">(current)</span></a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="http://www.doict.gov.bd/site/page/ecad054c-c9b4-4138-a88c-d1dd5cf3ef00" target="_blank">Officers and Stuffs</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="http://www.doict.gov.bd/site/page/cc43b1d3-add9-4dde-b550-c028bda96c02" target="_blank">Project</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="http://www.doict.gov.bd/site/view/notices" target="_blank">Notice</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="http://www.doict.gov.bd/site/page/c0cc3c06-1f3b-4105-b0e2-7a9cd61adbb2" target="_blank">Contact</a>
                                </li>

<!--                                <li class="nav-item dropdown dmenu">-->
<!--                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">-->
<!--                                        Our Service-->
<!--                                    </a>-->
<!--                                    <div class="dropdown-menu sm-menu">-->
<!--                                        <a class="dropdown-item" href="#">service2</a>-->
<!--                                        <a class="dropdown-item" href="#">service 2</a>-->
<!--                                        <a class="dropdown-item" href="#">service 3</a>-->
<!--                                    </div>-->
<!--                                </li>-->
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>


        <!-- Main Contents -->
        <div class="container side-container">
            <div class="row">
                <div class="col-md-9 no-padding">
                    <div class="wrap--outer">
                        <div class="project-heading">
                            <span>
                                “সারা দেশের শিক্ষা প্রতিষ্ঠানে কম্পিউটার ও ভাষা প্রশিক্ষণ ল্যাব স্থাপন” প্রকল্প
                            </span>
                        </div>

                        <p class="main-heading">Search for Division->District->Upazila/Thana</p> <br>

                        
                        <div id='foo' style="display: none" class="alert alert-success"><strong>Copied :</strong><span></span> </div>

                        
                        <!-- Search Form -->
                        
    
                            <div id="motivatebox" class="wrap--inner">
                                <div class="wrap">
                                    <select name='division' size='20' class='list filterSelect' data-target='select-family' id='select-city'>
                                        <?php
                                        $i=1;
                                        $j=1;
                                        $k=1000;
                                        $res=read("div_dis_sub");
                                        while($val=mysqli_fetch_assoc($res)){
                                            ?>
                                            <option  style="cursor:pointer"  class="motivate pointOption" value="<?php echo $val['division']?>" data-reference="<?php echo $j++?>"><?php echo $val['division']?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="wrap" title="copy">
                                    <select name='district' size='20' class='list filterSelect' data-target='select-name' id='select-family' data-allowempty>
                                        <!-- <option value="-1" disabled="">---</option> -->

                                        <?php
                                        $i=1;
                                        $j=1;
                                        $m=1;
                                        $res=read("div_dis_sub");

                                        while($parent=mysqli_fetch_assoc($res)){
                                            $val=bGetDistrict($parent['division']);
                                            //echo var_dump(mysqli_fetch_assoc($val));exit;
                                            while($child=mysqli_fetch_assoc($val)){
                                                ?>
                                                <option style="cursor:pointer" value="<?php echo $child['district']?>"  data-reference="<?php echo $j++; ?>" data-belongsto="<?php echo $m?>"> <?php echo $child['district']?></option>
                                                <?php
                                            }
                                            $m++; }
                                        ?>

                                    </select>
                                </div>

                                <div class="wrap">
                                    <select name='upazila_thana' size='20' class='list' id='select-name'>
                                        <option value="-1">---</option>

                                        <?php

                                        $m=1;
                                        $res=read("banbies");

                                        while($parent=mysqli_fetch_assoc($res)){
                                            $val=bGetDistrict($parent['division']);
                                            //echo var_dump(mysqli_fetch_assoc($val));exit;
                                            while($children=mysqli_fetch_assoc($val)){
                                                $va=bGetSubDistrict($children['district']);
                                                //echo var_dump(mysqli_fetch_assoc($va));exit;
                                                while($child=mysqli_fetch_assoc($va)){
                                                    ?>
                                                    <option style="cursor:pointer" value="<?php echo $child['upazila_thana']?>"   data-belongsto="<?php echo $m?>"> <?php echo $child['upazila_thana']?></option>
                                                    <?php
                                                }
                                                $m++; }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            

<!--                            <br>-->
<!--                            <br>-->
<!--                            <input type="submit" value="search" class="tfbutton">-->
                    
                    </div>
                </div>













                <div class="col-md-3 padding-right-0">
                    <div class="minister-block sidebar-block">
                        <p class="block-heading text-center">Honorable Minister</p>

                        <img src="img/minister.jpg" class="img-responsive block-img">

                        <p class="description">Mustafa Jabbar is very known to the people of Bangladesh and Bengali...</p>

                        <p>
                            <a href="http://www.doict.gov.bd/site/office_head/970ba348-90af-4c99-b97c-0118eb9979d1/Details" title="Details">Details</a>
                        </p>
                    </div>


                    <div class="advisor-block sidebar-block">
                        <p class="block-heading text-center">Honorable ICT Adviser</p>

                        <img src="img/last-pic-adviser.gif" class="img-responsive block-img">

                        <p class="description">Sajeeb Wazed, is a ICT Consultant and  political campaigner. He is the son of Sheikh Hasina...</p>

                        <p>
                            <a href="http://www.doict.gov.bd/site/office_head/40bf04d4-835a-4a0d-895b-a0497b02caa9/Details" title="Details">Details</a>
                        </p>
                    </div>


                    <div class="advisor-block sidebar-block">
                        <p class="block-heading text-center">Honorable State Minister</p>

                        <img src="img/HSM.jpg" class="img-responsive block-img">

                        <p class="description">Zunaid Ahmed Palak was born on 17 May 1980 Singra under Natore dristrict...</p>

                        <p>
                            <a href="http://www.doict.gov.bd/site/office_head/03bf92db-fa3d-4dc0-9365-aceb0c2b6edd/Details" title="Details">Details</a>
                        </p>
                    </div>


                    <div class="advisor-block sidebar-block">
                        <p class="block-heading text-center">Project Director, Joint Seretary</p>

                        <img src="img/jahedi sir.jpg" class="img-responsive block-img">

                        <p>
                            মোঃ রেজাউল মাকছুদ জাহেদী
                        </p>

                        <p>
                            <a href="http://www.doict.gov.bd/site/page/ecad054c-c9b4-4138-a88c-d1dd5cf3ef00" title="Details">Details</a>
                        </p>
                    </div>


                    <!-- <div class="seretary-block sidebar-block">
                        <p class="block-heading text-center">Seretary Mr. N M Zeaul Alam</p>

                        <img src="img/Secretary Sir.jpg" class="img-responsive block-img">

                        <p style="text-align:justify; font-size:13px; line-height:18px; margin-top:10px;margin-bottom:6px;">Seretary Mr. N M Zeaul Alam</p>

                        <p>
                            <a href="http://www.doict.gov.bd/site/office_head/3e373f78-347f-4192-921e-95570d609046/Details" title="Details">Details</a>
                        </p>
                    </div> -->


                    <!-- <div class="director-block sidebar-block">
                        <p class="block-heading text-center">Director General (In charge)</p>

                        <img src="img/Addl.jpg" class="img-responsive block-img">

                        <p style="text-align:justify; font-size:13px; line-height:18px; margin-top:10px;margin-bottom:6px;">Mr. A. B. M. Arshad Hossain</p>

                        <p>
                            <a href="http://www.doict.gov.bd/site/office_head/10f76bf2-94ca-4340-a397-d70b6ac9b6c2/Details" title="Details">Details</a>
                        </p>
                    </div> -->
                </div>
            </div>
        </div>



        <!-- Simple Footer -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-artwork" id="footer-artwork">&nbsp;</div>
                </div>
            </div>
        </div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
            
                $('.navbar-light .dmenu').hover(function () {
                    $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
                }, function () {
                    $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
                });
            });
        </script>

        <script src="http://www.slidesjs.com/examples/basic-fade/js/jquery.slides.min.js"></script>


        <script src="plugins/filterselect.js"></script>

        <script type="text/javascript">
            $('.filterSelect').filterSelect({
                allowEmpty: true
            });
        </script>
        <script>
        $('#select-city').change(function(){
         
        var textarea = $('<textarea />');
       
        textarea.val($(this).val()).css({
            visibility: 'none'
        }).prependTo($( ".wrap--inner" ) );
        textarea.focus().select();
        if (document.execCommand('copy')) {
           // alert("Copied the text: "+ textarea.focus().select().val()) ;
           $('#foo').show();
           $('.alert-success span').text(textarea.focus().select().val());
            textarea.remove();
            return true;
            }
        });

        $('#select-family').change(function(){
         
         var textarea = $('<textarea />');
        
         textarea.val($(this).val()).css({
             visibility: 'none'
         }).prependTo($( ".wrap--inner" ) );
         textarea.focus().select();
         if (document.execCommand('copy')) {
             //alert("Copied the text: "+ textarea.focus().select().val()) ;
             $('#foo').show();
             $('.alert-success span').text(textarea.focus().select().val());
             textarea.remove();
             return true;
             }
         });
         $('#select-name').change(function(){
         
         var textarea = $('<textarea />');
        
         textarea.val($(this).val()).css({
             visibility: 'none'
         }).prependTo($( ".wrap--inner" ) );
         textarea.focus().select();
         if (document.execCommand('copy')) {
            // alert("Copied the text: "+ textarea.focus().select().val()) ;
            $('#foo').show();
             $('.alert-success span').text(textarea.focus().select().val());
             textarea.remove();
             return true;
             }
         });
        </script>
        <script src="js/main.js"></script>
        

        
    </body>
</html>

    
