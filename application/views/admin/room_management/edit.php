	<div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <!-- /.box-header -->
            <div class="box-body">
	<h4 class="">Edit Kamar : <?php echo $data->name; ?></h4>
	<hr>
		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/room_management/edit/' . $data->id); ?>" method="post">
			<div class="form-group">
				<?php $field = 'id_allocation'; $alias = $field; ?>
				<label>Penginapan</label>
					<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item): ?>
						<option value="<?php echo $item->id; ?>" <?php echo set_value($field, $data->$field == $item->id ? 'selected' : ''); ?>><?php echo $item->ledging; ?> | <?php echo $item->cabor; ?> | <?php echo $item->for; ?></option>
					<?php endforeach; ?>
					</select>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'name'; $name = $field; ?>
				<label>Kamar</label>
				<input type="text" class="form-control f_form" placeholder="&#xf044; Nama Cabor" name="<?php echo $field; ?>" class="form-control" value="<?php echo set_value($field, $data->$field); ?>" />
			<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'gender'; $name = $field; ?>
				<label>Untuk</label>
					<div class="col-md-12">
						<div class="col-md-6">
							<div class="col-md-12">
								<input type="radio" name="<?php echo $field; ?>" class="form-control" value="Male" <?php echo $data->$field == 'Male' ? 'checked' : ''; ?> id="check_m" />
							</div>
							<div class="col-md-12 text-center">
								<span for="check_m">Pria</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-12">
								<input type="radio" name="<?php echo $field; ?>" class="form-control" value="Female" <?php echo $data->$field == 'Female' ? 'checked' : ''; ?> id="check_f" />
							</div>
							<div class="col-md-12 text-center">
								<span for="check_f">Wanita</span>
							</div>
						</div>
					</div>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'id_contingent'; $alias = $field; ?>
				<label>Wilayah</label>
					<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item): ?>
						<option value="<?php echo $item->id; ?>" <?php echo set_value($field, $data->$field == $item->id ? 'selected' : ''); ?>><?php echo $item->name; ?></option>
					<?php endforeach; ?>
					</select>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'capacity'; $name = $field; ?>
				<label>Kapasitas</label>
				<input type="text" class="form-control f_form" placeholder="&#xf044; Nama Cabor" name="<?php echo $field; ?>" class="form-control" value="<?php echo set_value($field, $data->$field); ?>" />
			<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
		<input type="submit" value="Submit" class="btn btn-default" style="width:100%;" />
		</form>
		</div>
        </div>
      </div>
</div>