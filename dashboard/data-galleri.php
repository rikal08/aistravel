<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Gallery</h6><br>
                    <button data-toggle="modal" data-target="#myModal" class="btn btn-info"><i class="fa fa-plus"></i>Tambah</button>
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
                  <div class="card-body">
                    <table class="table card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Jadwal</th>
                          <th>Foto</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 

                      $no=1;
                      if (isset($_POST['pilih_jadwal'])) {
                        
                        $gallery=mysqli_query($koneksi,"SELECT * FROM tb_gallery where=$_POST[pilih_jadwal] ORDER BY id DESC");
                      }else{
                        $gallery=mysqli_query($koneksi,"SELECT * FROM tb_gallery ORDER BY id DESC");
                      }
                      foreach ($gallery as $dt_gallery) {
                       

                       ?>
                        <tr>
                          <th scope="row"><?= $no;  ?></th>
                          <?php 
                            $jadwal=mysqli_query($koneksi,"SELECT * FROM tb_jadwal where id=$dt_gallery[id_jadwal]");
                            $dt_jadwal=mysqli_fetch_array($jadwal);
                           ?>
                          <td><?= $dt_jadwal['tgl_berangkat']  ?></td>
                          <td><?= $dt_gallery['gambar']  ?></td>
                          <td>
                            <a href="hapus-gallery&id=<?= $dt_gallery['id']  ?>" class="btn btn-danger"><i class="fa fa-ban"></i> Hapus</a>
                            <a href="gambar-gallery/<?= $dt_gallery['gambar']  ?>" class="btn btn-warning"><i class="fa fa-eye"></i>
                              
                            Lihat</a>
                          </td>
                          
                        </tr>
                      <?php $no++; } ?>
                      </tbody>
                    </table>
                      <?php if (empty($dt_gallery)): ?>
                      <h5 align="center">Kosong</h5>
                      <?php endif ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>

      <!-- tambah -->
      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Tambah Gallery</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Maksimal 10 Gambar.</p>
                            <form action="aksi/input-gallery.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Pilih Jadwal</label>
                                <select name="id" class="form-control">
                                  <option selected="" disabled="">Pilih</option>
                                  <?php 
                                    $cek_jadwal=mysqli_query($koneksi,"SELECT tb_jadwal.id,tb_paket.nm_paket,tb_jadwal.tgl_berangkat FROM tb_jadwal JOIN tb_paket ON tb_jadwal.id_paket=tb_paket.id_paket");
                                    foreach ($cek_jadwal as $key) {
                                
                                   ?>
                                  <option value="<?= $key['id']  ?>"><?= $key['tgl_berangkat']  ?> | <?= $key['nm_paket']  ?></option>
                                <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Pilih Gambar</label>
                                <input name="file[]"  type="file" placeholder="Gambar" class="form-control">
                              </div>
                              <a id="add_input" class="btn btn-info"><i class="fa fa-plus"></i></a>
                              <div id="dynamic" class="form-group">

                              </div>

                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                            </form>
                        </div>
                      </div>
                    </div>
      <!-- tambah -->