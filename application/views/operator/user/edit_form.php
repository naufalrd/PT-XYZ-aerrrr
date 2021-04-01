<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center mb-5">Edit User</h1>
        <div class="container text-center overflow-auto">
            <form action="<?= site_url(); ?>operator/add_user" method="post">
                <div class="row">
                    <input type="hidden" name="password">
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll visually-hidden">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control shadow-none" placeholder="Nama Depan" required autofocus>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll visually-hidden">Nama Belakang</label>
                        <input type="text" name="nama_belakang" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll visually-hidden">Username</label>
                        <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Username" required>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll visually-hidden">Nama Bidang</label>
                        <select class="form-select" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="">Bidang Pariwisata</option>
                            <option value="">Bidang Kehutanan</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="inputEmail" class="form-controll visually-hidden">Alamat</label>
                        <textarea type="text" name="alamat" class="form-control" autocomplete="off" placeholder="alamat"></textarea>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary" type="submit">Add User</button>
            </form>
        </div>
    </div>
</div>