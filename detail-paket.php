<section  class="counts section-bg">
      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
      	<div class="row">
      		<div class="col-md-6">
            <!-- Box Comment -->
            <div class="card card-widget">
              <?php 
              
          		function rupiah($angka) {
              $hasil_rupiah= "Rp " . number_format($angka,2,',','.');
              return $hasil_rupiah;
             }
            	$paket=mysqli_query($koneksi,"SELECT tb_paket.keterangan,tb_paket.id_paket,upper(tb_paket.nm_paket) as nama,tb_paket.harga_quad,tb_paket.harga_triple,tb_paket.harga_double,tb_paket.gambar,tb_paket.durasi,YEAR(tb_jadwal.tgl_berangkat) as tahun,monthname(tb_jadwal.tgl_berangkat) as bulan,day(tb_jadwal.tgl_berangkat) as hari,tb_jadwal.agenda,tb_jadwal.id FROM tb_paket JOIN tb_jadwal ON tb_paket.id_paket=tb_jadwal.id_paket where tb_paket.id_paket=$_GET[id] ORDER BY tb_paket.id_paket DESC");
            	foreach ($paket as $data_paket) {
              }
            
           		?>
              <!-- /.card-header -->
              <div class="card-body">
                <img class="img-fluid pad" src="dashboard/gambar-paket/<?= $data_paket['gambar']  ?>" alt="Photo">

                <h4><?= $data_paket['nama']  ?></h4>
                <h5 style="color: red"><?= rupiah($data_paket['harga_quad'])  ?></h5>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
          	<div class="card">
              <div style="background:lightgreen;" class="card-header d-flex p-0">
                
                <ul class="nav nav-pills ml-auto p-2">
                  
                  <li class="nav-item"><a style="color: black" class="nav-link" href="#jadwal" data-toggle="tab">Keterangan</a></li>
                  <li class="nav-item"><a style="color: black" class="nav-link" href="#keterangan" data-toggle="tab">Agenda Perjalanan</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div style="overflow-y: scroll; height: 440px;" class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="jadwal">
                    <p align="justify"><b>Tanggal Berangkat: </b><?= $data_paket['bulan'] ?> <?= $data_paket['hari'] ?>,<?= $data_paket['tahun'] ?>  </p><br>
                    <p>
                    	<b>Rincian Harga:</b><br>
                    	<?= rupiah($data_paket['harga_quad']) ?> (Harga Quad)<br>
                    	<?= rupiah($data_paket['harga_triple']) ?> (Harga Triple)<br>
                    	<?= rupiah($data_paket['harga_double']) ?> (Harga Double)<br>
                    </p><br>

                    <p><b>Lama Perjalanan:</b> <?= $data_paket['durasi']   ?> Hari</p>

                    <p><b>Keterangan Paket:</b><br>
                      <?= $data_paket['keterangan']  ?></p><br> 

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="keterangan">
                    <p align="justify"><?= $data_paket['agenda'] ?>  </p>
                  </div>
                  <!-- /.tab-pane -->
                  
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->

            </div>
            
			  </div>
			</div>
		  </div>
		</div>
	</div>
</section>
 
<?php 
if (empty($data_paket)) {
	echo '
   <script type="text/javascript">
   	location="index.php";
   </script>
	';
}
 ?>

 
