<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded editBiodata">
        <h1 class="text-center">Edit User</h1>
        <div class="col text-center mb-5">
            <a id="editPassword" class="btn btn-outline-dark btn-sm">Edit Password</a>
        </div>
        <div class="container text-start overflow-auto">
            <?php foreach ($pelanggan as $a) : ?>
                <form action="<?= site_url(); ?>pelanggan/update_biodata" method="post">
                    <div class="row">

                        <input type="hidden" name="username" value="<?= $a->username ?>">
                        <div class="form-group col-6 mb-3">
                            <label for="inputEmail" class="form-controll">Nama Depan</label>
                            <input type="text" name="nama_depan" class="form-control shadow-none" placeholder="Nama Depan" value="<?= $a->nama_depan ?>" required autofocus>
                        </div>
                        <div class="form-group col-6 mb-3">
                            <label for="inputEmail" class="form-controll">Nama Belakang</label>
                            <input type="text" name="nama_belakang" class="form-control shadow-none" placeholder="Nama Belakang" value="<?= $a->nama_belakang ?>" required>
                        </div>
                        <div class="form-group col-6 mb-3">
                            <label for="inputEmail" class="form-controll">No. HP</label>
                            <input type="text" name="no_hp" class="form-control shadow-none" placeholder="No. HP" value="<?= $a->no_hp ?>" required>
                        </div>
                        <div class="form-group col-6 mb-3">
                            <label for="inputEmail" class="form-controll">E-mail</label>
                            <input type="text" name="email_user" class="form-control shadow-none" placeholder="E-mail" value="<?= $a->email_user ?>" required>
                        </div>
                        <div class="form-group col-12 mb-3">
                            <label for="inputEmail" class="form-controll">Alamat</label>
                            <textarea type="text" name="alamat" class="form-control" autocomplete="off" placeholder="alamat"> <?= $a->alamat ?> </textarea>
                        </div>
                    </div>
                    <button class="btn btn-md btn-primary" type="submit">Update Biodata</button>
                </form>
        </div>
    </div>
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded editPassword d-none">
        <h1 class="text-center">Edit Password</h1>
        <div class="col text-center mb-5">
            <a onclick="editBiodata()" class="btn btn-outline-dark btn-sm">Edit Biodata</a>
        </div>
        <div class="container text-start overflow-auto">
            <form action="<?= site_url(); ?>pelanggan/update_password" method="post">
                <div class="row">
                    <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">
                    <input type="hidden" name="password" value="<?= $a->password; ?>">
                    <div class="form-group col-12 mb-3">
                        <label for="inputEmail" class="form-controll">Password Lama</label>
                        <input type="password" name="old_password" class="form-control shadow-none" placeholder="Nama Depan" required autofocus>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="inputEmail" class="form-controll">Password Baru</label>
                        <input type="password" name="new_password" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="inputEmail" class="form-controll">Retype Password Baru</label>
                        <input type="password" name="re_password" class="form-control shadow-none" placeholder="No. HP" required>
                    </div>
                </div>
                <div class="text-center col">
                    <button class="btn btn-md btn-primary" type="submit">Update Password</button>
                </div>
            </form>

        <?php endforeach ?>
        </div>
    </div>
</div>
<script>
    document.getElementById('editPassword').addEventListener('click', () => {
        document.querySelector('.editBiodata').className = 'row mt-5 mx-5 p-5 shadow bg-white rounded editBiodata d-none'
        document.querySelector('.editPassword').className = 'row mt-5 mx-5 p-5 shadow bg-white rounded editPassword'
    })

    async function editPassword() {
        document.querySelector('.editBiodata').className = 'row mt-5 mx-5 p-5 shadow bg-white rounded editBiodata'
        document.querySelector('.editPassword').className = 'row mt-5 mx-5 p-5 shadow bg-white rounded editPassword d-none'
    }

</script>