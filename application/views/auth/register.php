<div class="signin-input">
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
    <form action="<?= site_url(); ?>auth/check_register_pasien" method="post">
        <div class="row">
            <div class="form-group col-12 mb-3">
                <label for="inputEmail" class="form-controll visually-hidden">Nama Pasien</label>
                <input type="text" name="nama_pasien" class="form-control shadow-none" placeholder="Nama Depan" required autofocus>
            </div>
            <div class="form-group col-6 mb-3">
                <label for="inputEmail" class="form-controll visually-hidden">Umur</label>
                <input type="number" name="umur_pasien" class="form-control shadow-none" placeholder="Umur" required>
            </div>
            <div class="form-group col-6 mb-3">
                <label for="inputEmail" class="form-controll visually-hidden">Username</label>
                <input type="text" name="username_pasien" class="form-control" autocomplete="off" placeholder="Username" required>
            </div>
            <div class="form-group col-12 mb-3">
                <label for="inputEmail" class="form-controll visually-hidden">Alamat</label>
                <textarea type="text" name="alamat_pasien" class="form-control" autocomplete="off" placeholder="alamat"></textarea>
            </div>
            <div class="form-group col-12 mb-3">
                <label for="inputEmail" class="form-controll visually-hidden">Password</label>
                <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password" required>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        </div>
    </form>
</div>
<p class="title mt-1">i have account already ? <a href="<?= site_url(); ?>auth/login" class="text-decoration-none">Login</a></p>