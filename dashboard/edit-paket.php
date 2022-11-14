<div id="paket-edit<?= $dt_paket['id_paket'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Edit paket</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Isi data paket dengan lengkap</p>
                            <form action="aksi/edit_produk.php" method="post" enctype="multipart/form-data">
                              <?php 
                                  $paketb=mysqli_query($koneksi,"SELECT * FROM tb_paket where id_paket = $dt_paket[id_paket] ");
                                     foreach ($paketb as $dt_paketb) {

                                     }
                               ?>
                               <input type="" hidden="" name="id_paket" value="<?= $dt_paketb['id_paket']  ?>">
                              <div class="form-group">
                                <label>Nama paket</label>
                                <input value="<?= $dt_paketb['nm_paket'] ?>" type="text" required="" placeholder="Nama paket" class="form-control" name="nm_paket">
                              </div>
                              <div class="form-group">
                                <label>Harga Quad</label>
                                <input value="<?= $dt_paketb['harga_quad']  ?>" type="text" required="" placeholder="Harga paket" class="form-control" name="harga_quad">
                              </div>
                               <div class="form-group">
                                <label>Harga Triple</label>
                                <input value="<?= $dt_paketb['harga_triple']  ?>" type="text" required="" placeholder="Harga paket" class="form-control" name="harga_triple">
                              </div>
                               <div class="form-group">
                                <label>Harga Double</label>
                                <input value="<?= $dt_paketb['harga_double']  ?>" type="text" required="" placeholder="Harga paket" class="form-control" name="harga_double">
                              </div>
                              <div class="form-group">
                                <label>Durasi Perjalanan/Hari</label>
                                <input value="<?= $dt_paketb['durasi']  ?>" type="text" required="" placeholder="Durasi Perjalanan" class="form-control" name="durasi">
                              </div>
                              <div class="form-group">
                                <label>Keterangan Paket</label>
                               <textarea name="keterangan" class="form-control" ><?= $dt_paketb['keterangan']  ?></textarea>
                              </div>
                              
                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="submit" type="button" class="btn btn-primary">Save</button>
                          </div>
                            </form>
                        </div>
                      </div>
                    </div>