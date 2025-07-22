<div class="container-fluid">
    <h4 class="mb-4">Invoice Pemesanan Produk</h4>

    <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID Invoice</th>
                <th>Nama Pemesan</th>
                <th>Alamat Pengiriman</th>
                <th>Tanggal Pemesanan</th>
                <th>Batas Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($invoice)): ?>
                <?php foreach ($invoice as $inv): ?>
                    <tr>
                        <td><?= htmlspecialchars($inv->id) ?></td>
                        <td><?= htmlspecialchars($inv->nama) ?></td>
                        <td><?= htmlspecialchars($inv->alamat) ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($inv->tgl_pesan)) ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($inv->batas_bayar)) ?></td>
                        <td>
                            <?= anchor('admin/invoice/detail/' . $inv->id, 
                                '<div class="btn btn-sm btn-primary">Detail</div>') ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data invoice.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
