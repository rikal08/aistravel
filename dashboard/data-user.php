<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Data User</h6><br>
                    <a href="" data-toggle="modal" data-target="#tambah-user" class="btn btn-primary">Tambah Admin/Jamaah</a>
                  </div>
                  <div class="card-body">
                    <table id="exampl" class="table table-striped table-hover card-text">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Nomor Wa</th>
                          <th>Password</th>
                          <th>Level</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 

                      $no=1;
                      $user=mysqli_query($koneksi,"SELECT * FROM tb_user ORDER BY id ASC");
                      foreach ($user as $dt_user) {
                       

                       ?>
                        <tr>
                         <td><?= $no;  ?></td>
                         <td><?= $dt_user['nama']  ?></td>
                         <td><?= $dt_user['email']  ?></td>
                         <td><?= $dt_user['nomor_wa']  ?></td>
                         <td><?= $dt_user['pass']  ?></td>
                         <td><?= $dt_user['level']  ?></td>
                         <td><a href="hapus-user&id=<?= $dt_user['id']  ?>" class="btn btn-danger">Hapus</a></td>
                          
                        </tr>
                      <?php $no++; } ?>
                      </tbody>
                    </table>
                      <?php if (empty($dt_user)): ?>
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
      <div id="tambah-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Tambah User</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <form action="aksi/tambah-user.php" method="post">
                              <div class="form-group">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" name="nomor_wa" placeholder="Nomor Telepon/Whatsapp">
                              </div>
                              <div class="form-group">
                                <select class="form-control" name="level">
                                  <option selected="" value="admin">admin</option>
                                  <option value="jamaah">jamaah</option>
                                </select>
                              </div>
                              <div>
                                <input type="text" class="form-control" name="pass" placeholder="Password">
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