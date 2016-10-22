<div class="container">
	<?php 
		foreach($daftar as $key) {	
	?>
			<div class="page-header">
		    	<h2><?php echo $key->judul_berita;?></h2>
		    </div>
		    <div class="col-md-12">
		    	<div class="row">
		    		<p><?php echo $key->isi_berita;?></p>
		    	</div>
		    </div>
	<?php
		}
	?>
</div>