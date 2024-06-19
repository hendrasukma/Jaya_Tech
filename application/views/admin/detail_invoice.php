<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Invoice</title>
    <script>
        function printInvoice() {
            var printContents = document.getElementById('printableArea').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</head>
<body>
    <div class="container-fluid mt-3">
        <h4>Detail Invoice</h4>
        <button class="btn btn-danger" onclick="printInvoice()"><i class="fa fa-print"></i> Print</button> 
        <div id="printableArea">
            <table class="table table-bordered table-hover table-striped mt-3">
                <tr>
                    <th>ID Invoice</th>
                    <td><?php echo $invoice->id; ?></td>
                </tr>
                <tr>
                    <th>Nama Pemesan</th>
                    <td><?php echo $invoice->nama; ?></td>
                </tr>
                <tr>
                    <th>Alamat Pengiriman</th>
                    <td><?php echo $invoice->alamat; ?></td>
                </tr>
                <tr>
                    <th>No. Telepon</th>
                    <td><?php echo $invoice->no_telp; ?></td>
                </tr>
                <tr>
                    <th>Jasa Pengiriman</th>
                    <td><?php echo $invoice->jasa_pengiriman; ?></td>
                </tr>
                <tr>
                    <th>Metode Pembayaran</th>
                    <td><?php echo $invoice->metode_pembayaran; ?></td>
                </tr>
                <tr>
                    <th>No. Rekening atau No. GOPAY/OVO</th>
                    <td><?php echo $invoice->no_rekening; ?></td>
                </tr>
                <tr>
                    <th>Tanggal Pemesanan</th>
                    <td><?php echo $invoice->tgl_pesan; ?></td>
                </tr>
                <tr>
                    <th>Batas Pembayaran</th>
                    <td><?php echo $invoice->batas_bayar; ?></td>
                </tr>
                <tr>
                    <th>Status Pembayaran</th>
                    <td><?php echo $invoice->status_pembayaran; ?></td>
                </tr>
                <tr>
                <th>Bukti Pembayaran</th>
                <td>
                    <?php if ($invoice->bukti_pembayaran): ?>
                        <a href="<?= base_url('uploads/'.$invoice->bukti_pembayaran) ?>" target="_blank">
                            Lihat File
                        </a>
                    <?php else: ?>
                        <p>Belum ada bukti pembayaran yang diupload.</p>
                    <?php endif; ?>
                </td>
            </tr>
            </table>

            <h4>Pesanan</h4>
            <table class="table table-bordered table-hover tabel-striped">
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Jumlah Pesanan</th>
                <th>Harga Satuan</th>
                <th>Sub Total</th>
            </tr>

            <?php
            $total = 0;
            foreach ($pesanan as $psn) : 
                $subtotal = $psn->jumlah * $psn->harga;
                $total += $subtotal;
            ?>

            <tr>
                <td><?php echo $psn->id_brg ?></td>
                <td><?php echo $psn->nama_brg ?></td>
                <td><?php echo $psn->jumlah ?></td>
                <td><?php echo number_format($psn->harga,0,',','.') ?></td>
                <td><?php echo number_format($subtotal,0,',','.') ?></td>
            </tr>

            <?php endforeach; ?>

            <tr>
                <td colspan="4" align="right">Total Harga Belanja</td>
                <td align="right">Rp<?php echo number_format($total,0,',','.') ?></td>
            </tr>
        </table>
        </div>
    </div>
</body>
</html>
<!-- views/admin/detail_invoice -->
