<!DOCTYPE html>
<html>
<head>
    <title>Status Pembayaran</title>
</head>
<body>
    <div class="container-fluid mt-3">
        <h4>Status Pembayaran</h4>

        <form method="get" action="<?= base_url('history/payment_status') ?>">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <select name="sort" class="form-control">
                        <option value="desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'desc') echo 'selected'; ?>>Terbaru</option>
                        <option value="asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'asc') echo 'selected'; ?>>Terlama</option>
                    </select>
                </div>
                <div class="col-auto">
                    <select name="status" class="form-control">
                        <option value="">Semua Status</option>
                        <option value="Sedang diproses" <?php if (isset($_GET['status']) && $_GET['status'] == 'Sedang diproses') echo 'selected'; ?>>Sedang diproses</option>
                        <option value="Sudah Diproses dan Barang Sudah dikirim" <?php if (isset($_GET['status']) && $_GET['status'] == 'Sudah Diproses dan Barang Sudah dikirim') echo 'selected'; ?>>Sudah Diproses dan Barang Sudah dikirim</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-hover table-striped mt-3">
            <thead>
                <tr>
                    <th>ID Invoice</th>
                    <th>Nama Pemesan</th>
                    <th>Alamat Pengiriman</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Batas Pembayaran</th>
                    <th>Status Pembayaran</th>
                    <th>Bukti Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payment_status as $status): ?>
                <tr>
                    <td><?= $status->id ?></td>
                    <td><?= $status->nama ?></td>
                    <td><?= $status->alamat ?></td>
                    <td><?= $status->tgl_pesan ?></td>
                    <td><?= $status->batas_bayar ?></td>
                    <td><?= $status->status_pembayaran ?></td>
                    <td>
                        <?php if ($status->bukti_pembayaran): ?>
                            <a href="<?= base_url('uploads/'.$status->bukti_pembayaran) ?>" target="_blank">
                                Lihat File
                            </a>
                            <form action="<?= base_url('history/upload_bukti/'.$status->id) ?>" method="post" enctype="multipart/form-data">
                                <input type="file" name="bukti_pembayaran" required>
                                <button type="submit" class="btn btn-sm btn-danger mt-2">Upload Ulang</button>
                            </form>
                        <?php else: ?>
                            <form action="<?= base_url('history/upload_bukti/'.$status->id) ?>" method="post" enctype="multipart/form-data">
                                <input type="file" name="bukti_pembayaran" required>
                                <button type="submit" class="btn btn-sm btn-primary mt-1">Upload</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?> 

        <a href="<?= base_url('welcome/index') ?>" class="btn btn-sm btn-dark mt-3">Kembali ke Beranda</a>
        <a href="<?= base_url('history/invoice') ?>" class="btn btn-sm btn-success ml-3 mt-3">Ke Menu Invoice</a>
    </div>
</body>
</html>
