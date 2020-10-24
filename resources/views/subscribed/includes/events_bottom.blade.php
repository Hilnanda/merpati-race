<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
<script src="{{ url('js/jquery/jquery-2.2.4.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ url('js/bootstrap/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ url('js/bootstrap/bootstrap.min.js') }}"></script>
<!-- All Plugins js -->
<script src="{{ url('js/plugins/plugins.js') }}"></script>
<!-- Active js -->
<script src="{{ url('js/active.js') }}"></script>

<script src="{{ url('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
  })
})
</script>
</body>

</html>