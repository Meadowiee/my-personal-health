<?= form_open('user/update/' . $getData['id'], ['id' => 'form-user']) ?>
<div class="card" style="border-radius: 15px;">
    <div class="card-header pb-1">
        <h3 class="text-capitalize">Hi, <?= esc($getData['username']) ?></h3>
        <p>Here's your personal information</p>
    </div>
    <div class="card-body">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <h6 class="text-capitalize">Name</h6>
                    <input name="name" type="text" class="form-control" value="<?= esc($getData['name'] ?? '') ?>" placeholder="Enter name">
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">Date of Birth</h6>
                    <input name="date_of_birth" type="date" class="form-control" value="<?= esc($getData['date_of_birth'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <h6>Gender</h6>
                    <select name="gender" id="gender" class="form-select text-capitalize">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" <?= ($getData['gender'] ?? '') === 'laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="Perempuan" <?= ($getData['gender'] ?? '') === 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">Diagnose</h6>
                    <textarea name="diagnose" class="form-control" placeholder="Enter diagnose"><?= esc($getData['diagnose'] ?? '') ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <h6>Username</h6>
                    <input type="text" class="form-control" value="<?= esc($getData['username']) ?>" disabled>
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">No BPJS</h6>
                    <input name="no_bpjs" type="text" class="form-control" value="<?= esc($getData['no_bpjs'] ?? '') ?>" placeholder="Enter BPJS number">
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">Blood Type</h6>
                    <input name="blood_type" type="text" class="form-control" value="<?= esc($getData['blood_type'] ?? '') ?>" placeholder="Enter blood type">
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">Allergy</h6>
                    <textarea name="allergy" class="form-control" placeholder="Enter allergy"><?= esc($getData['allergy'] ?? '') ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end gap-2">
            <a href="<?= base_url('/user') ?>" class="btn btn-md btn-secondary">Discard</a>
            <button type="submit" class="btn btn-md btn-info">Save</button>
        </div>
    </div>
</div>
<?= form_close() ?>