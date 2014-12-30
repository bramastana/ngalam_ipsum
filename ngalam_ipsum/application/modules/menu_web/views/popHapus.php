<script>
function hapusProses(){
	$.ajax({
		type : 'POST',
		url : '<?php echo base_url()?>data_obat/hapusProses/',
		data : {
				id: <?php echo $id ?>	
			},
		success:function(){
			$('#hapus').modal('hide');
			refreshTabel();
			Sukses();
		}
	});
}	
</script>

<div class="modal-dialog" style="width: 500px;">
	<div class="modal-content">
        <div class="modal-header">
          	<button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button>
            <h4> Hapus obat ?</h4>
          
        </div>
        
        <div class="modal-body">
          
        	<div class="bs-docs-example form-horizontal" >
		        <div class="control-group row-fluid">
		            <center><h3><?php echo $tmp['nama_obat']; ?></h3></center>
		        </div>
		       
		    </div>
		</div>

		<div class="modal-footer">
			<center>
				<input type="submit" class="btn btn-dark" onclick="hapusProses()" value="Hapus">
				<input type="reset" data-dismiss="modal" class="btn btn-default" value="Batal">
			</center>
		</div>
    </div>
</div>
        