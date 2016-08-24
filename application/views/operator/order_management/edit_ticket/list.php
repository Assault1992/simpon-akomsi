<script type="text/javascript">
	$(document).ready(function() {
		$(".select2").select2({
		});
	});
</script>
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
		<h4 class="">Cari Ticket Makanan</h4>
		<hr>
		<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/edit_ticket/detail'); ?>" method="post">
			<div class="form-group">
				<?php $field = 'date'; $name = $field; ?>
				<label>Tanggal</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($q_tanggal->result() as $item):?>
						<option value="<?php echo $item->date; ?>"><?php echo $item->date; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php $field = 'id_cabor'; $name = $field; ?>
				<label>Cabor</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($q_cabor->result() as $item):?>
						<option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php $field = 'id_contingent'; $name = $field; ?>
				<label>Contingent</label>
				<select name="<?php echo $field; ?>" class="form-control select2">
					<?php foreach($q_contingent->result() as $item):?>
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