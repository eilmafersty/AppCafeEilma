<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
<div class="container">
    <h3><strong>Laporan</strong></h3>
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <!-- <th>User ID</th> -->
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>No Meja</th>
            <th>Nama Pemesan</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach($data as $row):
            ?>
                <tr>
                    <td><?=$no?></td>
                    
                    <td><?=$row['tanggal']?></td>
                    <td><?=$row['total_harga']?></td>
                    <td><?=$row['no_meja']?></td>
                    <td><?=$row['nama_pemesan']?></td>
                    <td><a href="" class="btn btn-success btn-sm btn-edit">Edit</a> <a href="" class="btn btn-danger btn-sm btn-delete">Hapus</a></td>
                </tr>
                <?php
                $no++;
                endforeach?>
        </tbody>
    </table>
</div>
<?=$this->endSection()?>