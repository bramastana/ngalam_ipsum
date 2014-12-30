<div class="row container margin-bottom">
	<div id="grid-btn-tambah" class="col-md-3">
	    <button onclick="tambahJenisObatMuncul()" class="btn btn-s-md btn-default btn-block">
	    	<i class="fa fa-plus"></i>
	    	Tambah Data Kata
	    </button>
	</div>

	<div class='col-md-9'>
		<div id='grid-alert' class="col-md-12">
			<div id='sukses' class="alert alert-success"> 
				<button type="button" class="close" data-dismiss="alert">×</button>
				<i class="fa fa-ok-sign"></i>
				<strong>Berhasil !</strong>  <a href="#" class="alert-link">aksi yang anda lakukan berhasil</a>. 
			</div>
			<div id='gagal' class="alert alert-danger"> 
				<button type="button" class="close" data-dismiss="alert">×</button>
				<i class="fa fa-ok-sign"></i>
				<strong>Gagal !</strong>  <a href="#" class="alert-link">aksi yang anda lakukan gagal</a>. 
			</div>
		</div>

		<div id="grid-edit" class="col-md-6"></div>

		<div id="grid-tambah" class="col-md-6">
	   		<section class="panel panel-default">
	            <header class="panel-heading font-bold">
	            	Tambahkan Data Kata
	            	<button type="button" class="close" onclick="tambahJenisObatMuncul()" >×</button>
	            </header>
	            <div class="panel-body">
	                <form id='form-tambah' action='<?php echo base_url(); ?>data_kata/tambah_data_kata/' method='POST'>
	                	<div class='col-md-12'>
	                        <div class="form-group">
	                            <label>Data Kata</label>
	                            <input required id='data_kata' name='data_kata' type="text" class="form-control" placeholder="Masukkan kata">
	                        </div>
	                    </div>
	                    <div class='col-md-12'>
                            <div class='col-md-6'>
	                    	<button type="submit" id='tambah' class="btn btn-s-md btn-primary btn-block">Tambahkan</button>
	                    	</div>
	                    	<div class='col-md-6'>
	                    	<button type='reset' onclick="tambahJenisObatMuncul()" class="btn btn-s-md btn-info btn-block">Tutup</button> 
	                    	</div>
	                    </div>
	                </form>
	            </div>
	        </section>
	    </div>
	</div>
</div>

<div class="row container">
	<div id="grid-tabel" class="col-md-12">
        <section class="panel panel-default">
            <header class="panel-heading"><b data-toggle="tooltip" data-placement="right" title="Menampilkan seluruh data jenis obat yang ada" >Daftar Obat</b></header>
            <div id="tabel_refresh" class="table-responsive">
                <table id="tabel" class="col-md-12 table table-striped b-t b-light text-sm">
                    <thead>
                        <tr>
                            <th width="7%">No</th>
                            <th>Data Kata</th>
                            <th>Status</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       	<?php
						$i = 0; 
						$sql = "SELECT
								*
							FROM
								data_kata
							ORDER BY id";
						$rows = $this->db->query($sql);
						foreach ($rows->result() as $row){ $i++; 
						?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->kata; ?></td>
                            <td><?php echo $row->status; ?></td>
                            <td>
                                <a class='margin-kanan-kiri' href="#" onclick="edit(<?php echo $row->id; ?>)" ><i style="color:#4183D7" class="fa fa-pencil" data-toggle="tooltip" data-placement="right" title="Ubah"></i></a>
                                <a class='margin-kanan-kiri' data-toggle="modal" href="#hapus" onclick="hapus(<?php echo $row->id; ?>)" ><i style="color:#EF4836" class="action fa fa-times" data-toggle="tooltip" data-placement="right" title="Hapus"></i></a>
                            </td>
                        </tr>
                       	<?php
                       	}
                       	?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

</div>

<div id="hapus" class="modal fade in"></div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tabel').dataTable( {
            "sPaginationType": "full_numbers"
        });

        $('#grid-edit').hide();
        $('#grid-tambah').hide();
        $('#sukses').hide();
        $('#gagal').hide();

        $('#form-tambah').submit(function() {

            var action = $("#form-tambah").attr('action');
            var form_data = {
                data_kata: $("#data_kata").val(),
                is_ajax: 1
            };

            $.ajax({
                type: "POST",
                url: action,
                data: form_data,
                success: function(response)
                {
                    if(response == "Terimakasih"){
                    	$('#form-tambah').trigger("reset");
                    	$('#grid-tambah').slideToggle('slow');
                    	refreshTabel();
                    	$('#sukses').slideDown();
                    	setInterval(function(){
                    		$('#sukses').fadeOut();
                    	}, 3000);
                    }else{
                       	Gagal();
                    }
                }
            });
            return false;
        });

    });

    function tambahJenisObatMuncul(){
    	$('#grid-tambah').slideToggle('slow');
    }

    function hapus(id){
		$.ajax({
			url : '<?php echo base_url(); ?>data_kata/popHapus/'+id,
			type : 'POST' ,
			success : function(data){
				$('#hapus').html(data);
			}
		});
	}

	function edit(id){
		$.ajax({
			url : '<?php echo base_url(); ?>data_kata/dataEdit/'+id,
			type : 'POST' ,
			success : function(data){
				$('#grid-edit').html(data);
				$('#grid-edit').slideToggle('slow');
			}
		});
	}

	function editHilang(){
		$('#grid-edit').slideToggle('slow');
	}

    function refreshTabel(){
		$.ajax({
			url : '<?php echo base_url()?>/data_kata/tabel/',
			type : 'POST',
			success:function(data){
				$('#tabel_refresh').html(data);

				$('#tabel').dataTable( {
		            "sPaginationType": "full_numbers"
		        });
			}
		});
	}

	function Sukses(){
		$('#sukses').slideDown();
    	setInterval(function(){
    		$('#sukses').fadeOut();
    	}, 3000);
	}

	function Gagal(){
		$('#gagal').slideDown();
    	setInterval(function(){
    		$('#gagal').fadeOut();
    	}, 3000);
	}

</script>