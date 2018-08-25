    "use strict";

    $(document).ready(function() {

        $('#table5').DataTable();
        $('#sample_1').dataTable({
            "pageLength": 7,
            "lengthMenu": [7, 10, 25, 50]
        });

        var table = $('#example').DataTable({
            "pageLength": 7,
            "lengthMenu": [7, 10, 25, 50]
        });

        $('button.toggle-vis').on('click', function(e) {
            e.preventDefault();

            // Get the column API object
            var column = table.column($(this).attr('data-column'));

            // Toggle the visibility
            column.visible(!column.visible());
        });
        //table tools example
        var table2 = $('#table1').DataTable({
            "dom": '<"m-t-10"B><"m-t-10 pull-left"f><"m-t-10 pull-right"l>rt<"pull-left m-t-10"i><"m-t-10 pull-right"p>',
            buttons: [
                'copy', 'csv', 'print'
            ],
            "pageLength": 7,
            "lengthMenu": [7, 10, 25, 50]
        });
        // add row, delete row example
        var table3 = $('#table3').DataTable({
            "order": [
                [0, "desc"]
            ],
            "dom": '<"m-t-10 pull-left"l><"m-t-10 pull-right"f>rt<"pull-left m-t-10"i><"m-t-10 pull-right"p>',
            "pageLength": 7,
            "lengthMenu": [
                [7, 10, 25, 50, -1],
                [7, 10, 25, 50, "All"]
            ]
        });
        //total number of existing rows
        var counter = 18;


        //row addition code
        $('#addButton').on('click', function() {
            table3.row.add([
                counter,
                counter + ' new',
                counter + ' user',
                counter + '_unique_user',
                counter + '_unique_user@domain.com'
            ]).draw();

            counter++;
        });

        //row deletion code

        $('#table3').find('tbody').on('click', 'tr', function() {
            if ($(this).hasClass('danger')) {
                $(this).removeClass('danger');
            } else {
                table3.$('tr.danger').removeClass('danger');
                $(this).addClass('danger');
            }
        });

        $('#delButton').on('click', function() {
            if (!$("#table3 tr").hasClass('danger')) {
                alert('please select a row first');
                //exit;
            }
            table3.row('.danger').remove().draw(false);
        });
    });
