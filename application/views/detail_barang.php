<div class="container-fluid">
    <div class="card mt-5">
            <h5 class="card-header">Detail Produk</h5>
            <div class="card-body">
                <?php foreach($barang as $brg):  ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Nama Produk</td>
                                <td><strong><?php echo $brg->nama_brg ?></strong></td>
                            </tr>

                            <tr>
                                <td>Keterangan Spesifikasi</td>
                                <td><strong><?php echo nl2br($brg->keterangan); ?></strong></td>
                            </tr>

                            <tr>
                                <td>Kategori</td>
                                <td><strong><?php echo $brg->kategori ?></strong></td>
                            </tr>
                          
                            <tr>
                                <td>Stok</td>
                                <td><strong><?php echo $brg->stok ?></strong></td>
                            </tr>

                            <tr>
                                <td>Harga</td>
                                <td class="text-success"><strong>Rp<?php echo number_format($brg->harga,0,',','.') ?></strong></td>
                            </tr>
                        </table>
                        
                        <?php if ($brg->stok > 0) : ?>
                            <?php echo anchor('dashboard/tambah_ke_keranjang/' .$brg->id_brg, '<div class="btn btn-sm btn-success">Tambah ke Keranjang</div>') ?>
                        <?php else : ?>
                            <div class="btn btn-sm btn-danger">Stok Habis</div>
                        <?php endif; ?>
                        <?php echo anchor('welcome/index/', '<div class="btn btn-sm btn-dark">Kembali</div>') ?>

                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            </div>
</div>