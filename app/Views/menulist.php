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
    <h3><strong>Data Menu</strong></h3>
    <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#addMenu">Tambah Data</button>

    <table class="table table-striped">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Stok</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach($data as $row):
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['harga']?></td>
                <td><?=$row['jenis']?></td>
                <td><?=$row['stok']?></td>
                <td><a href="#" class="btn btn-success btn-sm btn-edit" data-toggle="modal" data-target="#editMenu-<?=$row['id']?>">Edit</a> 
                <a href="<?=base_url('MenuController/delete/'.$row['id'])?>" onclick="return confirm('Yakin Akan Dihapus?')" class="btn btn-danger btn-sm btn-delete">Hapus</a></td>
            </tr>

<!-- Modal Edit Menu-->
            <form action="<?=base_url('menu/edit/'.$row['id'])?>" method="post">
    <div class="modal fade" id="editMenu-<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('menus')?>" method="post">
            <div class="modal-body">

            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Menu" value="<?=$row['nama']?>">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" name="harga" placeholder="Rp" value="<?=$row['harga']?>">
            </div>

            <div class="form-group">
                <label>Jenis</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="makanan" <?=$row['jenis']=="makanan"? "checked":""?>>
                <label class="form-check-label" for="flexRadioDefault1">Makanan</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis" id="flexRadiodefault2" checked value="minuman" <?=$row['jenis']=="minuman"? "checked":""?>>
                <label class="form-check-label" for="flexRadiodefault2">Minuman</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis" id="flexRadiodefault3" checked value="camilan" <?=$row['jenis']=="camilan"? "checked":""?>>
                <label class="form-check-label" for="flexRadiodefault3">Camilan</label>
            </div>
             
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number" class="form-control" name="stok" placeholder="Stok">
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
</form>
<!-- End Modal Edit Menu-->

            <?php
            $no++;
            endforeach?>
        </tbody>
    </table>
</div>

<!-- Modal Add Menu -->
<form action="/menucontroller/simpan" method="post">
<div class="modal fade" id="addMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('menus')?>" method="post">
            <div class="modal-body">

            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Menu">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" name="harga" placeholder="Rp">
            </div>

            <div class="form-group">
                <label>Jenis</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="makanan">
                <label class="form-check-label" for="flexRadioDefault1">Makanan</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis" id="flexRadiodefault2" checked value="minuman">
                <label class="form-check-label" for="flexRadiodefault2">Minuman</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis" id="flexRadiodefault3" checked value="camilan">
                <label class="form-check-label" for="flexRadiodefault3">Camilan</label>
            </div>
             
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number" class="form-control" name="stok" placeholder="Stok">
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
</form>
<!-- End Modal Add Menu -->

<?= $this->endSection()?>