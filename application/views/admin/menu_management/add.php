<div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
		<h4 class="">Tambah Data Menu</h4>
		<hr>
		
		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/menu_management/add'); ?>" method="post">
			<div class="form-group">
				<?php $field = 'id_type_menu'; $name = $field; ?>
				<label>Jenis Makan</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item):?>
						<option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<?php $field = 'menu'; $name = $field; ?>
					<label>Menu</label>
					<textarea class="form-control ckeditor" class="form-control" name="<?php echo $field; ?>" rows="6"><?php echo set_value($field, ''); ?></textarea>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'day'; $name = $field; ?>
				<label>Hari</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
						<option value="1">Hari ke 1</option>
						<option value="2">Hari ke 2</option>
						<option value="3">Hari ke 3</option>
						<option value="4">Hari ke 4</option>
						<option value="5">Hari ke 5</option>
						<option value="6">Hari ke 6</option>
						<option value="7">Hari ke 7</option>
						<option value="8">Hari ke 8</option>
						<option value="9">Hari ke 9</option>
						<option value="10">Hari ke 10</option>
						<option value="11">Hari ke 11</option>
						<option value="12">Hari ke 12</option>
						<option value="13">Hari ke 13</option>
						<option value="14">Hari ke 14</option>
						<option value="15">Hari ke 15</option>
						<option value="16">Hari ke 16</option>
						<option value="17">Hari ke 17</option>
						<option value="18">Hari ke 18</option>
						<option value="19">Hari ke 19</option>
						<option value="20">Hari ke 20</option>
						<option value="21">Hari ke 21</option>
				</select>
			</div>
		<input type="submit" value="submit" class="btn btn-primary btn-block"  />
		</form>
		</div>
        </div>
      </div>
</div>  
