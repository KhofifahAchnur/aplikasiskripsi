<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; <a href="#"> KHOFIFAH ACHNUR 2022 </a></strong>
    <div class="float-right d-none d-sm-inline-block">
        <b>
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<!-- ./wrapper -->

<!-- jQuery -->

<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('adminlte/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('adminlte/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('adminlte/'); ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('adminlte/'); ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('adminlte/'); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('adminlte/'); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('adminlte/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('adminlte/'); ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('adminlte/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('adminlte/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('adminlte/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('adminlte/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('adminlte/'); ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('adminlte/'); ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- DataTables  & Plugins -->
<script src="<?= base_url('adminlte/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('adminlte/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('adminlte/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('adminlte/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('adminlte/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('adminlte/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('adminlte/'); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('adminlte/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('adminlte/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('adminlte/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('adminlte/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('adminlte/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->

<!-- Select2 -->
<script src="<?= base_url('adminlte/'); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- 
<script src="<?= base_url('adminlte/'); ?>plugins/daterangepicker-master/daterangepicker.js"></script>
<script src="<?= base_url('adminlte/'); ?>plugins/daterangepicker-master/moment.min"></script> -->

<script src="<?= base_url(); ?>/assets/js/custom.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        $("#example1").DataTable()
    });
</script>

</body>

</html>