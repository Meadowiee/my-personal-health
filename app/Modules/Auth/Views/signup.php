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

<body>
    <section class="vh-100" style="background-color:rgb(109, 207, 158);">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="<?= base_url('assets/images/authentication/login-pic.jpeg') ?>"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <?= form_open('signup/auth', ['id' => 'form-signup']) ?>
                                    <div class="d-flex align-items-center gap-3 mb-3 pb-1">
                                        <img src="<?= base_url('assets/images/medical.png') ?>" class="img-fluid logo-lg" style="max-height: 45px;" alt="logo">
                                        <h1 class="mt-2" style="color: #6dcfc6;">Health<span style="color: #cae44b;">Life</span></h1>
                                    </div>
                                    <?php if (!empty($error)) { ?>
                                        <div class="alert alert-warning d-flex align-items-center" style="height:40px;" role="alert">
                                            <?= $error ?>
                                        </div>
                                    <?php } ?>
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register your account</h5>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" name="username" for="username" placeholder="Username" class="form-control form-control-lg" required />
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" name="password" for="password" placeholder="Password" class="form-control form-control-lg" required />
                                    </div>
                                    <div class="pt-1 mb-4">
                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-md btn-block w-100" type="submit"><span class="fs-4">Register</span></button>
                                    </div>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account?
                                        <a href="<?= base_url('/login') ?>" style="color: #6dcfc6;">Login here</a>
                                    </p>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>