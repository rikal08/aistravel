<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <div class="col-lg-9 mb-9">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Data Paket</h6><br>
                    <button data-toggle="modal" data-target="#tambah_paket" class="btn btn-info"><i class="fa fa-plus"></i>Tambah Paket</button>
                    <?php include"tambah_paket.php" ?>
                    <button class="btn btn-success" data-toggle="modal" data-target="#jenis_paket"><i class="fa fa-plus"></i>Tambah Jenis Paket</button>
                    <?php include"tambah_jenis_paket.php" ?>
                  </div>
                  <div class="card-body">                           
                    <table id="exampl" class="table table-striped table-hover card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Jenis Paket</th>
                          <th>Nama Paket</th>
                          <th>Harga Quad</th>
                          <th>Harga Triple</th>
                          <th>Harga Double</th>
                          <th>Durasi Perjalanan</th>
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
                          $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket ORDER BY id_paket DESC");
                          foreach ($paket as $dt_paket) {
                           
                         ?>
                        <tr>
                          <th><?= $no;  ?></th>
                           <?php 
                            $select_jenis=mysqli_query($koneksi,"SELECT id,upper(nama) as nama_jenis FROM tb_jenis_paket WHERE id='$dt_paket[id_jenis]'");
                              foreach ($select_jenis as $dt_select_jenis) {
                                
                                }
                            ?>
                          <td><?= $dt_select_jenis['nama_jenis']  ?></td>
                          <td><?= $dt_paket['nm_paket']  ?></td>
                          <td><?= rupiah($dt_paket['harga_quad'])  ?></td>
                          <td><?= rupiah($dt_paket['harga_triple'])  ?></td>
                          <td><?= rupiah($dt_paket['harga_double'])  ?></td>
                          <td><?= $dt_paket['durasi']  ?> Hari</td>
                          <td>
                            <a class="btn btn-warning" href="" data-toggle="modal" data-target="#paket<?= $dt_paket['id_paket'] ?>"><i class="fa fa-eye"></i>Detail</a>

                            <a class="btn btn-info" data-toggle="modal" data-target="#paket-edit<?= $dt_paket['id_paket'] ?>" href=""><i class="fa fa-edit"></i>Edit</a>
                            <a class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?')" href="hapus-paket&hapus=<?= $dt_paket['id_paket'];  ?>"><i class="fa fa-ban"></i> Hapus</a> 

                          </td>
                          
                          
                        </tr>
                        <?php include'edit-paket.php' ?>
                        <!-- detail -->
                        <div id="paket<?= $dt_paket['id_paket'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Detail Paket</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <img src="gambar-paket/<?= $dt_paket['gambar']  ?>" width="150px" height="180px">
                                </div>
                                <div class="form-group">
                                  <label style="color: green">Jenis Paket</label>
                                  <?php 
                                    $select_jenis=mysqli_query($koneksi,"SELECT id,upper(nama) as nama_jenis FROM tb_jenis_paket WHERE id='$dt_paket[id_jenis]'");
                                    foreach ($select_jenis as $dt_select_jenis) {
                                      # code...
                                    }
                                   ?>
                                  <h5><?= $dt_select_jenis['nama_jenis'] ?></h5>
                                </div>
                                <div class="form-group">
                                  <label style="color: green">Nama Paket</label>
                                  <h5><?= $dt_paket['nm_paket']  ?></h5>
                                </div>
                                <div class="form-group">
                                  <label style="color: green">Harga Quad</label>
                                  <h5><?= rupiah($dt_paket['harga_quad'])  ?></h5>
                                </div>
                                <div class="form-group">
                                  <label style="color: green">Harga Triple</label>
                                  <h5><?= rupiah($dt_paket['harga_triple'])  ?></h5>
                                </div>
                                <div class="form-group">
                                  <label style="color: green">Harga Double</label>
                                  <h5><?= rupiah($dt_paket['harga_double'])  ?></h5>
                                </div>
                                <div class="form-group">
                                  <label style="color: green">Durasi Perjalanan</label>
                                  <h5><?= $dt_paket['durasi']  ?> Hari</h5>
                                </div>
                                <div class="form-group">
                                  <label style="color: green">Keterangan</label>
                                  <h5><?= $dt_paket['keterangan']  ?></h5>
                                </div>
                                
                                
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                             
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- detail -->
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 mb-3">
                
            <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Jenis Paket</h6>
                  </div>
                  <div class="card-body">
                    <?php 
                      $jenis=mysqli_query($koneksi,"SELECT id, upper(nama) as nama_jenis FROM tb_jenis_paket ORDER BY id DESC");
                      foreach ($jenis as $dt_jenis) {
                        
                     ?>
                    <h6><?= $dt_jenis['nama_jenis'] ?> <a class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?')"   href="hapus-jenis-paket&hapus=<?= $dt_jenis['id']  ?>"><i class="fa fa-ban"></i> Hapus</a></h6>
                  <?php } ?>
                  <?php if (empty($dt_jenis)): ?>
                    <h6 style="color: red" align="center">Kosong</h6>
                  <?php endif ?>
                  </div>
            </div>
          </div>
          </section>
          
        </div>
      </div>
