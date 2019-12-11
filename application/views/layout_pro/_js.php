<!-- JavaScript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/AdminLTE-2.4.3/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/bootstrap.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/bootstrap1.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/jquery.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/bootstrap-fileupload.min.js"></script>
<script>
    $("#k2").chained("#k1"); // disini kita hubungkan kota dengan provinsi
    $("#k3").chained("#k2"); // disini kita hubungkan kecamatan dengan kota
</script>
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

<!-- Untuk menampilkan fungsi moustrap(short cut keyboard) -->
<script src="//cdnjs.cloudflare.com/ajax/libs/mousetrap/1.4.6/mousetrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/mousetrap/1.4.6/mousetrap-bind-dictionary.min.js"></script>
<!-- <script src="<?php echo base_url('assets');?>/vendor/moustrap/script.js"></script> -->
<script>
function search() {
    var search = $('#search');
    search.val('');
    search.focus();
}

function home() {
    window.location.href = "<?php echo base_url('admin/home'); ?>";
}

function proyek() {
    window.location.href = "<?php echo base_url('admin'); ?>/proyek";
}

function pinjam() {
    window.location.href = "<?php echo base_url('admin'); ?>/peminjaman";
}

function pegawai() {
    window.location.href = "<?php echo base_url('admin'); ?>/pegawai";
}

function kembali() {
    window.location.href = "<?php echo base_url('admin'); ?>/pengembalian";
}

function barang() {
    window.location.href = "<?php echo base_url('admin'); ?>/barang";
}

function tambahBarang() {
    window.location.href = "<?php echo base_url('admin/barang/tambah'); ?>";
}

function highLight(letter) {
    var media  = $('.media');
    var hlight = $('.highlight');
    var index  = media.index(hlight);

    console.log('work');
    
    media.eq(index).removeClass('highlight');

    if ( letter === 'k' ) {
        media.eq(index - 1).addClass('highlight');       
    } else if ( letter === 'j' ) {
        media.eq(index + 1).addClass('highlight');
    }

    addShare();
}

Mousetrap.bind({
    'h':home,
    'a':tambahBarang,
    'o':pinjam,
	'i':kembali,
	'l':barang,
	'e':pegawai,
	'p':proyek,
    // '?': function modal() { $('#help').modal('show'); },
    'j': function next() { highLight('j') },
    'k': function prev() { highLight('k') }
});


</script>

