<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center mb-5">Edit User</h1>
        <div class="container text-center overflow-auto">
        <?php foreach ($user as $data) : ?>
            <form action="<?= site_url(); ?>operator/edit_user/<?= $data['id_user'] ?>" method="post">
                <div class="row">
                    <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll visually-hidden">Nama Depan</label>
                        <input type="text" name="nama_depan" value="<?= $data['nama_depan'] ?>" class="form-control shadow-none" placeholder="Nama Depan" required autofocus>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll visually-hidden">Nama Belakang</label>
                        <input type="text" name="nama_belakang" value="<?= $data['nama_belakang'] ?>" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll visually-hidden">Username</label>
                        <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" autocomplete="off" placeholder="Username" required>
                    </div>
                    <input type="hidden" name="password" value="<?= $data['password'] ?>">
                    
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll visually-hidden">Level</label>
                        <select class="form-select" id="validationCustom04" name="id_level" required>
                            <option selected disabled value="">Choose...</option>
                            <?php foreach ($level as $row) :?>
                            <option value="<?= $row['id_level'] ?>" class="text-uppercase" <?= $row['id_level'] == $data['id_level'] ? 'selected' : '';?>> <?= $row['nama_level'] ?> <?= $row['nama_bidang'] == 'Non Bidang' ? '' : $row['nama_bidang'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="inputEmail" class="form-controll visually-hidden">Alamat</label>
                        <textarea type="text" name="alamat" class="form-control" autocomplete="off" placeholder="<?= $data['alamat'] ?>"><?= $data['alamat'] ?></textarea>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary" type="submit">Edit User</button>
            </form>
            <?php endforeach ?>
        </div>
    </div>
</div>