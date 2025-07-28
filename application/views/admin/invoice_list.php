<div class="container mt-4">
    <h3>Daftar Invoice</h3>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Bukti</th>
                <th>Status Bayar</th>
                <th>Status Kirim</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoice as $inv) : ?>
                <tr>
                    <td><?= $inv->nama ?></td>
                    <td>
                        <?php if ($inv->bukti_pembayaran) : ?>
                            <img src="<?= base_url('uploads/' . $inv->bukti_pembayaran) ?>" width="100">
                        <?php else : ?>
                            <span class="text-danger">Belum Upload</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $inv->status_pembayaran ?? 'Menunggu Konfirmasi' ?></td>
                    <td>
                        <form method="post" action="<?= base_url('admin/invoice/ubah_status/' . $inv->id) ?>">
                            <select name="status_pengiriman" class="form-control">
                                <option <?= $inv->status_pengiriman == 'Belum Dikirim' ? 'selected' : '' ?>>Belum Dikirim</option>
                                <option <?= $inv->status_pengiriman == 'Sudah Dikirim' ? 'selected' : '' ?>>Sudah Dikirim</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary mt-1">Update</button>
                        </form>
                    </td>
                    <td>
                        <?php if ($inv->bukti_pembayaran && $inv->status_pembayaran != 'Dikonfirmasi') : ?>
                            <a href="<?= base_url('admin/invoice/konfirmasi/' . $inv->id) ?>" class="btn btn-sm btn-success">Konfirmasi</a>
                        <?php else : ?>
                            <span class="badge badge-success">OK</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
