
	<div id="portfoliowrap">
        <div class="portfolio-centered">
            <div class="recentitems portfolio">
            <?php 
				$i = 0;
				foreach($q->result() as $item):
				$i++;
			?>
				<div class="portfolio-item web-design">
                    <div class="he-wrap tpl6 text-center">
                    <a href="<?php echo base_url('index.php/public/cabor/detail/' . $item->id); ?>">
                    	<div class="img" width="50%">
                    		<img src="<?php echo base_url('public/img/Lalalili/' . $item->image); ?>" alt="" style="width:128px;height:128px;" >
                    		<p><?php echo $item->name; ?></p>
                    	</div>
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