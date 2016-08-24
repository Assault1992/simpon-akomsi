<div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <!-- /.box-header -->
            <div class="box-body">
	<h4 class="">Edit Menu ID : <?php echo $data->id; ?></h4>
	<hr >

		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/menu_management/edit/' . $data->id); ?>" method="post">

			<div class="form-group">
				<?php $field = 'id_type_menu'; $name = $field; ?>
				<label>Jenis Makan</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($$field->result() as $item): ?>
						<option value="<?php echo $item->id; ?>" <?php echo set_value($field, $data->$field == $item->id ? 'selected' : ''); ?>><?php echo $item->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<?php $field = 'menu'; $name = $field; ?>
					<label>Menu</label>
					<textarea class="form-control ckeditor" class="form-control" name="<?php echo $field; ?>" rows="6"><?php echo set_value($field, $data->$field); ?></textarea>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'day'; $name = $field; ?>
				<label>Hari</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<option value="1" <?php echo set_value("1", $data->$field == 1 ? 'selected' : ''); ?>>Hari ke 1</option>
					<option value="2" <?php echo set_value("2", $data->$field == 2 ? 'selected' : ''); ?>>Hari ke 2</option>
					<option value="3" <?php echo set_value("3", $data->$field == 3 ? 'selected' : ''); ?>>Hari ke 3</option>
					<option value="4" <?php echo set_value("4", $data->$field == 4 ? 'selected' : ''); ?>>Hari ke 4</option>
					<option value="5" <?php echo set_value("5", $data->$field == 5 ? 'selected' : ''); ?>>Hari ke 5</option>
					<option value="6" <?php echo set_value("6", $data->$field == 6 ? 'selected' : ''); ?>>Hari ke 6</option>
					<option value="7" <?php echo set_value("7", $data->$field == 7 ? 'selected' : ''); ?>>Hari ke 7</option>
					<option value="8" <?php echo set_value("8", $data->$field == 8 ? 'selected' : ''); ?>>Hari ke 8</option>
					<option value="9" <?php echo set_value("9", $data->$field == 9 ? 'selected' : ''); ?>>Hari ke 9</option>
					<option value="10" <?php echo set_value("10", $data->$field == 10 ? 'selected' : ''); ?>>Hari ke 10</option>
					<option value="11" <?php echo set_value("11", $data->$field == 11 ? 'selected' : ''); ?>>Hari ke 11</option>
					<option value="12" <?php echo set_value("12", $data->$field == 12 ? 'selected' : ''); ?>>Hari ke 12</option>
					<option value="13" <?php echo set_value("13", $data->$field == 13 ? 'selected' : ''); ?>>Hari ke 13</option>
					<option value="14" <?php echo set_value("14", $data->$field == 14 ? 'selected' : ''); ?>>Hari ke 14</option>
					<option value="15" <?php echo set_value("15", $data->$field == 15 ? 'selected' : ''); ?>>Hari ke 15</option>
					<option value="16" <?php echo set_value("16", $data->$field == 16 ? 'selected' : ''); ?>>Hari ke 16</option>
					<option value="17" <?php echo set_value("17", $data->$field == 17 ? 'selected' : ''); ?>>Hari ke 17</option>
					<option value="18" <?php echo set_value("18", $data->$field == 18 ? 'selected' : ''); ?>>Hari ke 18</option>
					<option value="19" <?php echo set_value("19", $data->$field == 19 ? 'selected' : ''); ?>>Hari ke 19</option>
					<option value="20" <?php echo set_value("20", $data->$field == 20 ? 'selected' : ''); ?>>Hari ke 20</option>
					<option value="21" <?php echo set_value("21", $data->$field == 21 ? 'selected' : ''); ?>>Hari ke 21</option>
				</select>
			</div>

		<input type="submit" value="Submit" class="btn btn-primary btn-block"  />
		</form>
		</div>
        </div>
      </div>
</div>  
