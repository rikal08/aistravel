<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <div class="col-12">
                          <!-- Custom Tabs -->
                          <div class="card">
                            <div class="card-header d-flex p-0">
                              <h3 class="card-title p-3">Jadwal Keberangkatan</h3>
                              <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Jadwal</a></li>
                               
                                
                              </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                              <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                   <div class="card-body">                           
                                    <table id="exampl" class="table table-striped table-hover card-text">
                                      <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Nama Paket</th>
                                          <th>Tanggal Berangkat</th>
                                          <th>Durasi</th>
                                          <th>Jumlah Penumpang</th>
                                          <th>Agenda Perjalanan</th>
                                          <th>Formulir Pendaftaran</th>
                                          <th></th>
                                         
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php 
                                        $no=1;
                                          $jadwal_jamaah=mysqli_query($koneksi,"SELECT tb_jadwal.id_paket,tb_jadwal.tgl_berangkat,tb_pemesanan.jmlh_jamaah,tb_pemesanan.id_pemesanan,tb_jadwal.agenda FROM tb_jadwal JOIN tb_pemesanan ON tb_pemesanan.id_jadwal=tb_jadwal.id where tb_pemesanan.id_user=$_SESSION[id]");
                                          foreach ($jadwal_jamaah as $dt_jadwal_jamaah) {
                                          
                                          

                                         ?>
                                        <tr>
                                          <td><?= $no;  ?></td>
                                          <?php 
                                             $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket where id_paket=$dt_jadwal_jamaah[id_paket]");
                                              $id_paket=mysqli_fetch_array($paket);
                                           ?>
                                          <td><?= $id_paket['nm_paket']  ?></td>
                                          <td><?= $dt_jadwal_jamaah['tgl_berangkat']  ?></td>
                                          <td><?= $id_paket['durasi']  ?> Hari</td>
                                          
                                          <td><?= $dt_jadwal_jamaah['jmlh_jamaah'];  ?> Orang</td>
                                          <td>
                                            <a data-toggle="modal" data-target="#agenda" href="" class="btn btn-warning"><i class="fa fa-eye"></i> Lihat</a>
                                          </td>

                                          <td>
                                            <?php 
                                            $i=1;
                                              $formulir=mysqli_query($koneksi,"SELECT * FROM formulir_pendaftaran where id_pemesanan=$dt_jadwal_jamaah[id_pemesanan]");
                                              foreach ($formulir as $dt_formulir) {

                                             ?> 
                                             <a href="isi-formulir-jamaah&id=<?= $dt_formulir['id']  ?>" class="btn btn-info">Isi Formulir <?= $i;  ?></a>
                                             <a href="" data-toggle="modal" data-target="#cetak<?= $dt_formulir['id']  ?> " class="btn btn-danger"><i class="fa fa-print"></i> Print</a>

                                               <!-- cetak -->
                      <div id="cetak<?= $dt_formulir['id']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Cetak Formulir</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <p>Yakin Untuk mencetak formulir dengan ID:</p>
                              <form action="aksi/cetak-formulir-pendaftaran.php" method="POST" >
                                <input class="form-control" type="" name="id" value="<?= $dt_formulir['id'];  ?>">
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-danger"><i class="fa fa-print"></i></button>
                             
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- cetak -->
                                            
                                             <?php $i++; } ?>
                                            
                                          </td>
                                          <td>
                                          </td>
                                        </tr>
                                        <!-- lihat agenda -->
                                        <div id="agenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
                                          <div role="document" class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h4 id="exampleModalLabel" class="modal-title">Agenda Perjalanan</h4>
                                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                              </div>
                                              <div class="modal-body">
                                                <p><?= $dt_jadwal_jamaah['agenda'] ?></p>
                                                
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- lihat agenda -->

                                      <?php $no++; } ?>
                                      </tbody>
                                    </table>
                                  </div>
                                  <?php if (empty($dt_jadwal_jamaah)): ?>
                                    
                                 <div class="alert alert-danger alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <h5><i class="icon fas fa-ban"></i> Kosong</h5>
                                  <p>Tidak ada jadwal</p>

                                </div>
                                  <?php endif ?>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                  
                                </div>
                            
                              </div>
                              <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                          </div>
                          <!-- ./card -->
                        </div>
                      </div>
                    </section>
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