
<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Pemesanan</h6><br>
                  </div>
                 <div class="card-header">
                    <form method="POST">
                      <div class="col-lg-10">
                     <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <button id="button-addon1" type="button" class="btn btn-secondary">Filter</button>
                          </div>
                          <select  name="pilih_jadwal" class="form-control">
                            <option disabled="" selected="">
                              <?php 
                                 if (isset($_POST['pilih_jadwal'])) {
                                $id=$_POST['pilih_jadwal'];
                                $id=mysqli_query($koneksi,"SELECT id,year(tgl_berangkat) as tahun, monthname(tgl_berangkat) as bulan, day(tgl_berangkat) as hari FROM tb_jadwal where id=$id");
                                foreach ($id as $key) {
                              }
                              echo "$key[bulan] $key[hari] ,$key[tahun] ";
                              
                           
                          }else{
                            echo " -Pilih Jadwal Keberangkatan-";
                          }
                         ?>
                         </option>
                          <?php   
                            $pilih_jadwal=mysqli_query($koneksi,"SELECT id,year(tgl_berangkat) as tahun, monthname(tgl_berangkat) as bulan, day(tgl_berangkat) as hari FROM tb_jadwal ORDER BY id DESC");
                            foreach ($pilih_jadwal as $dt_pilih) {
                             
                           ?>
                           <option value="<?= $dt_pilih['id']  ?>"  ><?= $dt_pilih['bulan']  ?> <?= $dt_pilih['hari'] ?>,<?= $dt_pilih['tahun'];    ?></option>
                         <?php  } ?>
                        </select>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-arrows-alt-v"></i> Pilih Jadwal</button>
                      </div>
                      </form>
                      </div>
                  </div>
                  <div class="card-body">                           
                    <table id="exampl" class="table table-striped table-hover card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No Pemesanan</th>
                          <th>Nama Pemesan</th>
                          <th>Nama Paket</th>
                          <th>Jumlah Jamaah</th>
                          <th>Jadwal Berangkat</th>
                          <th>Total Harga</th>
                          <th>Status Pemesanan</th>
                          <th>Aksi</th>
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
                        if (isset($_POST['pilih_jadwal'])) {
                          $pilih_jadwal=$_POST['pilih_jadwal'];
                        $pemesanan=mysqli_query($koneksi,"SELECT * FROM tb_pemesanan WHERE id_jadwal=$pilih_jadwal  ORDER BY id_pemesanan DESC");
                        }else{
                          $pemesanan=mysqli_query($koneksi,"SELECT * FROM tb_pemesanan ORDER BY id_pemesanan DESC");
                        }
                        foreach ($pemesanan as $dt_pemesanan) {
                         
                       ?>
                      <tr>
                        <td><?= $no  ?></td>
                        <td><?= $dt_pemesanan['id_pemesanan']  ?></td>
                        <?php 
                          $user=mysqli_query($koneksi,"SELECT * FROM tb_user where id=$dt_pemesanan[id_user]");
                          foreach ($user as $dt_user) {
                            # code...
                          }
                         ?>
                        <td><?= $dt_user['nama']  ?></td>
                        <?php 
                          $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket where id_paket=$dt_pemesanan[id_paket]");
                          foreach ($paket as $dt_paket) {
                            # code...
                          }
                         ?>
                        <td><?= $dt_paket['nm_paket']  ?></td>
                        <td><?= $dt_pemesanan['jmlh_jamaah']  ?> Orang</td>
                         <?php 
                          $jadwal=mysqli_query($koneksi,"SELECT * FROM tb_jadwal where id=$dt_pemesanan[id_jadwal]");
                          foreach ($jadwal as $dt_jadwal) {
                            # code...
                          }
                         ?>
                        <td><?= $dt_jadwal['tgl_berangkat']  ?></td>
                        <td><?= rupiah($dt_pemesanan['total_harga'])  ?></td> 
                        <td>
                          <?php if ($dt_pemesanan['status']==1): ?>
                            <button class="btn btn-danger"><i class="fa fa-times"></i> Tertunda</button>
                          <?php endif ?>
                          <?php if ($dt_pemesanan['status']==2): ?>
                            <button class="btn btn-success"><i class="fa fa-check"></i> Berhasil</button>
                          <?php endif ?> 
                          <?php if ($dt_pemesanan['status']==3): ?>
                            <button class="btn btn-danger"><i class="fa fa-times"></i> Dibatalkan</button>
                          <?php endif ?>
                        </td>
                        <td>
                          <a data-toggle="modal" data-target="#my<?= $dt_user['id']  ?>" href="" class="btn btn-info"><i class="fa fa-phone"></i> Hubungi Pelanggan</a>
                          <?php if ($dt_pemesanan['status']==1 OR $dt_pemesanan['status']==3): ?>
                            
                          <a data-toggle="modal" data-target="#veritifikasi<?= $dt_pemesanan['id_pemesanan']  ?>" href="" class="btn btn-success"><i class="fa fa-check"></i> Veritifikasi Pemesanan</a>
                          <?php endif ?>
                          
                            <a  href="hapus-pemesanan&id=<?= $dt_pemesanan['id_pemesanan'];  ?>" class="btn btn-danger"><i class="fa fa-ban"></i> Hapus Pemesanan</a>
                          <?php if ($dt_pemesanan['status']==2): ?>
                            
                            <a data-toggle="modal" data-target="#batal<?= $dt_pemesanan['id_pemesanan']  ?>" href="" class="btn btn-warning">Batalkan Pemesanan</a>
                          <?php endif ?>
                          
                        </td>
                      </tr>
                      <!-- detail -->
                      <div id="my<?= $dt_user['id']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Pilih Kontak di Bawah ini</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label >No Whatsapp/Telepon</label>
                                  <h5><a href="https://api.whatsapp.com/send?phone=<?= $dt_user['nomor_wa']; ?>&text=Assalamualaikum"><?= $dt_user['nomor_wa']  ?></a></h5>
                                </div>
                                <div class="form-group">
                                  <label >Email</label>
                                  <h5><a href=""><?= $dt_user['email']  ?></a></h5>
                                </div>
                                
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                             
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- veritifikasi pendaftaran -->
                        <div class="modal fade" id="veritifikasi<?= $dt_pemesanan['id_pemesanan']  ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Veritifikasi Pemesanan</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Anda yakin untuk menyetujui pemesanan ini?</p>
                            </div>
                            <form action="aksi/veritifikasi_pemesanan.php" method="POST">
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
                      <!-- veritifikasi pendaftaran -->

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
                            <form action="aksi/batal_pemesanan.php" method="POST">
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
