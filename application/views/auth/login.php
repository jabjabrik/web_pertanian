<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->view('templates/head'); ?>
    <style>
        * {
            /* border: 1px solid black;  */
        }
    </style>
</head>

<body class="bg-gradient-primary d-flex" style="height: 100vh; background-image: url('<?= base_url('assets/img/background.jpg') ?>'); background-size: cover; background-position: center;">
    <div class="container m-auto">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(5px);">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 p-3 text-center">
                                <h1 class="lead font-weight-bold" style="color: black;">Pelayanan Pupuk Subsidi</h1>
                                <h3 class="text-dark small font-size-16 font-weight-bold">Rencana Definitif Kebutuhan Kelompok (RDKK)</h3>
                                <img src="<?= base_url('assets/img/logo/logopemkab.png') ?>" height="250" alt="">
                                <p class="lead mt-3" style="color: black;">Desa Sumberkledung, Kec. Tegalsiwalan</p>
                                <p class="lead" style="color: black;">Kabupaten Probolinggo</p>
                            </div>
                            <div class="col-lg-6">
                                <div id="login" style="position: absolute; top: 10px; right: 25px; cursor: pointer;">
                                    <a href="<?= base_url(); ?>"><i class="bi bi-three-dots-vertical"></i></a>
                                </div>
                                <div class="p-5 mt-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Website Pertanian</h1>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->view('templates/footer'); ?>
</body>

</html>