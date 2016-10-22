<div class="container">
	<div class="page-header">
    	<h3>Otomotif</h3>
    </div>
    <div class="col-md-12">
    	<div class="row">
    		<div class="col-md-8">
    		<?php foreach ($daftar as $key) {?>	
    			<h2><?php echo $key['judul_berita'];?></h2>
		        <p><?php echo substr($key['isi_berita'], 0, 200);?></p>
		        <p><a class="btn btn-default" href="<?php echo base_url(); ?>home/readmore/<?php echo $key['id_berita_baru'] ?>" role="button">View details &raquo;</a></p>
    		<?php } ?>
    		</div>
    	</div>
    </div>
</div>