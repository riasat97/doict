// $(document).ready(function() {
//     // Setup - add a text input to each footer cell
//     $('#example thead tr').clone(true).appendTo( '#example thead' );
//     $('#example thead tr:eq(1) th').each( function (i) {
//         var title = $(this).text();
//         $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
//         $( 'input', this ).on( 'keyup change', function () {
//             if ( table.column(i).search() !== this.value ) {
//                 table
//                     .column(i)
//                     .search( this.value )
//                     .draw();
//             }
//         } );
//     } );
 
//     var table = $('#example').DataTable( {
//         orderCellsTop: true,
//         fixedHeader: true,
//         "processing": true,
//         "sAjaxSource":"data.php",
//         "pageLength": 25,
//         "dom": 'lBfrtip',
//         "buttons": [
//            {
//                extend: 'collection',
//                text: 'Export',
//                buttons: [
//                    'copy',
//                    'excel',
//                    'csv',
//                    'pdf',
//                    'print'
//                ]
//            }
//        ]
//     } );
// } );


// $(document).ready(function() {
//     // Setup - add a text input to each footer cell
//     $('#example tfoot th').each( function () {
//         var title = $(this).text();
//         $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
//     } );
//     var parameters = {'division': division};
//     // DataTable
//     var table = $('#example ').DataTable({
//         "processing": true,
//         "sAjaxSource":"labdata.php",
//        " data": parameters,
//         "pageLength": 25,
//         "dom": 'lBfrtip',
//         buttons: [
//             'copy', 'csv', 'excel', 'print'
//         ]
//     });
 
//     // Apply the search
//     table.columns().every( function () {
//         var that = this;
 
//         $( 'input', this.footer() ).on( 'keyup change', function () {
//             if ( that.search() !== this.value ) {
//                 that
//                     .search( this.value )
//                     .draw();
//             }
//         } );
//     } );
// } );


$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable({
        "processing": true,
        "sAjaxSource":"data.php",
        "pageLength": 25,
        "dom": 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print'
        ]
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


