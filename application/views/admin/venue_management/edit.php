	<div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <!-- /.box-header -->
            <div class="box-body">
	<h4 class="">Edit Venue : <?php echo $data->name; ?></h4>
	<hr>
		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/venue_management/edit/' . $data->id); ?>" method="post">
			<div class="form-group">
				<?php $field = 'name'; $name = $field; ?>
					<label>Nama Venue</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'address'; $name = $field; ?>
					<label>Alamat Venue</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'id_cabor'; $name = $field; ?>
				<label>Cabor</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item): ?>
						<option value="<?php echo $item->id; ?>" <?php echo set_value($field, $data->$field == $item->id ? 'selected' : ''); ?>><?php echo $item->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<?php $field = 'coordinate'; $name = $field; ?>
					<label>Koordinat Venue</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" placeholder="Cth : -6.902515, 107.618780"/>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'id_regional'; $name = $field; ?>
				<label>Wilayah</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item): ?>
						<option value="<?php echo $item->id; ?>" <?php echo set_value($field, $data->$field == $item->id ? 'selected' : ''); ?>><?php echo $item->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		<input type="submit" value="Submit" class="btn btn-primary btn-block"  />
		</form>
	</div>
        </div>
      </div>
</div>