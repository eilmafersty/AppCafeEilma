<?= $this->extend ('layouts/admin')?>
<?= $this->section('content')?>
<?php
    if (session()->getFlashdata('success')){
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?=session()->getFlashdata('success')?>
    <button type="button" class="close" data-dismiss="alert" aria-label="close">Close</button>
</div>
<?php
    }
?>
<div class="container">
    <h3><strong>Data Detail Pemesanan</strong></h3>
    <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#addDetailPesanan">Tambah Data</button>

    <table class="table table-striped">
        <thead>
            <th>No</th>
            <th>Id Pesanan</th>
            <th>Id Menu</th>
            <th>Jumlah</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach($data as $row):
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['pesanan_id']?></td>
                <td><?=$row['menu_id']?></td>
                <td><?=$row['jumlah']?></td>
                <td><a href="" class="btn btn-success btn-sm btn-edit">Edit</a> <a href="<?=base_url('DetailController/delete/'.$row['id'])?>" onclick="return confirm('Yakin Akan Dihapus?')" class="btn btn-danger btn-sm btn-delete">Hapus</a></td>
            </tr>
<!-- Modal Edit Detail-->
<form action="<?=base_url('detail/edit/'.$row['id'])?>" method="post">
<div class="modal fade" id="editDetail-<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Detail Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('details')?>" method="post">
            <div class="modal-body">

            <div class="form-group">
                <label>Id Pesanan</label>
                <input type="text" class="form-control" name="pesanan_id" placeholder="Id Pesanan" value="<?=$row['pesanan_id']?>">
            </div>

            <div class="form-group">
                <label>Id Menu</label>
                <input type="number" class="form-control" name="menu_id" placeholder="Id Menu" value="<?=$row['menu_id']?>">
            </div>

            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="harga" placeholder="Rp" value="<?=$row['jumlah']?>">
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
</form>
<!-- End Modal Edit Detail-->

            <?php
            $no++;
            endforeach?>
        </tbody>
    </table>
</div>

<!-- Modal Add Detail Pesanan -->
<form action="/detailcontroller/simpan" method="post">
<div class="modal fade" id="addDetailPesanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('details')?>" method="post">
            <div class="modal-body">

            <div class="form-group">
                <label>Id Pesanan</label>
                <input type="text" class="form-control" name="pesanan_id" placeholder="No Id Pesanan">
            </div>

            <div class="form-group">
                <label>Id Menu</label>
                <input type="text" class="form-control" name="menu_id" placeholder="No Id Menu">
            </div>

            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" placeholder="Rp">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
</form>
<!-- End Modal Add Detail Pesanan -->

<?= $this->endSection()?>