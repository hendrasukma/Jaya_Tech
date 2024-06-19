<div class="container-fluid">
    <h4>Invoice & Update Status Pembayaran</h4>
    <div class="alert alert-warning">
            <p><strong>Catatan: Hanya Pesanan yang Telah Diproses yang Terhitung dalam Total Penghasilan Bulanan</p>
        </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="<?= base_url('admin/invoice/filter') ?>" method="get" class="form-inline">
            <div class="input-group mt-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="filter_status">Filter Status:</label>
                </div>
                <select name="filter_status" id="filter_status" class="form-control">
                    <option value="all">Semua</option>
                    <option value="sedang diproses" <?php if (isset($_GET['filter_status']) && $_GET['filter_status'] == 'sedang diproses') echo 'selected'; ?>>Sedang diproses</option>
                    <option value="sudah diproses" <?php if (isset($_GET['filter_status']) && $_GET['filter_status'] == 'sudah diproses') echo 'selected'; ?>>Sudah Diproses dan Barang Sudah dikirim</option>
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <form action="<?= base_url('admin/invoice/search_invoice') ?>" method="get" class="form-inline">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Cari invoice...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Cari</button>
                </div>
            </div>
        </form>
    </div>
    
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID Invoice</th>
            <th>Nama Pemesan</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
            <th>Status Pembayaran</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($invoice as $inv): ?>
        <tr>
            <td><?php echo $inv->id ?></td>
            <td><?php echo $inv->nama ?></td>
            <td><?php echo $inv->tgl_pesan ?></td>
            <td><?php echo $inv->batas_bayar ?></td>
            <td>
                <form action="<?php echo base_url('admin/invoice/update_status/'.$inv->id) ?>" method="post">
                    <select name="status_pembayaran" class="form-control mb-1">
                        <option value="Sedang diproses" <?php if($inv->status_pembayaran == 'Sedang diproses') echo 'selected'; ?>>Sedang diproses</option>
                        <option value="Sudah Diproses dan Barang Sudah dikirim" <?php if($inv->status_pembayaran == 'Sudah Diproses dan Barang Sudah dikirim') echo 'selected'; ?>>Sudah Diproses dan Barang Sudah dikirim</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-primary mt-2 mb-1">Update</button>
                </form>
            </td>
            <td>
                <?php echo anchor('admin/invoice/detail/'.$inv->id, '<div class="btn btn-sm btn-success">Detail</div>')?>
                <?php echo anchor('admin/invoice/delete/'.$inv->id, '<div class="btn btn-sm btn-danger">Hapus</div>', array('onclick' => "return confirm('Apakah Anda yakin ingin menghapus invoice ini?')"))?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<!-- views/admin/invoice-->
