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
			foreach($q_detail->result() as $item):
				if($item->id_ledging == 0 ){
					$tempat = $item->n_venue;
					}elseif ($item->id_venue == 0) {
						$tempat = $item->n_ledging;
					}?>
			<div class="col-sm-15 col-xs-6">
                  <div class="description-block centerin">					
				<?php $field = 'tempat'; $name = $field; ?>
					<span><b><?php echo $item->n_type_menu ?></b></span>
	                <hr noshade>
				<input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo $tempat;  ?>" disabled/>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
				<?php if($item->status == "false"){ ?>
				<input type="submit" value="Konfirmasi Distribusi" onclick="ganti(<?php echo $item->id; ?>, '<?php echo $item->id; ?>')" value="Submit" class="btn btn-primary btn-block" />
				<?php }else{?>
				<input type="submit" value="Sudah Didistribusikan" class="btn btn-default btn-block" disabled="" />
				<?php
					}
					?>
				</div>
            </div>
				<?php
				$i++;
				endforeach; ?>
			<div class="col-sm-12 col-xs-12">
                  <div class="description-block centerin">
					<button onclick="pdf(<?php echo $cabor->id; ?>, '<?php echo $contingent->id; ?>','<?php echo $item->date; ?>');" class="btn btn-primary btn-block">
				<i class="fa fa-print"></i>&nbsp;Cetak
			</button>
			</div>
			</div>
		</div><!--row-->
		</div><!--box body-->
<script>
function ganti(id, title){
		var url = "<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/ticket_management/ganti'); ?>/" + id;
		if(confirm('Anda yakin sudah didistribusi?')){
			window.location = url;
		}
		return false;
	}
function pdf(id_cabor, id_contingent, tanggal){
		var url = "<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/ticket_management/pdf'); ?>/" + id_cabor + "/"+id_contingent+"/"+tanggal;
		window.open(url,'_blank');
		return false;
	}
</script>