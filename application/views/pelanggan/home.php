<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center">Keluhan</h1>
        <div class="text-center mb-5">
            <a href="<?= site_url(); ?>pelanggan/add_keluhan" class="btn btn-outline-dark btn-sm"> + Keluhan</a>
        </div>
        <div class="container text-center overflow-auto">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <th>1</th>
                        <td>Pelanggan</td>
                        <td>Keran WC di Pattimura Macet</td>
                        <td>02-02-2022</td>
                    </tr>
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
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <th>1</th>
                        <td>Pelanggan</td>
                        <td>Keran WC di Pattimura Macet</td>
                        <td>02-02-2022</td>
                        <td><a href="<?= site_url() ;?>pelanggan/details" class="btn btn-sm btn-primary"><i class="bx bx-detail"></i> Details</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>