<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HealthLife</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

  <link rel="icon" href="<?= base_url('assets/images/favicon.svg') ?>" type="image/x-icon">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" id="main-style-link">
  <link rel="stylesheet" href="<?= base_url('assets/fonts/tabler-icons.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/fonts/fontawesome.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style-preset.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/fonts/material.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/fonts/feather.css') ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href="<?= base_url('/') ?>" class="b-brand text-primary d-flex align-items-center justify-content-center gap-3">
          <img src="<?= base_url('assets/images/medical.png') ?>" class="img-fluid logo-lg" style="max-height: 35px;" alt="logo">
          <h4 class="mt-2" style="color: #6dcfc6;">Health<span style="color: #cae44b;">Life</span></h4>
        </a>
      </div>
      <div class="navbar-content sidebar">
        <ul class="pc-navbar flex-column d-flex">
          <li class="pc-item">
            <a href="<?= base_url('/') ?>" class="pc-link">
              <span class="pc-micon mb-1"><i class="ti ti-dashboard"></i></span>
              <span class="pc-mtext">Dashboard</span>
            </a>
          </li>
          <?php if(!!session()->get('is_admin')) { ?>
            <li class="pc-item pc-caption">
              <label>Management</label>
              <i class="ti ti-person"></i>
            </li>
            <li class="pc-item">
              <a href="<?= base_url('/user') ?>" class="pc-link">
                <span class="pc-micon mb-1"><i class="ti ti-users"></i></span>
                <span class="pc-mtext">User Management</span>
              </a>
            </li>
          <?php } ?>
          <li class="pc-item pc-caption">
            <label>Health Record</label>
            <i class="ti ti-dashboard"></i>
          </li>
          <li class="pc-item">
            <a href="<?= base_url('/checkup') ?>" class="pc-link">
              <span class="pc-micon mb-1"><i class="ti ti-report-medical"></i></span>
              <span class="pc-mtext">Check-Up Logs</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="<?= base_url('/logs') ?>" class="pc-link">
              <span class="pc-micon mb-1"><i class="ti ti-plant-2"></i></span>
              <span class="pc-mtext">Personal Logs</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="<?= base_url('/linkedfiles') ?>" class="pc-link">
              <span class="pc-micon mb-1"><i class="ti ti-paperclip"></i></span>
              <span class="pc-mtext">Linked Files</span>
            </a>
          </li>
          <li class="pc-item pc-caption">
            <label>Account</label>
            <i class="ti ti-user"></i>
          </li>
          <li class="pc-item">
            <a href="<?= base_url('/profile') ?>" class="pc-link">
              <span class="pc-micon mb-1"><i class="ti ti-user"></i></span>
              <span class="pc-mtext">Profile</span>
            </a>
          </li>
          <li class="pc-item mt-auto">
            <a class="pc-link" href="<?= base_url('/logout') ?>">
              <span class="pc-micon mb-1"><i class="ti ti-logout"></i></span>
              <span class="pc-mtext">Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <header class="pc-header">
    <div class="header-wrapper">
      <div class="me-auto pc-mob-drp">
        <ul class="list-unstyled">
          <li class="pc-h-item pc-sidebar-collapse">
            <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="pc-h-item pc-sidebar-popup">
            <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <div class="pc-container">
    <div class="pc-content">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <?php if ($title !== 'Emergency'): ?>
                  <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                <?php endif; ?>
                <?php if (!empty($parent)): ?>
                  <li class="breadcrumb-item"><a href="<?= base_url($parent_url) ?>"><?= $parent; ?></a></li>
                <?php endif; ?>
                <li class="breadcrumb-item" aria-current="page"><?php if (!empty($title)) echo $title; ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <h2><?php if (!empty($title)) echo $title; ?></h2>
      <div class="mt-3">
        <?php if (!empty($content)) echo view($content) ?>
      </div>
    </div>
  </div>

  <footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
      <div class="row">
        <div class="col-sm my-1">
          <p class="m-0">This project were made as final test assignment @shafinaardelia</p>
        </div>
        <div class="col-auto my-1">
          <ul class="list-inline footer-link mb-0">
            <li class="list-inline-item"><a href="<?= base_url('/') ?>">Home</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <script src="<?= base_url('assets/js/plugins/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/simplebar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/fonts/custom-font.js') ?>"></script>
  <script src="<?= base_url('assets/js/pcoded.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/feather.min.js') ?>"></script>
  <script>
    layout_change('light');
  </script>
  <script>
    change_box_container('false');
  </script>
  <script>
    layout_rtl_change('false');
  </script>
  <script>
    preset_change("preset-1");
  </script>
  <script>
    font_change("Public-Sans");
  </script>
</body>

</html>