<div class="container">
	<div class="page-header">
    	<h3>Tabel TF-IDF</h3>
    </div>
    <div class="col-md-12">
    	<div class="row" style="padding: 3px; overflow: auto; width: 1000; height: 500px; border: 1px solid grey">
    		<table class="table table-bordered" font="center" align="center">
    			<tr>
    				<th colspan = 4>Data Training</th>
    				<th colspan = 4>Data Testing</th>
    			</tr>
    			<tr>
		 			<th>Term Training</th>
		 			<th>ID Document Training</th>
		 			<th>Weight</th>
		 			<th>Document Weight Training * Document Weight Training</th>
		 			<th>Term Testing</th>
		 			<th>ID Document Testing</th>
		 			<th>Weight</th>
		 			<th>Document Weight Testing * Document Weight TrainingTesting</th>
		 		</tr>
		 		<?php foreach ($daftar as $key) { ?>
		 			 	<tr>
		 			 		<td><?php echo $key['termLatih'];?></td>
		 			 		<td><?php echo $key['idLatih'];?></td>
		 			 		<td><?php echo $key['bobotLatih'];?></td>
		 			 		<td><?php echo $key['bobotVekLatih'];?></td>
		 			 		<td><?php echo $key['termUji'];?></td>
		 			 		<td><?php echo $key['idUji'];?></td>
		 			 		<td><?php echo $key['bobotUji'];?></td>
		 			 		<td><?php echo $key['bobotVekUji'];?></td>
		 			 	</tr>
		 		<?php } ?>		 		
    		</table>
    	</div>
    </div>
</div>