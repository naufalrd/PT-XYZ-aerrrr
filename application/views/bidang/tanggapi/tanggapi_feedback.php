<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<div class="mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h3 class="fs-3 text-start"><?= $keluhan[0]['judul'] ?></h3>
        <p class="fs-6"><?= $keluhan[0]['keluhan'] ?></p>
        <p class="mb-3"><?= $keluhan[0]['username'] ?> ( <?= $keluhan[0]['tanggal_keluhan'] ?> )</p>
        <?php foreach ($feedback as $data) : ?>
        <div class="d-flex justify-content-end">
            <div class="w-75 border border-info rounded-3 shadow-sm p-3 mb-3">
                <p class="text-secondary"><?= $data['respon'] ?></p>
                <p class="mb-0"><?= $data['nama_bidang'] ?> - <?= $data['tanggal_respon'] ?></p>
            </div>
        </div>
        <div class="d-flex justify-content-start <?= $data['feedback'] == '' ? 'd-none' : ''?>">
            <div class="w-75 border border-success rounded-3 shadow-sm p-3 mb-3">
                <p class="text-secondary"><?= $data['feedback'] ?></p>
                <p class="mb-0"><?= $data['username'] ?> - <?= $data['tanggal_keluhan'] ?></p>
            </div>
        </div>
        <?php endforeach ?>
        <!-- Komentar Bidang -->
        <div class="container mt-5 <?php if($feedback != NULL) {?> <?= $feedback[count($feedback) - 1]['feedback'] == "" ? 'd-none' : '' ;?><?php };?>">
            <div class="row" id="showForm text-center">
                <form action="<?= site_url(); ?>bidang/submit_tanggapan" method="POST">
                <input type="hidden" name="id_keluhan" value="<?= $keluhan[0]['id_keluhan'] ?>" required>
                    <textarea id="summernote" name="respon" class="text-start"></textarea>
                    <button type="submit" class="btn btn-sm btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>
    </div>
</div>