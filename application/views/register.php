<!DOCTYPE html>
<html>
<head>
    <title>DriCo-Tech | Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="<?= base_url();?>https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url();?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url();?>assets/img/favicon.png">
    <style>
        form {
            margin-left:20%;
            margin-right:20%;
        }
    </style>
</head>
    <body>
    <div id="wrapper" style="margin-top:4.5%;">
                <div class="auth-box" style="height:550px;">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center"><img src="<?= base_url();?>assets/img/logo-dark.png" alt="Klorofil Logo"></div>
                                    <p class="lead">Make your own account</p>
                                </div>
                                <form id="form_login" method="post" action="<?=base_url('index.php/user/simpan')?>">
                                    <div class="form-group">
                                        <label for="signin-username" class="control-label sr-only">Username</label>
                                        <input type="text" class="form-control" placeholder="Username" name="Username" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-password" class="control-label sr-only">Nama Lengkap</label>
                                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_user" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-username" class="control-label sr-only">Tanggal Lahir</label>
                                        <input type="date" class="form-control" placeholder="Year / Month / Day" name="tgl_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-username" class="control-label sr-only">Email</label>
                                        <input type="email" class="form-control" placeholder="example@gmail.com" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-password" class="control-label sr-only">Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="Password" required>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="fancy-checkbox element-left">
                                            <input type="checkbox" value="Kasir" name="divisi_bagian">
                                            <span>Saya menyetujui persyaratan sebagai Kasir></span>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">SUBMIT</button>
                                    <div class="bottom" style="text-align:center; margin-top:12px;">
                                    </div>
                                    <div class="registration">
                                    <a class="" href="<?=base_url('index.php/user')?>">
                                      Already have an account yet?<br/>
                                    </a>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
