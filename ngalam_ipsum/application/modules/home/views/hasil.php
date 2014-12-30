<div class="panel-body">
	<center>
    <?php
		for($i=1;$i<=3;$i++){
    		$sql = "SELECT * FROM data_kata ORDER BY RAND() LIMIT 1";
			$rows = $this->db->query($sql);
			foreach ($rows->result() as $row){
				if($i==1){
					echo "<b style='text-align:center;font-size: 16px;'>Ngalam Ipsum </b>";
				}else{
					echo "<b style='text-align:center;font-size: 16px;'>".ucwords($row->kata)." </b>";
				}
			}
    	}
    ?>
    </center>
    <br>
    <article style="text-align:justify;font-size: 16px;">
	    <?php
	    	for($i=1;$i<=$jml-1;$i++){
	    		$sql = "SELECT * FROM data_kata ORDER BY RAND() LIMIT 1";
				$rows = $this->db->query($sql);
				foreach ($rows->result() as $row){
					if($i==1){
						echo "Ngalam Ipsum ";
					}else{
						if($i%70==1){
							echo $row->kata.'. <br><br>';
						}else{
							if($i%10==1 or $i==$jml-1){
								echo $row->kata.'. ';
							}else{
								echo $row->kata.' ';
							}
						}
					}
				}
	    	}
		?>
    </article>
</div> 