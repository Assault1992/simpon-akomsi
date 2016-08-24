<div id="portfoliowrap">
        <div class="portfolio-centered">
        	<h3>
        		<?php $field = 'name'; $alias = $field; ?>
				<?php echo set_value($field, $data->$field); ?>
        	</h3>
        	<div class="row">
        		<div class="col-md-8 col-md-offset-2">
        			<table class="table">
	            		<tr>
	            			<tr>
	            				<th class="text-center">Cabang Olahraga</th>
	            				<th class="text-center">Penginapan</th>
	            			</tr>
	            			<?php foreach($q->result() as $item): ?>
	            			<tr>
	            				<td class="text-left"><?php echo $item->cabor; ?></td>
	            				<td class="text-left"><?php echo $item->ledging; ?> | <?php echo $item->address; ?></td>
	            			</tr>
	            			<?php endforeach; ?>
	            		</tr>
	            	</table>
        		</div>
        	</div>
		</div>
	</div>
<br/>
<br/>