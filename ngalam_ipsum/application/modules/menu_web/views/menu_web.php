<div class="row container margin-bottom">
	<div id="grid-btn-tambah" class="col-md-2">
	    <button onclick="tambahObatMuncul()" class="btn btn-s-md btn-default btn-block">
	    	<i class="fa fa-plus"></i>
	    	Tambah Menu
	    </button>
	</div>

	<div class='col-md-10'>
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

		<div id="grid-edit" class="col-md-12"></div>

		<div id="grid-tambah" class="col-md-12">
	   		<section class="panel panel-default">
	            <header class="panel-heading font-bold">
	            	Tambahkan Menu
	            	<button type="button" class="close" onclick="tambahObatMuncul()" >×</button>
	            </header>
	            <div class="panel-body">
	                <form id='form-tambah' action='<?php echo base_url(); ?>data_obat/tambah_obat/' method='POST'>
	                	<div class='col-md-6'>
	                        <div class="form-group">
	                            <label>Nama Obat</label>
	                            <input required id='nama_obat' name='nama_obat' type="text" class="form-control" placeholder="Masukkan nama obat">
	                        </div>
	                        <div class="form-group">
	                            <label>Jenis</label>
	                            <select required id='jenis' name='jenis' class="form-control">
	                            	<option value="" disabled selected>Pilih jenis</option>
	                            	<?php
	                            		$sql = "SELECT * FROM jenis_obat";
										$rows = $this->db->query($sql);
										foreach ($rows->result() as $row){
	                            	?>
	                            	<option value='<?php echo $row->id;?>'><?php echo $row->jenis;?></option>
	                            	<?php
	                            		}
	                            	?>
	                            </select>
	                        </div>
	                    </div>
	                    <div class='col-md-6'>
	                    	<div class="form-group">
	                            <label>Kadaluarsa</label>
	                            <div class='row'>
	                                <div class='col-md-4'>
		                            <select required id='tgl' name='tgl' class="form-control">
		                            	<option value="" disabled selected>Tanggal</option>
	                                    <?php 
	                                    for($i=1;$i<=31;$i++){
	                                        $i = $i<10?'0'.$i:$i; 
	                                        echo "<option value='$i'>$i</option>";
	                                    }
	                                    ?>
		                            </select>
	                                </div>
	                                <div class='col-md-4'>
		                            <select required id='bln' name='bln' class="form-control">
		                            	<option value="" disabled selected>Bulan</option>
		                            	<option value='01'>Januari</option>
		                            	<option value='02'>Februari</option>
		                            	<option value='03'>Maret</option>
		                            	<option value='04'>April</option>
		                            	<option value='05'>Mei</option>
		                            	<option value='06'>Juni</option>
		                            	<option value='07'>Juli</option>
		                            	<option value='08'>Agustus</option>
		                            	<option value='09'>September</option>
		                            	<option value='10'>Oktober</option>
		                            	<option value='11'>November</option>
		                            	<option value='12'>Desember</option>
		                            </select>
	                                </div>
	                                <div class='col-md-4'>
		                            <select required id='thn' name='thn' class="form-control">
		                            	<option value="" disabled selected>Tahun</option>
		                            	<?php
		                            	$tahun = date('Y');
		                            	$tujuh_tahun = $tahun+7; 
	                                    for($i=$tahun;$i<=$tujuh_tahun;$i++){
	                                        echo "<option value='$i'>$i</option>";
	                                    }
	                                    ?>
		                            </select>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Jumlah</label>
	                            <input required id='jumlah' name='jumlah' type="number" class="form-control" placeholder="Masukkan jumlah obat">
	                        </div>
	                    </div>
	                    <div class='col-md-offset-6 col-md-6'>
                            <div class='col-md-6'>
	                    	<button type="submit" id='tambah' class="btn btn-s-md btn-primary btn-block">Tambahkan</button>
	                    	</div>
	                    	<div class='col-md-6'>
	                    	<button type='reset' onclick="tambahObatMuncul()" class="btn btn-s-md btn-info btn-block">Tutup</button> 
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
            <header class="panel-heading"><b data-toggle="tooltip" data-placement="right" title="Menampilkan seluruh data menu yang ada" >Daftar Obat</b></header>
            <div id="tabel_obat_refresh" class="table-responsive">
                <table id="tabel_user" class="col-md-12 table table-striped b-t b-light text-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Icon</th>
                            <th>Color</th>
                            <th>Menu</th>
                            <th>Link</th>
                            <th>Child</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       	<?php
						$i = 0; 
						$sql = "SELECT
								*
							FROM
								menu
							ORDER BY id DESC";
						$rows = $this->db->query($sql);
						foreach ($rows->result() as $row){ $i++; 
						?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->icon; ?></td>
                            <td><?php echo $row->color; ?></td>
                            <td><b><?php echo $row->menu; ?></b></td>
                            <td><?php echo isset($row->link)?$row->link:'-'; ?></td>
                            <td><?php echo $row->child; ?></td>
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
        $('#tabel_user').dataTable( {
            "sPaginationType": "full_numbers"
        });

        $('#grid-edit').hide();
        $('#grid-tambah').hide();
        $('#sukses').hide();
        $('#gagal').hide();

        $('#form-tambah').submit(function() {

            var action = $("#form-tambah").attr('action');
            var form_data = {
                nama_obat: $("#nama_obat").val(),
                jenis: $("#jenis").val(),
                tgl: $("#tgl").val(),
                bln: $("#bln").val(),
                thn: $("#thn").val(),
                jumlah: $("#jumlah").val(),
                is_ajax: 1
            };

            $.ajax({
                type: "POST",
                url: action,
                data: form_data,
                success: function(response)
                {
                    if(response == "success"){
                    	$('#form-tambah').trigger("reset");
                    	$('#grid-tambah').slideToggle('slow');
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

    });

    function tambahObatMuncul(){
    	$('#grid-tambah').slideToggle('slow');
    }

    function hapus(id){
		$.ajax({
			url : '<?php echo base_url(); ?>data_obat/popHapus/'+id,
			type : 'POST' ,
			success : function(data){
				$('#hapus').html(data);
			}
		});
	}

	function edit(id){
		$.ajax({
			url : '<?php echo base_url(); ?>data_obat/dataEdit/'+id,
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
			url : '<?php echo base_url()?>/data_obat/tabel/',
			type : 'POST',
			success:function(data){
				$('#tabel_obat_refresh').html(data);

				$('#tabel_user').dataTable( {
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