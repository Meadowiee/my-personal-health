<div class="card" style="border-radius: 15px;">
    <div class="card-header pb-1">
        <h3 class="text-capitalize">Hi, <?= $getData['username'] ?></h3>
        <p>Here's your personal information</p>
    </div>
    <div class="card-body">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <h6 class="text-capitalize">name</h6>
                    <input type="text" class="form-control" value="<?= $getData['name'] ??  '-' ?>" disabled>
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">Date of Birth</h6>
                    <input type="text" class="form-control" value="<?= $getData['date_of_birth'] ?? '-'?>" disabled>
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">Gender</h6>
                    <input type="text" class="form-control text-capitalize" value="<?= $getData['gender'] ?? '-'?>" disabled>
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">Diagnose</h6>
                    <textarea disabled class="form-control"><?= $getData['diagnose'] ?? '-' ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <h6>Username</h6>
                    <input type="text" class="form-control" value="<?= $getData['username'] ?>" disabled>
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">No BPJS</h6>
                    <input type="text" class="form-control" value="<?= $getData['no_bpjs'] ?? '-'?>" disabled>
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">Blood Type</h6>
                    <input type="text" class="form-control" value="<?= $getData['blood_type'] ?? '-'?>" disabled>
                </div>
                <div class="mb-3">
                    <h6 class="text-capitalize">Allergy</h6>
                    <textarea disabled class="form-control"><?= $getData['allergy'] ?? '-' ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <a href="<?= base_url('profile/edit') ?>" class="btn btn-md btn-info">Modify</a>
        </div>
    </div>
</div>