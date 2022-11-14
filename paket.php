<section style="margin-top: -70px;" class="counts section-bg">
      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
          <div class="section-title">
          <h2>Paket Haji & Umrah</h2>
        </div>
        <div class="row">
         
          <?php 
          function rupiah($angka) {
              $hasil_rupiah= "Rp " . number_format($angka,2,',','.');
              return $hasil_rupiah;
             }
             $id=md5('aistravel');
            $paket=mysqli_query($koneksi,"SELECT tb_paket.id_paket,upper(tb_paket.nm_paket) as nama,tb_paket.harga_quad,tb_paket.gambar,tb_paket.durasi,YEAR(tb_jadwal.tgl_berangkat) as tahun,monthname(tb_jadwal.tgl_berangkat) as bulan,day(tb_jadwal.tgl_berangkat) as hari FROM tb_paket JOIN tb_jadwal ON tb_paket.id_paket=tb_jadwal.id_paket   ORDER BY tb_paket.id_paket DESC");
            foreach ($paket as $data_paket) {
              
            
           ?>
          <div class="col-lg-4 col-md-6 text-center aos-init aos-animate" data-aos="fade-up">
            <div class="count-box">

               <a href="detail-paket&id=<?= $data_paket['id_paket'] ?>">
             <img    style="border-radius: 5%;"   src="dashboard/gambar-paket/<?= $data_paket['gambar']  ?>" width="100%" height="320px">
              <h5 style="color: #1c5c93; font-family: Open Sans, sans-serif;" align="left"><?= $data_paket['nama'] ?></h5>
              </a>
              <h6 align="left">Mulai Dari</h6>
              <h5 style="color: #1c5c93; font-family: Open Sans, sans-serif;" align="left">IDR <?= rupiah($data_paket['harga_quad'])  ?></h5>
              <button class="btn btn-danger"><p><?= $data_paket['bulan'] ?> <?= $data_paket['hari'] ?>, <?= $data_paket['tahun'] ?></p></button>
              
              <a class="btn btn-primary" href="detail-paket&id=<?= $data_paket['id_paket'] ?>">Detail</p></a>
             
            </div>
          </div> 

          <?php } ?>         
         <?php if (empty($data_paket)): ?>
           <h4 align="center">Tidak ada paket haji & umrah</h4>
         <?php endif ?>

         

        </div>

      </div>
    </section>