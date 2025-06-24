<?= form_open(
    $isEdit && !empty($getData['id']) ? 'checkup/update/' . $getData['id'] : 'checkup/create',
    ['id' => 'form-checkup', 'enctype' => 'multipart/form-data', 'novalidate' => true]
) ?>
<?php $validation = session('validation'); ?>
<div class="card" style="border-radius: 15px;">
    <div class="card-header pb-1">
        <h3 class="text-capitalize">Hi, <?= esc(session()->get('username')) ?></h3>
        <p>Here's your check up information</p>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col-md-6 mb-3">
                <h6>Doctor <span class="text-danger">*</span></h6>
                <input type="text" name="doctor"
                    class="form-control <?= $validation && $validation->hasError('doctor') ? 'is-invalid' : '' ?>"
                    placeholder="Enter doctor"
                    value="<?= old('doctor', $getData['doctor'] ?? '') ?>">
                <div class="invalid-feedback"><?= $validation?->getError('doctor') ?></div>
            </div>
            <div class="col-md-6 mb-3">
                <h6>Date <span class="text-danger">*</span></h6>
                <input type="date" name="date"
                    class="form-control <?= $validation && $validation->hasError('date') ? 'is-invalid' : '' ?>"
                    value="<?= old('date', $getData['date'] ?? '') ?>">
                <div class="invalid-feedback"><?= $validation?->getError('date') ?></div>
            </div>
            <div class="col-md-6 mb-3">
                <h6>Hospital / Clinic <span class="text-danger">*</span></h6>
                <input type="text" name="hospital_clinic"
                    class="form-control <?= $validation && $validation->hasError('hospital_clinic') ? 'is-invalid' : '' ?>"
                    placeholder="Enter hospital or clinic"
                    value="<?= old('hospital_clinic', $getData['hospital_clinic'] ?? '') ?>">
                <div class="invalid-feedback"><?= str_replace('hospital_clinic', 'hospital / clinic', $validation?->getError('hospital_clinic') ?? '') ?></div>
            </div>
            <div class="col-md-6 mb-3">
                <h6>ICD-10</h6>
                <select name="icd_id" class="form-select <?= $validation && $validation->hasError('icd_id') ? 'is-invalid' : '' ?>">
                    <option value="">-- Select ICD --</option>
                    <?php foreach ($icds as $icd): ?>
                        <option value="<?= $icd['id'] ?>" <?= (old('icd_id', $getData['icd_id'] ?? '') == $icd['id']) ? 'selected' : '' ?>>
                            <?= $icd['code'] . ' - ' . $icd['name_en'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback"><?= $validation?->getError('icd_id') ?></div>
            </div>
            <div class="col-md-6 mb-3">
                <h6>Symptoms <span class="text-danger">*</span></h6>
                <textarea name="symptoms"
                    class="form-control <?= $validation && $validation->hasError('symptoms') ? 'is-invalid' : '' ?>"
                    placeholder="Enter symptoms"><?= old('symptoms', $getData['symptoms'] ?? '') ?></textarea>
                <div class="invalid-feedback"><?= $validation?->getError('symptoms') ?></div>
            </div>
            <div class="col-md-6 mb-3">
                <h6>Notes</h6>
                <textarea name="notes" class="form-control" placeholder="Enter notes"><?= old('notes', $getData['notes'] ?? '') ?></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <h6>Treatment <span class="text-danger">*</span></h6>
                <textarea name="treatment"
                    class="form-control <?= $validation && $validation->hasError('treatment') ? 'is-invalid' : '' ?>"
                    placeholder="Enter treatment"><?= old('treatment', $getData['treatment'] ?? '') ?></textarea>
                <div class="invalid-feedback"><?= $validation?->getError('treatment') ?></div>
            </div>
            <div class="col-md-6 mb-3">
                <h6>Related Files</h6>
                <input type="file" name="related_files" accept=".jpg,.jpeg,.png,.pdf,.docx"
                    class="form-control <?= $validation && $validation->hasError('related_files') ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback"><?= $validation?->getError('related_files') ?></div>
                <?php if (!empty($getData['related_files']) && !$isEdit) {
                    $files = json_decode($getData['related_files'], true);
                    foreach ($files as $file) { ?>
                        <a href="<?= base_url('uploads/checkup/' . $file) ?>" target="_blank">Click to see your current file</a><br>
                <?php }
                } ?>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end gap-2">
            <a href="<?= base_url($isEdit && !empty($getData['id']) ? '/checkup/show/' . $getData['id'] : '/checkup') ?>" class="btn btn-secondary">Discard</a>
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </div>
</div>

<?= form_close() ?>