<script type="text/javascript">
	$(document).ready(function() {
		$(".select2").select2({
		});
	});
</script>
	<h4 class="">Edit Alokasi : <?php echo $data->id; ?></h4>
	<hr>
		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/allocation_management/edit/' . $data->id); ?>" method="post">
			<div class="form-group">
				<?php $field = 'for'; $name = $field; ?>
				<label>Untuk</label>
					<div class="col-md-12">
						<div class="col-md-6">
							<div class="col-md-12">
								<input type="radio" name="<?php echo $field; ?>" class="form-control" value="ao" <?php echo $data->$field == 'ao' ? 'checked' : ''; ?> id="check_ao" />
							</div>
							<div class="col-md-12 text-center">
								<span for="check_ao">Atlet / Official</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-12">
								<input type="radio" name="<?php echo $field; ?>" class="form-control" value="tp" <?php echo $data->$field == 'tp' ? 'checked' : ''; ?> id="check_tp" />
							</div>
							<div class="col-md-12 text-center">
								<span for="check_tp">TD / Panpel</span>
							</div>
						</div>
					</div>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'id_ledging'; $alias = $field; ?>
				<label>Wilayah</label>
					<select name="<?php echo $field; ?>" class="form-control">
					<?php foreach($$field->result() as $item): ?>
						<option value="<?php echo $item->id; ?>" <?php echo set_value($field, $data->$field == $item->id ? 'selected' : ''); ?>><?php echo $item->name; ?></option>
					<?php endforeach; ?>
					</select>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'id_cabor'; $alias = $field; ?>
				<label>Wilayah</label>
					<select name="<?php echo $field; ?>" class="form-control">
					<?php foreach($$field->result() as $item): ?>
						<option value="<?php echo $item->id; ?>" <?php echo set_value($field, $data->$field == $item->id ? 'selected' : ''); ?>><?php echo $item->name; ?></option>
					<?php endforeach; ?>
					</select>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'allocation'; $name = $field; ?>
				<label>Alokasi</label>
				<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" />
			<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<input type="submit" value="Submit" class="btn btn-primary btn-block" />
		</form>