<div class="container mb-container">
    
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="fs-3 text-start"><?= $keluhan[0]['judul'] ?></h1>
        <p class="fs-3 text-start"><?= $keluhan[0]['keluhan'] ?></p>
        <p class="fs-6"><?= $keluhan[0]['username'] ?> - <?= date_indo($keluhan[0]['tanggal_keluhan']) ?></p>
        <?php foreach ($feedback as $data) : ?>
        <div class="d-flex justify-content-end">
            <div class="w-75 border border-info rounded-3 shadow-sm p-3 mb-3">
                <p class="text-secondary"><?= $data['respon'] ?></p>
                <p class="mb-0"><?= $data['nama_bidang'] ?> - <?= date_indo($data['tanggal_respon']) ?></p>
            </div>
        </div>
        <div class="d-flex justify-content-start <?= $data['feedback'] == '' ? 'd-none' : ''?>">
            <div class="w-75 border border-success rounded-3 shadow-sm p-3 mb-3">
                <p class="text-secondary"><?= $data['feedback'] ?></p>
                <p class="mb-0"><?= $data['username'] ?> - <?= date_indo($data['tanggal_keluhan']) ?></p>
            </div>
        </div>
        <?php endforeach ?>
    </div>

    <div class="row mt-5 mb-2 mx-5 p-5 shadow bg-white rounded">
    <h1 class="text-center">Detail Identitas Pengeluh</h1>
        <div class="container mb-2 overflow-auto">
        <table class="table table-borderless mt-3" >
             <tr>
                <th>Username</th>
                <td><?= $keluhan[0]['username'] ?></td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td><?= $keluhan[0]['nama_depan'] ?> <?= $keluhan[0]['nama_belakang'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $keluhan[0]['email_user'] ?></td>
            </tr>
            <tr>
                <th>No Hp</th>
                <td><?= $keluhan[0]['no_hp'] ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?= $keluhan[0]['alamat'] ?></td>
            </tr>
        </table>
        </div>
    </div>
</div>