    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.2
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- jQuery -->
<script src="<?php echo PLUGINS.'jquery.min.js'?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo PLUGINS.'bootstrap.bundle.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo PLUGINS.'jquery.dataTables.js'?>"></script>
<script src="<?php echo PLUGINS.'dataTables.bootstrap4.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo PLUGINS.'adminlte.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo PLUGINS.'demo.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>