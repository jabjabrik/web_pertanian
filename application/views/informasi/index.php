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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color: black;">Informasi Subsidi RDKK Sumberkledung</h6>
                        </div>
                        <div class="row ml-5 mr-5 mt-3">
                            <form class="col-12 mb-3">
                                <div class="form-group">
                                    <label class="sr-only" for="nik">Masukan NIk Anda</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukan NIk">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', (event) => {
            event.preventDefault()
            var nik = document.getElementById('nik').value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '<?= base_url('informasi/find/') ?>' + encodeURIComponent(nik), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    alert(response.message);
                }
            };
            xhr.send();
        })
    </script>


    <!-- Logout Modal -->
    <?php $this->view('templates/logout_modal'); ?>
    <!-- End Logout Modal -->

    <!-- Footer -->
    <?php $this->view('templates/footer'); ?>
    <!-- End Footer -->
</body>

</html>