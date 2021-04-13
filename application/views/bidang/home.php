<div class="container mb-container">
    <div class="<?= !isset($keluhan[0]['id_keluhan']) ? 'd-none' : ''  ;?> row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center">Keluhan Masuk</h1>
        <div class="container text-center overflow-auto">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal Keluhan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no= 1; foreach ($keluhan as $data) :?>
                    <tr class="text-center">    
                        <th><?= $no++?></th>
                        <td><?= $data['nama_depan']." ".$data['nama_belakang']?></td>
                        <td><?= $data['judul']?></td>
                        <td><?= date_indo($data['tanggal_keluhan'])?></td>
                        <td><?= $data['status']?></td>
                        <td><a href="<?= site_url(); ?>bidang/tanggapi_keluhan/<?= $data['id_keluhan'] ?>" class="btn btn-sm <?= $data['status'] == 'Diteruskan' ? 'btn-primary' : 'btn-success' ;?>">
                        <i class="bx <?= $data['status'] == 'Diteruskan' ? 'bx-right-arrow' : 'bx-message-alt-dots' ;?>"></i>
                        <?= $data['status'] == 'Diteruskan' ? 'Tanggapi' : 'Balas' ;?></a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="<?= !isset($tinjauan[0]['id_keluhan']) ? 'd-none' : ''  ;?> row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center">Keluhan Ditinjau</h1>
        <div class="container text-center overflow-auto">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal Keluhan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ni= 1; foreach ($tinjauan as $data2) :?>
                    <tr class="text-center">    
                        <th><?= $ni++?></th>
                        <td><?= $data2['nama_depan']." ".$data2['nama_belakang']?></td>
                        <td><?= $data2['judul']?></td>
                        <td><?= date_indo($data2['tanggal_keluhan'])?></td>
                        <td><?= $data2['status']?></td>
                        <td><a href="<?= site_url(); ?>bidang/details/<?= $data2['id_keluhan'] ?>" class="btn btn-sm <?= $data2['status'] == 'Ditinjau' ? 'btn-primary' : 'btn-success' ;?>"><i class="bx bx-message-<?= $data2['status'] == 'Ditinjau' ? 'error' : 'check' ;?>"></i> Detail</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- menghitung waktu penanganan tiap keluhan -->
    <?php 
    if($penanganan[0] != NULL){
        $lamaPenanganan[0] = $penanganan[0];
        $a = 0; 
        for($i=0; $i < count($penanganan); $i++) {
            if($lamaPenanganan[$a]['id_keluhan'] == $penanganan[$i]['id_keluhan']){
                $lamaPenanganan[$a] = $penanganan[$i];
            }else{
                $a = $a + 1;
                $lamaPenanganan[$a] = $penanganan[$i];
            }
        }
        $c = 0;
        foreach($lamaPenanganan as $b)
        {
            $tanggalKeluh = new DateTime($b['tanggal_keluhan']);
            $tanggalRespon = new DateTime($b['tanggal_respon']);
            $lamaWaktu[$c] = $tanggalRespon->diff($tanggalKeluh)->days + 1 ;
            $c = $c + 1;
        }
    }
    ?>

    <div class="<?= !isset($selesai[0]['id_keluhan']) ? 'd-none' : ''  ;?> row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center">Riwayat Keluhan</h1>
        <div class="container text-center overflow-auto">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal Keluhan</th>
                        <th scope="col">Lama Keluhan Ditangani</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ni= 1;$d = 0; foreach ($selesai as $data3) :?>
                    <tr class="text-center">    
                        <th><?= $ni++?></th>
                        <td><?= $data3['nama_depan']." ".$data3['nama_belakang']?></td>
                        <td><?= $data3['judul']?></td>
                        <td><?= date_indo($data3['tanggal_keluhan'])?></td>
                        <td><?= $lamaWaktu[$d++] . ' hari' ?></td>
                        <td><?= $data3['status']?></td>
                        <td><a href="<?= site_url(); ?>bidang/details/<?= $data3['id_keluhan'] ?>" class="btn btn-sm <?= $data3['status'] == 'Ditinjau' ? 'btn-primary' : 'btn-success' ;?>"><i class="bx bx-message-<?= $data3['status'] == 'Ditinjau' ? 'error' : 'check' ;?>"></i> Detail</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>