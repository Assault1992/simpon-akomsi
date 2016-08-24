	<div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <!-- /.box-header -->
            <div class="box-body">
	<h4 class="">Edit Operator : <?php echo $data->id; ?></h4>
	<hr>
		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/user_management/edit/' . $data->id); ?>" method="post">
			<div class="form-group">
				<?php $field = 'name'; $name = $field; ?>
				<label>Nama</label>
				<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" />
			<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'username'; $name = $field; ?>
				<label>Username</label>
				<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" />
			<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'email'; $name = $field; ?>
				<label>Email</label>
				<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" />
			<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'password'; $name = $field; ?>
				<label>Password</label>
				<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" />
			<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'group'; $alias = $field; ?>
				<label>Group</label>
					<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item): ?>
						<option value="<?php echo $item->id; ?>" <?php echo set_value($field, $data->$field == $item->id ? 'selected' : ''); ?>><?php echo $item->name; ?></option>
					<?php endforeach; ?>
					</select>
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
			<input type="submit" value="Submit" class="btn btn-primary btn-block" />
		</form>
		</div>
        </div>
      </div>
</div>