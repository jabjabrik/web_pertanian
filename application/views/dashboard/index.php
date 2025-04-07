<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->view('templates/head'); ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php $this->view('templates/sidebar'); ?>
        <!-- End Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <?php $this->view('templates/topbar'); ?>
                <!-- End Topbar -->

                <div class="container-fluid">
                    <div class="card shadow mb-4" style="width: 80%;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color: black;">Data RDKK Sumberkledung</h6>
                        </div>
                        <div class="row ml-5 mr-5 mt-3">
                            <div class="col mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <a href="<?= base_url("petani"); ?>">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Jumlah Petani
                                                    </div>
                                                </a>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_petani ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <a style="text-decoration: none;" href="<?= base_url("subsidi"); ?>" class="text-info">
                                                    <div class="text-xs font-weight-bold  text-uppercase mb-1">Jumlah Penyaluran Pupuk Subsidi</div>
                                                </a>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_subsidi ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="far fa-solid fa-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Logout Modal -->
    <?php $this->view('templates/logout_modal'); ?>
    <!-- End Logout Modal -->

    <!-- Footer -->
    <?php $this->view('templates/footer'); ?>
    <!-- End Footer -->
</body>

</html>