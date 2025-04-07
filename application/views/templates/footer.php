<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level plugins -->
<!-- <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="<?= base_url('assets/js/demo/chart-area-demo.js') ?>"></script> -->
<!-- <script src="<?= base_url('assets/js/demo/chart-pie-demo.js') ?>"></script> -->

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "lengthMenu": [
                [10, 25, 100],
                [10, 25, 100]
            ],
            columnDefs: [{
                targets: 'no-sort',
                orderable: false
            }],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ baris data",
                "search": "Telusuri Data:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                },
                "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ data"
            }
        });
    });
</script>