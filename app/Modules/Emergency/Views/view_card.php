<div class="card" style="border-radius: 15px;">
    <div class="card-header pb-1 bg-info text-white" style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
        <h3 class="text-white"><i class="bi bi-exclamation-triangle-fill me-2"></i>In Case of Emergency</h3>
        <p>Please check out information below !</p>
    </div>
    <div class="card-body m-4">
        <div class="row">
            <div class="col-lg-6 col-sm-12 mb-3">
                <h4><i class="bi bi-person me-2 text-dark"></i>Personal Info</h4>
                <table class="table table-responsive">
                    <colgroup>
                        <col style="width: 40%;">
                        <col style="width: 60%;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td class="text-capitalize"><?= $data['name'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>Blood Type</td>
                            <td><?= $data['blood_type'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>BPJS No.</td>
                            <td><?= $data['no_bpjs'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td class="text-capitalize"><?= $data['gender'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>Diagnose</td>
                            <td>
                                <?php 
                                    if(!empty($icds)) {
                                    foreach ($icds as $icd) { ?>
                                    <span class="badge bg-info rounded-2 cursor-pointer"
                                        data-bs-toggle="tooltip"
                                        title="<?= $icd['name'] . '; ' . $icd['name_id']?>">
                                        <?= $icd['code'] ?>
                                    </span>
                                <?php } 
                                    } else { ?>
                                        -
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Allergy</td>
                            <td class="text-capitalize"><?= !empty($data['allergy']) ? $data['allergy'] : '-' ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6 col-sm-12 mb-3">
                <h4 class="mb-3"><i class="bi bi-heart-pulse me-2"></i>Check-Up Logs</h4>
                <div class="row">
                    <?php 
                        if(!empty($checkup)) {
                        foreach ($checkup as $log){ ?>
                        <div class="col-lg-12 col-xl-6 col-md-6 mb-0">
                            <div class="card h-75 rounded-3 p-3">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <h5 class="mb-1 text-truncate cursor-pointer" data-bs-toggle="tooltip" title="<?= $log['doctor'] ?>, <?= $log['hospital_clinic']?>"><?= $log['symptoms']?></h5>
                                        <p>Treatment : <?= $log['treatment']?></p>
                                    </div>
                                    <p class="text-secondary small flex-shrink-0"><?= $log['date']?></p>
                                </div>
                            </div>
                        </div>
                    <?php } 
                        } else { ?>
                        <div class="text-secondary">There are no check-up logs data at the moment</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>