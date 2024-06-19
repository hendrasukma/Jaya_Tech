<div class="container-fluid">

    <div class="row text-center mt-4">

        <?php foreach ($aksesoris as $brg) : ?>

            <div class="card ml-3 mb-3" style="width: 16rem;">
                    <img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?php echo $brg->nama_brg ?></h5>
                        <h5>                        
                        <p class="text-success"><strong>Rp<?php echo number_format($brg->harga, 0,',','.') ?></strong></span>
                        </h5>
                        <?php echo anchor('dashboard/tambah_ke_keranjang/' .$brg->id_brg, '<div class="btn btn-sm btn-success">Tambah ke Keranjang</div>') ?>
                        <?php echo anchor('dashboard/detail/' .$brg->id_brg, '<div class="btn btn-sm btn-dark">Detail</div>') ?>
                    </div>
                    </div>

        <?php endforeach; ?>

    </div>
</div>