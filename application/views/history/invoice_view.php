<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices</title>
</head>
<body>
    <div class="container-fluid mt-3">
        <h4>Invoices</h4>

        <form method="get" action="<?= base_url('history/invoice') ?>">
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
            <tr>
                <th>ID Invoice</th>
                <th>Nama Pemesan</th>
                <th>Alamat Pengiriman</th>
                <th>Tanggal Pemesanan</th>
                <th>Batas Pembayaran</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>

            <?php foreach ($invoices as $invoice): ?>
            <tr>
                <td><?php echo $invoice->id ?></td>
                <td><?php echo $invoice->nama ?></td>
                <td><?php echo $invoice->alamat ?></td>
                <td><?php echo $invoice->tgl_pesan ?></td>
                <td><?php echo $invoice->batas_bayar ?></td>
                <td><?php echo $invoice->status_pembayaran ?></td>
                <td>
                    <?php echo anchor('history/invoice_detail/'.$invoice->id, '<div class="btn btn-sm btn-success">Detail</div>'); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php echo anchor('welcome/index/', '<div class="btn btn-sm btn-dark mt-3">Kembali ke Beranda</div>') ?>
        <?php echo anchor('history/payment_status/', '<div class="btn btn-sm btn-success ml-3 mt-3">KE MENU STATUS PEMBAYARAN</div>') ?>
    </div>
</body>
</html>
