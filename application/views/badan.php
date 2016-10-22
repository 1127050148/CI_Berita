<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <?php 
            foreach ($daftar as $key) {
        ?>
        <div class="col-md-4">
          
          <h2><?php echo $key['judul']; ?></h2>
          <h5>Sumber: <b> <?php echo $key['sumber']; ?></b></h5>
          <hr>
          <p><?php echo substr($key['isi'], 0, 200); ?></p>
          <p><a class="btn btn-default" href="<?php echo base_url(); ?>home/readmore/<?php echo $key['id_berita_baru'] ?>" role="button">View details &raquo;</a></p>
        </div>
        <?php 
            }
        ?>
      </div>

      <hr>
      <center>
        <footer>
          <p>&copy; Siti Nurpadilah (1127050148).</p>
        </footer>
      </center>
</div> <!-- /container -->

<?php 
    // echo $isi= substr($s['isi_ber'],0,300);
    // $isi = substr($s['isi_ber'],0,strrpos($isi,"")); 
?>