<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
    <?php
    $errors = $this->session->flashdata('errors');
    if (!empty($errors)) {
    ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger text-center">
                    <?php foreach ($errors as $key => $error) { ?>
                        <?php echo "$error<br>"; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
        <h1 class="text-center mb-5">Add User</h1>
        <div class="container text-center overflow-auto">
            <form action="<?= site_url(); ?>operator/add_user" method="post">
                <div class="row">
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control shadow-none" placeholder="Nama Depan" required autofocus>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll">Nama Belakang</label>
                        <input type="text" name="nama_belakang" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll">Username</label>
                        <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Username" required>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll">Password</label>
                        <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password" required>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll">No. HP</label>
                        <input type="text" name="no_hp" class="form-control shadow-none" placeholder="No. HP" required>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll">E-mail</label>
                        <input type="text" name="email_user" class="form-control shadow-none" placeholder="E-mail" required>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="inputEmail" class="form-controll">Alamat</label>
                        <textarea type="text" name="alamat" class="form-control" autocomplete="off" placeholder="alamat"></textarea>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="inputEmail" class="form-controll">Level</label>
                        <select class="form-select" id="validationCustom04" name="id_level" required>
                            <option selected disabled value="">Choose...</option>
                            <?php foreach ($level as $row) :?>
                            <option value="<?= $row['id_level'] ?>" class="text-uppercase"> <?= $row['nama_level'] ?> <?= $row['nama_bidang'] == 'Non Bidang' ? '' : $row['nama_bidang'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary" type="submit">Add User</button>
            </form>
        </div>
    </div>
</div>