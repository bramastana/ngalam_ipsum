<section class="panel panel-default">
    <header class="panel-heading font-bold">
        Ubah Obat
        <button type="button" class="close" onclick="editHilang()" >×</button>
    </header>
    <div class="panel-body">
        <form id='form-ubah' action='<?php echo base_url(); ?>data_obat/ubah_obat/' method='POST'>
        	<div class='col-md-6'>
                <div class="form-group">
                    <label>Nama Obat</label>
                    <input value='<?php echo $tmp['nama_obat']; ?>' required id='nama_obat' name='nama_obat' type="text" class="form-control" placeholder="Masukkan nama obat">
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
                    	<option <?php if($tmp['jenis']==$row->id){ echo "selected"; } ?> value='<?php echo $row->id;?>'><?php echo $row->jenis;?></option>
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
                            $tgl = date('d', strtotime($tmp['kadaluarsa'])); 
                            for($i=1;$i<=31;$i++){
                                $i = $i<10?'0'.$i:$i;
                            ?> 
                                <option <?php if($i==$tgl){ echo "selected"; } ?> value='<?php echo $i; ?>'><?php echo $i; ?></option>;
                            <?php
                            }
                            ?>
                        </select>
                        </div>
                        <div class='col-md-4'>
                        <select required id='bln' name='bln' class="form-control">
                        	<option value="" disabled selected>Bulan</option>
                            <?php
                            $bln = date('m', strtotime($tmp['kadaluarsa']));   
                            ?>
                        	<option <?php if($bln=='01'){ echo "selected"; } ?> value='01'>Januari</option>
                        	<option <?php if($bln=='02'){ echo "selected"; } ?> value='02'>Februari</option>
                        	<option <?php if($bln=='03'){ echo "selected"; } ?> value='03'>Maret</option>
                        	<option <?php if($bln=='04'){ echo "selected"; } ?> value='04'>April</option>
                        	<option <?php if($bln=='05'){ echo "selected"; } ?> value='05'>Mei</option>
                        	<option <?php if($bln=='06'){ echo "selected"; } ?> value='06'>Juni</option>
                        	<option <?php if($bln=='07'){ echo "selected"; } ?> value='07'>Juli</option>
                        	<option <?php if($bln=='08'){ echo "selected"; } ?> value='08'>Agustus</option>
                        	<option <?php if($bln=='09'){ echo "selected"; } ?> value='09'>September</option>
                        	<option <?php if($bln=='10'){ echo "selected"; } ?> value='10'>Oktober</option>
                        	<option <?php if($bln=='11'){ echo "selected"; } ?> value='11'>November</option>
                        	<option <?php if($bln=='12'){ echo "selected"; } ?> value='12'>Desember</option>
                        </select>
                        </div>
                        <div class='col-md-4'>
                        <select required id='thn' name='thn' class="form-control">
                        	<option value="" disabled selected>Tahun</option>
                        	<?php
                            $thn = date('Y', strtotime($tmp['kadaluarsa'])); 
                        	$tahun = date('Y');
                        	$tujuh_tahun = $tahun+7; 
                            for($i=$tahun;$i<=$tujuh_tahun;$i++){
                            ?>
                                <option <?php if($i==$thn){ echo "selected"; } ?> value='<?php echo $i; ?>'><?php echo $i; ?></option>;
                            <?php
                            }
                            ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input value='<?php echo $tmp['jumlah']; ?>' required id='jumlah' name='jumlah' type="number" class="form-control" placeholder="Masukkan jumlah obat">
                </div>
            </div>
            <div class='col-md-offset-6 col-md-6'>
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