<script>
    var request = "{{ request()->url() }}";

    // console.log(request);
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

        $(document).ready(function() {

            let ordering = request.includes('newsletters') ? false : true;
            console.log(ordering);
            // Ensure DataTable is properly initialized
            var table = $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "ordering": ordering
            });

            // Custom filter function for filtering status
            // if (request.includes("all-vendors")) {
            //     $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            //         var selectedStatus = $('#status-filter').val(); // Selected status from dropdown
            //         var rowStatus = $(table.row(dataIndex).node()).find('select')
            //             .val(); // Get status from row's select box
            //         // console.log($(table.row(dataIndex).node()).find('select').val());

            //         if (selectedStatus === "" || rowStatus === selectedStatus) {
            //             return true; // Show row if status matches
            //         }
            //         return false; // Hide row otherwise
            //     });

            //     // Filter event on dropdown change
            //     $('#status-filter').on('change', function() {
            //         if ($.fn.DataTable.isDataTable("#example1")) { // Ensure table exists
            //             table.draw();
            //         }
            //         var currentUrl = window.location.href;

            //         var newUrl = currentUrl.split('?')[0];
            //         console.log(currentUrl,newUrl);
            //         window.history.replaceState(null, null, newUrl);
            //     });
            //     $(document).ready(function() {
            //         if ($.fn.DataTable.isDataTable("#example1")) { // Ensure table exists
            //             table.draw();
            //         }
            //     });
            // }
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
