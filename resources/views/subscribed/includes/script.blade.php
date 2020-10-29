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
<script src="{{ url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
  $(function () {
    $('#table_one').DataTable()
    $('#table_two').DataTable()
    $('#table_three').DataTable()
})
</script>

<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>
<script>
    @if(session('Sukses'))
        swal("Sukses!", "{{ session('Sukses') }}", "success");
    @endif
    @if(session('Gagal'))
        swal("Gagal!", "{{ session('Gagal') }}", "error");
    @endif

    $('.delete-club').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Apakah yakin ingin menghapus data?',
            text: 'Data akan terhapus secara permanen',
            icon: 'warning',
            buttons: ["Tidak", "Ya!"],
        }).then(function (value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>