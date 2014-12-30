<!DOCTYPE html>
<html lang="en" class="bg-gambar">

<head>
    <meta charset="utf-8" />
    <title>Ngalam Ipsum</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/app.v2.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/font.css" type="text/css" cache="false" />
    <!--[if lt IE 9]> <script src="<?php echo base_url();?>/assets/js/ie/html5shiv.js" cache="false"></script> <script src="<?php echo base_url();?>/assets/js/ie/respond.min.js" cache="false"></script> <script src="<?php echo base_url();?>/assets/js/ie/excanvas.js" cache="false"></script> <![endif]-->

    <script src="<?php echo base_url();?>/assets/js/app.v2.js"></script>
</head>

<body>
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
        <div class="container aside-xxl"> 
            <section class="panel panel-default bg-white m-t-lg">
                <header class="panel-heading text-center">
                    <h4>Ngalam Ipsum</h4> 
                </header>
                <form action="<?php echo site_url('login_cms');?>" id="lg-form" name="lg-form" method="post" class="panel-body wrapper-lg">
                    
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input autofocus type="text" name="username" id="username" placeholder="Username" class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control input-lg">
                    </div>
                    <div id="message"></div>
                    <!-- <div class="checkbox">
                        <label>
                            <input type="checkbox">Tetap Masuk</label>
                    </div> -->
                    <center><h5 style="color:red;"><?php echo $this->session->flashdata('message');?></h5></center>
                    <button type="submit" id="login" class="btn btn-primary btn-block">Masuk</button>
                    <!-- <div class="line line-dashed"></div>
                    <p class="text-muted text-center"><small>Belum punya akun ?</small>
                    </p> <a href="<?php echo base_url();?>/page/daftar.php" class="btn btn-default btn-block">Buat Akun Saya</a>  -->
                
                </form>
                
            </section>
        </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder">
            <p> <small>
                    ABIDO - Created by Bramastana
                    <br>&copy; <? echo date('Y');?>
                </small> 
            </p>
        </div>
    </footer>
    <!-- / footer -->
    
    <!-- Bootstrap -->
    <!-- App -->

</body>

</html>