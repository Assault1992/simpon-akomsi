	<div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <!-- /.box-header -->
            <div class="box-body">
<div class="grid-form">
	<div class="grid-form1">
	<h4 id="forms-example" class="">Edit Tipe : <?php echo $data->name; ?></h4>
	<hr noshade>
		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/cabor_management/edit/' . $data->id); ?>" method="post">
			<div class="form-group">
				<?php $field = 'name'; $name = $field; ?>
				<label>Nama Cabor</label>
				<input type="text" class="form-control f_form" placeholder="&#xf044; Nama Cabor" name="<?php echo $field; ?>" class="form-control" value="<?php echo set_value($field, $data->$field); ?>" />
			<?php echo form_error($field, '<li><font style="color:red;">', '</font></li>'); ?>
			</div>
		<input type="submit" value="Submit" class="btn btn-default" style="width:100%;" />
		</form>
	</div>
</div>
</div>
        </div>
      </div>
</div>