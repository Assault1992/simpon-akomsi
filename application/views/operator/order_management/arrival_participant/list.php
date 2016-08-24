<?php
date_default_timezone_set('Asia/Jakarta');
$date = getdate();
?>         
	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <h3 class="box-title">List Kedatangan</h3>			
            <hr>
			<table class="table table-hover" class="display" id="maintable">
				<thead>
					<tr style="font-size:12px;font-family:Arial;">
						<th>#</th>
						<th>Holding Area</th>
						<th>Rest Area</th>
						<th>Tanggal Kedatangan</th>
						<th>Jam Kedatangan</th>
						<th>Jumlah Kedatangan</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 0;
						foreach($q2->result() as $item): 
						$i++;
					?>
					<tr style="font-size:12px;font-family:Arial;">
						<td><?php echo $i; ?></td>
						<td><?php echo $item->ha; ?></td>
						<td><?php echo $item->ra; ?></td>
						<td><?php echo date('d-m-Y', strtotime($item->date)); ?></td>
						<td><?php echo $item->time; ?></td>
						<td><?php echo $item->total; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			</div>
        </div>
      </div>
</div>  
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tanggal : <?php echo $date["mday"]."-".$date["mon"]."-".$date["year"];?></h3>
            </div>
            <hr noshade>
            <!-- /.box-header -->
            <div class="box-body">
			<table class="table table-hover" class="display" id="maintable2">
				<thead>
					<tr style="font-size:12px;font-family:Arial;">
						<th>#</th>
						<th>Partisipan</th>
						<th>Holding</th>
						<th>Rest</th>
						<th>Tanggal, Jam</th>
						<th>Kontingen</th>
						<th>Cabor</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 0;
						foreach($q->result() as $item): 
						$i++;
					?>
					<tr style="font-size:12px;font-family:Arial;">
						<td><?php echo $i; ?></td>
						<td><?php echo $item->n_partisipan; ?></td>
						<td><?php echo $item->n_ha; ?></td>
						<td><?php echo $item->n_ra; ?></td>
						<td><?php echo date("d-m-Y", strtotime($item->tanggal)); ?>, <?php echo $item->waktu; ?></td>
						<td><?php echo $item->n_kontingen; ?></td>
						<td><?php echo $item->n_cabor; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
        </div>
      </div>
</div>         
<?php /*
<script type="text/javascript">
	var t_init = 0;
	var t_init2 = 0;
	$(function(){
		if(t_init == 0){
			$('#maintable').dataTable(<?php echo $q->num_rows() > 10 ? '{"sPaginationType": "full_numbers"}' : ''; ?>);
			t_init++;
		}
	});
	$(function(){
		if(t_init2 == 0){
			$('#maintable2').dataTable(<?php echo $q->num_rows() > 10 ? '{"sPaginationType": "full_numbers"}' : ''; ?>);
			t_init2++;
		}
	});
</script>*/
?>