<div class="card" style="border-radius: 15px;">
    <div class="card-header pb-1">
        <div class="d-flex justify-content-between">
            <div class="">
                <h3 class="text-capitalize">Hi, <?= esc(session()->get('username')) ?></h3>
                <p>Here's your check up information</p>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <a href="<?= base_url('checkup/add') ?>" class="btn btn-md btn-info"><i class="ti ti-plus"></i>Add</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <th class="text-center">No</th>
                    <th>Date</th>
                    <th>Doctor</th>
                    <th>Hospital / Clinic</th>
                    <th>Symptoms</th>
                    <th>Treatment</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if (isset($data) && !empty($data)) {
                        $currentPage = $pager->getCurrentPage();
                        $perPage = $pager->getPerPage();
                        $i = 1 + ($perPage * ($currentPage - 1));
                        foreach ($data as $row) { ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><?= !empty($row['date']) ? $row['date'] : '-' ?></td>
                                <td><?= !empty($row['doctor']) ? $row['doctor'] : '-' ?></td>
                                <td><?= !empty($row['hospital_clinic']) ? $row['hospital_clinic'] : '-' ?></td>
                                <td><?= !empty($row['symptoms']) ? $row['symptoms'] : '-' ?></td>
                                <td><?= !empty($row['treatment']) ? $row['treatment'] : '-'  ?></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="<?= base_url('checkup/show/' . $row['id']) ?>" class="btn btn-sm rounded-2 btn-outline-info"><i class="ti ti-search"></i></a>
                                        <a href="<?= base_url('checkup/edit/' . $row['id']) ?>" class="btn btn-sm rounded-2 btn-outline-secondary"><i class="ti ti-pencil"></i></a>
                                        <a href="<?= base_url('checkup/delete/' . $row['id']) ?>" class="btn btn-sm rounded-2 btn-outline-danger"><i class="ti ti-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="7" class="text-center text-secondary">There's no recorded log at the moment</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <?= $pager->links('default', 'bootstrap') ?>
    </div>
</div>