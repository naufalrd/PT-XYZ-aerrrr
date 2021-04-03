<div class="container mb-container">
    
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="fs-3 text-start"><?= $keluhan[0]['judul'] ?></h1>
        <p class="fs-3 text-start"><?= $keluhan[0]['keluhan'] ?></p>
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
    </div>
    
</div>