<!-- views/admin/data_barang -->

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3"> 
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_barang">
            <i class="fas fa-plus fa-sm"></i> Tambah Barang
        </button>

        <form action="<?= base_url('admin/data_barang/filter_barang') ?>" method="get" class="form-inline"> 
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="filter_stok">Filter Stok:</label>
                </div>
                <select name="filter_stok" id="filter_stok" class="form-control">
                    <option value="all">Semua</option>
                    <option value="0" <?php if (isset($_GET['filter_stok']) && $_GET['filter_stok'] == 0) echo 'selected'; ?>>Stok Kosong</option>
                    <option value="3" <?php if (isset($_GET['filter_stok']) && $_GET['filter_stok'] == 3) echo 'selected'; ?>>Stok Terbatas</option>
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <form action="<?= base_url('admin/data_barang/search_barang') ?>" method="get" class="form-inline">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Cari barang...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Cari</button>
                </div>
            </div>
        </form>
        
    </div>


    <table class="table table-bordered table-hove table-striped">
        <tr>
            <th>NO</th>
            <th>GAMBAR</th>
            <th>NAMA BARANG</th>
            <th>KETERANGAN SPESFIKASI</th>
            <th>KATEGORI</th>
            <th>HARGA</th>
            <th>STOK</th>
            <th colspan="3">AKSI</th>
        </tr>
        
        <?php
        $no=1; 
        foreach($barang as $brg) : ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><img src="<?php echo base_url() . '/uploads/' . $brg->gambar ?>" width="100px"></td>
            <td><?php echo $brg->nama_brg ?></td>
            <td><?php echo $brg->keterangan ?></td>
            <td><?php echo $brg->kategori ?></td>
            <td><?php echo $brg->harga ?></td>
            <td><?php echo $brg->stok ?></td>
            <td><?php echo anchor('admin/data_barang/detail/' .$brg->id_brg,'<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i> Detail</div>') ?></td>
            <td><?php echo anchor('admin/data_barang/edit/' .$brg->id_brg, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</div>') ?></td>
            <td><?php echo anchor('admin/data_barang/hapus/' .$brg->id_brg, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</div>') ?></td>

        </tr>
        <?php endforeach; ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT PRODUK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/data_barang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control">
            </div>

            <div class="form-group">
                <label>Keterangan Spesifikasi</label>
                <textarea name="keterangan" class="form-control" rows="5"></textarea>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori">
                    <option>laptop</option>
                    <option>komponen pc</option>
                    <option>aksesoris</option>
                    <option>konsol game</option>
                </select>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control">
            </div>


            <div class="form-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control">
            </div>

            <div class="form-group">
                <label>Gambar Produk</label><br>
                <input type="file" name="gambar" class="form-control">
            </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>