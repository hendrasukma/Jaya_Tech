<div class="container-fluid">
    <h4>Laporan Penghasilan Bulanan Tahun <?= $tahun_filter ?></h4>

    <form action="<?= base_url('admin/laporan/bulanan') ?>" method="get" class="form-inline">
        <div class="input-group mt-2">
            <div class="input-group-prepend">
                <label class="input-group-text" for="tahun">Tahun:</label>
            </div>
            <select name="tahun" id="tahun" class="form-control">
                <?php for ($i = date('Y'); $i >= 2020; $i--): ?>
                    <option value="<?= $i ?>" <?php if ($tahun_filter == $i) echo 'selected'; ?>><?= $i ?></option>
                <?php endfor; ?>
            </select>
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <div class="mt-3">
            <button class="btn btn-danger" onclick="preparePrint()">
            <i class="fas fa-print"></i> Cetak Laporan
        </button>

    </div>

    <table class="table table-bordered table-striped mt-3" id="laporanTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Total Penghasilan (Rp)</th>
                <th>Aksi</th> </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i <= 12; $i++): 
                $bulan = date('F', mktime(0, 0, 0, $i, 1));
                $penghasilan = isset($laporan_bulanan[$i]) ? $laporan_bulanan[$i]->penghasilan : 0;
            ?>
                <tr>
                    <td><?= $bulan ?></td>
                    <td>Rp <?= number_format($penghasilan, 0, ',', '.') ?></td>
                    <td>
                        <?php if ($penghasilan > 0): ?>
                            <a href="<?= base_url('admin/laporan/detail_bulanan/' . $tahun_filter . '/' . $i) ?>" class="btn btn-sm btn-success">
                                Lihat Invoice Bulan Ini
                            </a>
                        <?php else: ?>
                            Tidak Ada Data Untuk Bulan Ini
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <script>
        function preparePrint() {
            // Sembunyikan elemen-elemen yang tidak ingin dicetak
            var elementsToHide = document.querySelectorAll('.container-fluid > *:not(#laporanTable), #accordionSidebar');
            elementsToHide.forEach(function(element) {
                element.style.display = 'none';
            });

            // Cetak halaman
            window.print();

            // Tampilkan kembali elemen-elemen yang disembunyikan (setelah selesai mencetak)
            elementsToHide.forEach(function(element) {
                element.style.display = ''; // Kembalikan ke tampilan awal
            });
        }
    </script>



</div>
