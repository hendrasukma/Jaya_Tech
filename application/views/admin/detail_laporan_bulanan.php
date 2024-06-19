<div class="container-fluid">

    <h4>Invoice Bulan <?= date('F', mktime(0, 0, 0, $bulan, 1)) ?> <?= $tahun ?></h4>

    <table class="table table-bordered table-hover table-striped mt-3">
        <thead>
            <tr>
                <th>ID Invoice</th>
                <th>Nama Pemesan</th>
                <th>Tanggal Pemesanan</th>
                <th>Total Bayar</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoice as $inv): ?>
            <tr>
                <td><?= $inv->id ?></td>
                <td><?= $inv->nama ?></td>
                <td><?= $inv->tgl_pesan ?></td>
                <td>Rp <?= number_format($inv->total_bayar, 0, ',', '.') ?></td>
                <td><?= $inv->status_pembayaran ?></td>
                <td>
                    <a href="<?= base_url('admin/invoice/detail/' . $inv->id) ?>" class="btn btn-sm btn-success">
                        Detail Invoice
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="alert alert-warning">
        <p><strong>Catatan: Hanya Pesanan yang Telah Diproses yang Terhitung dalam Total Penghasilan Bulanan</p>
    </div>

    <div class="mt-3">
        <a href="<?= base_url('admin/laporan/bulanan?tahun=' . $tahun) ?>" class="btn btn-sm btn-dark">Kembali</a>
        <button class="btn btn-danger" onclick="preparePrint()"><i class="fas fa-print"></i> Cetak Laporan</button>
    </div>

    <script>
        function preparePrint() {
            // Sembunyikan elemen yang tidak ingin dicetak (misalnya tombol kembali)
            var elementsToHide = document.querySelectorAll('.container-fluid > *:not(table, h4), #accordionSidebar');
            elementsToHide.forEach(function(element) {
                element.style.display = 'none';
            });

            window.print();

            elementsToHide.forEach(function(element) {
                element.style.display = '';
            });
        }
    </script>
</div>
