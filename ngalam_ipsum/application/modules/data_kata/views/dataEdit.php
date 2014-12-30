<section class="panel panel-default">
    <header class="panel-heading font-bold">
        Ubah Data Kata
        <button type="button" class="close" onclick="editHilang()" >×</button>
    </header>
    <div class="panel-body">
        <form id='form-ubah' action='<?php echo base_url(); ?>data_kata/ubah_data_kata/' method='POST'>
        	<div class='col-md-12'>
                <div class="form-group">
                    <label>Data Kata</label>
                    <input value='<?php echo $tmp['kata']; ?>' required id='data_kata' name='data_kata' type="text" class="form-control" placeholder="Masukkan jenis barang">
                </div>
            </div>
            <div class='col-md-12'>
            	<div class='col-md-6'>
                <button type="submit" id='tambah' class="btn btn-s-md btn-primary btn-block">Ubah</button>
                </div>
                <div class='col-md-6'>
                <button type='reset' onclick="editHilang()" class="btn btn-s-md btn-info btn-block">Tutup</button> 
                </div>
            </div>
        </form>
    </div>
</section>

<script type="text/javascript">
   
        $('#form-ubah').submit(function() {

            var action = $("#form-ubah").attr('action');
            var form_data = {
                id : <?php echo $tmp['id']; ?>,
                data_kata: $("#data_kata").val(),
                is_ajax: 1
            };

            $.ajax({
                type: "POST",
                url: action,
                data: form_data,
                success: function(response)
                {
                    if(response == "success"){
                        $('#form-ubah').trigger("reset");
                        $('#grid-edit').slideToggle('slow');
                        refreshTabel();
                        $('#sukses').slideDown();
                        setInterval(function(){
                            $('#sukses').fadeOut();
                        }, 3000);
                    }else{
                        $('#gagal').hide();
                    }
                }
            });
            return false;
        });
    
</script>