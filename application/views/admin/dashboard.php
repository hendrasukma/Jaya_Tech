<div class="container-fluid ml-3 mr-3">
<div class="row mr-3">
    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Total Penghasilan Bulan Ini
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $total_income = 0;
                foreach ($monthly_income as $income) {
                  $total_income += $income->income;
                }
                echo "Rp" . number_format($total_income, 0, ',', '.');
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                <?php echo anchor('admin/akun', 'Jumlah Akun Customer'); ?>
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php echo $total_customers; ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
              <?php echo anchor('admin/data_barang', 'Jumlah Stok Kosong'); ?>
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php echo $out_of_stock_count; ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                <?php echo anchor('admin/invoice', 'Pesanan Yang Sedang Diproses'); ?>
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php echo $processing_orders_count; ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-8 col-lg-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Total Penghasilan Bulanan</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
          </div>
          <hr>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Bulan</th>
                <th>Penghasilan (Rp)</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($monthly_income as $income): ?>
                <tr>
                  <td><?= date('F', mktime(0, 0, 0, $income->month, 1)) ?></td>
                  <td><?= number_format($income->income, 0, ',', '.') ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>          
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Ambil data dari PHP
    var labels = <?php echo json_encode(array_column($monthly_income, 'month')); ?>;
    var data = <?php echo json_encode(array_column($monthly_income, 'income')); ?>;
    // Konversi bulan ke nama bulan
    labels = labels.map(month => new Date(0, month - 1).toLocaleString('default', { month: 'long' }));
    // Konfigurasi chart
    const ctx = document.getElementById('myAreaChart');
    new Chart(ctx, {
      type: 'bar', // Ubah tipe chart menjadi 'bar'
      data: {
        labels: labels,
        datasets: [{
          label: 'Penghasilan (Rp)',
          data: data,
          backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang batang
          borderColor: 'rgb(75, 192, 192)', // Warna border batang
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value, index, values) {
                return 'Rp' + value.toLocaleString();
              }
            }
          }
        }
      }
    });
  </script>

  
</div>
