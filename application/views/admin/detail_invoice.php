<div class="container-fluid">
    <h4>
        Detail Pesanan 
        <span class="btn btn-sm btn-success">No. Invoice: <?= htmlspecialchars($invoice->id) ?></span>
    </h4>

    <table class="table table-bordered table-hover table-striped mt-3">
        <thead>
            <tr>
                <th>ID BARANG</th>
                <th>NAMA PRODUK</th>
                <th>JUMLAH PESANAN</th>
                <th>HARGA SATUAN</th>
                <th>SUB-TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($pesanan as $psn): 
                $subtotal = $psn->jumlah * $psn->harga;
                $total += $subtotal;
            ?>
                <tr>
                    <td><?= htmlspecialchars($psn->id_brg) ?></td>
                    <td><?= htmlspecialchars($psn->nama_brg) ?></td>
                    <td><?= htmlspecialchars($psn->jumlah) ?></td>
                    <td>Rp. <?= number_format($psn->harga, 0, ',', '.') ?></td>
                    <td>Rp. <?= number_format($subtotal, 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4" class="text-right"><strong>Grand Total</strong></td>
                <td><strong>Rp. <?= number_format($total, 0, ',', '.') ?></strong></td>
            </tr>
        </tbody>
    </table>

    <a href="<?= base_url('admin/invoice/index') ?>" class="btn btn-sm btn-primary">Kembali</a>
</div>
