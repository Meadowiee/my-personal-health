<div class="card" style="border-radius: 15px;">
    <div class="card-header pb-1">
        <h3 class="text-capitalize">Hi, <?= esc(session()->get('username')) ?></h3>
        <p>Here's your linked files information</p>
    </div>
    <div class="card-body m-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php foreach ($files as $file): ?>
                <div class="col">
                    <div class="card h-60 rounded-3 m-1">
                        <img class="card-img-top"
                            src="<?= $file['isImage'] ? $file['path'] : base_url('uploads/general/placeholder.jpg') ?>"
                            alt="Card image"
                            style="height: 140px; object-fit: cover; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
                        <a class="card-body p-2 m-2" href="<?= $file['path'] ?>" target="_blank">
                            <h5 class="card-title mb-1"><?= $file['alias'] ?></h5>
                            <p class="card-text mt-0 small text-secondary">Uploaded at <?= $file['date'] ?></p>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>