<!-- Top Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="<?php echo base_url('welcome')?>">
        <div class="sidebar-brand-text mx-3">JAYA TECH</div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            
            <!-- Dropdown Menu for Categories -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kategori
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url('kategori/laptop')?>"><i class="fa fa-solid fa-laptop"></i> Laptop</a>
                    <a class="dropdown-item" href="<?php echo base_url('kategori/komponen_pc')?>"><i class="fa fa-solid fa-microchip"></i> Komponen PC</a>
                    <a class="dropdown-item" href="<?php echo base_url('kategori/aksesoris')?>"><i class="fa fa-solid fa-headphones"></i> Aksesoris</a>
                    <a class="dropdown-item" href="<?php echo base_url('kategori/konsol_game')?>"><i class="fa fa-solid fa-gamepad"></i> Konsol Game</a>
                </div>
            </li>

            <!-- Dropdown Menu for Shopping History -->
            <?php if($this->session->userdata('username')) { ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="historyDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Histori Belanja
                </a>
                <div class="dropdown-menu" aria-labelledby="historyDropdown">
                    <a class="dropdown-item" href="<?php echo base_url('history/payment_status')?>">Status Pembayaran</a>
                    <a class="dropdown-item" href="<?php echo base_url('history/invoice')?>">Invoice</a>
                </div>
            </li>
            <?php } ?>
        </ul>
        
        <!-- Search Form -->
        <form class="form-inline my-2 my-lg-0" action="<?php echo base_url('welcome/search'); ?>" method="get">
    <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Cari..." aria-label="Search">
    <button class="btn btn-dark my-2 my-sm-0" type="submit"><i class="fas fa-search fa-sm"></i></button>
</form>
        
        <!-- Right Side of Navbar -->
        <div class="navbar">
            <ul class="nav navbar-nav navbar-right mr-3">
                <li>
                <?php 
                    $keranjang = '<i class="fas fa-shopping-cart"></i> : '.$this->cart->total_items(). ' items';
                ?>
                <?php echo anchor('dashboard/detail_keranjang', $keranjang) ?>
                </li>
            </ul>

            <div class="topbar-divider d-none d-sm-block"></div>

            <ul class="navbar-nav navbar-right d-flex align-items-center">
                <?php if($this->session->userdata('username')) { ?>
                    <li class="nav-item">
                        <span class="mr-2">Selamat Datang, <?php echo $this->session->userdata('username') ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" href="<?php echo base_url('auth/logout') ?>">Logout</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="btn btn-success" href="<?php echo base_url('auth/login') ?>">Login</a>
                    </li>
                <?php } ?>   
            </ul>
        </div>
    </div>
</nav>
