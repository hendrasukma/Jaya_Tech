<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> EDIT DATA BARANG</h3>

    <form method="post" action="<?php echo base_url(). 'admin/data_barang/update' ?>" enctype="multipart/form-data">
        <input type="hidden" name="id_brg" class="form-control" value="<?php echo $barang->id_brg ?>"> 

        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_brg" class="form-control" value="<?php echo $barang->nama_brg ?>">
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="5"><?php echo $barang->keterangan ?></textarea> 
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" value="<?php echo $barang->kategori ?>">
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $barang->harga ?>">
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control" value="<?php echo $barang->stok ?>">
        </div>
       

        <div class="form-group">
            <label>Gambar Produk</label><br>
            <input type="file" name="gambar" class="form-control">
            <?php if($barang->gambar): ?>
                <img src="<?php echo base_url().'uploads/'.$barang->gambar ?>" width="100px">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>

    </form>
</div>
