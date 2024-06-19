<!-- views/admin/akun -->
<div class="container-fluid">
    <h4>Daftar Akun</h4>

    <form action="<?= base_url('admin/akun/search') ?>" method="get">
        <div class="input-group mb-3">
            <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan nama atau username...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>
    
    <table class="table table-bordered table-hove table-striped">
        <th>ID Akun</th>
        <th>Nama Pengguna</th>
        <th>Username Akun</th>
        <th>Password</th>
        <th>Role User</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($akun as $akn): ?>
    <tr>
            <td><?php echo $akn['id']; ?></td>
            <td><?php echo $akn['nama']; ?></td>
            <td><?php echo $akn['username']; ?></td>
            <td><?php echo $akn['password']; ?></td>
            <td>
                <?php 
                    if ($akn['role_id'] == 1) {
                        echo "Admin";
                    } elseif ($akn['role_id'] == 2) {
                        echo "Customer";
                    } else {
                        echo "Unknown Role";
                    }
                ?>
            </td>
            <td>
                <?php echo anchor('admin/akun/ganti_password/'.$akn['id'], '<div class="btn btn-sm btn-warning">Ganti Password</div>'); ?>
            </td>
    </tr>
    <?php endforeach; ?>
    </table>
</div>