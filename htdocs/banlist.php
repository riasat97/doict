<?php
header('Content-Type: text/html; charset=utf-8');
include('header.php');
require_once('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content ="IE-edge, IE">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>“সারা দেশের শিক্ষা প্রতিষ্ঠানে কম্পিউটার ও ভাষা প্রশিক্ষণ ল্যাব স্থাপন” প্রকল্প</title>

        <!-- Favicons -->
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" />
<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">-->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">



        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
        <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.dataTables.min.css"/> -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css"/>

        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script> -->
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="script/filterDropDown.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function($) {

                // Setup - add a text input to each footer cell
                
                $('#banbieslist thead tr').clone(true).appendTo( '#banbieslist thead' );
                $('#banbieslist thead tr:eq(1) th').each( function (i) {
                    if(i==1 || i==5 || i==6){
                    var title = $(this).text();
                    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            
                    $( 'input', this ).on( 'keyup change', function () {
                        if ( table.column(i).search() !== this.value ) {
                            table
                                .column(i)
                                .search( this.value )
                                .draw();
                        }
                    } );
                   }
                } );
            
              
               //
                var table = $('#banbieslist ').DataTable({
                    destroy: true,
                    "columnDefs": [ {
                        "searchable": false,
                        "orderable": false,
                        "targets": 0
                    } ],
                    "order": [[ 1, 'asc' ]],
                    "processing": true,
                    "sAjaxSource":"bandata.php?division=<?php echo isset($_GET["division"])?$_GET["division"]:''; ?>&district=<?php echo isset($_GET["district"])?$_GET["district"]:'' ;?>&upazila_thana=<?php echo isset($_GET["upazila_thana"])?$_GET["upazila_thana"]:'' ;?>",
                    "pageLength": 25,
                    "dom": 'lBfrtip',
                    initComplete: function() {
                        this.api().columns().every(function() {
                            var column = this;
                            //added class "mymsel"
                            if ( column.index() == 2 || column.index() == 5 || column.index() == 6 ) {
                                var select = $('<select class="mymsel" multiple="multiple"><option value=""></option></select>')
                                    .appendTo($(column.footer()).empty())
                                  //  .appendTo('#selectTriggerFilter')
                                    .on('change', function() {
                                        var vals = $('option:selected', this).map(function(index, element) {
                                            return $.fn.dataTable.util.escapeRegex($(element).val());
                                        }).toArray().join('|');

                                        column
                                            .search(vals.length > 0 ? '^(' + vals + ')$' : '', true, false)
                                            .draw();
                                    });

                                column.data().unique().sort().each(function(d, j) {
                                    select.append('<option value="' + d + '">' + d + '</option>')
                                });
                            }
                        });
                        //select2 init for .mymsel class
                        $(".mymsel").select2();
                    },
                    //     initComplete: function() {
                    //   var column = this.api().column(3);

                    //   var select = $('<select class="filter"><option value=""></option></select>')
                    //     .appendTo('#selectTriggerFilter')
                    //     .on('change', function() {
                    //       var val = $(this).val();
                    //       column.search(val ? '^' + $(this).val() + '$' : val, true, false).draw();
                    //     });

                    //   column.data().unique().sort().each(function(d, j) {
                    //     select.append('<option value="' + d + '">' + d + '</option>');
                    //   });
                    // },

                    buttons: [
                        'copy','csv', 'excel', 'print'
                    ],
                    //     initComplete: function () {
                    //     this.api().columns().every(function () {
                    //      var column = this;

                    //      if (column.index() == 3 ) {  //skip if column 0
                    //        $(column.header()).append("<br>")
                    //        var select = $('<select id="select"><option class="select" value=""></option></select>')
                    //                            .appendTo($(column.header()))
                    //                            .on('change', function () {
                    //              var val = $.fn.dataTable.util.escapeRegex(
                    //                  $(this).val()
                    //              );

                    //              column
                    //                  .search(val ? '^' + val + '$' : '', true, false)
                    //                  .draw();
                    //          });
                    //        column.data().unique().sort().each(function (d, j) {
                    //          select.append('<option class="select" value="' + d + '">' + d + '</option>')
                    //       } );
                    //    }   //end of if

                    // } );
                    // }



                });
                table.on( 'order.dt search.dt', function () {
                    table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
            } );

        </script>
        <!-- <script type="text/javascript" src="script/script.js"></script> -->



        <!-- <link rel="stylesheet" href="css/multipleDropdown.css"> -->
        <style>
            .dataTables_length {
                margin-top:20px;
            }
            div.dt-buttons {
                position: relative;
                float: left;
                margin-left: 20px;
                margin-top:12px;
                font-size:16px;
                font-weight:bold;
            }
            .dataTables_filter {
                margin-top:20px;
            }

        </style>


        <link href="css/style.css" rel="stylesheet">
    </head>


    <body class="body">
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
                            <!--							<span style="font-size: 13px;">মেনু নির্বাচন করুন</span>-->
                        </button>

                        <div class="collapse navbar-collapse tutorial" id="navbarTogglerDemo03">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="http://srdl.gq/"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://srdl.gq/trainees.php" target="_blank"> Trainees </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="http://www.doict.gov.bd" target="_blank">DoICT <span class="sr-only">(current)</span></a>
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

                                <!--								<li class="nav-item dropdown dmenu">-->
                                <!--									<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">-->
                                <!--										Our Service-->
                                <!--									</a>-->
                                <!--									<div class="dropdown-menu sm-menu">-->
                                <!--										<a class="dropdown-item" href="#">service2</a>-->
                                <!--										<a class="dropdown-item" href="#">service 2</a>-->
                                <!--										<a class="dropdown-item" href="#">service 3</a>-->
                                <!--									</div>-->
                                <!--								</li>-->
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>


        <!-- Main Contents -->
        <div class="container side-container">
            <div class="row">
                <div class="col-md-12 no-padding">
                    <div class="wrap--outer">
                        <div class="project-heading">
                            <span>
                                “সারা দেশের শিক্ষা প্রতিষ্ঠানে কম্পিউটার ও ভাষা প্রশিক্ষণ ল্যাব স্থাপন” প্রকল্প
                            </span>
                        </div>

                        <p class="main-heading" style="font-size: 14px;">শিক্ষা প্রতিষ্ঠানের তালিকা</p>


                        <div style="margin:15px 0px 30px 0px;">
                            <a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://srdl.gq/" title="">Back </a>
                        </div>

                        <div class="result-table">
                            <!-- <p id="selectTriggerFilter"><label>অর্থবছর: </label></p> -->

                            <table id="banbieslist" class="display" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Institution Name</th>
                                        <th>Institution Type</th>
                                        <th >Eiin</th>
                                        <th>Thana/Upazila</th>
                                        <th>District</th>
                                        <th>Division</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Institution Name</th>
                                        <th>Institution Type</th>
                                        <th >Eiin</th>
                                        <th>Thana/Upazila</th>
                                        <th>District</th>
                                        <th>Division</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div style="margin:15px 0px 30px 0px;">
                            <a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://srdl.gq/" title="">Back </a>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-3 padding-right-0">
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
                 <!--</div> -->
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

        <script src="js/main.js"></script>
    
    </body>
</html>

























