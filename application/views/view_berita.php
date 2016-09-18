<html>
	<head>
		<title></title>
	</head>

	<body>
		<?php 
			foreach ($konten as $value) {
				echo $value->isi_berita.'<br><br>';
			}
		?>
		<?php  
			// echo form_open_multipart('url/preprocessing/get_all');
			// foreach ($konten as $key) {
			// 	echo $key['isi_berita'];
			// }

		?>

	</body>
</html>