<div class="card" style="border-radius: 15px;">
    <div class="card-header pb-1">
        <div class="d-flex justify-content-between">
            <div class="">
                <h3 class="text-capitalize">Hi, Admin</h3>
                <p>Here's your user information</p>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <a href="<?= base_url('user/add') ?>" class="btn btn-md btn-info"><i class="ti ti-plus"></i>Add</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive table-hover">
            <thead>
                <th class="text-center">No</th>
                <th>Username</th>
                <th>Name</th>
                <th>BPJS No.</th>
                <th>Role</th>
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
                            <td><?= !empty($row['username']) ? $row['username'] : '-' ?></td>
                            <td class="text-capitalize"><?= !empty($row['name']) ? $row['name'] : '-' ?></td>
                            <td><?= !empty($row['no_bpjs']) ? $row['no_bpjs'] : '-'  ?></td>
                            <td><?= $row['is_admin'] ? 'Admin' : 'User'  ?></td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="<?= base_url('user/show/' . $row['id']) ?>" class="btn btn-sm rounded-2 btn-outline-info"><i class="ti ti-search"></i></a>
                                    <a href="<?= base_url('user/edit/' . $row['id']) ?>" class="btn btn-sm rounded-2 btn-outline-secondary"><i class="ti ti-pencil"></i></a>
                                    <a href="<?= base_url('user/delete/' . $row['id']) ?>" class="btn btn-sm rounded-2 btn-outline-danger"><i class="ti ti-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="7" class="text-center text-secondary">There's no user data at the moment</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <?= $pager->links('default', 'bootstrap') ?>
    </div>
</div>