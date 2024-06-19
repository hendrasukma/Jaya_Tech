<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div id="first">
          <div class="myform form">
            <div class="logo mb-3">
              <div class="text-center">
                <h1>Login</h1>
              </div>
            </div>
            <?php echo $this->session->flashdata('pesan') ?>
            <form method="post" action="<?php echo base_url('auth/login') ?>" class="user">
              <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp"
                placeholder="Masukkan Username..." name="username">
                <?php echo form_error('username','<div class="text-danger small ml-2">','</div>'); ?>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                    placeholder="Masukkan Password..." name="password">
                  <div class="input-group-append">
                    <span class="input-group-text" id="togglePassword">
                      <i class="fa fa-eye-slash" aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
                <?php echo form_error('password','<div class="text-danger small ml-2">','</div>'); ?>
              </div>
              
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-block mybtn btn-primary tx-tfm">Login</button>
              </div>
              
              
              <div class="form-group mt-3">
                <p class="text-center" >Belum Punya Akun? <a href="<?php echo base_url('registrasi/index') ?>">Daftar Di Sini</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <style>
    body {
      padding-top: 4.2rem;
      padding-bottom: 4.2rem;
      background-color: #ffffff; /* background color changed to white */
    }
    a {
      text-decoration: none !important;
    }
    h1, h2, h3 {
      font-family: 'Kaushan Script', cursive;
    }
    .myform {
      position: relative;
      display: flex;
      flex-direction: column;
      padding: 2rem;
      background-color: #fff;
      border: 1px solid rgba(0, 0, 0, .2);
      border-radius: 1.1rem;
      max-width: 500px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .tx-tfm {
      text-transform: uppercase;
    }
    .mybtn {
      border-radius: 50px;
    }
    .login-or {
      position: relative;
      color: #aaa;
      margin: 10px 0;
      text-align: center;
    }
    .span-or {
      display: block;
      position: relative;
      z-index: 1;
      background-color: #fff;
      padding: 0 10px;
      margin: 0 auto;
    }
    .hr-or {
      border: none;
      border-top: 1px solid #ccc;
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .google {
      color: #666;
      width: 100%;
      height: 40px;
      text-align: center;
      outline: none;
      border: 1px solid lightgrey;
    }
    form .error {
      color: #ff0000;
    }
  </style>
  
  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#exampleInputPassword');

    togglePassword.addEventListener('click', function (e) {
      // toggle the type attribute
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      // toggle icon
      this.querySelector('i').classList.toggle('fa-eye-slash');
      this.querySelector('i').classList.toggle('fa-eye');
    });
  </script>
