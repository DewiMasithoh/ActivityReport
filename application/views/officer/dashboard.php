
<div class="container">
    <div class="box">
       <div class="box-header">
        <div  class="text-center">
            <h2  style="display: initial;">Add Activity Report</h2>
		</div>
        <div class="container-fluid">
            <?php echo form_open('officer/home','role="form" enctype="multipart/form-data" '); ?>
            <?php echo validation_errors(); ?>
			<div class="row">
                <label for="id">Date</label>
                <input type="text" disabled="true" value="<?php echo date("j F Y"); ?>" class="form-control">
            </div>
			<div class="row">
                <label for="id">Name</label>
                <input type="text" disabled="true" value="<?php echo $this->session->userdata('last_name'); ?>" class="form-control">
                <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">
            </div>
            <div class="row">
                <label for="id">SSN</label>
                <input type="text" disabled="true" value="<?php echo $this->session->userdata('username'); ?>" class="form-control">
            </div>
            <div class="row">
				<label for="id">Project</label>
				<select class="form-control" name="id_proyek" required>
					<option for="id"></option>
					<?php foreach($proyek as $value) { ?>
						<option value="<?php echo $value->id_proyek?>"><?php echo $value->deskripsi_proyek?></option>
					<?php } ?>
				</select>
            </div>
            <div class="row">
                <label for="id">Job Description</label>
                <input type="text" placeholder="Max. 40 Characters" name="deskripsi" value="<?php echo $this->input->post('deskripsi'); ?>" class="form-control" required>
            </div> 
                <div class="row">
                    <label for="id">Time</label>
                    <div class="row">
                         <div class="col-lg-6"><input type="text" placeholder="Start Time" id="time" name="waktu_mulai" value="<?php echo $this->input->post('waktu_mulai'); ?>" class="form-control" required>
                         </div>
                         <div class="col-lg-6"><input type="text" placeholder="End Time" id="time2" name="waktu_akhir" value="<?php echo $this->input->post('waktu_akhir'); ?>" class="form-control" required>
                         </div>
                    </div>
                   
                </div>    
            <div class="row">
                <br>
                <div style="float: right">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<?php
		$totalsemuajam = array();
		foreach($activity as $p){
			$totalsemuajam[] = $p->total_jam;
		}
		if((SumTime($totalsemuajam))>='08:01'){ ?>
		<div class="alert alert-danger" role="alert">
			<strong>Total waktu bekerja hari ini melebihi 8 Jam !</strong><br>
			Silahkan cek ulang data aktivitas bekerja anda,
			waktu bekerja anda hari ini :<b> <?php echo total_jam(SumTime($totalsemuajam));?></b>
      	</div>

	<?php }else{
	?>
		<div class="alert alert-info" role="alert">
		Total waktu bekerja anda hari ini : <b><?php echo total_jam(SumTime($totalsemuajam));?></b>
		</div>
	<?php } ?>
<div class="container" id="barang">
    <div class="card mb-3 box-body">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table_id" class="display">
                 <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Project</th>
                        <th>Job Description</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Total</th>
                        <th class="opsi">Option</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach($activity as $p){
                        ?>
                        <tr>
                            <td class="no"><?php echo $no++; ?></td>
                            <td><?php echo $p->deskripsi_proyek; ?></td>
                            <td><?php echo $p->deskripsi; ?></td>
                            <td><?php echo pukul($p->waktu_mulai);?></td> 
                            <td><?php echo pukul($p->waktu_selesai); ?></td>
                            <td><?php echo total_jam($p->total_jam); ?></td>
                            <td>
                                <a href="<?php echo site_url('officer/home/hapus/'.$p->id_activity); ?>" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Seriously ?')">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
