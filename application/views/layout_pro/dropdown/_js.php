<!-- JavaScript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/AdminLTE-2.4.3/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/bootstrap.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/bootstrap1.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/dropdown/jquery.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/dropdown/ie-emulation-modes-warning.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/bootstrap-fileupload.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/dropdown/jquery-chained.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/dropdown/ie10-viewport-bug-workaround.js"></script>

<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
        $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
<script>
$(function() {
	$('.navbar a[href~="' + location.href + '"]').parents('li').addClass('active');
});
</script>
<script>
            $(document).ready(function() {
                $("#kategori2").chained("#kategori1");
                $("#kategori3").chained("#kategori2");
            });
</script>
<script>
            $(document).ready(function() {
                $("#kategori2in").chained("#kategori1in");
                $("#kategori3in").chained("#kategori2in");
            });
</script>
<script>
            $(document).ready(function() {
                $("#kategori2con").chained("#kategori1con");
                $("#kategori3con").chained("#kategori2con");
            });
</script>

<!-- Untuk menampilkan fungsi moustrap(short cut keyboard) -->
<script src="//cdnjs.cloudflare.com/ajax/libs/mousetrap/1.4.6/mousetrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/mousetrap/1.4.6/mousetrap-bind-dictionary.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/moustrap/script.js"></script>
