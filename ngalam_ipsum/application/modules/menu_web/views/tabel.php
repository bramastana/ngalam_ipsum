<table id="tabel_user" class="col-md-12 table table-striped b-t b-light text-sm">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Jenis</th>
            <th>Kadaluarsa</th>
            <th>Jumlah</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0; 
        $sql = "SELECT
                *,obat.id as id, jenis_obat.jenis as jenis
            FROM
                obat
            INNER JOIN
                jenis_obat
            ON obat.jenis = jenis_obat.id
            ORDER BY obat.id DESC";
        $rows = $this->db->query($sql);
        foreach ($rows->result() as $row){ $i++; 
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row->nama_obat; ?></td>
            <td><?php echo $row->jenis; ?></td>
            <td><?php echo date('d M Y', strtotime($row->kadaluarsa)); ?></td>
            <td><?php echo $row->jumlah; ?></td>
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