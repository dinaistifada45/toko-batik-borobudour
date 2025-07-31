<div class="container-fluid">
    <h4>Daftar Invoice</h4>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php elseif ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>ID Invoice</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tgl Pesan</th>
                <th>Batas Bayar</th>
                <th>Status Pengiriman</th>
                <th>Bukti</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($invoice): foreach ($invoice as $inv): ?>
                <tr>
                    <td><?= $inv->id ?></td>
                    <td><?= $inv->nama ?></td>
                    <td><?= $inv->alamat ?></td>
                    <td><?= $inv->tgl_pesan ?></td>
                    <td><?= $inv->batas_bayar ?></td>
                    <td>
<form method="post" action="<?= base_url('admin/invoice/ubah_status') ?>">
    <input type="hidden" name="id_invoice" value="<?= $inv->id ?>">
    <select name="status_pengiriman" class="form-control form-control-sm" onchange="this.form.submit()">
        <option value="Belum Dikirim" <?= $inv->status_pengiriman == 'Belum Dikirim' ? 'selected' : '' ?>>Belum Dikirim</option>
        <option value="Sudah Dikirim" <?= $inv->status_pengiriman == 'Sudah Dikirim' ? 'selected' : '' ?>>Sudah Dikirim</option>
    </select>
</form>

                    </td>
                    <td>
                        <?php if (!empty($inv->bukti_pembayaran)): ?>
                            <img src="<?= base_url('uploads/bukti/' . $inv->bukti_pembayaran); ?>" width="100" class="img-thumbnail">
                        <?php else: ?>
                            <span class="text-danger">Belum Diupload</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/invoice/detail/' . $inv->id); ?>" class="btn btn-sm btn-info">Detail</a>
                        <?php if (!empty($inv->bukti_pembayaran)): ?>
                            <a href="<?= base_url('admin/invoice/konfirmasi/' . $inv->id); ?>" class="btn btn-sm btn-success mt-1">Konfirmasi</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; else: ?>
                <tr><td colspan="8" class="text-center">Tidak ada data invoice.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
