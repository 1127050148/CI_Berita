<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News Classification with KNN and NBC</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/carousel.css">
    <style>
    	body {
  			padding-top: 50px;
  		}
  		.starter-template {
  			padding: 40px 15px;
  			text-align: center;
		  }
    </style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Klasifikasi Berita</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url(); ?>home">Beranda</a></li>
            <li><a href="<?php echo base_url(); ?>home/classification">Klasifikasi</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Berita <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>home/politik">Politik</a></li>
                    <li><a href="<?php echo base_url(); ?>home/olahraga">Olahraga</a></li>
                    <li><a href="pendidikan">Pendidikan</a></li>
                    <li><a href="<?php echo base_url(); ?>home/otomotif">Otomotif</a></li>
                    <li><a href="<?php echo base_url(); ?>home/umum">Umum</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sumber<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>home/detik">Detik</a></li>
                    <li><a href="<?php echo base_url(); ?>home/kompas">Kompas</a></li>
                    <li><a href="<?php echo base_url(); ?>home/liputan6">Liputan 6</a></li>
                    <li><a href="<?php echo base_url(); ?>home/tribunNews">Tribun</a></li>
                    <li><a href="<?php echo base_url(); ?>home/vivaNews">Viva News</a></li>
                </ul>
            </li>
            <li><a href="<?php echo base_url(); ?>home/result">Tabel Hasil Klasifikasi</a></li>
            <li><a href="#">Grafik</a></li>
          </ul>
          <!-- <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Kata Kunci" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Cari</button>
          </form> -->
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<!-- jQuery (necessary for Bootstrap'a JavaScript plugins) -->
	<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
	<!-- include all complied plugins (below), or include individual files as needed -->
	<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
</body>
</html>