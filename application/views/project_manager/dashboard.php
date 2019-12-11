
<div class="container">
	<div class="card mb-3 box-header">
		<a href="<?php echo site_url('project_manager/home/'); ?>">Home</a>
	</div>
<div class="container" id="barang">
    <div class="card mb-3 box-body">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table_id" class="display">
                 <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Project</th>
                        <th>ID Project</th>
                        <th>Total Time</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach($proyek as $p){
                        ?>
                        <tr>
                            <td class="no"><?php echo $no++; ?></td>
                            <td><a href="<?php echo site_url('project_manager/home/detail/'.$p->id_proyek); ?>" title="Detail"><?php echo $p->deskripsi_proyek; ?></a></td>
                            <td><?php echo $p->id_proyek; ?></td>
							<td><?php  
									$id=$p->id_proyek;
									$totalperproyek = array();
									foreach($activity as $a){
										if($id==$a->id_proyek){
											$totalperproyek[] = $a->total_jam;
										}
									}
									echo total_jam(SumTime($totalperproyek));
								?>
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
