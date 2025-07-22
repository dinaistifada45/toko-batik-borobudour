<div class="container-fluid">
    <h4>Keranjang Belanja</h4>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
        </tr>

        <?php 
        $no = 1;
        foreach ($this->cart->contents() as $item) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['qty'] ?></td>
                <td align="right">Rp. <?= number_format($item['price'], 0, ',', '.') ?></td>
                <td align="right">Rp. <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <td colspan="4" align="right"><strong>Total</strong></td>
            <td align="right"><strong>Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></strong></td>
        </tr>
    </table>

    <div align="right" class="mb-3">
        <a href="<?= base_url('dashboard/hapus_keranjang') ?>" class="btn btn-sm btn-danger">Hapus Keranjang</a>
        <a href="<?= base_url('dashboard/index') ?>" class="btn btn-sm btn-primary">Lanjutkan Belanja</a>
        <a href="<?= base_url('dashboard/pembayaran') ?>" class="btn btn-sm btn-success">Pembayaran</a>
    </div>
</div>
