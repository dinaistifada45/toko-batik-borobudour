<div class="container mt-4">
    <h3>Pesanan berhasil!</h3>
    <p>Silakan unggah bukti pembayaran agar pesanan segera diproses.</p>

    <form method="post" action="<?= base_url('dashboard/upload_bukti') ?>" enctype="multipart/form-data">
        <input type="hidden" name="invoice_id" value="<?= $invoice_id ?>">

        <div class="form-group">
            <label for="bukti">Upload Bukti Pembayaran (jpg/png)</label>
            <input type="file" name="bukti" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-2">Upload</button>
    </form>
</div>
