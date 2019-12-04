<div class="container">
	<div class="card mb-3 box-header">
		<a href="<?php echo site_url('project_manager/home/'); ?>">Home</a>
		<?php  foreach($activity as $p){
			$nama = $p->last_name;
			$id_user = $p->id_user;
		} ?>
			> <a href=""><?php echo $nama; ?></a>
</div>
<div id="barang">
    <div class="card mb-3 box-body">
        <div class="card-body">
			<div class="row text-right">
				<form action="<?php echo site_url('project_manager/home/detail_employees/'.$id_user); ?>" method="post">
					<input type="date" name="tanggal_awal" value="<?php echo $this->input->post('tanggal_awal') ?>"> - 
					<input type="date" name="tanggal_akhir" value="<?php echo $this->input->post('tanggal_akhir') ?>">
					<input type="submit" value="Filter">
				</form>
			</div><br>
            <div class="table-responsive">
                <table id="table_id" class="display">
                 <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Project</th>
                        <th>Job Description</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Total</th>
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
                            <td><?php echo tanggal($p->waktu_mulai);?></td> 
                            <td><?php echo pukul($p->waktu_mulai);?></td> 
                            <td><?php echo pukul($p->waktu_selesai); ?></td>
                            <td><?php echo total_jam($p->total_jam); ?></td>
                            
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
