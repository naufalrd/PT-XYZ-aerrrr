<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>/assets/js/rater.js"></script>
<div class="container mb-container">
    <div>
        <div class="container" id="page-content">
            <div class="">
                <div class="row">
                    <div class="col-sm-8 col-md-6">
                        <div class="card">
                            <div class="card-header">Keluhan yang belum dan sudah selesai</div>
                            <div class="card-body">
                                <div>
                                    <canvas style="width: 400px;height: 400px" id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Rating Ulasan Pelanggan</div>
                            <div class="card-body row">
                            <div class="col-5 col-sm-5 col-md-4 col-lg-4">
                                <h1 class="fs-1 text-bold ms-2"><?= round(($jumlahRating['jumlah'] / count($selesai)),2);?></h1>
                                <div class="text-center">
                                    <div class="fs-5 mb-0 rating" data-rate-value="<?= round(($jumlahRating['jumlah'] / count($selesai)),2);?>" style="color: #ffe900"></div>
                                </div>
                            </div>
                            <div class="col-7 col-sm-7 col-md-8 col-lg-8 align-self-center">
                                <p class="text-center fs-3"><b><?= count($selesai) ;?> Keluhan Selesai</b></p>
                            </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">Rating Ulasan Sistem</div>
                            <div class="card-body row">
                            <div class="col-5 col-sm-5 col-md-4 col-lg-4">
                                <h1 class="fs-1 text-bold ms-2"><?= round(($ratingSistem['jumlah'] / count($pelanggan)),2) ;?></h1>
                                <div class="text-center">
                                    <div class="fs-5 mb-0 ratings" data-rate-value="<?= round(($ratingSistem['jumlah'] / count($pelanggan)),2) ;?>" style="color: #ffe900"></div>
                                </div>
                            </div>
                            <div class="col-7 col-sm-7 col-md-8 col-lg-8 align-self-center">
                                <p class="text-center fs-3"><b><?= count($pelanggan) ;?> Pelanggan Aktif</b></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mx-4 px-3 py-5 shadow bg-white rounded">
        <h1 class="text-center">Keluhan Diteruskan</h1>
        <div class="container text-center overflow-auto">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Bidang</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($diteruskan as $data) : ?>
                        <tr class="text-center">
                            <th><?= $no++ ?></th>
                            <td><?= $data['nama_depan'] . " " . $data['nama_belakang'] ?></td>
                            <td><?= $data['judul'] ?></td>
                            <td><?= date_indo($data['tanggal_keluhan']) ?></td>
                            <td><?= $data['nama_bidang'] ?></td>
                            <td><a href="<?= site_url(); ?>direktur/details/<?= $data['id_keluhan'] ?>" class="btn btn-sm btn-primary"><i class="bx bx-detail"></i> Detail</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-5 mx-4 px-3 py-5 shadow bg-white rounded">
        <h1 class="text-center">Keluhan Selesai</h1>
        <div class="container text-center overflow-auto">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Bidang</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($selesai as $data) : ?>
                        <tr class="text-center">
                            <th><?= $no++ ?></th>
                            <td><?= $data['nama_depan'] . " " . $data['nama_belakang'] ?></td>
                            <td><?= $data['judul'] ?></td>
                            <td><?= date_indo($data['tanggal_keluhan']) ?></td>
                            <td><?= $data['nama_bidang'] ?></td>
                            <td><a href="<?= site_url(); ?>direktur/details/<?= $data['id_keluhan'] ?>" class="btn btn-sm btn-primary"><i class="bx bx-detail"></i> Detail</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mx-4 px-3 py-5 shadow bg-white rounded">
        <h1 class="text-center">Review Sistem</h1>
        <div class="container text-center overflow-auto">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Review</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($reviewSistem as $data) : ?>
                        <tr class="text-center">
                            <th><?= $no++ ?></th>
                            <td><?= $data['nama_depan'] . " " . $data['nama_belakang'] ?></td>
                            <td><?= $data['rate'] ?></td>
                            <td><?= $data['review'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>






<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<!-- chart js script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Contoh Script buat manggil -->
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Selesai', 'Belum Selesai'],
            responsive: true,
            datasets: [{
                label: '# of Votes',
                data: [<?= count($selesai) ?>, <?= count($diteruskan) ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        // options: {
        //     scales: {
        //         y: {
        //             beginAtZero: true,
        //             ticks: {
        //                 // forces step size to be 1 units
        //                 stepSize: 1
        //             }
        //         }
        //     }
        // }
    });

    // Options
    var options = {
        max_value: 5,
        step_size: 0.1,
        initial_value: 0,
        selected_symbol_type: 'utf8_star', // Must be a key from symbols
        emptyStarImage: "./upload/image/starbackground.png",
        cursor: 'pointer',
        readonly: true,
        change_once: false, // Determines if the rating can only be set once
    }

    $(".rating").rate(options);
    $(".ratings").rate(options);
</script>