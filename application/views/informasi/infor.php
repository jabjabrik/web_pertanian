<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/favicon/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicon/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?= base_url('assets/img/favicon/site.webmanifest'); ?>">

    <title>PBB | <?= $title ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * {
            /* border: 1px solid black; */
        }

        #login:hover {
            transform: translate(0, -3px);
            transition: .5s;
        }
    </style>
</head>

<body class="d-flex" style="height:100vh; background-color: #eaeaeac4;">

    <div id="login" style="position: absolute; top: 10px; right: 15px; cursor: pointer;">
        <a href="<?= base_url('auth'); ?>"><i class="bi bi-three-dots-vertical text-black"></i></a>
    </div>

    <!-- <div class="border bg-danger rounded m-auto" style="width: 400px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quo enim, at maiores aspernatur eos velit omnis quaerat suscipit, vel ipsa dolores facilis autem expedita neque recusandae eveniet voluptatum debitis.</div> -->
    <div class="container m-auto">
        <div class="card mx-auto shadow-lg" style="max-width: 600px;">
            <div class="card-body my-4 md-mx-3 mx-0">
                <h3 class="card-title fs-4 text-center">
                    Cek Status Subsidi RDKK
                </h3>
                <!-- <p class="card-text text-center">Berdasarkan Data Sumberkledung kecamatan Tegalsiwalan</p> -->
                <form class="mt-5" method="post" autocomplete="off" action="<?= base_url(); ?>">
                    <div class="md-my-4 my-2 px-4">
                        <label for="nik" class="form-label text-left">Nomor Induk Kependudukan (NIK)</label>
                        <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukan NIK">
                    </div>
                    <div class="d-flex justify-content-center md-mt-5 mt-3">
                        <button type="submit" class="btn btn-primary">
                            Cek
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



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

</body>

</html>