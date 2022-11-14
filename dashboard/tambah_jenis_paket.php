<div id="jenis_paket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Tambah Jenis paket</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Isi jenis paket.</p>
                            <form  action="aksi/tambah_jenis_paket.php" method="post">
                              <div class="form-group">
                                <label>Jenis paket</label>
                                <input name="jenis" type="text" required="" placeholder="Jenis paket" class="form-control">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>