<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Formulir Pendaftaran</h6>
                  </div>
                  <div class="card-header">
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#cetak_laporan"><i class="fa fa-print"></i>Cetak Laporan Daftar Jamaah</a>
                  </div>
                  <div class="card-body">                           
                    <table id="exampl" class="table table-striped table-hover card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>ID Pemesanan</th>
                          <th>Nomor Pendaftaran</th>
                          <th>No KTP</th>
                          <th>Nama Lengkap</th>
                          <th>Tanggal Lahir</th>
                          <th>Nomor Hp</th>
                          <th>Email</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        include"koneksi.php";
                        $no=1;
                        $formulir=mysqli_query($koneksi,"SELECT * FROM formulir_pendaftaran where no_ktp > 0 ORDER BY id DESC");
                        foreach ($formulir as $data_formulir) {
                         
                        
                       ?>
                        <tr>
                          <td><?= $no  ?></td>
                          <td><?= $data_formulir['id_pemesanan']  ?></td>
                          <td><?= $data_formulir['id']  ?></td>
                          <td><?= $data_formulir['no_ktp']  ?></td>
                          <td><?= $data_formulir['nama']  ?></td>
                          <td><?= $data_formulir['tgl_lahir']  ?></td>
                          <td><?= $data_formulir['no_hp']  ?></td>
                          <td><?= $data_formulir['email']  ?></td>
                          
                          <td>
                            <a href="" data-toggle="modal" data-target="#cetak<?= $data_formulir['id']  ?> " class="btn btn-info"><i class="fa fa-print"></i> Print</a>
                            <a href="hapus-formulir&id=<?= $data_formulir['id'] ?>" class="btn btn-danger"><i class="fa fa-ban"></i> Hapus</a>
                            <a href="" class="btn btn-warning" data-toggle="modal" data-target="#my<?= $data_formulir['id']  ?> " >Detail</a>
                          </td>
                          
                        </tr>

                        <div id="my<?= $data_formulir['id']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Data Lengkap formulir</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <img src="foto-jamaah/<?= $data_formulir['foto']   ?>" width="150px" height="180px">
                                </div>
                                <div class="form-group">
                                  <label style="color: blue">No KTP</label>
                                  <h5><?= $data_formulir['no_ktp']  ?></h5>
                                </div>
                                <div class="form-group">
                                  <label style="color: blue">Nama Lengkap</label>
                                  <h5><?= $data_formulir['nama']  ?></h5>
                                </div>  
                                <div class="form-group">
                                  <label style="color: blue">Tempat Lahir</label>
                                  <h5><?= $data_formulir['nama']  ?></h5>
                                </div>
                                <div class="form-group">
                                  <label style="color: blue">Pekerjaan</label>
                                  <h5><?= $data_formulir['pekerjaan']  ?></h5>
                                </div> 
                                <div class="form-group">
                                  <label style="color: blue">Tanggal Lahir</label>
                                  <h5><?= $data_formulir['tgl_lahir']  ?></h5>
                                </div> 
                                <div class="form-group">
                                  <label style="color: blue">Jenis Kelamin</label>
                                  <h5><?= $data_formulir['jenis_kelamin']  ?></h5>
                                </div>
                                <div class="form-group">
                                  <label style="color: blue">Agama</label>
                                  <h5><?= $data_formulir['agama']  ?></h5>
                                </div>   
                                <div class="form-group">
                                  <label style="color: blue">Alamat Lengkap(Sesui KTP)</label>
                                  <h5><?= $data_formulir['alamat_lengkap']  ?></h5>
                                </div>
                                <div class="form-group">
                                  <label style="color: blue">Nama Ibu Kandung</label>
                                  <h5><?= $data_formulir['nm_ibu']  ?></h5>
                                </div>
                                <div class="form-group">
                                  <label style="color: blue">Kewarganegaraan</label>
                                  <h5><?= $data_formulir['kewarga']  ?></h5>
                                </div>
                                <div class="form-group">
                                  <label style="color: blue">Nomor HP</label>
                                  <h5><?= $data_formulir['no_hp']  ?></h5>
                                </div>
                                <div class="form-group">
                                  <label style="color: blue">E-mail</label>
                                  <h5><?= $data_formulir['email']  ?></h5>
                                </div>
                                <div class="form-group">
                                  <label></label>
                                  <h5></h5>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                             
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- cetak -->
                      <div id="cetak<?= $data_formulir['id']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Cetak Formulir</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <p>Yakin Untuk mencetak formulir dengan ID:</p>
                              <form action="aksi/cetak-formulir-pendaftaran.php" method="POST" >
                                <input class="form-control" type="" name="id" value="<?= $data_formulir['id'];  ?>">
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-danger"><i class="fa fa-print"></i></button>
                             
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- cetak -->
                    <?php $no++; } ?>

                    <!-- cetak laporan jamaah -->
                    <div id="cetak_laporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Cetak Laporan Jamaah</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <p>Pilih Paket Keberangkatan</p>
                              <form action="aksi/cetak-laporan-jamaah.php" method="POST" >
                                <select name="paket" class="form-control">
                                  <option selected="" value="0">Pilih</option>
                                  <?php 
                                  $query = mysqli_query($koneksi,"SELECT tb_paket.id_paket,tb_paket.nm_paket,tb_jadwal.tgl_berangkat FROM tb_paket JOIN tb_jadwal ON tb_paket.id_paket = tb_jadwal.id_paket");
                                  foreach ($query as $data) {

                                 ?>

                                 <option value="<?= $data['id_paket'] ?>">
                                  Tanggal Berangkat : <?= $data['tgl_berangkat']  ?><br><br>
                                  Nama Paket : <?= $data['nm_paket'] ?>
                                    
                                  </option>

                               <?php } ?>
                                </select>


                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-danger">Cetak</button>
                             
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>