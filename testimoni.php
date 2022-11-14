<section id="gallery" class="portfolio section-bg">
      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
          <h2>Gallery</h2>
         
        </div>
        <div class="row portfolio-container" style="position: relative; height: 877.5px;">
        <?php 
        include"koneksi.php";
        $gallery=mysqli_query($koneksi,"SELECT * FROM tb_gallery ORDER BY id DESC");
        foreach ($gallery as $dt_gallery) {
          
        
         ?>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app" style="position: absolute; left: 0px; top: 0px;">
            <div class="portfolio-wrap">
              <img src="dashboard/gambar-gallery/<?= $dt_gallery['gambar']  ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                
                <div class="portfolio-links">
                  <a href="dashboard/gambar-gallery/<?= $dt_gallery['gambar']  ?>" data-gall="portfolioGallery" class="venobox vbox-item" title="Gallery Jamaah"><i class="icofont-eye"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>

         

        </div>

      </div>
    </section>