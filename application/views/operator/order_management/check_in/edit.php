	<h4 class="">Check In Atlit : <?php echo $data->n_partisipan; ?></h4>
	<hr>
		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/check_in/edit/' . $data->id); ?>" method="post">
			<?php $field = 'id'; $name = $field; ?>
			<input type="hidden" value="<?php echo set_value($field, $data->$field);?>" name="<?php echo $field; ?>">
			<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			<div class="form-group">
				<?php $field = 'n_partisipan'; $name = $field; ?>
				<label>Nama Peninapan</label>
				<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" disabled/>
			<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'n_cabor'; $name = $field; ?>
				<label>Cabor</label>
				<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" disabled/>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'n_contingent'; $name = $field; ?>
				<label>Kontingen</label>
				<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, $data->$field); ?>" disabled/>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'id_room'; $alias = $field; ?>
				<label>Cabor</label>
					<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($data_room->result() as $item): ?>
						<option value="<?php echo $item->id; ?>"><?php echo $item->n_room.' | '.$item->for ?></option>
					<?php endforeach; ?>
					</select>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
		<input type="submit" value="Submit" class="btn btn-default" style="width:100%;" />
		</form>