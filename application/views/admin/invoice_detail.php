<div class="container-fluid">
    <h4>Detail Invoice <strong>#<?= $invoice->id ?></strong></h4>

    <!-- Notifikasi -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php elseif ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <table class="table">
        <tr>
            <th>Nama</th>
            <td><?= $invoice->nama ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?= $invoice->alamat ?></td>
        </tr>
        <tr>
            <th>No Telepon</th>
            <td><?= $invoice->no_telp ?></td>
        </tr>
        <tr>
            <th>Jasa Pengiriman</th>
            <td><?= $invoice->jasa_pengiriman ?></td>
        </tr>
        <tr>
            <th>Bank</th>
            <td><?= $invoice->bank ?></td>
        </tr>
        <tr>
            <th>Tanggal Pemesanan</th>
            <td><?= $invoice->tgl_pesan ?></td>
        </tr>
        <tr>
            <th>Batas Bayar</th>
            <td><?= $invoice->batas_bayar ?></td>
        </tr>
        <tr>
            <th>Status Pembayaran</th>
            <td><?= $invoice->status_pembayaran ?></td>
        </tr>
        <tr>
            <th>Bukti Pembayaran</th>
            <td>
                <?php if ($invoice->bukti_pembayaran): ?>
                    <img src="<?= base_url('uploads/bukti/' . $invoice->bukti_pembayaran) ?>" width="200" class="img-thumbnail">
                <?php else: ?>
                    <span class="text-danger">Belum Upload</span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Status Pengiriman</th>
            <td>
                <!-- Form Dropdown Status -->
                <form method="post" action="<?= base_url('admin/invoice/ubah_status') ?>" class="form-inline">
                    <input type="hidden" name="id_invoice" value="<?= $invoice->id ?>">
                    <select name="status_pengiriman" class="form-control form-control-sm d-inline w-auto mr-2">
                        <option value="Belum Dikirim" <?= $invoice->status_pengiriman == 'Belum Dikirim' ? 'selected' : '' ?>>Belum Dikirim</option>
                        <option value="Sudah Dikirim" <?= $invoice->status_pengiriman == 'Sudah Dikirim' ? 'selected' : '' ?>>Sudah Dikirim</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </form>
            </td>
        </tr>
    </table>

    <h5>Detail Pesanan</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pesanan as $psn): ?>
                <tr>
                    <td><?= $psn->nama_brg ?></td>
                    <td><?= $psn->jumlah ?></td>
                    <td>Rp<?= number_format($psn->harga, 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
