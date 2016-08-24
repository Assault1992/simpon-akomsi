<div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
		<h4 class="">Tambah Data Kedatangan</h4>
		<hr>
		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/arrival_management/add'); ?>" method="post">
			<div class="form-group">
				<?php $field = 'date'; $name = $field; ?>
					<label>Tanggal Kedatangan</label>
					<input type="text" class="form-control datefield" name="<?php echo $field; ?>" value="<?php echo set_value($field, ''); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'time'; $name = $field; ?>
					<label>Jam Kedatangan</label>
					<input type="text" class="form-control timepicker" name="<?php echo $field; ?>" value="<?php echo set_value($field, ''); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'id_contingent'; $name = $field; ?>
				<label>Kontingen</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item):?>
						<option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php $field = 'id_cabor'; $name = $field; ?>
				<label>Partisipan</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item):?>
						<option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php $field = 'id_participant'; $name = $field; ?>
				<label>Partisipan</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item):?>
						<option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php $field = 'id_ha'; $name = $field; ?>
				<label>Holding Area</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item):?>
						<option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php $field = 'id_ra'; $name = $field; ?>
				<label>Rest Area</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item):?>
						<option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<input type="submit" value="Submit" class="btn btn-primary btn-block" />
		</form>
		</div>
        </div>
      </div>
</div>  