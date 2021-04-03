<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <p class="fs-3 text-start"><?= $keluhan[0]['judul'] ?></p>
        <p class="fs-6"><?= $keluhan[0]['keluhan'] ?></p>
        <div class="d-flex justify-content-end">
            <div class="w-75 border border-info rounded-3 shadow-sm p-3 mb-3">
                <p class="text-secondary mb-0">Haiii, <?= $keluhan[0]['username'] ?></p>
                <p class="text-secondary"><?= $keluhan[0]['respon'] ?></p>
                <p class="mb-0"><?= $keluhan[0]['nama_bidang'] ?> - <?= $keluhan[0]['tanggal_respon'] ?></p>
            </div>
        </div>
        <?php if( $keluhan[0]['feedback'] != '') { ?>
        <div class="d-flex justify-content-start">
            <div class="w-75 border border-success rounded-3 shadow-sm p-3 mb-3">
                <p class="text-secondary"><?= $keluhan[0]['feedback'] ?></p>
                <p class="mb-0"><?= $keluhan[0]['username'] ?>  - <?= $keluhan[0]['tanggal_feedback'] ?> </p>
            </div>
        </div>
        <?php } ?>
        <!-- <div class="d-flex justify-content-end">
            <div class="w-75 border border-info rounded-3 shadow-sm p-3 mb-3">
                <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla dolore iure aperiam repudiandae, rem aspernatur neque! Odit est maxime optio voluptatem officiis consequatur in iste iusto alias expedita sapiente sed pariatur minima tempore ipsum, nisi fuga? Sed, adipisci quidem voluptates dolorum impedit iure odio nobis quia! Sint sequi nisi voluptas corrupti cumque sit illum officiis, ea, laborum incidunt nemo neque accusamus rem est eius magni! Error sed tempora molestias autem illum. Aliquid minima nihil debitis. Eum rerum pariatur ratione perferendis. Necessitatibus non error consequatur nobis deleniti impedit cum tenetur qui, beatae in modi nemo aperiam, ducimus facilis, possimus totam expedita.</p>
                <p class="mb-0">Bidang Peninjauan Mutu - 22-01-2022</p>
            </div>
        </div> -->

    </div>
</div>