<div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <!-- /.box-header -->
            <div class="box-body">
	<h4 class="">Edit Data Dapur : <?php echo $data->name; ?></h4>
	<hr >
	
		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/kitchen_management/edit/' . $data->id); ?>" method="post">

			<div class="form-group">
				<?php $field = 'name'; $name = $field; ?>
					<label>Nama Dapur</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'id_ledging'; $alias = $field; ?>
				<label>Penginapan</label>
					<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item): ?>
						<option value="<?php echo $item->id; ?>" <?php echo set_value($field, $data->$field == $item->id ? 'selected' : ''); ?>><?php echo $item->name; ?></option>
					<?php endforeach; ?>
					</select>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'address'; $name = $field; ?>
					<label>Alamat Dapur</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'id_regional'; $alias = $field; ?>
				<label>Wilayah</label>
					<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item): ?>
						<option value="<?php echo $item->id; ?>" <?php echo set_value($field, $data->$field == $item->id ? 'selected' : ''); ?>><?php echo $item->name; ?></option>
					<?php endforeach; ?>
					</select>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<hr/>
			<div class="form-group">
				<?php $field = 'cp_name'; $name = $field; ?>
					<label>Contact Person</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'cp_telp'; $name = $field; ?>
					<label>Telp</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'cp_email'; $name = $field; ?>
					<label>Email</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

		<input type="submit" value="Submit" class="btn btn-default" style="width:100%;" />
		</form>
	</div>
        </div>
      </div>
</div>  