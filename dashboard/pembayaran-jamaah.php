<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Pembayaran</h6><br>
                  </div>
                  <div class="card-body"> 
                                <table id="exampl" class="table table-striped card-text">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>No Pemesanan</th>
                                            <th>Nama paket</th>
                                            <th>Jumlah Jamaah</th>
                                            <th>Harga</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
                                            <th>Rincian Pembayaran</th>
                                            <th>Tambah Pembayaran</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                           function rupiah($angka)
                                            {
                                             $hasil_rupiah= "Rp " . number_format($angka,2,',','.');
                                            return $hasil_rupiah;
                                                }

                                            $no=1;
                                            $pemesanan=mysqli_query($koneksi,"SELECT * FROM tb_pemesanan where id_user=$_SESSION[id] AND status=2");
                                            foreach ($pemesanan as $dt_pemesanan) {
                                           
                                           ?>
                                          <tr>
                                            <td><?= $no;  ?></td>
                                            <td><?= $dt_pemesanan['id_pemesanan']  ?></td>
                                            <?php 
                                              $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket where id_paket=$dt_pemesanan[id_paket]");
                                              foreach ($paket as $dt_paket) {
                                                
                                              }
                                             ?>
                                            <td><?= $dt_paket['nm_paket']  ?></td>
                                            <td><?= $dt_pemesanan['jmlh_jamaah']  ?> Orang</td>
                                            <td><?= rupiah($dt_pemesanan['total_harga'])  ?></td>
                                            <?php 
                                              $pembayaran=mysqli_query($koneksi,"SELECT sum(jumlah_bayar) as jumlah_bayar,file FROM tb_pembayaran where id_pemesanan=$dt_pemesanan[id_pemesanan]");
                                              
                                              foreach ($pembayaran as $dt_pembayaran) {
                                                
                                              }
                                              if (empty($dt_pembayaran)) {
                                                $bayar=0;
                                              }else{
                                                $bayar=$dt_pembayaran['jumlah_bayar'];
                                              }
                                              $sisa=$dt_pemesanan['total_harga']-$bayar;

                                             ?>
                                            <td><?= rupiah($bayar);  ?></td>
                                            <td>
                                              <?php if ($sisa==0): ?>
                                                <button class="btn btn-success">Lunas</button>
                                              <?php endif ?>
                                              <?php if ($sisa > 0): ?>
                                                
                                              <button class="btn btn-danger">Belum Lunas</button>
                                              <?php endif ?>
                                            </td>
                                            <td>
                                              <a data-toggle="modal" data-target="#rincian<?= $dt_pemesanan['id_pemesanan']  ?>" href="" class="btn btn-warning"><i class="fa fa-eye"></i> Lihat</a>
                                            </td>
                                            <td>
                                              <?php if ($dt_pembayaran['jumlah_bayar'] >= $dt_pemesanan['total_harga']): ?>
                                                
                                              <?php endif ?>
                                              <?php if ($dt_pemesanan['total_harga'] > $dt_pembayaran['jumlah_bayar'] ): ?>
                                                
                                              <a href="" data-toggle="modal" data-target="#upload<?= $dt_pemesanan['id_pemesanan']  ?>" class="btn btn-primary">Tambah Pembayaran</a>
                                              <?php endif ?>
                                            </td>
                                            
                                          </tr>
                                    <!-- rincian bayar -->
                                          <div id="rincian<?= $dt_pemesanan['id_pemesanan']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                            <div role="document" class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 id="exampleModalLabel" class="modal-title">Rincian Bayar</h4>
                                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                  <form action="aksi/cetak-struk-pembayaran.php" method="POST">
                                                    <div class="form-group">
                                                      <label>ID Pemesanan</label>
                                                      <input readonly="" type="" class="form-control" value="<?= $dt_pemesanan['id_pemesanan']  ?>" name="id">
                                                    </div>
                                                    <?php 
                                                    $no=1;
                                                      $rincian=mysqli_query($koneksi,"SELECT * FROM tb_pembayaran WHERE id_pemesanan='$dt_pemesanan[id_pemesanan]'");
                                                      foreach ($rincian as $dt_rincian) {
                                                        # code...
                                                      
                                                     ?>
                                                    <p>#<?= $no  ?></p>
                                                    <p><b>Tanggal</b>: <?= $dt_rincian['tgl']  ?></p>
                                                    <p><b>Jumlah Bayar</b>: <?= rupiah($dt_rincian['jumlah_bayar'])  ?></p>
                                                    <p><b>Bukti</b>: <?= $dt_rincian['file']  ?><a href="bukti-pembayaran/<?= $dt_pembayaran['file']  ?>"> Lihat</a></p>
                                                  <?php $no++; } ?>    
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="submit" class="btn btn-danger">Cetak</button>
                                                 
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                    <!-- rincian bayar -->


                                                               
                                     <!-- input pembayaran -->
                                          <div id="upload<?= $dt_pemesanan['id_pemesanan']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                            <div role="document" class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 id="exampleModalLabel" class="modal-title">Input Pembayaran</h4>
                                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                  <form action="aksi/input_pembayaran_jamaah.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                      <label>Nomor Pemesanan</label>
                                                      <input readonly="" value="<?= $dt_pemesanan['id_pemesanan'] ?>" placeholder="Masukan Nomor Pemesanan"  type="text" name="nomor" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                      <input type="" hidden="" name="user" value="<?= $dt_pemesanan['id_user']  ?>" >
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Tanggal</label>
                                                      <input readonly="" required="" type="text" name="tgl"  class="form-control" value="<?= date('Y-m-d') ?>">
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Jumlah Pembayaran</label>
                                                      <?php 
                                                        $cicil1 = $dt_pemesanan['total_harga'] * 0.25;
                                                        $cicil2 = $dt_pemesanan['total_harga'] * 0.35;
                                                        $cicil3 = $dt_pemesanan['total_harga'] * 0.40;

                                                       ?>

                                                       <select  class="form-control" name="jumlah">
                                                        <?php 
                                                          if ($dt_pembayaran['jumlah_bayar'] == 0 AND $dt_pembayaran['jumlah_bayar'] < $cicil1) {
                                                           echo "<option value=".$cicil1."> Cicilan 1 : ".number_format($cicil1,2)."</option>";
                                                          }elseif ($dt_pembayaran['jumlah_bayar'] >= $cicil1 AND $dt_pembayaran['jumlah_bayar'] <= $cicil2) {
                                                            echo "<option value=".$cicil2."> Cicilan 2 : ".number_format($cicil2,2)."</option>";
                                                          }else{
                                                            echo " <option value=".$cicil3."> Cicilan 3 :".number_format($cicil3,2)."</option>";
                                                          }

                                                         ?>
                                                       </select>
                                                    </div>
                                                    <?php 
                                                          if ($dt_pembayaran['jumlah_bayar'] == 0 AND $dt_pembayaran['jumlah_bayar'] < $cicil1) {
                                                           echo "<input hidden=''  name='ket' value='1' >";
                                                          }elseif ($dt_pembayaran['jumlah_bayar'] >= $cicil1 AND $dt_pembayaran['jumlah_bayar'] <= $cicil2) {
                                                           echo "<input hidden=''  name='ket' value='2' >";
                                                          }else{
                                                           echo "<input hidden=''  name='ket' value='3' >";
                                                          }

                                                         ?>
                                                    <div class="form-group">
                                                      <label>Bukti Transfer</label>
                                                      <input type="file" name="file" class="form-control">
                                                    </div>
                                                   
                                                   
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="submit" class="btn btn-success">Input</button>
                                                 
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>


                                          <!-- end input pembayaran -->
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



               