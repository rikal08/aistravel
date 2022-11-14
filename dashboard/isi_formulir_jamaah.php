<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
                <div class="col-lg-12 mb-5">
                  <?php   
                    $formulir=mysqli_query($koneksi,"SELECT * FROM formulir_pendaftaran where id='$_GET[id]'");
                    $id=mysqli_fetch_array($formulir);

                   ?>
                   <?php if ($id['no_ktp'] > 0): ?>
                     
                     <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Berhasil</h5>
                        <p>Formulir Pendaftaran anda telah di isi!</p>

                    </div>
                   <?php endif ?>
                   <?php if ($id['no_ktp'] ==0): ?>
                     
                     <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Perhatian!</h5>
                        <p>Formulir Pendaftarn anda belum di isi!</p>

                    </div>
                   <?php endif ?>
                        <div class="card">
                          <div class="card-header">
                            <h3 align="center" class="h4 text-uppercase mb-0">formulir <br> pendaftaran jamaah</h3>
                          </div>
                          <div class="card-body">
                            <form action="aksi/input_formulir.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                              <?php   
                                $formulir=mysqli_query($koneksi,"SELECT * FROM formulir_pendaftaran where id=$_GET[id]");
                                $id=mysqli_fetch_array($formulir);

                               ?>
                              <div class="form-group row">
                                <label class="col-md-3 form-control-label">Nomor Pendaftaran</label>
                                <div class="col-md-9">
                                  <input type="text" name="id_pendaftaran" readonly="" value="<?= $id['id']    ?>" class="form-control">
                                </div>
                              </div>
                              <div class="line"></div>
                              <div class="form-group row">
                                <label class="col-md-3 form-control-label">Nomor KTP</label>
                                <div class="col-md-9">
                                  <input name="no_ktp" required="" maxlength="16" placeholder="Nomor KTP" type="text" class="form-control"><small class="form-text text-muted ml-3">* Wajib di isi</small>
                                </div>
                              </div>
                              <div class="line"></div>
                              <div class="form-group row">
                                <label class="col-md-3 form-control-label">Nama Lengkap (Sesuai KTP)</label>
                                 <div class="col-md-9">
                                  <input name="nama" required="" placeholder="Nama Lengkap" type="text" class="form-control"><small class="form-text text-muted ml-3">* Wajib di isi</small>
                                </div>
                              </div>
                              <div class="line"></div>
                              <div class="form-group row">
                                <label class="col-md-3 form-control-label">Tempat Lahir (Sesuai KTP)</label>
                                 <div class="col-md-9">
                                  <input name="tempat_lahir" required="" placeholder="Tempat Lahir" type="text" class="form-control"><small class="form-text text-muted ml-3">* Wajib di isi</small>
                                </div>
                              </div>
                              <div class="line"></div>
                              <div class="form-group row">
                                <label class="col-md-3 form-control-label">Pekerjaan</label>
                                 <div class="col-md-9">
                                  <input name="pekerjaan" required="" placeholder="Pekerjaan" type="text" class="form-control"><small class="form-text text-muted ml-3">* Wajib di isi</small>
                                </div>
                              </div>
                              <div class="line"></div>
                              <div class="form-group row">
                                <label class="col-md-3 form-control-label">Jenis Kelamin</label>
                                <div class="col-md-9">
                                  
                                    <select name="jenis_kelamin" class="form-control">
                                      <option value="Laki-Laki">Laki-Laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                    </select>
                                  
                                </div>
                              </div>
                              <div class="line"></div>
                              <div class="form-group row">
                                <label class="col-md-3 form-control-label">Agama</label>
                                <div class="col-md-9">
                                  <input name="agama" required="" placeholder="Agama" type="text" class="form-control"><small class="form-text text-muted ml-3">* Wajib di isi</small>
                                </div>
                              </div>
                              <div class="line"></div>
                              <div class="form-group row">
                                <label class="col-md-3 form-control-label">Tanggal Lahir</label>
                                 <div class="col-md-9">
                                  <input name="tgl_lahir" required="" placeholder="Tanggal Lahir" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask><small class="form-text text-muted ml-3">* Wajib di isi</small>
                                </div>
                              </div>
                              <div class="line"></div>
                              <div class="form-group row">
                                <label class="col-md-3 form-control-label">Alamat Lengkap</label>
                                <div class="col-md-9">
                                  <textarea required="" placeholder="Alamat Lengkap" name="alamat_lengkap" class="form-control"></textarea><small class="form-text text-muted ml-3">* Wajib di isi</small>
                                </div>
                              </div>
                              <div class="line"></div>
                              <div class="form-group row">
                                <label class="col-md-3 form-control-label">Nama Ibu Kandung</label>
                               
                                <div class="col-md-9">
                                  <input name="nm_ibu" required="" placeholder="Nama Ibu Kandung" type="text" class="form-control"><small class="form-text text-muted ml-3">* Wajib di isi</small>
                                </div>
                              </div>
                              <div class="line"></div>
                              <div class="form-group row has-success">
                                <label class="col-sm-3 form-control-label">Kewarganegaraan</label>
                                <div class="col-md-9">
                                  <input name="kewarga" required="" placeholder="Kewarganegaraan" type="text" class="form-control"><small class="form-text text-muted ml-3">* Wajib di isi</small>
                                </div>
                              </div>
                              <div class="line"></div>
                              <div class="form-group row has-danger">
                                <label class="col-sm-3 form-control-label">Nomor Telepon/HP</label>
                                <div class="col-md-9">
                                  <input name="no_hp" required="" placeholder="Nomor Telepon/HP" type="text" class="form-control"><small class="form-text text-muted ml-3">* Wajib di isi</small>
                                </div>
                              </div>
                              <div class="line"></div>
                              <div class="form-group row">
                                <label class="col-md-3 form-control-label">Email</label>
                                <div class="col-md-9">
                                  <input name="email" required="" placeholder="Email" type="text" class="form-control"><small class="form-text text-muted ml-3">* Wajib di isi</small>
                                </div>
                              </div>
                              <div class="line"></div>
                              <div class="form-group row">
                                <label class="col-md-3 form-control-label">Pas Foto 3x4</label>
                                <div class="col-md-9">
                                  <input  name="file" required="" placeholder="Pekerjaan" type="file" class="form-control"><small class="form-text text-muted ml-3">* Wajib di isi</small>
                                </div>
                              </div>
                              <div class="line"></div>
                              <div class="form-group row">
                                <div class="col-md-9 ml-auto">
                                  <a href="jadwal-saya" class="btn btn-secondary">Batal</a>
                                  <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Simpan</button>
                                  
                                </div>
                              </div>
                              <!-- alert -->
                                <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
                                  <div role="document" class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 id="exampleModalLabel" class="modal-title">Perhatian!</h4>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                      </div>
                                      <div class="modal-body">
                                        <p>Data yang telah di upload tidak bisa dirubah kembali, Pastikan data anda telah benar. <br>
                                        </p>
                                         
                                        <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                        <button type="submit" class="btn btn-danger">Lanjutkan</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <!-- alert -->
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
              </div>

