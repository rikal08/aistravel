<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <div class="col-12">                    
                    <div class="card card-primary">
                      <?php 
                        $profil=mysqli_query($koneksi,"SELECT * FROM tb_profil");
                        foreach ($profil as $dt_profil) {
                          
                        }
                       ?>
                            <div class="card-header">
                              <h3 class="card-title">Profil AIS TRAVEL</h3><br>

                              <button data-toggle="modal" data-target="#edit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Profil</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                              <p class="text-muted">
                                <?= $dt_profil['email']  ?>
                              </p>

                              <hr>

                              <strong><i class="fas fa-phone mr-1"></i> Telepon</strong>

                              <p class="text-muted">
                                <?= $dt_profil['telepon']  ?>
                              </p>

                              <hr>

                              <strong><i class="fas fa-phone mr-1"></i> Whatsapp</strong>

                              <p class="text-muted">
                                <?= $dt_profil['wa']  ?>
                              </p>

                              <hr>
                              <strong><i class="fas fa-phone mr-1"></i> Instagram</strong>

                              <p class="text-muted">
                                <?= $dt_profil['ig']  ?>
                              </p>

                              <hr>

                              <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                              <p class="text-muted"><?= $dt_profil['alamat']  ?></p>

                              <hr>

                              <strong><i class="fas fa-user mr-1"></i> About Us</strong>

                              <p class="text-muted">
                                <?= $dt_profil['about']  ?>
                              </p>
                            </div>
                            <!-- /.card-body -->
                        
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>

                <!-- edit -->
                <div id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Edit Profil</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Edit profil AIS TRAVEL.</p>
                            <form method="POST" action="aksi/edit-profil.php">
                              <div class="form-group">
                                <label>Email</label>
                                <input type="" hidden="" name="id" value="<?= $dt_profil['id'] ?>">
                                <input value="<?= $dt_profil['email']  ?>" type="email" name="email"  placeholder="Email Address" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Telepon</label>
                                <input value="<?= $dt_profil['telepon']  ?>" type="text" name="telepon"  placeholder="Telepon" class="form-control">
                              </div> 
                              <div class="form-group">
                                <label>Whatsapp</label>
                                <input value="<?= $dt_profil['wa']  ?>" type="text" name="wa"  placeholder="Whatsapp" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Instagram</label>
                                <input value="<?= $dt_profil['ig']  ?>" type="text" name="ig"  placeholder="Instagram" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Alamat</label>
                                <input value="<?= $dt_profil['alamat']  ?>" type="text" name="alamat"  placeholder="Alamat" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>About Us</label>
                                <textarea  class="form-control" name="about" placeholder="Alamat" id="ckeditor"><?= $dt_profil['about'] ?></textarea>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                            </form>
                        </div>
                      </div>
                    </div>
                <!-- edit -->
