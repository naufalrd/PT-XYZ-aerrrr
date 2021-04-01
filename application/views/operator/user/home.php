<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center">User</h1>
        <p class="text-center mb-5">
            <a href="<?= site_url(); ?>operator/add_form" class="btn btn-sm btn-outline-dark"> + User</a>
        </p>
        <div class="container text-center overflow-auto">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Level</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <th>1</th>
                        <td>Naufal Rafif</td>
                        <td>Username</td>
                        <td>Alamat</td>
                        <td>Level</td>
                        <td><a href="<?= site_url(); ?>operator/edit_form" class="btn btn-sm btn-primary"><i class="bx bx-edit"></i> Edit</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>