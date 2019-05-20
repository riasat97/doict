<?php 
include('header.php');
?>
<title>“সারাদেশের শিক্ষা প্রতিষ্ঠানে কম্পিউটার ও ভাষা প্রশিক্ষণ ল্যাব স্থাপন প্রকল্প”</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.dataTables.min.css"/> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


<script type="text/javascript">
 var division = "<?php echo $_GET["division"]; ?>";
 var district = "<?php echo $_GET["district"]; ?>";
 var subdistrict = "<?php echo $_GET["sub_district"]; ?>";
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
  //  var parameters = {'division': division,'district':district,'sub_district':subdistrict};
    // DataTable
    var table = $('#example ').DataTable({
        "ajax": {
        "processing": true,
        "url": "labdata.php",
        type: 'GET',
        "data": {division:"<?php echo $_GET["division"]; ?>",district:"<?php echo $_GET["district"]; ?>",sub_district:"<?php echo $_GET["sub_district"]; ?>"},
        "pageLength": 25,
        "dom": 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print'
        ]
        }
       
    });
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );



</script>
<!-- <script type="text/javascript" src="script/script.js"></script> -->
<?php include('container.php');?>
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
<div class="container">
	<h2>নির্বাচিত শিক্ষা প্রতিষ্ঠানের চূড়ান্ত তালিকা </h2>	
	<div class="row">		
		<table id="example" class="display nowrap" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ক্রমিক নং</th>              
                <th>শিক্ষা প্রতিষ্ঠানের নাম</th>    
                <th>প্রতিষ্ঠান প্রধানের নাম ও  মোবাইল নম্বর</th>    
                <th>অর্থবছর </th>    
                <th>উপজেলা</th> 
                <th>জেলা </th>   
                <th>বিভাগ </th>          
            </tr>
        </thead>     
        <tfoot>
            <tr>
            <th>ক্রমিক নং</th>              
            <th>শিক্ষা প্রতিষ্ঠানের নাম</th>    
            <th>প্রতিষ্ঠান প্রধানের নাম ও  মোবাইল নম্বর</th>    
            <th>অর্থবছর </th>    
            <th>উপজেলা</th> 
            <th>জেলা </th>   
            <th>বিভাগ </th>        
            </tr>
        </tfoot>  
    </table>	
	</div>	
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="#" title="">Back </a>			
	</div>		
</div>
<?php include('footer.php');?>

