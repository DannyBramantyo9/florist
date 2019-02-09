<!DOCTYPE html>
<html>
<head>
    <title>DriCo-Tech | Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="<?= base_url();?>https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url()?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url()?>assets/img/favicon.png">
    <style>
        body {
            background-image: url('<?= base_url()?>assets/img/pinkrose.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            color:#d6d5da;

        }
        form {
            margin-left:15%;
            margin-right:15%;
        }
        .auth-box {
            background-color: rgba(39, 28, 31, 0.5);
        }

    </style>
</head>
    <body>
    <div id="wrapper" style="margin-top:7%;">
                <div class="auth-box" style="height:500px;">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center"><h1>Florist</h1></div>
                                    <p class="lead">Login to your account</p>
                                </div>
                                <form id="form_login" method="post" action="<?=base_url('index.php/User/proses_login')?>">
                                    <div class="form-group">
                                        <label for="signin-username" class="control-label sr-only">Username</label>
                                        <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-password" class="control-label sr-only">Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>

                                    <input name="login" type="submit" class="btn btn-primary btn-lg btn-block" style="background-color:rgba(39, 28, 31, 1); border: 0" value="LOGIN">

                                    <?php
                                        if($this->session->flashdata('pesan')!= null)
                                        {
                                            echo"<div class='alert alert-danger' style='width:300px'>".$this->session->flashdata('pesan')."</div";
                                        }
                                    ?>
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
