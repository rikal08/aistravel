<section style="margin-top: -70px;" class="counts section-bg">
      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
          <div class="section-title">
          <h2>Jadwal Berangkat</h2>
        </div>
        <div class="row">

         <div class="col-lg-12 col-md-6 text-center aos-init aos-animate" data-aos="fade-up">
          <table id="exampl" class="display nowrap" style="width:70%">
        <thead>
            <tr>
               <th>Nomor</th>
                <th>Nama Paket</th>
                <th>Tanggal Berangkat</th>
                <th>Durasi</th>
                <th>Jumlah Penumpang</th>
                <th>Maksimal Penumpang</th>
                <th >Sisa Seat</th>
                <th></th>
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
                    <td></td>
                    <?php $no++; } ?>     
            </tbody>
            </table>
            </div>
        </div>
      </div>
    </section>