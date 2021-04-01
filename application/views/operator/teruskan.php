<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center mb-5">Teruskan ke Bidang</h1>
        <div class="container text-start overflow-auto">
            <p class="fs-3 mb-0">Kenapa Kok Toilet Macet</p>
            <p class="fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia possimus tenetur exercitationem dolorum voluptate eveniet ea molestiae quos aut doloribus, eligendi nostrum voluptatum fugit in cupiditate aperiam et! Quaerat est repellendus veniam fugiat in nam nulla libero commodi aliquam quibusdam eligendi, ab quos beatae excepturi repudiandae, possimus non quod eveniet harum. Iusto, deserunt. Unde nesciunt quae aut enim? Veritatis dolorum distinctio ea animi corporis quo magni quae consectetur, esse optio magnam doloremque. Doloribus similique laboriosam, possimus quaerat aperiam sit nulla asperiores et expedita quis enim dicta deserunt libero molestias? Deserunt, quasi sit obcaecati id consequatur aperiam impedit itaque ullam modi!</p>
        </div>
        <div class="container mt-3">
            <form action="<?= site_url() ;?>operator/submit_data">
                <div class="col-12">
                    <label for="validationCustom04" class="form-label">Nama Bidang</label>
                    <select class="form-select" id="validationCustom04" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="">Bidang Pariwisata</option>
                        <option value="">Bidang Kehutanan</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid state.
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
        </div>
    </div>
</div>