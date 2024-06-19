<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid mt-4">
        <h4>Ganti Password</h4>
        <?php echo validation_errors(); ?>
        <?php echo form_open('admin/akun/ganti_password/' . $akun['id']); ?>
        
        <div class="form-group">
            <label for="password">Password Baru</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        
        <div class="form-group">
            <label for="password_confirm">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm">
        </div>
        
        <button type="submit" class="btn btn-primary">Ganti Password</button>
        
        <?php echo form_close(); ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
<!-- views/admin/ganti_password-->
