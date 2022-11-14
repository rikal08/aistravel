<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Jadwal Keberangkatan</h6><br>
                  </div>
                  <div class="card-body"> 
                    <table id="exampl" class="display nowrap" style="width:80%">
                        <thead>
                            <tr>
                               <th>#</th>
                                <th>Pesan Seat</th>
                                <th>Nama Paket</th>
                                <th>Tanggal Berangkat</th>
                                <th>Harga Quad</th>
                                <th>Harga Triple</th>
                                <th>Harga Double</th>
                                <th>Durasi</th>
                                <th>Agenda Perjalanan</th>
                                <th>Jumlah Penumpang</th>
                                <th>Maksimal Penumpang</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        include"../koneksi.php";
                         function rupiah($angka)
                            {
                             $hasil_rupiah= "Rp " . number_format($angka,2,',','.');
                            return $hasil_rupiah;
                                } 
                        $no=1;
                        $jadwal=mysqli_query($koneksi,"SELECT * FROM tb_jadwal ORDER BY id DESC");
                            foreach ($jadwal as $dt_jadwal) { 
                                ?>
                         <tr>
                        <td><?= $no;  ?></td>
                        <td><a href="" data-toggle="modal" data-target="#pesan-seat<?= $dt_jadwal['id'] ?>" class="btn btn-danger">Pesan Seat</a></td>
                        <?php 
                        $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket where id_paket=$dt_jadwal[id_paket]");
                            foreach ($paket as $dt_paket) {
                                # code...
                              }
                             ?>
                        <td><?= $dt_paket['nm_paket']  ?></td>
                        <td><?= $dt_jadwal['tgl_berangkat']  ?></td>
                        <td><?= rupiah($dt_paket['harga_quad'])  ?> Hari</td>
                        <td><?= rupiah($dt_paket['harga_triple'])  ?> Hari</td>
                        <td><?= rupiah($dt_paket['harga_double'])  ?> Hari</td>
                        <td><?= $dt_paket['durasi']  ?> Hari</td>
                        <td>
                          <a href="" data-toggle="modal" data-target="#agenda<?= $dt_jadwal['id']?>" class="btn btn-warning">Lihat</a>
                        </td>
                        <td><?= $dt_jadwal['jumlah_seat']  ?></td>
                        <td><?= $dt_jadwal['max_seat']  ?></td>
                       


                        <div id="pesan-seat<?= $dt_jadwal['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Pesan Seat</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Isi pemesanan.</p>
                            <form  action="aksi/pemesanan.php" method="post">
                                <input type="" hidden=""  value="<?= $dt_jadwal['id']  ?>" name="jadwal">
                                <input type="" hidden=""  value="<?= $dt_paket['id_paket']  ?>" name="id_paket">
                                <input type="" hidden=""  value="<?= $_SESSION['id']  ?>" name="id_jamaah">
                              <div class="form-group">
                                <label>Nama Paket</label>
                                <input value="<?= $dt_paket['nm_paket'] ?>" type="text" required="" readonly="" placeholder="Nama Paket" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Pilihan Harga</label>
                                <select class="form-control" name="hrg">
                                    <option value="<?= $dt_paket['harga_quad']  ?>" ><?= rupiah($dt_paket['harga_quad'])  ?> - Sekamar 4 Orang</option>
                                    <option value="<?= $dt_paket['harga_triple'] ?>" ><?= rupiah($dt_paket['harga_triple'])  ?> - Sekamar 3 Orang</option>
                                    <option value="<?= $dt_paket['harga_double']  ?>"><?= rupiah($dt_paket['harga_double'])  ?> - Sekamar 2 Orang</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Jumlah Seat</label>
                                <input name="jumlah"  type="text" required=""  placeholder="Jumlah seat" class="form-control">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary">Pesan Seat</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- agenda -->
                    <div id="agenda<?= $dt_jadwal['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
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
                            </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                              
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- agenda -->

                        <?php $no++; } ?>     
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </section>