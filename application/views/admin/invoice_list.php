<div class="container-fluid">
    <h4>Daftar Invoice</h4>

    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>ID Invoice</th>
                <th>Nama Pemesan</th>
                <th>Alamat</th>
                <th>Tanggal Pemesanan</th>
                <th>Batas Bayar</th>
                <th>Bukti Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($invoice): ?>
                <?php foreach ($invoice as $inv): ?>
                    <tr>
                        <td><?= $inv->id ?></td>
                        <td><?= $inv->nama ?></td>
                        <td><?= $inv->alamat ?></td>
                        <td><?= $inv->tgl_pesan ?></td>
                        <td><?= $inv->batas_bayar ?></td>
                        <td>
                            <?php if ($inv->bukti_pembayaran): ?>
                                <a href="<?= base_url('uploads/bukti/' . $inv->bukti_pembayaran); ?>" target="_blank">Lihat</a>
                            <?php else: ?>
                                <span class="text-danger">Belum Diupload</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/invoice/detail/' . $inv->id); ?>" class="btn btn-sm btn-primary">Detail</a>

                            <?php if ($inv->bukti_pembayaran): ?>
                                <a href="<?= base_url('admin/invoice/konfirmasi/' . $inv->id); ?>" class="btn btn-sm btn-success">Konfirmasi</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Belum ada invoice yang masuk.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
