<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center">Keluhan</h1>
        <div class="text-center mb-5">
            <a href="<?= site_url(); ?>pelanggan/addkeluhan" class="btn btn-outline-dark btn-sm"> + Keluhan</a>
        </div>
        <div class="container text-center overflow-auto">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($keluhan as $a) : ?>
                    <tr class="text-center">
                        <th><?= $no++ ?></th>
                        <td><?= $a['judul']?></td>
                        <td><?= $a['tanggal_keluhan']?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center mb-5">Riwayat Keluhan</h1>
        <div class="container text-center overflow-auto">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($riwayat as $b) : ?>
                    <tr class="text-center">
                        <th><?=$no++?></th>
                        <td><?= $b['judul']?></td>
                        <td><?= $b['tanggal_keluhan']?></td>
                        <td><?= $b['status']?></td>
                        <td><a href="<?= site_url() ;?>pelanggan/details/<?= $b['id_keluhan']?>" class="btn btn-sm btn-primary"><i class="bx bx-detail"></i> Details</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>