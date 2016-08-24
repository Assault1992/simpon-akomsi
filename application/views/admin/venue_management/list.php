	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
<a href="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/venue_management/add'); ?>" class="btn btn-primary" ><i class="glyphicon glyphicon-plus"></i> Add New</a>
<br/>
<br/>


<table class="table table-hover" id="maintable">
	<thead>
		<tr>
			<th>#</th>
			<th>Venue</th>
			<th>Cabang Olah Raga</th>
			<th>Wilayah</th>
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
			<td><?php echo $item->cabor; ?></td>
			<td><?php echo $item->regional; ?></td>
			<td>
				<div class="btn-group">
					<a href="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/venue_management/edit/' . $item->id); ?>" class="btn btn-warning" ><i class=""></i>Edit</a>
					<a href="" class="btn btn-danger" onclick="javascript:_delete(<?php echo $item->id; ?>, '<?php echo $item->name; ?>');return false;">Delete</a>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<br/>
<br/>
</div>
</div>
</div>
</div>
<script type="text/javascript">
	function _edit(id, title){
		var url = '<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/venue_management/edit'); ?>/' + id;
		popup(url, 'edit: ' + title, 300, 400);

		return false;
	}

	function _delete(id, title){
		var url = '<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/venue_management/del'); ?>/' + id;
		if(confirm('Are you sure want to delete "' + title + '"?')){
			window.location = url;
		}

		return false;
	}
</script>
