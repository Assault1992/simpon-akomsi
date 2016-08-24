<div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
		<h4 class="">Tambah Cabang Olahraga</h4>
		<hr>
		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/cabor_management/add'); ?>" method="post">
			<div class="form-group">
			<?php $field = 'name'; $name = $field; ?>
				<label>Nama Cabang Olahraga</label>
				<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo set_value($field, ''); ?>" />
			<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
		<input type="submit" value="Submit" class="btn btn-primary btn-block" />
		</form>
		</div>
        </div>
      </div>
</div>  