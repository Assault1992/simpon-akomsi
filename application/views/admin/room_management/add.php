<script type="text/javascript">
	$(document).ready(function() {
		$(".select2").select2({
		});
	});
</script>
<div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
		<h4 class="">Tambah Kamar</h4>
		<hr>
		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/room_management/add'); ?>" method="post">
			<div class="form-group">
				<?php $field = 'id_allocation'; $name = $field; ?>
				<label>Penginapan</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item):?>
						<option value="<?php echo $item->id; ?>"><?php echo $item->ledging; ?> | <?php echo $item->cabor; ?> | <?php echo $item->for; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php $field = 'name'; $name = $field; ?>
					<label>Kamar</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, ''); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'gender'; $name = $field; ?>
				<label>Untuk</label>
					<div class="col-md-12">
						<div class="col-md-6">
							<div class="col-md-1">
								<input type="radio" name="<?php echo $field; ?>" value="Male" id="check_m" />
							</div>
							<div class="col-md-1 text-center">
								<span for="check_m">Pria</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-1">
								<input type="radio" name="<?php echo $field; ?>" value="Female" id="check_f" />
							</div>
							<div class="col-md-1 text-center">
								<span for="check_f">Wanita</span>
							</div>
						</div>
					</div>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<br>
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
				<?php $field = 'capacity'; $name = $field; ?>
					<label>Kapasitas</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, ''); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<input type="submit" value="Submit" class="btn btn-primary btn-block" />
		</form>
		</div>
        </div>
      </div>
</div>