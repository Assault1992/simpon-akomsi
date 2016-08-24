
	<div id="portfoliowrap">
        <div class="portfolio-centered">
        	<h3>KONTINGEN PESERTA</h3>
            <div class="recentitems portfolio">
            <?php 
				$i = 0;
				foreach($q->result() as $item):
				$i++;
			?>
				<div class="portfolio-item web-design">
                    <div class="he-wrap tpl6 text-center">
                    <a href="<?php echo base_url('index.php/public/contingent/detail/' . $item->id); ?>">
                    	<div class="img" width="50%">
                    		<img src="<?php echo base_url('public/img/contingent/' . $item->image); ?>" alt="" style="width:128px;height:128px;">
                    	</div>
                    	<p><?php echo $item->name; ?></p>
                    </a>
					</div><!-- he wrap -->
				</div><!-- end col-12 -->
			<?php endforeach; ?>
			</div>
		</div>
	</div>			

<br/>
<br/>

<!-- <script type="text/javascript">
	var t_init = 0;
	$(function(){
		if(t_init == 0){
			$('#maintable').dataTable(<?php //echo $q->num_rows() > 10 ? '{"sPaginationType": "full_numbers"}' : ''; ?>);
			t_init++;
		}
	});
	
</script> -->