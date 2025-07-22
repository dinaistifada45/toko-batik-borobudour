<div class="container-fluid">

  <!-- STYLE UNTUK SLIDER -->
  <style>
    .carousel-inner {
      max-height: 300px;
    }

    .carousel-inner img {
      object-fit: cover;
      height: 300px;
    }

    .card-img-top {
      height: 250px; 
      object-fit: cover;
      
    }
  </style>

  <!-- SLIDER / CAROUSEL -->
  <div id="carouselExampleIndicators" class="carousel slide mb-4" data-bs-ride="carousel" data-bs-touch="true" data-bs-interval="3000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" 
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= base_url('assets/img/slider01.jpg'); ?>" class="class-img-top" alt="Slider 1">
      </div>
      <div class="carousel-item">
        <img src="<?= base_url('assets/img/slider02.jpg'); ?>" class="d-block w-100 img-fluid" alt="Slider 2">
      </div>
      <div class="carousel-item">
        <img src="<?= base_url('assets/img/slider03.jpg'); ?>" class="d-block w-100 img-fluid" alt="Slider 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- KARTU BARANG -->
  <div class="row text-center mt-4">
    <?php if (isset($barang)) : ?>
      <?php foreach ($barang as $brg) : ?>
        <div class="card ms-3 mb-3" style="width: 16rem; margin:35px!important;">
          <img src="<?= base_url('uploads/' . $brg->gambar); ?>" class="card-img-top" alt="<?= $brg->nama_brg ?>">
          <div class="card-body">
            <h5 class="card-title mb-1"><?= $brg->nama_brg ?></h5>
            <small><?= $brg->keterangan ?></small><br>
            <span class="badge rounded-pill bg-success mb-3">
              Rp. <?= number_format($brg->harga, 0, ',', '.'); ?>
            </span><br>

            <!-- TOMBOL -->
            <?= anchor('dashboard/tambah_ke_keranjang/' . $brg->id_brg, 'Tambah Ke Keranjang', ['class' => 'btn btn-sm btn-primary']) ?>
            <?= anchor('dashboard/detail/' . $brg->id_brg, 'Detail', ['class' => 'btn btn-sm btn-success']) ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <p class="text-center mt-5">Data barang tidak tersedia.</p>
    <?php endif; ?>
  </div>
</div>
