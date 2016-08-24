<div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
		<h4 class="">Tambah Data Catering</h4>
		<hr>
		
		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/catering_management/add'); ?>" method="post">
			<div class="form-group">
				<?php $field = 'name'; $name = $field; ?>
					<label>Nama Katering</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, ''); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'id_kitchen'; $name = $field; ?>
				<label>Nama Dapur</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item):?>
						<option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<?php $field = 'address'; $name = $field; ?>
					<label>Alamat Katering</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, ''); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'id_regional'; $name = $field; ?>
				<label>Wilayah</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item):?>
						<option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<hr/>
			<div class="form-group">
				<?php $field = 'cp_name'; $name = $field; ?>
					<label>Contact Person</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, ''); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'cp_telp'; $name = $field; ?>
					<label>Telp</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, ''); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'cp_email'; $name = $field; ?>
					<label>Email</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, ''); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

		<input type="submit" value="submit" class="btn btn-primary btn-block" />
		</form>
		
		</div>
        </div>
      </div>
</div>  