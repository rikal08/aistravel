 <?php 
if ($_SESSION['level']== 'admin') {
 


  ?>
          <?php
            $notif=mysqli_query($koneksi,"SELECT count(id_pemesanan) as notif from tb_pemesanan where status=1");
            foreach ($notif as $dt_notif) {
               
             } 
             
           ?>
           <?php if ($dt_notif['notif'] > 0): ?>
             
  <section class="py-5">
    <div class="row">
           <div class="col-md-12">
             <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i> Pendaftaran baru</h5>
                  Terdapat <?= $dt_notif['notif']   ?> pendaftaran baru <a href="pemesanan">lihat</a>
                </div>
           </div>
         </div>
    </section>
           <?php endif ?>
 <section class="py-5">
            <div class="row">
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-violet"></div>
                    <div class="text">
                      <?php 
                        $paket=mysqli_query($koneksi,"SELECT count(id_paket) id FROM tb_paket");
                        $cek=mysqli_fetch_array($paket);
                       ?>
                      <h6 class="mb-0">Data paket</h6><span class="text-gray"><?= $cek['id']  ?></span>
                    </div>
                  </div>
                  <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-green"></div>
                    <div class="text">
                      <?php 
                        $user=mysqli_query($koneksi,"SELECT count(id) id_user FROM tb_user where level='jamaah'");
                        $cek_user=mysqli_fetch_array($user);
                       ?>
                      <h6 class="mb-0">Data User</h6><span class="text-gray"><?= $cek_user['id_user']  ?></span>
                    </div>
                  </div>
                  <div class="icon text-white bg-green"><i class="far fa-user"></i></div>
                </div>
              </div>
              <?php 
                $jenis=mysqli_query($koneksi,"SELECT * FROM tb_jenis_paket");
                foreach ($jenis as $dt_jenis) {

                $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket where id_jenis=$dt_jenis[id]");
                foreach ($paket as $dt_paket) {
                  
                }
                $pemesanan=mysqli_query($koneksi,"SELECT sum(tb_pemesanan.jmlh_jamaah) as jumlah FROM tb_pemesanan JOIN tb_paket ON tb_pemesanan.id_paket=tb_paket.id_paket WHERE tb_paket.id_jenis=$dt_jenis[id]");
                foreach ($pemesanan as $dt_pemesanan) {
                  
                }
                  
               ?>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-red"></div>
                    <div class="text">

                      <h6 class="mb-0">Pendaftaran <?= $dt_jenis['nama']  ?></h6><span class="text-gray"><?= $dt_pemesanan['jumlah']  ?></span>
                    </div>
                  </div>
                  <div class="icon text-white bg-blue"><i class="fa fa-table"></i></div>
                </div>
              </div>
            <?php } ?>
            </div>
          </section>

      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <div class="col-lg-8 mb-8">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Jadwal Keberangkatan</h6><br>
                  </div>
                  <div class="card-body">                           
                    <table id="exampl" class="table table-striped table-hover card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Paket</th>
                          <th>Tanggal Berangkat</th>
                          <th>Durasi</th>
                          <th>Jumlah Seat</th>
                          <th>Jumlah Jamaah</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        include"koneksi.php";
                        $no=1;
                        $jadwal=mysqli_query($koneksi,"SELECT * FROM tb_jadwal ORDER BY tgl_berangkat ASC");
                        foreach ($jadwal as $dt_jadwal) {
                         
                        
                       ?>
                        <tr>
                         <td><?= $no;  ?></td>
                         <?php 
                          $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket where id_paket=$dt_jadwal[id_paket]");
                          foreach ($paket as $dt_paket) {
                            # code...
                          }
                         ?>
                         <td><?= $dt_paket['nm_paket']  ?></td>
                         <td><?= $dt_jadwal['tgl_berangkat']  ?></td>
                         <td><?= $dt_paket['durasi']  ?> Hari</td>
                         <td><button class="btn btn-info"><?= $dt_jadwal['max_seat']  ?></button></td>
                         <td><button class="btn btn-warning"><?= $dt_jadwal['jumlah_seat']  ?></button></td>
                         
                          
                        </tr>
                        <div id="detail<?= $dt_jadwal['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Agenda Perjalanan</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                             
                              <form action="" method="post" enctype="multipart/form-data">
                               
                                <div class="form-group">
                                 
                                  <h5 align="justify"><?= $dt_jadwal['agenda']  ?></h5>
                                </div> 
                            </div>
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                              
                            </div>
                            </form>
                        </div>
                      </div>
                    </div>
                    <?php $no++; } ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
            </div>
          </section>
        </div>
      </div>

          <?php } ?>