<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center mb-5">Teruskan ke Bidang</h1>
        <div class="container text-start overflow-auto">
        <?php foreach ($keluhan as $data) : ?>
            <p class="fs-3 mb-0"><?= $data['keluhan'] ?></p>
            <p class="fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia possimus tenetur exercitationem dolorum voluptate eveniet ea molestiae quos aut doloribus, eligendi nostrum voluptatum fugit in cupiditate aperiam et! Quaerat est repellendus veniam fugiat in nam nulla libero commodi aliquam quibusdam eligendi, ab quos beatae excepturi repudiandae, possimus non quod eveniet harum. Iusto, deserunt. Unde nesciunt quae aut enim? Veritatis dolorum distinctio ea animi corporis quo magni quae consectetur, esse optio magnam doloremque. Doloribus similique laboriosam, possimus quaerat aperiam sit nulla asperiores et expedita quis enim dicta deserunt libero molestias? Deserunt, quasi sit obcaecati id consequatur aperiam impedit itaque ullam modi!</p>
        <?php endforeach ?>
        </div>
        <div class="container mt-3">
        <?php foreach ($keluhan as $data) : ?>
            <form action="<?= base_url() ?>operator/teruskanbidang/" method="POST">
                <div class="col-12">
                    <input type="hidden" name="id_keluhan" value="<?= $data['id_keluhan'] ?>" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    <input type="hidden" name="judul" value="<?= $data['judul'] ?>" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    <input type="hidden" name="keluhan" value="<?= $data['keluhan'] ?>" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    <input type="hidden" name="tanggal_keluhan" value="<?= $data['tanggal_keluhan'] ?>" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    <input type="hidden" name="status" value="<?= $data['status'] ?>" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    <label for="validationCustom04" class="form-label">Nama Bidang</label>
                    <select class="form-select" name="id_bidang" id="validationCustom04" required>
                        <option selected disabled value="">Choose...</option>
                        <?php foreach ($bidang as $row) :?>
                            <option value="<?= $row['id_bidang'] ?>"> <?= $row['nama_bidang'] ?></option>
                            <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid state.
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
            <form action="<?= base_url() ?>operator/teruskanbidang/" method="POST">
                <div class="col-12">
                    <input type="hidden" name="id_keluhan" value="<?= $data['id_keluhan'] ?>" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    <input type="hidden" name="judul" value="<?= $data['judul'] ?>" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    <input type="hidden" name="keluhan" value="<?= $data['keluhan'] ?>" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    <input type="hidden" name="tanggal_keluhan" value="<?= $data['tanggal_keluhan'] ?>" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    <input type="hidden" name="status" value="<?= $data['status'] ?>" class="form-control shadow-none" placeholder="Nama Belakang" required>
                    <label for="validationCustom04" class="form-label">Nama Bidang</label>
                    <select class="form-select" name="id_bidang" id="validationCustom04" required>
                        <option selected disabled value="">Choose...</option>
                        <?php foreach ($bidang as $row) :?>
                            <option value="<?= $row['id_bidang'] ?>"> <?= $row['nama_bidang'] ?></option>
                            <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid state.
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
            <?php endforeach ?>
        </div>
    </div>
</div>