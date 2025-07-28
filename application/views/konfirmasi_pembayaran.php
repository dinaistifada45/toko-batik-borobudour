<div class="container-fluid">
    <div class="card mx-auto" style="max-width: 600px; margin-top: 20px;">
        <div class="card-header bg-primary text-white">
            Konfirmasi Pembayaran
        </div>
        <div class="card-body">

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

                <button type="submit" class="btn btn-success mt-3">Upload Bukti</button>
            </form>
        </div>
    </div>
</div>
