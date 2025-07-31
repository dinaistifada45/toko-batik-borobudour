<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>

        <div class="col-md-8">
            <?php
            $grand_total = 0;
            if ($keranjang = $this->cart->contents()) {
                foreach ($keranjang as $item) {
                    $grand_total += $item['subtotal'];
                }
            ?>
                <div class="btn btn-sm btn-success mb-3">
                    <h4>Total Belanja Anda: Rp. <?= number_format($grand_total, 0, ',', '.') ?></h4>
                </div>

                <h3>Input Alamat Pengiriman dan Pembayaran</h3>

                <form method="post" action="<?= base_url('dashboard/proses_pesanan') ?>">

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea name="alamat" placeholder="Alamat Lengkap Anda" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" name="no_telp" placeholder="Nomor Telepon Anda" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Jasa Pengiriman</label>
                        <select class="form-control" name="jasa_pengiriman" required>
                            <option value="JNE">JNE</option>
                            <option value="JNT">JNT</option>
                            <option value="NINJA">NINJA</option>
                            <option value="WAHANA">WAHANA</option>
                            <option value="Si Cepat">Si Cepat</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pilih Bank (Transfer Ke Nomor Rekening Berikut):</label>
                        <select class="form-control" name="bank" id="bank-select" required onchange="updateRekening()">
                            <option value="">-- Pilih Bank --</option>
                            <option value="BCA">BCA - 1234567890 a.n. Toko Batik</option>
                            <option value="BNI">BNI - 9876543210 a.n. Toko Batik</option>
                            <option value="BRI">BRI - 5558882221 a.n. Toko Batik</option>
                            <option value="BSI">BSI - 1122334455 a.n. Toko Batik</option>
                        </select>
                    </div>

                    <div class="form-group" id="rekening-info" style="display:none;">
                        <label>Nomor Rekening Tujuan:</label>
                        <p id="rekening-text" class="text-info font-weight-bold"></p>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>
                </form>

            <?php } else { ?>
                <h4>Keranjang Belanja Anda Masih Kosong</h4>
            <?php } ?>
        </div>

        <div class="col-md-2"></div>
    </div>
</div>

<script>
function updateRekening() {
    const bank = document.getElementById('bank-select').value;
    const rekeningInfo = document.getElementById('rekening-info');
    const rekeningText = document.getElementById('rekening-text');

    let teks = '';

    switch (bank) {
        case 'BCA':
            teks = 'BCA - 1234567890 a.n. Toko Batik';
            break;
        case 'BNI':
            teks = 'BNI - 9876543210 a.n. Toko Batik';
            break;
        case 'BRI':
            teks = 'BRI - 5558882221 a.n. Toko Batik';
            break;
        case 'BSI':
            teks = 'BSI - 1122334455 a.n. Toko Batik';
            break;
        default:
            teks = '';
    }

    if (teks !== '') {
        rekeningInfo.style.display = 'block';
        rekeningText.innerText = teks;
    } else {
        rekeningInfo.style.display = 'none';
        rekeningText.innerText = '';
    }
}
</script>
