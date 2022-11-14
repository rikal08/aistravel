<div id="laporan-perpaket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Laporan Pembayaran</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <form method="POST" action="aksi/cetak-laporan-pembayaran-perpaket.php">
                          <div class="modal-body">
                           <div class="form-group">
                              <label>Filter Sesuai Jadwal Keberangkatan</label>
                              <select class="form-control" name="id_jadwal">
                                <option>Pilih Paket</option>
                                <?php 
                                  $jadwal=mysqli_query($koneksi,"SELECT * FROM tb_jadwal ORDER BY tgl_berangkat ASC");
                                  foreach ($jadwal as $dt_jadwal) {

                                  $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket WHERE id_paket='$dt_jadwal[id_paket]'");
                                  foreach ($paket as $dt_paket) {
                                    # code...
                                  }
                                    
                                  
                                 ?>
                                 <option value="<?= $dt_jadwal['id']  ?>"><?= $dt_jadwal['tgl_berangkat']  ?>, <?= $dt_paket['nm_paket']  ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            
                            </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-print"></i></button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>