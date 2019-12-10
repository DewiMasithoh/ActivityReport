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
<!-- <script src="<?php echo base_url('assets');?>/vendor/jquery-ui/jquery-ui.js"></script> -->
<!-- <script src="<?php echo base_url('assets');?>/vendor/jquery.ui.timepicker.js?v=0.3.3"></script> -->
<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script type="text/javascript" src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );


	var timepicker = new TimePicker('time', {
      lang: 'en',
      theme: 'dark'
  });
      timepicker.on('change', function(evt1) {
      var value1 = (evt1.hour || '00') + ':' + (evt1.minute || '00');
      evt1.element.value = value1;
  });

	$('#time2').timepicker({
		timeFormat: 'H:mm',
		interval: 30,
		// minTime: '10',
		// maxTime: '6:00pm',
		// defaultTime: '11',
		startTime: '07:30',
		dynamic: false,
		dropdown: true,
		scrollbar: true
	});

</script>

<script type="text/javascript">
    

   
</script>
