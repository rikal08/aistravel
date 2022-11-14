 <?php 
if ($_SESSION['level'] == 'jamaah') {
  ?>

  	<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          	<div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Pemesanan Saya</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link" href="#tab_1" data-toggle="tab">Pemesanan</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                <div class="tab-pane" id="tab_2">

                
                   
                  </div>
                  <div class="tab-pane active" id="tab_1">

                  	<div class="col-md-12">
                  	<?php 
                  	function rupiah($angka)
                            {
                             $hasil_rupiah= "Rp " . number_format($angka,2,',','.');
                            return $hasil_rupiah;
                                }
                  		$pemesanan=mysqli_query($koneksi,"SELECT tb_user.nama,tb_pemesanan.jmlh_jamaah,tb_pemesanan.total_harga,tb_pemesanan.id_pemesanan,tb_pemesanan.status,tb_pemesanan.id_paket FROM tb_pemesanan  JOIN tb_user ON tb_user.id=tb_pemesanan.id_user where tb_pemesanan.id_user=$_SESSION[id] ORDER BY tb_pemesanan.id_pemesanan DESC");
                  		foreach ($pemesanan as $dt_pemesanan) {
                  			
                  			
                  		
                  	 ?>
		       	 	
		       	 	<?php if ($dt_pemesanan['status']==1): ?>
		       	 			
		       	 	<div class="alert alert-info alert-dismissible">
                  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  		<h5><i class="icon fas fa-info"></i>Terimakasih pemesanan telah diterima!</h5>
		                  pemesanan anda telah kami terima, staf AIS TRAVEL akan segera memproses pemesanan anda, Pastikan kontak anda selalu aktif agar kami bisa menghubungi anda. <br><br>
		                  Hubungi kontak dibawah ini jika ada pertanyaan. <br><br>
		                  Whatsapp: <a href="">+6285219443129</a><br>
                  		  Telepon: <a href="">+6285219443129</a><br>
                  		  Email: <a href="">aistravel0909@gmail.com</a>
                	</div>
                	
		       	 	<?php endif ?>
		       	 	<?php if ($dt_pemesanan['status']==2): ?>
		       	 		<div class="alert alert-success alert-dismissible">
                  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  		<h5><i class="icon fas fa-check"></i>Terimakasih pemesanan telah Berhasil!</h5>
		                  pemesanan anda telah berhasil, segera melakukan pembayaran/DP. <br><br>
		                  Hubungi kontak dibawah ini jika ada pertanyaan. <br>
		                  Whatsapp: <a href="">+6285219443129</a><br>
                  		  Telepon: <a href="">+6285219443129</a><br>
                  		  Email: <a href="">aistravel0909@gmail.com</a>
                	</div>	
		       	 	<?php endif ?>	
			             <div class="card-body">                           
                    <table class="table table-striped table-hover card-text">
                      <thead>
                        <tr>
                          <th>No pemesanan</th>
                          <th>Nama Pendftar</th>
                          <th>Nama paket</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                         <td><?= $dt_pemesanan['id_pemesanan']  ?></td>
                         <td><?= $dt_pemesanan['nama']  ?></td>
                         <?php 
                            $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket where id_paket=$dt_pemesanan[id_paket]");
                            foreach ($paket as $dt_paket) {
                              
                            }
                          ?>
                         <td><?= $dt_paket['nm_paket']  ?></td>
                         <td>
                         	<?php if ($dt_pemesanan['status']==1): ?>
                         		<button class="btn btn-danger">Ditunda</button>
                         	<?php endif ?>
                         	<?php if ($dt_pemesanan['status']==2): ?>
                         		<button class="btn btn-success">Berhasil</button>
                         	<?php endif ?>  
                          <?php if ($dt_pemesanan['status']==3): ?>
                            <button class="btn btn-danger">Dibatalkan</button>
                          <?php endif ?>
                         </td>
                         <td>
                         <?php if ($dt_pemesanan['status']==2): ?>   
                          <a data-toggle="modal" data-target="#batal<?= $dt_pemesanan['id_pemesanan']  ?>" class="btn btn-danger" href="">Batalkan Pemesanan</a>
                         <?php endif ?>
                        </td>
                        </tr>
                    	</tbody>
		                </table>
		            </div>

                 <!-- batal pemesanan -->
                      <div class="modal fade" id="batal<?= $dt_pemesanan['id_pemesanan']  ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Batalkan Pemesanan</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Anda yakin untuk membatalkan pemesanan ini?</p>
                            </div>
                            <form action="aksi/batal_pemesanan_saya.php" method="POST">
                              <input type="" hidden="" name="id_jadwal" value="<?= $dt_jadwal['id']; ?>">
                              <input type="" name="jumlah" hidden="" value="<?= $dt_pemesanan['jmlh_jamaah']  ?>">
                              <input type="text" hidden="" name="id_pemesanan" value="<?= $dt_pemesanan['id_pemesanan']  ?>">
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary">Setuju</button>
                            </div>
                          </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                      <!-- batal pemesanan -->
		       	 	<?php } ?>
		       	 	<?php if (empty($dt_pemesanan)): ?>
		       	 		<div class="alert alert-danger alert-dismissible">
		                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                  <h5><i class="icon fas fa-ban"></i> Kosong</h5>
		                	<p>Tidak ada pemesanan</p>
		                </div>
		       	 	<?php endif ?>

		            <!-- /.card -->
		          </div>
                 
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
    </section>
</div>
</div>

<?php } ?>