<script type="text/javascript">
	$(document).ready(function() {
		$(".select2").select2({
		});
	});
</script>
	<div class="row">
		        <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Menu Esok Hari</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
              <?php foreach($q_menu->result() as $item): ?>
                <div class="col-sm-15 col-xs-6">
                  <div class="description-block">
                    <span><b><?php echo $item->name ?></b></span>
                    <hr noshade>
                    <p>Maaf tapi menu tidak bisa ditampilkan :(</p>
                  </div>
                </div>
                <!-- /.col -->
            <?php endforeach; ?>
              </div><!-- /.row -->              
            </div><!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
              <?php foreach($q_kitchen->result() as $item): ?>
                  <div class="description-block">
                    <span><b>Kitchen :</b><?php echo $item->name ?></span>
                  </div>
                <!-- /.col -->
            <?php endforeach; ?>
              </div><!-- /.row -->              
            </div><!-- ./box-footer -->
        </div><!-- /.box -->
      </div><!-- /.col -->

      <div class="col-md-3">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Jadwal</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-sm-12 col-xs-12">
                  <div class="description-block">
                    <table>
                    <?php foreach($q_menu->result() as $item): ?>
                      <tr><td><span><b><?php echo $item->name; ?></b></span></td><td>&nbsp;:&nbsp;</td><td><?php echo $item->time; ?></td></tr>
                    <?php endforeach; ?>
                    </table>
                  </div>
                </div><!-- /.col -->
              </div><!-- /.row -->              
            </div><!-- ./box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->

        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Pesan Tempat</h3>

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
              <?php 
              if((empty($q_cabor->result())) && (empty($q_contingent->result())) ){
                echo"<i>Belum Terdapat Partisipan Yg Checkin</i>";
              } else{
              ?>
                  <form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/order_management/add'); ?>" method="post">
                        <div class="form-inline">		

              <?php
              $field = 'id_cabor'; $name = $field; 
              ?>
							<select name="<?php echo $field; ?>" class="select2_cabor form-control" style="width:200px;" required>
								<option></option>
								<?php foreach($q_cabor->result() as $item):?>
									<option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
								<?php endforeach; ?>
							</select>
							<?php $field = 'id_contingent'; $name = $field; ?>
							<select name="<?php echo $field; ?>" class="form-control select2_kontingen" style="width:200px;" required>
								<option></option>
								<?php 
                foreach($q_contingent->result() as $item):?>
									<option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
								<?php endforeach; ?>
							</select>
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
      foreach($q_menu->result() as $item):?>
      
      <div class="col-sm-15 col-xs-6">
                  <div class="description-block centerin">
                  <input type="hidden" value="<?php echo $item->id ?>" name='<?php echo "makan[$i][id_type_menu]"; ?>'>
          <span><b><?php echo $item->name ?></b></span>
                    <hr noshade>
              <select name='<?php echo "makan[$i][tempat]"; ?>' class="form-control select2" required>
                <?php foreach($q_hotel->result() as $item):?>
                  <option value="<?php echo $item->id; ?>|Hotel"><?php echo $item->name; ?> | Hotel</option>
                <?php endforeach; ?>
                <?php foreach($q_venue->result() as $item):?>
                  <option value="<?php echo $item->id; ?>|Venue"><?php echo $item->name; ?> | Venue | <?php echo $item->n_cabor; ?></option>
                <?php endforeach; ?>
              </select>
        <?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
        </div>
            </div>
      <?php 
      $i++;endforeach;
      ?>
			<?php /*$i=0;
			foreach($q_menu->result() as $item):?>
			
			<div class="col-sm-15 col-xs-6">
                  <div class="description-block centerin">
                  <input type="hidden" value="<?php echo $item->id_menu ?>" name='<?php echo "makan[$i][id_menu]"; ?>'>
					<span><b><?php echo $item->name_type ?></b></span>
                    <hr noshade>
							<select name='<?php echo "makan[$i][tempat]"; ?>' class="form-control select2" required>
								<?php foreach($q_hotel->result() as $item):?>
									<option value="<?php echo $item->id; ?>|Hotel"><?php echo $item->name; ?> | Hotel</option>
								<?php endforeach; ?>
								<?php foreach($q_venue->result() as $item):?>
									<option value="<?php echo $item->id; ?>|Venue"><?php echo $item->name; ?> | Venue | <?php echo $item->n_cabor; ?></option>
								<?php endforeach; ?>
							</select>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
				</div>
            </div>
			<?php $i++;endforeach; ?>
      */?>
					<div class="col-sm-12 col-xs-12">
                  <div class="description-block centerin">
          <input type="submit" value="Submit" class="btn btn-default btn-block" />
          </button>
				</form>
        <?php } ?>
			</div>
        </div>
      </div>
</div>  