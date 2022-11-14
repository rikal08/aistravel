<div id="tambah_paket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Tambah paket</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Isi data paket dengan lengkap</p>
                            <form action="aksi/tambah_paket.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Jenis paket</label>
                                <select name="jenis_paket" class="form-control">
                                  <option selected="">Pilih</option>
                                  <?php 
                                    $jenis_paket=mysqli_query($koneksi,"SELECT * FROM tb_jenis_paket ORDER BY id DESC");
                                    foreach ($jenis_paket as $jenis) {
                                      
                                   ?>
                                    <option value="<?= $jenis['id'] ?>"><?= $jenis['nama']; ?></option>
                                  <?php } ?>
                                    
                                 </select>
                              </div>
                              <div class="form-group">
                                <label>Nama paket</label>
                                <input type="text" required="" placeholder="Nama paket" class="form-control" name="nm_paket">
                              </div>
                              <div class="form-group">
                                <label>Harga Quad/Sekamar 4 Orang</label>
                                <input type="text" required="" placeholder="Harga Quad" class="form-control" name="harga_quad">
                              </div>
                              <div class="form-group">
                                <label>Harga Triple/Sekamar 3 Orang</label>
                                <input type="text" required="" placeholder="Harga Triple" class="form-control" name="harga_triple">
                              </div>
                              <div class="form-group">
                                <label>Harga Double/Sekamar 2 Orang</label>
                                <input type="text" required="" placeholder="Harga Double" class="form-control" name="harga_double">
                              </div>
                              <div class="form-group">
                                <label>Durasi Perjalanan/Hari</label>
                                <input type="text" required="" placeholder="Durasi Perjalanan" class="form-control" name="durasi">
                              </div>
                              <div class="form-group">
                                <label>Tambahkan Keterangan Paket</label>
                                <textarea name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
                              </div>
                              
                              <div class="form-group">
                                <label>Gambar</label>
                                <input required="" type="file" class="form-control" name="file">
                              </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="submit" type="button" class="btn btn-primary">Tambah</button>
                          </div>
                            </form>
                        </div>
                      </div>
                    </div>