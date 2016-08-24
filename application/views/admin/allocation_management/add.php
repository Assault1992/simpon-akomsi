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
		<h4 class="">Tambah Alokasi</h4>
		<hr>
		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/allocation_management/add'); ?>" method="post">
			<div class="form-group">
				<?php $field = 'for'; $name = $field; ?>
				<label>Untuk</label>
					<div class="col-md-12">
						<div class="col-md-6">
							<div class="col-md-12">
								<input type="radio" name="<?php echo $field; ?>" class="form-control" value="ao" id="check_ao" />
							</div>
							<div class="col-md-12 text-center">
								<span for="check_ao">Atlit / Official</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-12">
								<input type="radio" name="<?php echo $field; ?>" class="form-control" value="tp" id="check_tp" />
							</div>
							<div class="col-md-12 text-center">
								<span for="check_tp">TD / Panpel</span>
							</div>
						</div>
					</div>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<div class="form-group">
				<?php $field = 'id_ledging'; $name = $field; ?>
				<label>Penginapan</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item):?>
						<option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php $field = 'id_cabor'; $name = $field; ?>
				<label>Cabang Olahraga</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item):?>
						<option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php $field = 'allocation'; $name = $field; ?>
					<label>Alokasi</label>
					<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, ''); ?>" />
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<input type="submit" value="Submit" class="btn btn-primary btn-block" />
		</form>
		</div>
        </div>
      </div>
</div>  
