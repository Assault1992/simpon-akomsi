<?php
	date_default_timezone_set('Asia/Jakarta');
	$date = getdate();
?>    
<div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="pull-right">
            	<h3>Tanggal : <?php echo $date["mday"]." ".$date["month"]." ".$date["year"]?></h3>
            </div>
            <h3 class="box-title">List Peserta</h3>
            <hr>
<table class="table table-hover" id="maintable">
	<thead>
		<tr style="font-size:12px;font-family:Arial;">
			<th>#</th>
			<th>Partisipan</th>
			<th>Cabor</th>
			<th>Kontingen</th>
			<th>Tanggal, Jam</th>
			<th>Ruangan</th>
			<th>Operasi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$i = 0;
			foreach($q->result() as $item): 
			$i++;
		?>
		<tr style="font-size:12px;font-family:Arial;">
			<td><?php echo $i; ?></td>
			<td><?php echo $item->n_partisipan; ?></td>
			<td><?php echo $item->n_cabor; ?></td>
			<td><?php echo $item->n_kontingen; ?></td>
			<td><?php echo date("d-m-Y", strtotime($item->tanggal)); ?>, <?php echo $item->waktu; ?></td>
			<td><?php echo $item->n_room; ?></td>
			<td>
				<div class="btn-group">				
					<a href="#" onclick="cekout(<?php echo $item->id; ?>, '<?php echo $item->id; ?>')" class="btn btn-warning" ><i class=""></i>Check Out</a>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>
        </div>
      </div>
</div>
<script type="text/javascript">
	/*var t_init = 0;
	$(function(){
		if(t_init == 0){
			$('#maintable').dataTable(<?php echo $q->num_rows() > 10 ? '{"sPaginationType": "full_numbers"}' : ''; ?>);
			t_init++;
		}
	});*/
	function cekout(id, title){
		var url = "<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/check_out/cekout'); ?>/" + id;
		if(confirm('Cekout atlit "' + title + '"?')){
			window.location = url;
		}
		return false;
	}
</script>
