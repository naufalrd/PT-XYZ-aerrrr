<div class="container mb-container">
    <div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
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
                    <div class="col-sm-8 col-md-6">
                        <div class="card">
                            <div class="card-header">Bidang yang dituju di setiap ulasan</div>
                            <div class="card-body">
                                <div>
                                    <canvas style="width: 400px;height: 400px" id="myChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Rating Ulasan Pelanggan</div>
                            <div class="card-body">
                                <div>
                                    <canvas style="width: 400px;height: 400px" id="ulasanPelanggan"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
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

    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
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
</div>






<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<!-- chart js script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Contoh Script buat manggil -->
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Selesai', 'Belum Selesai'],
            datasets: [{
                label: '# of Votes',
                data: [<?= count($selesai) ?>, <?= count($diteruskan) ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var ctx2 = document.getElementById('myChart2');
    var myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Jaminan Kualitas', 'Pembelian', 'Distribusi'],
            datasets: [{
                label: '# of Votes',
                data: [<?= count($JaminanKualitas).','. count($Pembelian).','. count($Distribusi) ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Rating ulasan pelanggan
    var ulasanPelanggan = document.getElementById('ulasanPelanggan');
    var myChart3 = new Chart(ulasanPelanggan, {
        type: 'bar',
        data: {
            labels: ['Jaminan Kualitas', 'Pembelian', 'Distribusi'],
            datasets: [{
                label: 'Rating Ulasan Pelanggan',
                data: [<?= $RatingJaminanKualitas->jumlah/count($JaminanKualitas).','.$RatingPembelian->jumlah/(count($Pembelian)!=0 ? count($Pembelian) : '1').','.$RatingDistribusi->jumlah/(count($Distribusi)!=0 ? count($Distribusi) : '1') ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>