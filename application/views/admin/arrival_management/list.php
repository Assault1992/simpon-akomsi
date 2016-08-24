	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
<a href="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/arrival_management/add'); ?>" class="btn btn-primary" ><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<br/>
<br/>

<table class="table table-hover" id="maintable">
	<thead>
		<tr style="font-size:9px;">
			<th>#</th>
			<th>Partisipan</th>
			<th>Holding</th>
			<th>Rest</th>
			<th>Tanggal, Jam</th>
			<th>Kontingen</th>
			<th>Cabor</th>
			<th>Operasi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$i = 0;
			foreach($q->result() as $item): 
			$i++;
		?>
		<tr style="font-size:9px;">
			<td><?php echo $i; ?></td>
			<td><?php echo $item->participant; ?></td>
			<td><?php echo $item->ha; ?></td>
			<td><?php echo $item->ra; ?></td>
			<td><?php echo date("d-m-Y", strtotime($item->date)); ?>, <?php echo $item->time; ?></td>
			<td><?php echo $item->contingent; ?></td>
			<td><?php echo $item->cabor; ?></td>
			<td>
				<div class="btn-group">
					<a href="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/arrival_management/edit/' . $item->id); ?>" class="btn btn-warning" ><i class=""></i>Ubah</a>
					<a href="" class="btn btn-danger" onclick="javascript:_delete(<?php echo $item->id; ?>, '<?php echo $item->participant; ?>');return false;">Hapus</a>
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
	
	function _edit(id, title){
		var url = '<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/arrival_management/edit'); ?>/' + id;
		popup(url, 'edit: ' + title, 300, 400);
		
		return false;
	}
	
	function _delete(id, title){
		var url = '<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/arrival_management/del'); ?>/' + id;
		if(confirm('Are you sure want to delete "' + title + '"?')){
			window.location = url;
		}
		
		return false;
	}
</script>