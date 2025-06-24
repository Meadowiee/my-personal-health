<div class="card" style="border-radius: 15px;">
    <div class="card-header pb-1">
        <h3 class="text-capitalize">Hi, <?= esc(session()->get('username')) ?></h3>
        <p>Here's your check up information</p>
    </div>
    <div class="card-body">
        <div class="row g-4">
            <div class="col-md-6">
                <h6 class="text-capitalize">Title</h6>
                <input disabled name="title" type="text" class="form-control" value="<?= esc($getData['title'] ?? '') ?>" placeholder="-">
            </div>
            <div class="col-md-6">
                <h6 class="text-capitalize">Date</h6>
                <input disabled name="date" type="date" class="form-control" value="<?= esc($getData['date'] ?? '') ?>" placeholder="-">
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="mt-3">
                    <h6 class="text-capitalize">Symptoms</h6>
                    <textarea disabled name="symptoms" class="form-control" placeholder="-"><?= esc($getData['symptoms'] ?? '') ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mt-3">
                    <h6 class="text-capitalize">Treatment</h6>
                    <textarea disabled name="treatment" class="form-control" placeholder="-"><?= esc($getData['treatment'] ?? '') ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <h6>Related Files</h6>
                <?php if (!empty($getData['related_files'])): 
                    $files = json_decode($getData['related_files'], true);
                    foreach ($files as $file): ?>
                        <a href="<?= base_url('uploads/logs/' . $file) ?>" target="_blank">Click to see your current file</a><br>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-secondary mb-0">There are no related files at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="card-footer bg-white">
        <div class="d-flex justify-content-end">
            <a href="<?= base_url('logs/edit/' . $getData['id']) ?>" class="btn btn-info">Modify</a>
        </div>
    </div>
</div>
