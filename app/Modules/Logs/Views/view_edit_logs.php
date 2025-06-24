<?= form_open(
    $isEdit && !empty($getData['id']) ? 'logs/update/' . $getData['id'] : 'logs/create',
    ['id' => 'form-logs', 'enctype' => 'multipart/form-data', 'novalidate' => true]
) ?>
<?php $validation = session('validation'); ?>
<div class="card" style="border-radius: 15px;">
    <div class="card-header pb-1">
        <h3 class="text-capitalize">Hi, <?= esc(session()->get('username')) ?></h3>
        <p>Here's your check up information</p>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-md-2 g-3">
            <div class="col">
                <h6>Title <span class="text-danger">*</span></h6>
                <input type="text" name="title"
                    class="form-control <?= $validation && $validation->hasError('title') ? 'is-invalid' : '' ?>"
                    value="<?= old('title', $getData['title'] ?? '') ?>" placeholder="Enter title">
                <div class="invalid-feedback"><?= $validation?->getError('title') ?></div>
            </div>
            <div class="col">
                <h6>Date <span class="text-danger">*</span></h6>
                <input type="date" name="date"
                    class="form-control <?= $validation && $validation->hasError('date') ? 'is-invalid' : '' ?>"
                    value="<?= old('date', $getData['date'] ?? '') ?>">
                <div class="invalid-feedback"><?= $validation?->getError('date') ?></div>
            </div>
            <div class="col">
                <h6>Symptoms <span class="text-danger">*</span></h6>
                <textarea name="symptoms"
                class="form-control <?= $validation && $validation->hasError('symptoms') ? 'is-invalid' : '' ?>"
                placeholder="Enter symptoms"><?= old('symptoms', $getData['symptoms'] ?? '') ?></textarea>
                <div class="invalid-feedback"><?= $validation?->getError('symptoms') ?></div>
            </div>
            <div class="col">
                <h6>Treatment <span class="text-danger">*</span></h6>
                <textarea name="treatment"
                class="form-control <?= $validation && $validation->hasError('treatment') ? 'is-invalid' : '' ?>"
                placeholder="Enter treatment"><?= old('treatment', $getData['treatment'] ?? '') ?></textarea>
                <div class="invalid-feedback"><?= $validation?->getError('treatment') ?></div>
            </div>
            <div class="col">
                <h6>Related Files</h6>
                <input type="file" name="related_files" accept=".jpg,.jpeg,.png,.pdf,.docx"
                    class="form-control <?= $validation && $validation->hasError('related_files') ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback"><?= $validation?->getError('related_files') ?></div>
                <?php if (!empty($getData['related_files']) && !$isEdit) {
                    $files = json_decode($getData['related_files'], true);
                    foreach ($files as $file) { ?>
                        <a href="<?= base_url('uploads/logs/' . $file) ?>" target="_blank">Click to see your current file</a><br>
                <?php }
                } ?>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end gap-2">
            <a href="<?= base_url($isEdit && !empty($getData['id']) ? '/logs/show/' . $getData['id'] : '/logs') ?>" class="btn btn-secondary">Discard</a>
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </div>
</div>

<?= form_close() ?>