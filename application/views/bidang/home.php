<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
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
                        <td><?= $data['tanggal_keluhan']?></td>
                        <td><?= $data['status']?></td>
                        <td><a href="<?= site_url(); ?>bidang/tanggapi_keluhan/<?= $data['id_keluhan'] ?>" class="btn btn-sm btn-primary"><i class="bx bx-right-arrow"></i> Tanggapi</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center">Keluhan Dalam Proses Penanganan</h1>
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
                    <?php $ni= 1; foreach ($ditangani as $data2) :?>
                    <tr class="text-center">    
                        <th><?= $ni++?></th>
                        <td><?= $data2['nama_depan']." ".$data2['nama_belakang']?></td>
                        <td><?= $data2['judul']?></td>
                        <td><?= $data2['tanggal_keluhan']?></td>
                        <td><?= $data2['status']?></td>
                        <td><a href="<?= site_url(); ?>bidang/tanggapi_feedback/<?= $data2['id_keluhan'] ?>" class="btn btn-sm btn-primary"><i class="bx bx-detail"></i> Detail</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center">Keluhan Terselesaikan</h1>
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
                    <?php $ni= 1; foreach ($selesai as $data3) :?>
                    <tr class="text-center">    
                        <th><?= $ni++?></th>
                        <td><?= $data3['nama_depan']." ".$data3['nama_belakang']?></td>
                        <td><?= $data3['judul']?></td>
                        <td><?= $data3['tanggal_keluhan']?></td>
                        <td><?= $data3['status']?></td>
                        <td><a href="<?= site_url(); ?>bidang/details/<?= $data3['id_keluhan'] ?>" class="btn btn-sm btn-primary"><i class="bx bx-detail"></i> Detail</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>