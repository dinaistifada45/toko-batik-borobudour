<div class="container-fluid">
  <div class="row text-center mt-4">

    <?php if (!empty($pakaian_pria)) : ?>
      <?php foreach ($pakaian_pria as $brg) : ?>
        <div class="card ml-3 mb-3" style="width: 16rem;">
          <img src="<?php echo base_url('uploads/' . $brg->gambar); ?>" class="card-img-top" alt="<?= $brg->nama_brg ?>">
          <div class="card-body">
            <h5 class="card-title mb-1"><?php echo $brg->nama_brg; ?></h5>
            <small><?php echo $brg->keterangan; ?></small><br>
            <span class="badge badge-pill badge-success mb-3">
              Rp. <?php echo number_format($brg->harga, 0, ',', '.'); ?>
            </span><br>
            <?php echo anchor('dashboard/tambah_ke_keranjang/' . $brg->id_brg, '<div class="btn btn-sm btn-primary">Tambah Ke Keranjang</div>'); ?>
            <?php echo anchor('dashboard/detail/' . $brg->id_brg, '<div class="btn btn-sm btn-success">Detail</div>'); ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <div class="col-12 mt-5">
        <p class="text-center display-4 fw-bold text-primary">Barang tidak tersedia</p>
      </div>
    <?php endif; ?>

  </div>
</div>
