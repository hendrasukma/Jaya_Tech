<div class="container-fluid px-5 mx-auto">
    <div class="row text-center mt-4 mr-7 row-cols-1 row-cols-md-4 g-4">
        <?php if (!empty($barang)): ?>
            <?php foreach ($barang as $brg): ?>
                <div class="col-md-3 mb-2 d-flex align-items-stretch">
                <div class="card ml-3 mb-3" style="width: 100%;">
                    <img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title mb-1"><?php echo $brg->nama_brg ?></h5>
                        <div class="mt-auto"> <!-- Membungkus elemen dari harga dan tombol -->
                            <h5 class="text-success"><strong>Rp<?php echo number_format($brg->harga, 0,',','.') ?></strong></h5>
                            <div class="mt-3">
                                <?php if ($brg->stok > 0) : ?>
                                    <?php echo anchor('dashboard/tambah_ke_keranjang/' .$brg->id_brg, '<div class="btn btn-sm btn-success">Tambah ke Keranjang</div>') ?>
                                <?php else : ?>
                                    <div class="btn btn-sm btn-danger">Stok Habis</div>
                                <?php endif; ?>
                                <?php echo anchor('dashboard/detail/' .$brg->id_brg, '<div class="btn btn-sm btn-dark">Detail</div>') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Tidak ada hasil pencarian.</p>
        <?php endif; ?>
    </div>
</div>
