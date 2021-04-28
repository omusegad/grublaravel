jQuery(document).ready(function() {

    //allorders databale func2tion
    $('#corporateID').DataTable({
        dom: 'lBfrtip',
        buttons: [
            { extend: 'copy', className: 'btn btn-info' },
            { extend: 'excel', className: 'btn btn-primary' },
            { extend: 'pdf', className: 'btn btn-secondary' },
            { extend: 'print', className: 'btn btn-success' }
        ],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ]
    });




///Date pickker
$('#datetimepicker3').datetimepicker({
    format: 'LT'
});

//boostrap toggle
$('#toggle-one').bootstrapToggle();


} );



