<?= form_open($isEdit && !empty($getData['id'])? 'checkup/update/' . $getData['id'] : 'checkup/create', ['id' => 'form-checkup', 'enctype' => 'multipart/form-data']) ?>

<div class="card" style="border-radius: 15px;">
    <div class="card-header pb-1">
        <h3 class="text-capitalize">Hi, <?= esc(session()->get('username')) ?></h3>
        <p>Here's your check up information</p>
    </div>
    <div class="card-body">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <h6 class="text-capitalize">Doctor</h6>
                    <input name="doctor" type="text" class="form-control" placeholder="Enter doctor" value="<?= esc($getData['doctor'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">Hospital / Clinic</h6>
                    <input name="hospital_clinic" type="text" class="form-control" placeholder="Enter hospital or clinic" value="<?= esc($getData['hospital_clinic'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">symptoms</h6>
                    <textarea name="symptoms" class="form-control" placeholder="Enter symptoms"><?= esc($getData['symptoms'] ?? '') ?></textarea>
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">notes</h6>
                    <textarea name="notes" class="form-control" placeholder="Enter notes"><?= esc($getData['notes'] ?? '') ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <h6 class="text-capitalize">Date</h6>
                    <input name="date" type="date" class="form-control" value="<?= esc($getData['date'] ?? '') ?>" placeholder="Enter date">
                </div>
                <div class="mb-3">
                    <h6>ICD-10</h6>
                    <select name="icd_id" id="icd_id" class="form-select text-capitalize">
                        <?php foreach ($icds as $icd) { ?>
                            <option value="<?= $icd['id'] ?>" <?= ($getData['icd_id'] ?? '') === $icd['id'] ? 'selected' : '' ?>>
                                <?= $icd['code'] . ' -  ' . $icd['name_en'] ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-capitalize">treatment</h6>
                        <textarea name="treatment" class="form-control" placeholder="Enter treatment"><?= esc($getData['treatment'] ?? '') ?></textarea>
                    </div>
                    <div class="mb-3">
                        <h6>Related File</h6>
                        <input class="form-control" type="file" id="formFile" name="related_files">
                        <?php if (!empty($getData['related_files']) && !$isEdit) {
                            $files = json_decode($getData['related_files'], true);
                            foreach ($files as $file) { ?>
                                <a href="<?= base_url('uploads/' . $file) ?>" target="_blank">Click to see your current file</a><br>
                        <?php };
                        } else {?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
        <div class="d-flex justify-content-end gap-2">
            <a href="<?= base_url($isEdit && !empty($getData['id']) ? '/checkup/show/' . $getData['id'] : '/checkup') ?>" class="btn btn-md btn-secondary">Discard</a>
            <button type="submit" class="btn btn-md btn-info">Save</button>
        </div>
    </div>
</div>
<?= form_close() ?>