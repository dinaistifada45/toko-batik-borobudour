<div class="container-fluid">

    <!-- Tombol Tambah Barang -->
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang">
        <i class="fas fa-plus fa-sm"></i> Tambah Barang
    </button>

    <!-- Tabel Barang -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA BARANG</th>
                <th>KETERANGAN</th>
                <th>KATEGORI</th>
                <th>HARGA</th>
                <th>STOK</th>
                <th colspan="2">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($barang as $brg) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $brg->nama_brg ?></td>
                    <td><?= $brg->keterangan ?></td>
                    <td><?= $brg->kategori ?></td>
                    <td>Rp. <?= number_format($brg->harga, 0, ',', '.') ?></td>
                    <td><?= $brg->stok ?></td>
                    <!-- <td>
                        <div class="btn btn-success btn-sm">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </td> -->
                    <td>
                        <button 
                            class="btn btn-primary btn-sm" 
                            data-toggle="modal" 
                            data-target="#edit_barang<?= $brg->id_brg ?>">
                            <i class="fa fa-edit"></i>
                        </button>
                    </td>
                    <td>
                        <?= anchor('admin/data_barang/hapus/' . $brg->id_brg,
                            '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Barang -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= base_url('admin/data_barang/tambah_aksi') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">FORM INPUT PRODUK</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" name="nama_brg" class="form-control" required>
          </div>

          <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="keterangan" class="form-control" required>
          </div>

          <div class="form-group">
              <label>Kategori</label>
              <select class="form-control" name="kategori" required>
                  <option>Pakaian Pria</option>
                  <option>Pakaian Wanita</option>
                  <option>Pakaian Anak-anak</option>
              </select>
          </div>

          <div class="form-group">
              <label>Harga</label>
              <input type="number" name="harga" class="form-control" required>
          </div>

          <div class="form-group">
              <label>Stok</label>
              <input type="number" name="stok" class="form-control" required>
          </div>

          <div class="form-group">
              <label>Gambar Produk</label>
              <input type="file" name="gambar" class="form-control">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit Barang -->
<?php foreach ($barang as $brg): ?>
<div class="modal fade" id="edit_barang<?= $brg->id_brg ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $brg->id_brg ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= base_url('admin/data_barang/update') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="editModalLabel<?= $brg->id_brg ?>">Edit Data Barang</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="id_brg" value="<?= $brg->id_brg ?>">
          <input type="hidden" name="gambar_lama" value="<?= $brg->gambar ?>">

          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_brg" class="form-control" value="<?= $brg->nama_brg ?>" required>
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="<?= $brg->keterangan ?>" required>
          </div>

          <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
              <option value="Pakaian Pria" <?= $brg->kategori == 'Pakaian Pria' ? 'selected' : '' ?>>Pakaian Pria</option>
              <option value="Pakaian Wanita" <?= $brg->kategori == 'Pakaian Wanita' ? 'selected' : '' ?>>Pakaian Wanita</option>
              <option value="Pakaian Anak-anak" <?= $brg->kategori == 'Pakaian Anak-anak' ? 'selected' : '' ?>>Pakaian Anak-anak</option>
            </select>
          </div>

          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="<?= $brg->harga ?>" required>
          </div>

          <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="<?= $brg->stok ?>" required>
          </div>

          <div class="form-group">
            <label>Gambar Saat Ini</label><br>
            <img src="<?= base_url('uploads/' . $brg->gambar) ?>" width="100" class="mb-2">
            <input type="file" name="gambar" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>