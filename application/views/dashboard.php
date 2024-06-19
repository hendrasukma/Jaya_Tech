<div class="container-fluid px-5 mx-auto">
    <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="<?php echo base_url('assets/img/s1.jpg') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="<?php echo base_url('assets/img/s2.jpg') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="<?php echo base_url('assets/img/s3-transformed.jpeg') ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="dropdown-divider mt-3"></div>

    <section class="s_text_block o_colored_level pb24 pt32 mt-5" data-snippet="s_text_block" style="background-image: none;" data-name="Custom Heading Title Cat. Index (2)">
        <div class="s_allow_columns container">
            <h1 style="text-align: center;">Kategori<br></h1>
            <h2 style="text-align: center;"> <br></h2>
        </div>
    </section>


    <section class="s_bcom_category o_colored_level mb-5" data-snippet="s_bcom_category" style="background-image: none;" data-name="Custom Category">
        <div class="container">
            <div class="inner-carousel">
                <div class="row justify-content-center track" style="transform: translateX(0px);">
                    <div class="col-6 col-md-3 item o_colored_level p-2 d-flex flex-column align-items-center">
                        <a href="<?php echo base_url('kategori/aksesoris')?>" class="link text-center" data-bs-original-title="" title="">
                        <i class="fa fa-solid fa-headphones fa-5x" style="color: green"></i>                            
                            <p class="o_default_snippet_text mt-2 mb-0">Aksesoris</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 item o_colored_level p-2 d-flex flex-column align-items-center">
                        <a href="<?php echo base_url('kategori/komponen_pc')?>" class="link text-center" data-bs-original-title="" title="">
                        <i class="fa fa-solid fa-microchip fa-5x" style="color: green"></i>                            
                            <p class="o_default_snippet_text mt-2 mb-0">Komponen PC</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 item o_colored_level p-2 d-flex flex-column align-items-center">
                        <a href="<?php echo base_url('kategori/laptop')?>" class="link text-center" data-bs-original-title="" title="">
                        <i class="fa fa-solid fa-laptop fa-5x" style="color: green"></i>
                            <p class="o_default_snippet_text mt-2 mb-0">Laptop</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 item o_colored_level p-2 d-flex flex-column align-items-center">
                        <a href="<?php echo base_url('kategori/konsol_game')?>" class="link text-center" data-bs-original-title="" title="">
                        <i class="fa fa-solid fa-gamepad fa-5x" style="color: green"></i>                            
                            <p class="o_default_snippet_text mt-2 mb-0">Konsol Game</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <div class="dropdown-divider"></div>

    <div class="row text-center mt-4 mr-7">
        <?php foreach ($barang as $brg) : ?>
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
    
    </div>

</div>
