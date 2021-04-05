<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center mb-5">Teruskan ke Bidang</h1>
        <div class="container text-start overflow-auto">
            <?php foreach ($keluhan as $data) : ?>
                <p class="fs-3 mb-0"><?= $data['judul'] ?></p>
                <div><?= $data['keluhan'] ?></div>
            <?php endforeach ?>
        </div>
        <div class="container mt-3">
            <?php foreach ($keluhan as $data) : ?>
                <form action="<?= base_url() ?>operator/teruskanbidang/" method="POST">
                    <div class="col-12">
                        <input type="hidden" name="id_keluhan" value="<?= $data['id_keluhan'] ?>" class="form-control shadow-none" required>
                        <label for="validationCustom04" class="form-label">Nama Bidang</label>
                        <select class="form-select" name="id_bidang" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <?php foreach ($bidang as $row) : ?>
                                <option value="<?= $row['id_bidang'] ?>"> <?= $row['nama_bidang'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <a href="<?= site_url(); ?>operator/tolak/<?= $keluhan[0]['id_keluhan']; ?>" class="btn btn-danger mx-1"> Tolak</a>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            <?php endforeach ?>

        </div>
    </div>
</div>