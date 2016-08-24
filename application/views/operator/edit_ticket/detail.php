<script type="text/javascript">
	$(document).ready(function() {
		$(".select2").select2({
		});
	});
</script>
		<div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Tiket Makanan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->	
            <div class="box-body">
            <div class="row">
                 <div class="col-sm-12 col-xs-12">
                  <div class="description-block centerin">	
					<div class="form-inline">
			<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/edit_ticket/edit'); ?>" method="post">
			<input type="hidden" value="<?php echo $cabor->id ?>" name='id_cabor'>
			<input type="hidden" value="<?php echo $contingent->id ?>" name='id_contingent'>		
			<?php $field = 'n_cabor'; $name = $field; ?>
			<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo $cabor->name; ?>" disabled/>
			<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			<?php $field = 'n_contingent'; $name = $field; ?>
			<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo $contingent->name; ?>" disabled/>
			<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			<div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                  <input type="text" class="form-control" placeholder="Nama PIC" disabled>
	        </div>
	        <div class="input-group">
	              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
	              <input type="text" class="form-control" placeholder="Telp PIC" disabled>
	        </div>
	        <div class="input-group">
	              <span class="input-group-addon">@</span>
	              <input type="text" class="form-control" placeholder="Email PIC" disabled>
	        </div>						
				</div>
				</div>
			</div>
			<?php $i=0;
			foreach($q_detail->result() as $item):?>
			<div class="col-sm-15 col-xs-6">
                  <div class="description-block centerin">
			<input type="hidden" value="<?php echo $item->id ?>" name='<?php echo "makan[$i][id_order]"; ?>'>
				<span><b><?php echo $item->n_type_menu ?></b></span>
	                <hr noshade>
							<select name='<?php echo "makan[$i][tempat]"; ?>' class="form-control" required>
								<?php foreach($q_hotel->result() as $item2):?>
									<option value="<?php echo $item2->id; ?>|Hotel" <?php echo set_value('<?php makan[$i][tempat]"; ?>', $item->id_ledging == $item2->id ? 'selected' : ''); ?>><?php echo $item2->name; ?> | Hotel</option>
								<?php endforeach; ?>
								<?php foreach($q_venue->result() as $item3):?>
									<option value="<?php echo $item3->id; ?>|Venue" <?php echo set_value('<?php makan[$i][tempat]"; ?>', $item->id_venue == $item3->id ? 'selected' : ''); ?>><?php echo $item3->name; ?> | Venue | <?php echo $item3->n_cabor; ?></option>
								<?php endforeach; ?>
							</select>
				</div>
			</div>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			<?php $i++;endforeach; ?>
			<div class="col-sm-12 col-xs-12">
                  <div class="description-block centerin">
					<button onclick="pdf(<?php echo $cabor->id; ?>, '<?php echo $contingent->id; ?>','<?php echo $item->date; ?>');" class="btn btn-primary btn-block">
				<i class="fa fa-save"></i>&nbsp;Simpan
			</button>
			</div>	
			</div>
		</div><!--row-->
		</div><!--box body-->