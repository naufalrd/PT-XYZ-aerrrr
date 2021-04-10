<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center mb-5">Edit User</h1>
        <div class="container text-center overflow-auto">
        <?php foreach($pelanggan as $a) :?>
            <form action="<?= site_url(); ?>pelanggan/update_biodata" method="post">
                <div class="row">
                    <input type="hidden" name="username" value="<?=$a->username?>">                  
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control shadow-none" placeholder="Nama Depan" value="<?=$a->nama_depan?>" required autofocus>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll">Nama Belakang</label>
                        <input type="text" name="nama_belakang" class="form-control shadow-none" placeholder="Nama Belakang" value="<?=$a->nama_belakang?>" required>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll">No. HP</label>
                        <input type="text" name="no_hp" class="form-control shadow-none" placeholder="No. HP" value="<?=$a->no_hp?>" required>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll">E-mail</label>
                        <input type="text" name="email_user" class="form-control shadow-none" placeholder="E-mail" value="<?=$a->email_user?>" required>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="inputEmail" class="form-controll">Alamat</label>
                        <textarea type="text" name="alamat" class="form-control" autocomplete="off" placeholder="alamat"> <?=$a->alamat?> </textarea>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary" type="submit">Update Biodata</button>
            </form>
            <?php endforeach ?>
        </div>
    </div>
</div>