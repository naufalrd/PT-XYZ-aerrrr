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
                    <?php $no=1;
                    foreach ($user as $data) :?>
                    <tr class="text-center">
                        <th><?= $no++ ?></th>
                        <td><?= $data['nama_depan']." ".$data['nama_belakang']?></td>
                        <td><?= $data['username']?></td>
                        <td><?= $data['alamat']?></td>
                        <td><?= $data['nama_bidang']?></td>
                        <td><a href="<?= site_url(); ?>operator/edit_form/<?= $data['id_user'] ?>" class="btn btn-sm btn-primary"><i class="bx bx-edit"></i> Edit</a>  <a href="<?= site_url(); ?>operator/delete_user/<?= $data['id_user'] ?>" class="btn btn-sm btn-danger"><i class="bx bx-delete"></i> Delete</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>