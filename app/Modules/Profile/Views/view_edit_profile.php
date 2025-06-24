<?= form_open('profile/update/' . $getData['id'], ['id' => 'form-user', 'novalidate' => true]) ?>
<?php $validation = session('validation'); ?>

<div class="card" style="border-radius: 15px;">
    <div class="card-header pb-1">
        <h3 class="text-capitalize">Hi, <?= esc($getData['username']) ?></h3>
        <p>Here's your personal information</p>
    </div>

    <div class="card-body">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <h6 class="text-capitalize">Name <span class="text-danger">*</span></h6>
                    <input name="name" type="text" class="form-control <?= $validation && $validation->hasError('name') ? 'is-invalid' : '' ?>"
                        value="<?= old('name', $getData['name'] ?? '') ?>" placeholder="Enter name">
                    <div class="invalid-feedback"><?= $validation?->getError('name') ?></div>
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">Date of Birth</h6>
                    <input name="date_of_birth" type="date" class="form-control <?= $validation && $validation->hasError('date_of_birth') ? 'is-invalid' : '' ?>"
                        value="<?= old('date_of_birth', $getData['date_of_birth'] ?? '') ?>">
                    <div class="invalid-feedback"><?= str_replace('date_of_birth', 'date of birth', $validation?->getError('date_of_birth') ?? '') ?></div>
                </div>
                <div class="mb-3">
                    <h6>Gender</h6>
                    <select name="gender" id="gender" class="form-select text-capitalize <?= $validation && $validation->hasError('gender') ? 'is-invalid' : '' ?>">
                        <option value="">-- Select the gender --</option>
                        <option value="man" <?= old('gender', $getData['gender'] ?? '') === 'man' ? 'selected' : '' ?>>Man</option>
                        <option value="woman" <?= old('gender', $getData['gender'] ?? '') === 'woman' ? 'selected' : '' ?>>Woman</option>
                    </select>
                    <div class="invalid-feedback"><?= $validation?->getError('gender') ?></div>
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">Diagnose</h6>
                    <textarea name="diagnose" class="form-control <?= $validation && $validation->hasError('diagnose') ? 'is-invalid' : '' ?>" placeholder="Enter diagnose"><?= old('diagnose', $getData['diagnose'] ?? '') ?></textarea>
                    <div class="invalid-feedback"><?= $validation?->getError('diagnose') ?></div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <h6>Username</h6>
                    <input type="text" class="form-control" value="<?= old('username', $getData['username'] ?? '') ?>" disabled>
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">No BPJS</h6>
                    <input name="no_bpjs" type="text" class="form-control <?= $validation && $validation->hasError('no_bpjs') ? 'is-invalid' : '' ?>"
                        value="<?= old('no_bpjs', $getData['no_bpjs'] ?? '') ?>" placeholder="Enter BPJS number">
                    <div class="invalid-feedback"><?= str_replace('no_bpjs', 'No BPJS', $validation?->getError('no_bpjs') ?? '') ?></div>
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">Blood Type</h6>
                    <input name="blood_type" type="text" class="form-control <?= $validation && $validation->hasError('blood_type') ? 'is-invalid' : '' ?>"
                        value="<?= old('blood_type', $getData['blood_type'] ?? '') ?>" placeholder="Enter blood type">
                    <div class="invalid-feedback"><?= str_replace('blood_type', 'blood type', $validation?->getError('blood_type') ?? '') ?></div>
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">Allergy</h6>
                    <textarea name="allergy" class="form-control <?= $validation && $validation->hasError('allergy') ? 'is-invalid' : '' ?>" placeholder="Enter allergy"><?= old('allergy', $getData['allergy'] ?? '') ?></textarea>
                    <div class="invalid-feedback"><?= $validation?->getError('allergy') ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end gap-2">
            <a href="<?= base_url('/profile') ?>" class="btn btn-md btn-secondary">Discard</a>
            <button type="submit" class="btn btn-md btn-info">Save</button>
        </div>
    </div>
</div>

<?= form_close() ?>