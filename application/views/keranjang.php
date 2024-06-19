<div class="container-fluid mt-3">
    <h4>Keranjang Belanja</h4>

    <?php if ($this->cart->total_items() == 0): ?>

        <div class="d-flex flex-column align-items-center justify-content-center vh-100">
            <p class="text-center display-4">Keranjang belanja Anda Kosong.</p>
            <a href="<?php echo base_url('welcome') ?>" class="btn btn-primary btn-lg mt-3">Lanjut Belanja</a>
        </div>
    <?php else: ?>

        <table class="table table-bordered table-striped table-hover mt-3">
            <tr>
                <th>NO</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Sub-total</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $no = 1;
            foreach ($this->cart->contents() as $items) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $items['name'] ?></td>
                    <td><?php echo $items['qty'] ?></td>
                    <td align="right">Rp<?php echo number_format($items['price'], 0,',','.') ?></td>
                    <td align="right">Rp<?php echo number_format($items['subtotal'], 0,',','.') ?></td>
                    <td class="text-center"> 
                        <a href="<?= base_url('dashboard/hapus_item_keranjang/' . $items['rowid']) ?>" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td colspan="5"></td>
                    <td align="right">Rp<?php echo number_format($this->cart->total(), 0,',','.') ?></td>
                </tr>
        </table>

        <div align="right">
            <a href="<?php echo base_url('dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>
            <a href="<?php echo base_url('welcome') ?>"><div class="btn btn-sm btn-primary">Lanjut Belanja</div></a>
            <a href="<?php echo base_url('dashboard/pembayaran') ?>"><div class="btn btn-sm btn-success">Pembayaran</div></a>
        </div>

    <?php endif; ?> 
</div> 
