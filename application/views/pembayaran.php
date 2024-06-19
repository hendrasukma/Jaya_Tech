<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success mt-4">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total += $item['subtotal'];
                    }
                    echo "<h4>Total Belanja Anda: Rp" . number_format($grand_total, 0, ',', '.') . "</h4>";
                ?>
            </div><br><br>

            <div class="alert alert-danger">
                <p><strong>Perhatian!</strong> Barang yang Sudah Anda Pesan <strong>TIDAK DAPAT DIBATALKAN/CANCEL!</strong> Terima Kasih.</p>
            </div>

            <h3>Input Alamat Pengiriman dan Pembayaran</h3>

            <form method="post" action="<?php echo base_url('dashboard/proses_pesanan'); ?>">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="no_telp" placeholder="Nomor Telepon Anda" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Jasa Pengiriman</label>
                    <select name="jasa_pengiriman" class="form-control" required>
                        <option value="JNE">JNE</option>
                        <option value="J&T">J&T</option>
                        <option value="SiCepat">SiCepat</option>
                        <option value="GOJEK">GOJEK</option>
                        <option value="GRAB">GRAB</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select name="metode_pembayaran" class="form-control" required>
                        <option value="BNI">BNI</option>
                        <option value="BRI">BRI</option>
                        <option value="BTN">BTN</option>
                        <option value="MANDIRI">MANDIRI</option>
                        <option value="BCA">BCA</option>
                        <option value="GOPAY">GOPAY</option>
                        <option value="OVO">OVO</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>No. Rekening atau No. GOPAY/OVO</label>
                    <input type="text" name="no_rekening" placeholder="No. Rekening atau No. GOPAY/OVO" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>
            </form>
            <?php 
                } else {
                    echo "<h4>Keranjang Belanja Anda Kosong</h4>";
                }
            ?>
        </div>

        <div class="col-md-2"></div>
    </div>
</div>
