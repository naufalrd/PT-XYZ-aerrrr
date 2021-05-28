<div class="container mb-container">
    
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="fs-3 text-start"><?= $keluhan[0]['judul'] ?></h1>
        <p class="fs-3 text-start"><?= $keluhan[0]['keluhan'] ?></p>
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
    
    <!-- menghitung lama keluhan ditangani -->
    <?php 
        if (!empty($feedback)) {
            $tanggalKeluh = new DateTime($keluhan[0]['tanggal_keluhan']);
            $tanggalRespon = new DateTime($feedback[count($feedback)-1]['tanggal_respon']);
            $lamaPenangan = $tanggalRespon->diff($tanggalKeluh)->days + 1 ;
        }
    ?>
    <div class="row mt-5 mb-2 mx-5 p-5 shadow bg-white rounded">
    <h1 class="text-center">Detail Keluhan</h1>
        <div class="container mb-2 overflow-auto">
        <table class="table table-borderless mt-3" >
            <tr>
                <th>Status Keluhan</th>
                <td><?= $keluhan[0]['status'] ?></td>
            </tr>
            <?php if($keluhan[0]['status'] == 'Selesai') {?> 
                <tr>
                    <th>Lama Keluhan ditangani</th>
                    <td><?= $lamaPenangan . ' hari' ?></td>
                </tr>
                <tr>
                    <th>Rating Penanganan</th>
                    <td><?= $keluhan[0]['rating'] ?></td>
                </tr>
                <tr>
                    <th>Ulasan Rating</th>
                    <td> <?= $keluhan[0]['rating_desc'] == '' ? 'Tidak ada ulasan rating' : $keluhan[0]['rating_desc'] ?></td>
                </tr>
            <?php }; ?>
            <tr>
                <th>Username Pelanggan</th>
                <td><?= $keluhan[0]['username'] ?></td>
            </tr>
            <tr>
                <th>Nama Lengkap Pelanggan</th>
                <td><?= $keluhan[0]['nama_depan'] ?> <?= $keluhan[0]['nama_belakang'] ?></td>
            </tr>
            <tr>
                <th>Email Pelanggan</th>
                <td><?= $keluhan[0]['email_user'] ?></td>
            </tr>
            <tr>
                <th>No Hp Pelanggan</th>
                <td><?= $keluhan[0]['no_hp'] ?></td>
            </tr>
            <tr>
                <th>Alamat Pelanggan</th>
                <td><?= $keluhan[0]['alamat'] ?></td>
            </tr>
        </table>
        </div>
    </div>
</div>