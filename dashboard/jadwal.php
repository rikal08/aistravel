<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Jadwal Keberangkatan</h6><br>
                    <button data-toggle="modal" data-target="#tambah_jadwal" class="btn btn-info"><i class="fa fa-plus"></i>Tambah Jadwal</button>
                    <?php include"tambah-jadwal.php" ?>
                  </div>
                  <div class="card-body">                           
                    <table id="exampl" class="table table-striped table-hover card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Paket</th>
                          <th>Tanggal Berangkat</th>
                          <th>Durasi</th>
                          <th>Jumlah Penumpang</th>
                          <th>Maksimal Penumpang</th>
                          <th>Sisa Seat</th>
                          <th>
                          	Aksi
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        include"koneksi.php";
                        $no=1;
                        $jadwal=mysqli_query($koneksi,"SELECT * FROM tb_jadwal ORDER BY id DESC");
                        foreach ($jadwal as $dt_jadwal) {
                         
                        
                       ?>
                        <tr>
                         <td><?= $no;  ?></td>
                         <?php 
                          $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket where id_paket=$dt_jadwal[id_paket]");
                          foreach ($paket as $dt_paket) {
                            # code...
                          }
                         ?>
                         <td><?= $dt_paket['nm_paket']  ?></td>
                         <td><?= $dt_jadwal['tgl_berangkat']  ?></td>
                         <td><?= $dt_paket['durasi']  ?> Hari</td>
                         <td><?= $dt_jadwal['jumlah_seat']  ?></td>
                         <td><?= $dt_jadwal['max_seat']  ?></td>
                         <td><?= $dt_jadwal['max_seat']-$dt_jadwal['jumlah_seat']  ?></td>
                         <td>
                         	<a class="btn btn-warning" href="" data-toggle="modal" data-target="#detail<?= $dt_jadwal['id']  ?>" class="btn btn-warning"><i class="fa fa-eye"></i>Lihat Agenda</a>
                         	<a href="hapus-jadwal&id=<?= $dt_jadwal['id']  ?>" class="btn btn-danger"><i class="fa fa-ban"></i>Hapus</a>
                         </td>
                        
                          
                        </tr>
                        <div id="detail<?= $dt_jadwal['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
	                      <div role="document" class="modal-dialog">
	                        <div class="modal-content">
	                          <div class="modal-header">
	                            <h4 id="exampleModalLabel" class="modal-title">Agenda Perjalanan</h4>
	                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
	                          </div>
	                          <div class="modal-body">
	                           
	                            <form action="" method="post" enctype="multipart/form-data">
	                             
	                              <div class="form-group">
	                               
	                                <h5 align="justify"><?= $dt_jadwal['agenda']  ?></h5>
	                              </div> 
	                          </div>
	                          <div class="modal-footer">
	                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
	                            
	                          </div>
                            </form>
                        </div>
                      </div>
                    </div>
                    <?php $no++; } ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
