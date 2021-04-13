<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center mb-5">Edit Bidang</h1>
        <div class="container text-start overflow-auto">
        <?php foreach ($bidang as $data) : ?>
            <form action="<?= site_url(); ?>operator/submit_editbidang/" method="post">
                <div class="row">
                    <input type="hidden" name="id_bidang" value="<?= $data['id_bidang'] ?>">
                    <div class="form-group col-6 mb-3">
                        <label for="inputEmail" class="form-controll ">Nama Bidang</label>
                        <input type="text" name="nama_bidang" value="<?= $data['nama_bidang'] ?>" class="form-control shadow-none" placeholder="Nama Bidang" required autofocus>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="inputEmail" class="form-controll ">Deskripsi Tugas</label>
                        <textarea type="text" name="deskripsi_bidang" class="form-control" autocomplete="off" placeholder="<?= $data['deskripsi_bidang'] ?>"><?= $data['deskripsi_bidang'] ?></textarea>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary" type="submit">Edit Bidang</button>
            </form>
            <?php endforeach ?>
        </div>
    </div>
</div>