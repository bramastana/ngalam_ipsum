
    <section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
        <div class="navbar-header aside-md">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> 
            </a>
            <a href="<?php echo base_url();?>" class="navbar-brand" data-toggle="fullscreen">
                <h3>Ngalam</h3>
            </a>
            <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> 
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right hidden-xs nav-user">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="<?php echo base_url();?>/assets/images/avatar.jpg"> </span> 
                    <?php echo checkSession('username');?> <b class="caret"></b> 
                </a>
                <ul class="dropdown-menu animated fadeInRight"> <span class="arrow top"></span> 
                    <li> <a href="#">Ganti Password</a> </li>
                    <li class="divider"></li>
                    <li> <a href="<? echo base_url('logout_cms') ?>">Logout</a> 
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
                                    <?php
                                        $sql = "SELECT * FROM menu order by  urutan";
                                        $rows = $this->db->query($sql);
                                        foreach ($rows->result() as $row){
                                        if($row->child=='TIDAK'){
                                    ?>
                                    <li <?php if($title==$row->link){ echo "class='active'"; } ?> >
                                        <a href="<?php echo base_url($row->link); ?>"> 
                                            <i class="fa <?php echo $row->icon; ?> icon"> 
                                                <b class="<?php echo $row->color; ?>"></b>
                                            </i>
                                            <span><?php echo ucwords($row->menu); ?></span> 
                                        </a>
                                    </li>
                                    <?php
                                        }else{
                                    ?>
                                    <li <?php if($menu2==$row->menu){ echo "class='active'"; } ?> >
                                        <a href="#layout" class="active"> 
                                            <i class="fa <?php echo $row->icon; ?> icon"> 
                                                <b class="<?php echo $row->color; ?>"></b>
                                            </i>  
                                            <span class="pull-right">
                                                <i class="fa fa-angle-down text"></i>
                                                <i class="fa fa-angle-up text-active"></i>
                                            </span>
                                            <span><?php echo ucwords($row->menu); ?></span> 
                                        </a>
                                        <ul class="nav lt">
                                            <?php
                                                $sql2 = "SELECT * FROM menu_detil WHERE id_parent='$row->id' order by urutan";
                                                $rows2 = $this->db->query($sql2);
                                                foreach ($rows2->result() as $row2){
                                            ?>
                                            <li <?php if($menu3==$row2->menu){ echo "class='active'"; } ?>>
                                                <a href="<?php echo base_url($row2->link); ?>"> 
                                                    <i class="fa fa-angle-right"></i>
                                                    <span><?php echo ucwords($row2->menu); ?></span> 
                                                </a>
                                            </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                        }
                                        }
                                    ?>
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
                            <li <?php if($menu2==null){ echo "class='active'"; } ?> >
                                <a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Beranda</a>
                            </li>
                            <?php
                                if($menu2!=null){
                            ?>
                            <li <?php if($menu3==null){ echo "class='active'"; } ?> >
                                <a href="<?php echo $link3; ?>"><?php echo ucwords($menu2) ?></a>
                            </li>
                            <?php
                                }
                            ?>
                            <?php
                                if($menu3!=null){
                            ?>
                            <li class='active'>
                                <a href="<?php echo $link3; ?>"><?php echo ucwords($menu3) ?></a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>


                        <!-- contennya -->
                        <div class="row">
                        <?php
                            loadView($content);
                        ?>
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