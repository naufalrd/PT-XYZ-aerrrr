<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="container mb-container">
    
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="fs-3 text-start"><?= $keluhan[0]['judul'] ?></h1>
        <p class="fs-3 text-start"><?= $keluhan[0]['keluhan'] ?></p>
        <?php foreach ($feedback as $data) : ?>
        <div class="d-flex justify-content-end">
            <div class="w-75 border border-info rounded-3 shadow-sm p-3 mb-3">
                <p class="text-secondary"><?= $data['respon'] ?></p>
                <p class="mb-0"><?= $data['nama_bidang'] ?> - <?= $data['tanggal_respon'] ?></p>
            </div>
        </div>
        <div class="d-flex justify-content-start <?= $data['feedback'] == '' ? 'd-none' : ''?>">
            <div class="w-75 border border-success rounded-3 shadow-sm p-3 mb-3">
                <p class="text-secondary"><?= $data['feedback'] ?></p>
                <p class="mb-0"><?= $data['username'] ?> - <?= $data['tanggal_keluhan'] ?></p>
            </div>
        </div>
        <?php endforeach ?>
        <!-- Komentar User -->
        <?php $getLastFeedback = $feedback[count($feedback) - 1]['id_feedback'];?>~
        <div class="container mt-5 <?= $data['status'] == "Selesai" || $data['feedback'] != NULL ? 'd-none' : '' ?>">
            <p class="fs-6" id="questionForm">Apakah anda puas dengan jawabannya ? <span><a  href="<?=site_url()?>pelanggan/selesai/<?=$data['id_keluhan']?>/<?=$getLastFeedback?>" class="btn btn-primary btn-sm">Ya</a> <button class="btn btn-outline-danger btn-sm" onclick="showForm()">Tidak</button></span></p>
            <div class="row d-none" id="showForm">
                <form action="<?= site_url()?>pelanggan/tambah_respon/<?=$getLastFeedback?>/<?=$data['id_keluhan']?>" method="POST">
                    <textarea id="summernote" name="respon_pelanggan"></textarea>
                    <button type="submit" class="btn btn-sm btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
        
    </div>

        
        <script>
            function showForm(){
                const showForm = document.getElementById('showForm');
                const hideQuestion = document.getElementById('questionForm');
                showForm.className = 'row d-block'
                hideQuestion.className = 'd-none'
            }

            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>
    </div>
</div>