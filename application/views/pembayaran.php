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
                        <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" name="no_telp" placeholder="Nomor Telepon Anda" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Jasa Pengiriman</label>
                        <select class="form-control" name="jasa_pengiriman">
                            <option value="JNE">JNE</option>
                            <option value="JNT">JNT</option>
                            <option value="NINJA">NINJA</option>
                            <option value="WAHANA">WAHANA</option>
                            <option value="Si Cepat">Si Cepat</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pilih Bank</label>
                        <select class="form-control" name="bank">
                            <option value="BCA">BCA - XXXXXXX</option>
                            <option value="BNI">BNI - XXXXXXX</option>
                            <option value="BRI">BRI - XXXXXXX</option>
                            <option value="BSI">BSI - XXXXXXX</option>
                        </select>
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
