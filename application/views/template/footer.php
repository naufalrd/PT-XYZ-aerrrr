</div>
<!-- End of Content -->
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="sidebarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="sidebarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content bg-indigo poppins-light">
            <div class="modal-body">
                <div class="row p-0 text-light">
                    <div class="col-2 p-2">
                        <img src="<?= base_url(); ?>/assets/kesehatan-icon.png" class="w-100 rounded-circle">
                    </div>
                    <div class="col-8 poppins-md">
                        Hi, <?= $this->session->userdata('nama_depan').' '.$this->session->userdata('nama_belakang') ?> <br>
                        <a href="<?= site_url('auth/logout'); ?>" class="btn btn-warning btn-ss mt-1"><span class="fas fa-sign-out-alt">
                                &nbsp;</span>Sign Out</a>
                        <a href="#" class="btn btn-warning btn-ss mt-1"><span class="far fa-user-circle">
                                &nbsp;</span>My Profile</a>
                    </div>
                    <div class="col-2 text-end">
                        <a class="btn-transparent text-light" data-bs-dismiss="modal" aria-label="Close">
                            <span class="fas fa-times fs-5"></span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <ul class="navbar-nav mb-lg-0 my-3 text-small">
                        <li class="nav-item p-1<?= $this->session->userdata('level') != 'admin' ? ' d-none' : ''; ?>">
                            <a class="<?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == '' ? 'active' : '' ?> nav-link px-4 py-2 rounded-3 text-default" aria-current="page" href="<?= site_url(); ?>admin"><span class="fas fa-users">&nbsp;&nbsp;</span> User</a>
                        </li>
                        <li class="nav-item p-1<?= $this->session->userdata('level') != 'admin' ? ' d-none' : ''; ?>">
                            <a class="<?= $this->uri->segment(2) == 'jadwal' ? 'active' : '' ?> nav-link px-4 py-2 rounded-3 text-default" aria-current="page" href="<?= site_url(); ?>admin/jadwal"><span class="fas fa-calendar">&nbsp;&nbsp;</span> Jadwal</a>
                        </li>
                        <!-- Dokter -->
                        <li class="nav-item p-1<?= $this->session->userdata('level') != 'dokter' ? ' d-none' : ''; ?>">
                            <a class="<?= $this->uri->segment(1) == 'dokter' && $this->uri->segment(2) == '' ? 'active' : '' ?> nav-link px-4 py-2 rounded-3 text-default" aria-current="page" href="<?= site_url(); ?>dokter"><span class="fas fa-chart-pie">&nbsp;&nbsp;</span> Diagnosa</a>
                        </li>
                        <!-- Perawat -->
                        <li class="nav-item p-1<?= $this->session->userdata('level') != 'perawat' ? ' d-none' : ''; ?>">
                            <a class="<?= $this->uri->segment(1) == 'perawat' && $this->uri->segment(2) == '' ? 'active' : '' ?> nav-link px-4 py-2 rounded-3 text-default" aria-current="page" href="<?= site_url(); ?>perawat"><span class="fas fa-user">&nbsp;&nbsp;</span> Panggil</a>
                        </li>
                        <!-- Pasien -->
                        <li class="nav-item p-1<?= $this->session->userdata('level') != 'pasien' ? ' d-none' : ''; ?>">
                            <a class="<?= $this->uri->segment(1) == 'pasien' && $this->uri->segment(2) == '' ? 'active' : '' ?> nav-link px-4 py-2 rounded-3 text-default" aria-current="page" href="<?= site_url(); ?>pasien"><span class="fas fa-chart-bar">&nbsp;&nbsp;</span> Rekam Medis</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="<?= base_url(); ?>/assets/vendor/bs5-beta/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/chartist/dist/chartist.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/dashboard.js"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script> -->
</body>

</html>