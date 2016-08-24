<?php
	date_default_timezone_set('Asia/Jakarta');
	$date = getdate();
?>         
<div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="pull-right">
            	<h3>Tanggal : <?php echo $date["mday"]." ".$date["month"]." ".$date["year"]?></h3>
            </div>
            <h3 class="box-title">List Peserta</h3>			
            <hr>
<table class="table table-hover" id="maintable">
	<thead>
		<tr style="font-size:12px;font-family:Arial;">
			<th>#</th>
			<th>Partisipan</th>
			<th>Cabor</th>
			<th>Kontingen</th>
			<th>Tanggal, Jam</th>	
			<th>Operasi</th>
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
			<td><?php echo $item->n_cabor; ?></td>
			<td><?php echo $item->n_kontingen; ?></td>
			<td><?php echo date("d-m-Y", strtotime($item->tanggal)); ?>, <?php echo $item->waktu; ?></td>
			<td>
				<?php /*
				<div class="btn-group">
					<a href="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/check_in/edit/' . $item->id); ?>" class="btn btn-warning" ><i class=""></i>Check In</a>
				</div>*/
				?>
				<div class="btn-group">
					<a class="fadeandscale_open btn btn-warning" data-target="#fadeandscale" data-toggle="modal" data-id="<?php echo $item->id?>" data-ledging="<?php echo $item->id_ledging?>" data-gender="<?php echo $item->gender?>" data-table="t_touchdown"><i class=""></i>Check In</a>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>
</div>
</div>
</div>   
<br/>
<br/>
<div id="fadeandscale" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Check In Peserta</h4>
</div>
<div class="modal-body">
			<form action="<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/check_in/edit2'); ?>" method="post">
			<?php $field = 'id'; $name = $field; ?>
			<input type="hidden" name="<?php echo $field; ?>" id="id">
			<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>

			<div class="form-group">
				<?php $field = 'n_partisipan'; $name = $field; ?>
				<label>Nama Partisipan</label>
				<input type="text" class="form-control" name="<?php echo $field; ?>"  id="<?php echo $field; ?>" disabled/>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'n_cabor'; $name = $field; ?>
				<label>Nama Cabor</label>
				<input type="text" class="form-control" name="<?php echo $field; ?>"  id="<?php echo $field; ?>" disabled/>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'n_contingent'; $name = $field; ?>
				<label>Nama Contingent</label>
				<input type="text" class="form-control" name="<?php echo $field; ?>"  id="<?php echo $field; ?>" disabled/>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>

			<div class="form-group">
				<?php $field = 'id_room'; $alias = $field; ?>
				<label>Ruangan</label>
					<select name="<?php echo $field; ?>" class="form-control select2" style="width:100%;" id="room">
					</select>
				<?php echo form_error($field, '<font style="color:red;">', '</font>'); ?>
			</div>
			<input type="submit" value="Submit" class="btn btn-default" style="width:100%;" />
			</form>
			<div style="clear:both;">
	</div>
	</div>
	</div>
</div>
<?php /*
<script type="text/javascript">
	var t_init = 0;
	$(function(){
		if(t_init == 0){
			$('#maintable').dataTable(<?php echo $q->num_rows() > 10 ? '{"sPaginationType": "full_numbers"}' : ''; ?>);
			t_init++;
		}
	});
</script>
*/
?>
<script>
function _edit(id, title){
		var url = '<?php echo base_url('index.php/' . $this->sys_user->user_data()->group_name . '/check_in/edit'); ?>/' + id;
		popup(url, 'edit: ' + title, 300, 400);
		
		return false;
	}
</script>
<script>
$('#fadeandscale').on('show.bs.modal',function(event){
	var button = $(event.relatedTarget);
	var id_ = button.data('id');
	var table = button.data('table');
	var ledging = button.data('ledging');
	var gender = button.data('gender');
	var modal=$(this);	
	$.ajax({
		type:'GET',
		url:"<?php echo base_url('admin/datajson/data.php'); ?>",
		data:'id='+id_+'&table='+table+'&ledging='+ledging+'&gender='+gender,
		dataType:'json',
		success:function(result){
			modal.find("#id").val(result["detail"]["id"]);
			modal.find("#n_partisipan").val(result["detail"]["n_partisipan"]);
			modal.find("#n_cabor").val(result["detail"]["n_cabor"]);
			modal.find("#n_contingent").val(result["detail"]["n_contingent"]);
			modal.find("#n_partisipan").val(result["detail"]["n_partisipan"]);
			modal.find("#room").empty();
			$.each(result["room"][0], function(k, v) {   
				if(v.total < v.capacity){
			     modal.find('#room')
			          .append($("<option>", { value : v.id })
			          .text(v.name).append(" | " + v.for + " | " + v.capacity)); 
				}else{

				}
			});
		}
	});
});

</script>