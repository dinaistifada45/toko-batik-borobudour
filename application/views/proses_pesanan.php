<div class="container-fluid">
    <div class="card mx-auto" style="max-width: 600px; margin-top: 20px;">
        <div class="card-header bg-success text-white">
            Pesanan berhasil!
        </div>
        <div class="card-body">
            <p>Silakan unggah bukti pembayaran agar pesanan segera diproses.</p>

            <p><strong>Transfer ke rekening:</strong><br>
            <?php if (isset($invoice->bank)) : ?>
                <?php if ($invoice->bank == 'BCA') : ?>
                    BCA - 1234567890 a/n Toko Batik Borobudour
                <?php elseif ($invoice->bank == 'BNI') : ?>
                    BNI - 9876543210 a/n Toko Batik Borobudour
                <?php elseif ($invoice->bank == 'BRI') : ?>
                    BRI - 1122334455 a/n Toko Batik Borobudour
                <?php elseif ($invoice->bank == 'BSI') : ?>
                    BSI - 5566778899 a/n Toko Batik Borobudour
                <?php else : ?>
                    <?= $invoice->bank ?>
                <?php endif; ?>
            <?php else : ?>
                Bank tidak diketahui
            <?php endif; ?>
            </p>

            <?php if ($this->session->flashdata('upload_error')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('upload_error') ?></div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('upload_success')): ?>
                <div class="alert alert-success"><?= $this->session->flashdata('upload_success') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('dashboard/upload_bukti') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="invoice_id" value="<?= $invoice->id ?>">

                <div class="form-group">
                    <label for="bukti">Upload Bukti Pembayaran (JPG/PNG, maks 2MB):</label>
                    <input type="file" name="bukti" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Kirim Bukti</button>
            </form>
        </div>
    </div>
</div>
