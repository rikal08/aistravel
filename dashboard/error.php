<br><br><br><br><br>
<h5 align="center">Opps.. Halaman tidak ditemukan <br><br>
<?php if ($_SESSION['level']=='admin'): ?>
<a href="admin">
<button class="btn btn-primary">Home</button>
</a>
<?php endif ?>
<?php if ($_SESSION['level']=='jamaah'): ?>
<a href="jamaah">
<button class="btn btn-primary">Home</button>
</a>
<?php endif ?>
</h5>

                      <!-- input pembayaran -->
                      <div id="input<?= $dt_pendaftaran['id_pendaftaran']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Input Pembayaran</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <form action="info.php" method="POST">
                                <div class="form-group">
                                  <label>Nomor Pemesanan</label>
                                  <input value="<?= $dt_pendaftaran['id_pendaftaran'] ?>" readonly="" type="text" name="nomor" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Nama Pemesan</label>
                                  <input value="<?= $dt_user['nama'] ?>" readonly="" type="text" name="nama" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Nama Bank Asal</label>
                                  <input placeholder="Bank Asal"  type="text" name="bank_asal" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Nomor Rekening Asal</label>
                                  <input  placeholder="Rekening Asal" type="text" name="no_rek_asal" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Nama Bank Tujuan</label>
                                  <input placeholder="Bank Tujuan"  type="text" name="bank_tujuan" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Nomor Rekening Tujuan</label>
                                  <input  placeholder="Rekening Tujuan" type="text" name="no_rek_tujuan" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Tanggal</label>
                                   <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                                </div> 
                                <div class="form-group">
                                  <label>Jumlah Pembayaran</label>
                                  <input  placeholder="Jumlah Pembayaran" type="text" name="tanggal" class="form-control">
                                </div>
                               
                                
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-success">Input</button>
                             
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- end input pembayaran -->