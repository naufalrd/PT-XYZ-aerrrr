<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center">Keluhan Ditangani</h1>
        <div class="container text-center overflow-auto">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1;
                foreach ($keluhan as $data) :?>
                    <tr class="text-center">    
                        <th><?= $no++?></th>
                        <td><?= $data['nama_depan']." ".$data['nama_belakang']?></td>
                        <td><?= $data['judul']?></td>
                        <td><?= date_indo($data['tanggal_keluhan'])?></td>
                        <td><a href="<?= site_url(); ?>direktur/details/<?= $data['id_keluhan'] ?>" class="btn btn-sm btn-primary"><i class="bx bx-detail"></i> Detail</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>