<div class="container">
    <h2>Invoice Pemesanan</h2>

    <?php if ($invoice) : ?>
        <p><strong>Nama:</strong> <?= $invoice->nama; ?></p>
        <p><strong>Alamat:</strong> <?= $invoice->alamat; ?></p>
        <p><strong>No. Telp:</strong> <?= $invoice->no_telp; ?></p>
        <p><strong>Jasa Pengiriman:</strong> <?= $invoice->jasa_pengiriman; ?></p>
        <p><strong>Bank:</strong> <?= $invoice->bank; ?></p>
        <p><strong>Tanggal Pesan:</strong> <?= $invoice->tgl_pesan; ?></p>
        <p><strong>Batas Bayar:</strong> <?= $invoice->batas_bayar; ?></p>
        <hr>
        <h4>Detail Pesanan:</h4>

        <?php if ($pesanan && is_array($pesanan)) : ?>
            <table border="1" cellpadding="8" cellspacing="0">
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
                <?php 
                    $total = 0;
                    foreach ($pesanan as $psn) : 
                        $subtotal = $psn->jumlah * $psn->harga;
                        $total += $subtotal;
                ?>
                    <tr>
                        <td><?= $psn->nama_brg; ?></td>
                        <td><?= $psn->jumlah; ?></td>
                        <td>Rp <?= number_format($psn->harga, 0, ',', '.'); ?></td>
                        <td>Rp <?= number_format($subtotal, 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td><strong>Rp <?= number_format($total, 0, ',', '.'); ?></strong></td>
                </tr>
            </table>
        <?php else : ?>
            <p>Tidak ada pesanan untuk invoice ini.</p>
        <?php endif; ?>
    <?php else : ?>
        <p>Invoice tidak ditemukan.</p>
    <?php endif; ?>
</div>
