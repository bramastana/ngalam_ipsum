<!DOCTYPE html>
<html lang="en" class="app">
<head>
	<meta charset="utf-8" />
	<title>ABIDO | Aplikasi Bidan Online</title>
	<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/app.v2.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/font.css" type="text/css" cache="false" />
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/js/datatables/datatables.css" type="text/css" cache="false" />
	<!--[if lt IE 9]> <script src="<?php echo $nama_folder?>/assets/js/ie/html5shiv.js" cache="false"></script> <script src="<?php echo $nama_folder?>/assets/js/ie/respond.min.js" cache="false"></script> <script src="<?php echo $nama_folder?>/assets/js/ie/excanvas.js" cache="false"></script> <![endif]-->

	<script src="<?php echo base_url();?>/assets/js/app.v2.js"></script>
	<script src="<?php echo base_url();?>/assets/js/datatables/jquery.dataTables.min.js" cache="false"></script>
</head>
<body>

	<section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
        <div class="navbar-header aside-md">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> 
            </a>
            <a href="#" class="navbar-brand" data-toggle="fullscreen">
                Shinnosuke CMS
            </a>
            <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> 
            </a>
        </div>
        <ul class="nav navbar-nav hidden-xs">
            <li>
                <div class="m-t m-l"> <a href="price.html" class="dropdown-toggle btn btn-xs btn-primary" title="Upgrade"><i class="fa fa-long-arrow-up"></i></a> 
                </div>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right hidden-xs nav-user">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="<?php echo base_url();?>/assets/images/avatar.jpg"> </span> 
                	bram <b class="caret"></b> 
                </a>
                <ul class="dropdown-menu animated fadeInRight"> <span class="arrow top"></span> 
                    <li> <a href="#">Settings</a> 
                    </li>
                    <li> <a href="profile.html">Profile</a> 
                    </li>
                    <li>
                        <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications</a>
                    </li>
                    <li> <a href="docs.html">Help</a> 
                    </li>
                    <li class="divider"></li>
                    <li> <a href="#">Logout</a> 
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <section>
        <section class="hbox stretch">
            <!-- .aside -->
            <aside class="bg-light lter b-r aside-md hidden-print" id="nav">
                <section class="vbox">
                    
                    <section class="w-f scrollable">
                        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                            <!-- nav -->
                            <nav class="nav-primary hidden-xs">
                                <ul class="nav">
                                    <li>
                                        <a href="<?php echo base_url(); ?>" class="active"> <i class="fa fa-dashboard icon"> <b class="bg-danger"></b> </i>  <span>Home</span> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>/daftar_user/">  <i class="fa fa-users icon"> <b class="bg-primary dker"></b> </i>  <span>Daftar Pengguna</span> 
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- / nav -->
                        </div>
                    </section>
                    <footer class="footer lt hidden-xs b-t b-light">
                        <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-default btn-icon"> <i class="fa fa-angle-left text"></i>  <i class="fa fa-angle-right text-active"></i> 
                        </a>
                    </footer>
                </section>
            </aside>
            <!-- /.aside -->
            <section id="content">
                <section class="vbox">
                    <section class="scrollable padder">
                        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a>
                            </li> 
                            <li class="active"><a href="<?php echo base_url(); ?>/daftar_user/" >Daftar Pengguna</a></li>
                          
                            <!-- <li class="active">Components</li> -->
                        </ul>

                        <!-- content website -->
                        <div class="row">

                         	isi

                        </div>
                    </section>
                </section>
                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>     
            </section>
            <aside class="bg-light lter b-l aside-md hide" id="notes">
                <div class="wrapper">Notification</div>
            </aside>
        </section>
    </section>
</section>

<!-- Bootstrap -->
<!-- App -->



</body>
</html>