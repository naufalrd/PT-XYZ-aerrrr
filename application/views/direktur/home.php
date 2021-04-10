<div>
    <canvas id="myChart"></canvas>
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
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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

<div class="container mb-container">
    <div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row">
                    <div class="container-fluid d-flex justify-content-center">
                        <div class="col-sm-8 col-md-6">
                            <div class="card">
                                <div class="card-header">Pie chart</div>
                                <div class="card-body" style="height: 420px">
                                    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                        </div>
                                    </div> <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
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
                        <th scope="col">Bidang</th>
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
                        <td><?= $data['nama_bidang']?></td>
                        <td><a href="<?= site_url(); ?>direktur/details/<?= $data['id_keluhan'] ?>" class="btn btn-sm btn-primary"><i class="bx bx-detail"></i> Detail</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
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
                <?php $no=1;
                foreach ($diteruskan as $data) :?>
                    <tr class="text-center">    
                        <th><?= $no++?></th>
                        <td><?= $data['nama_depan']." ".$data['nama_belakang']?></td>
                        <td><?= $data['judul']?></td>
                        <td><?= date_indo($data['tanggal_keluhan'])?></td>
                        <td><?= $data['nama_bidang']?></td>
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
                <?php $no=1;
                foreach ($selesai as $data) :?>
                    <tr class="text-center">    
                        <th><?= $no++?></th>
                        <td><?= $data['nama_depan']." ".$data['nama_belakang']?></td>
                        <td><?= $data['judul']?></td>
                        <td><?= date_indo($data['tanggal_keluhan'])?></td>
                        <td><?= $data['nama_bidang']?></td>
                        <td><a href="<?= site_url(); ?>direktur/details/<?= $data['id_keluhan'] ?>" class="btn btn-sm btn-primary"><i class="bx bx-detail"></i> Detail</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>