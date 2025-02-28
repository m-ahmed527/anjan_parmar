<script>
    let request = "{{ request()->url() }}";
    console.log(request);

    if (request.includes("details")) {
        $(function() {
            $("#example1").DataTable({
                "searching": false,
                "info": false,
                "paging": false,
                "sorting": false,
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });

        });
    } else {
        // $(function() {
        //     var table = $("#example1").DataTable({
        //         "responsive": true,
        //         "lengthChange": true,
        //         "autoWidth": false,
        //         // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        //     $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
        //         var selectedStatus = $('#status-filter').val(); // Selected status lein
        //         var rowStatus = $(table.row(dataIndex).node()).find('select')
        //     .val(); // Row ke dropdown se status lein

        //         if (selectedStatus === "" || rowStatus === selectedStatus) {
        //             return true; // Status match hone par row dikhao
        //         }
        //         return false; // Nahi toh hatao
        //     });

        //     // Status filter change event
        //     $('#status-filter').on('change', function() {
        //         table.draw(); // Table ko update karo
        //     });
        // })
        $(document).ready(function() {
            // Ensure DataTable is properly initialized
            var table = $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false
            });

            // Custom filter function for filtering status
            if (request.includes("all-vendors")) {
                filter();
            }
        });

    }

    function filter() {
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            var selectedStatus = $('#status-filter').val(); // Selected status from dropdown
            var rowStatus = $(table.row(dataIndex).node()).find('select')
                .val(); // Get status from row's select box
            console.log(selectedStatus, rowStatus);

            if (selectedStatus === "" || rowStatus === selectedStatus) {
                return true; // Show row if status matches
            }
            return false; // Hide row otherwise
        });

        // Filter event on dropdown change
        $('#status-filter').on('change', function() {
            if ($.fn.DataTable.isDataTable("#example1")) { // Ensure table exists
                table.draw();
            }
        });
    }
</script>
<script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
