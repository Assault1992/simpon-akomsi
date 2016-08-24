<a href="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/allocation_management/add'); ?>" class="btn btn-primary" ><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<br/>
<br/>

<table class="table table-hover" id="maintable">
	<thead>
		<tr>
			<th>#</th>
			<th>Penginapan</th>
			<th>Untuk</th>
			<th>Jumlah Alokasi</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$i = 0;
			foreach($q->result() as $item): 
			$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $item->ledging; ?></td>
			<td><?php echo $item->for; ?></td>
			<td><?php echo $item->allocation; ?></td>
			<td>
				<div class="btn-group">
					<a href="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/allocation_management/edit/' . $item->id); ?>" class="btn btn-warning" ><i class=""></i>Ubah</a>
					<a href="" class="btn btn-danger" onclick="javascript:_delete(<?php echo $item->id; ?>, '<?php echo $item->id; ?>');return false;">Hapus</a>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<br/>
<br/>

<script type="text/javascript">
	var t_init = 0;
	$(function(){
		if(t_init == 0){
			$('#maintable').dataTable(<?php echo $q->num_rows() > 10 ? '{"sPaginationType": "full_numbers"}' : ''; ?>);
			t_init++;
		}
	});
	
	function _edit(id, title){
		var url = '<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/allocation_management/edit'); ?>/' + id;
		popup(url, 'edit: ' + title, 300, 400);
		
		return false;
	}
	
	function _delete(id, title){
		var url = '<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/allocation_management/del'); ?>/' + id;
		if(confirm('Are you sure want to delete "' + title + '"?')){
			window.location = url;
		}
		
		return false;
	}
</script>