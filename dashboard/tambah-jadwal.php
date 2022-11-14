
                      <div id="tambah_jadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Jadwal</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <form action="aksi/tambah_jadwal.php" method="POST">
                                <div class="form-group">
                                  <label>Pilih paket</label>
                                  <select name="paket" class="form-control">
                                    <option selected="" disabled="">-Pilih paket-</option>
                                    <?php 
                                      $paket=mysqli_query($koneksi,"SELECT upper(nm_paket) as nm,durasi,id_paket FROM tb_paket ORDER BY id_paket DESC");
                                      foreach ($paket as $dt_paket) {
                                        
                                      
                                     ?>
                                     <option value="<?= $dt_paket['id_paket'] ?>"><?= $dt_paket['nm']  ?> (Durasi <?= $dt_paket['durasi']  ?> Hari)</option>
                                   <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Tanggal Berangkat</label>
                                  <input name="tanggal" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                                </div>
                                <div class="form-group">
                                  <label>Maksimal Jamaah</label>
                                  <input placeholder="Maksimal Jamaah"  type="text" name="max_seat" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Agenda</label>
                                  <textarea id="texteditor2" name="agenda"></textarea>
                                </div>
                              
                                
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-success">Input</button>
                             
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
