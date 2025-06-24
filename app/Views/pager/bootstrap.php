<?php if ($links = $pager->links()): ?>
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($pager->hasPrevious()): ?>
                <li class="page-item">
                    <a class="page-link text-info" href="<?= $pager->getPreviousPage() ?>" aria-label="Previous" style="color: var(--bs-info);">
                        &laquo;
                    </a>
                </li>
            <?php endif ?>

            <?php foreach ($links as $link): ?>
                <li class="page-item <?= $link['active'] ? 'active bg-info text-white rounded-3' : '' ?>">
                    <a class="page-link <?= $link['active'] ? 'bg-info text-white border-info' : '' ?>" href="<?= $link['uri'] ?>">
                        <?= $link['title'] ?>
                    </a>
                </li>
            <?php endforeach ?>

            <?php if ($pager->hasNext()): ?>
                <li class="page-item">
                    <a class="page-link text-info" href="<?= $pager->getNextPage() ?>" aria-label="Next" style="color: var(--bs-info);">
                        &raquo;
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
<?php endif ?>