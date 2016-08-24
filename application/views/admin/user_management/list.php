	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
            <a href="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/user_management/add'); ?>" class="btn btn-primary" ><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<br/>
<br/>

<table class="table table-hover" id="maintable">
	<thead>
		<tr>
			<th>#</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Email</th>
			<th>Penginapan</th>
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
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->username; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->ledging; ?></td>
			<td>
				<div class="btn-group">
					<a href="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/user_management/edit/' . $item->id); ?>" class="btn btn-warning" ><i class=""></i>Ubah</a>
					<a href="" class="btn btn-danger" onclick="javascript:_delete(<?php echo $item->id; ?>, '<?php echo $item->id; ?>');return false;">Hapus</a>
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
		var url = '<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/user_management/edit'); ?>/' + id;
		popup(url, 'edit: ' + title, 300, 400);
		
		return false;
	}
	
	function _delete(id, title){
		var url = '<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/user_management/del'); ?>/' + id;
		if(confirm('Are you sure want to delete "' + title + '"?')){
			window.location = url;
		}
		
		return false;
	}
</script>