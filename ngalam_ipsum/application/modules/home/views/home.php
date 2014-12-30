<!DOCTYPE html>
<html lang="en" class="bg-dark">

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
        <div class="container"> 
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <a class="navbar-brand block" href="<?php echo base_url(); ?>">Ngalam Ipsum V 0.1</a> 
                    <section class="panel panel-default bg-white m-t-lg">
                        <header class="panel-heading text-center">
                            <b>Cobak sik ker</b>
                        </header>
                        <form id='form-tambah' action="<?php echo base_url(); ?>home/generate/" id="lg-form" name="lg-form" method="post" class="panel-body wrapper-lg">
                            
                            <div class="form-group">
                                <label class="control-label">Jumlah Kata</label>
                                <input autofocus type="number" name="jml" id="jml" placeholder="Jumlah kata..." value="10" class="form-control input-lg">
                            </div>
                            <div id="message"></div>
                            
                            <center><h5 style="color:red;"><?php echo $this->session->flashdata('message');?></h5></center>
                            <button type="submit" id="login" class="btn btn-primary btn-block">Generate</button>
                        
                        </form>
                        
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                          + Sarankan Kata
                        </button>

                    </section>
                     <footer id="footer">
                        <div class="text-center padder">
                            <p> <small>
                            Ngalam Ipsum - Created by <a href="https://www.facebook.com/Bram.Moshimoshi">Bramastana</a>
                                    <br>&copy; <? echo date('Y');?>
                                </small> 
                            </p>
                        </div>
                    </footer>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <section id='hasil_ngalam' class="panel panel-default"> 
                        <div class="panel-body">
                            <h4>Iki ker hasil e :</h4>
                            <article></article>
                        </div> 
                    </section>
                </div>
            </div>
        </div>
    </section>

<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Sarankan Kata</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Data Kata</label>
            <input required id='data_kata' name='data_kata' type="text" class="form-control" placeholder="Masukkan jenis barang">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="sarankan()">Sarankan</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#form-tambah').submit(function() {

            var action = $("#form-tambah").attr('action');
            var form_data = {
                jml: $("#jml").val(),
                is_ajax: 1
            };

            $.ajax({
                type: "POST",
                url: action,
                data: form_data,
                success: function(response)
                {
                    $('#hasil_ngalam').html(response);
                }
            });
            return false;
        });

    });

    function sarankan(){
        $.ajax({
            url : '<?php echo base_url(); ?>data_kata/saran_data_kata/',
            type : 'POST' ,
            data: {
                data_kata: $("#data_kata").val()
            },
            success : function(data){
                alert(data);
                $('#myModal').modal('hide');
            }
        });
    }
</script>

</body>

</html>