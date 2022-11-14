<div id="laporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Laporan Pembayaran</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <form method="POST" action="aksi/cetak-laporan-pembayaran.php">
                          <div class="modal-body">
                           <!--  <div class="form-group">
                              <label>Filter Sesuai Jadwal Keberangkatan</label>
                              <select class="form-control">
                                <option>Semua Jadwal</option>
                                <?php 
                                  $jadwal=mysqli_query($koneksi,"SELECT * FROM tb_jadwal ORDER BY tgl_berangkat ASC");
                                  foreach ($jadwal as $dt_jadwal) {
                                    
                                  
                                 ?>
                                 <option value="<?= $dt_jadwal['id']  ?>">Tangga: <?= $dt_jadwal['tgl_berangkat']  ?></option>
                                <?php } ?>
                              </select>
                            </div> -->
                            <div class="form-group">
                              <label>Pilih Tahun</label>
                              <select name="tahun" class="form-control">
                                <option>Pilih</option>
                                <?php 
                                  $tahun=date('Y');
                                  echo "$tahun";
                                  for ($i=$tahun; $i >= 2018 ; $i--) {
                                  
                                 ?>
                                <option value="<?= $i;  ?>"><?= $i;  ?></option>
                              <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Bulan</label>
                              <select class="form-control" name="bulan">
                                <option value="01">January</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
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