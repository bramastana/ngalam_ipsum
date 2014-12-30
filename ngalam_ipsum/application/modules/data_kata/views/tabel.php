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