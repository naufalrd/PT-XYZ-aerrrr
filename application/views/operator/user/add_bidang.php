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
        <h1 class="text-center mb-5">Add Bidang</h1>
        <div class="container text-start overflow-auto">
            <form action="<?= site_url(); ?>operator/add_user" method="post">
                <div class="row">
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll">Nama Bidang</label>
                        <input type="text" name="nama_bidang" class="form-control shadow-none" placeholder="Nama Bidang" required autofocus>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="inputEmail" class="form-controll">Deskripsi Tugas</label>
                        <textarea type="text" name="deskripsi_bidang" class="form-control" autocomplete="off" placeholder="Tulis Deskripsi..."></textarea>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary" type="submit">Add Bidang</button>
            </form>
        </div>
    </div>
</div>