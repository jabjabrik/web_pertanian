<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->view('templates/head'); ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->view('templates/sidebar'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->view('templates/topbar'); ?>
                <div class="container-fluid">
                    <!-- Alert -->
                    <?php $this->view('templates/alert'); ?>
                    <!-- End Alert -->
                    <?php if ($this->session->userdata('role') == 'kelompok tani') : ?>
                        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal_form" onclick="setForm('tambah')">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Petani
                        </button>
                    <?php endif ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kelompok Tani</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="white-space: nowrap; font-size: .9em;">
                                    <thead>
                                        <tr>
                                            <th class="align-middle text-center" rowspan="2">No</th>
                                            <th class="align-middle text-center" rowspan="2">NIK</th>
                                            <th class="align-middle text-center" rowspan="2">Nama</th>
                                            <th class="align-middle text-center no-sort" rowspan="2">Alamat</th>
                                            <th class="align-middle text-center no-sort" rowspan="2">L.Tanah</th>
                                            <th class="align-middle text-center" colspan="3">Rencana Tanam Bulanan</th>
                                            <th class="align-middle text-center no-sort" rowspan="2">SPPT</th>
                                            <th class="align-middle text-center no-sort" rowspan="2">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th class="align-middle text-center no-sort">1 - 4</th>
                                            <th class="align-middle text-center no-sort">5 - 8</th>
                                            <th class="align-middle text-center no-sort">9 - 12</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-transform: capitalize;">
                                        <?php $no = 1; ?>
                                        <?php foreach ($petani as $item) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $item->nik ?></td>
                                                <td style="white-space: wrap;"><?= $item->nama ?></td>
                                                <td style="white-space: wrap;"><?= $item->alamat ?></td>
                                                <td><?= $item->luas_tanah ?> hektar</td>
                                                <td><?= $item->jenis_tanaman_1 ?></td>
                                                <td><?= $item->jenis_tanaman_2 ?></td>
                                                <td><?= $item->jenis_tanaman_3 ?></td>
                                                <td>
                                                    <?php if ($item->foto_sppt): ?>
                                                        <a target="_blank" style="text-transform: none; " href="<?= base_url("uploads/$item->foto_sppt") ?>">
                                                            <i class="bi bi-box-arrow-up-right"></i> lihat
                                                        </a>
                                                    <?php else: ?>
                                                        <span>-</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($this->session->userdata('role') == 'kelompok tani') : ?>
                                                        <?php $petani_update = "$item->nik,$item->nama,$item->alamat,$item->luas_tanah,$item->jenis_tanaman_1,$item->jenis_tanaman_2,$item->jenis_tanaman_3,$item->foto_sppt"; ?>
                                                        <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal_form" onclick="setForm('edit', '<?= $petani_update ?>', '<?= $item->id_petani ?>')">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    <?php else : ?>
                                                        <a href="<?= base_url("petani/delete/$item->id_petani") ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data?');">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="modal_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="text-transform: capitalize;">Tambah Data Petani</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="modal-form" method="post" action="<?= base_url('petani/create') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <input name="id_petani" id="id_petani" hidden>
                            <div class="form-group col-6">
                                <label for="nik">NIK</label>
                                <input type="number" id="nik" name="nik" class="form-control" placeholder="357404xxxxxxxxx" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="nama">Nama</label>
                                <input style="text-transform: capitalize;" type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group col-4">
                                <label for="alamat">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" required>
                            </div>
                            <div class="form-group col-4">
                                <label for="luas_tanah">Luas Tanah(ha)</label>
                                <input type="number" id="luas_tanah" name="luas_tanah" class="form-control" placeholder="Contoh: 3.4" required step="any">
                            </div>
                            <div class="form-group col-3">
                                <label for="jenis_tanaman_1">Jenis Tanaman 1</label>
                                <input type="text" id="jenis_tanaman_1" name="jenis_tanaman_1" class="form-control" required>
                            </div>
                            <div class="form-group col-3">
                                <label for="jenis_tanaman_2">Jenis Tanaman 2</label>
                                <input type="text" id="jenis_tanaman_2" name="jenis_tanaman_2" class="form-control" required>
                            </div>
                            <div class="form-group col-3">
                                <label for="jenis_tanaman_3">Jenis Tanaman 3</label>
                                <input type="text" id="jenis_tanaman_3" name="jenis_tanaman_3" class="form-control" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="id_sppt">Upload Foto SPPT (*Maksimal 2mb)</label>
                                <input type="file" id="foto_sppt" name="foto_sppt" class="form-control-file" accept="image/*" onchange="showPreview(event);">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" style="max-height: 200px;" id="foto_sppt_preview">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button id="btn-modal-submit" type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Form -->

    <!-- Script Form -->
    <script>
        const modalForm = document.querySelector('#modal-form')
        const modalTitle = document.querySelector('.modal-title')
        const id_petani = document.querySelector('#id_petani');
        const nik = document.querySelector('#nik');
        const nama = document.querySelector('#nama');
        const alamat = document.querySelector('#alamat');
        const luas_tanah = document.querySelector('#luas_tanah');
        const jenis_tanaman_1 = document.querySelector('#jenis_tanaman_1');
        const jenis_tanaman_2 = document.querySelector('#jenis_tanaman_2');
        const jenis_tanaman_3 = document.querySelector('#jenis_tanaman_3');
        const foto_sppt = document.querySelector('#foto_sppt');
        const previewFotoSPPT = document.querySelector('#foto_sppt_preview');


        const clearForm = () => {
            id_petani.value = ''
            nik.value = ''
            nama.value = ''
            alamat.value = ''
            luas_tanah.value = ''
            jenis_tanaman_1.value = ''
            jenis_tanaman_2.value = ''
            jenis_tanaman_3.value = ''
            foto_sppt.value = ''
            previewFotoSPPT.removeAttribute('src')
            foto_sppt.setAttribute('required', '')
        }

        const setForm = (title, data = null, id = null) => {
            clearForm();
            modalTitle.innerHTML = `${title} Data Petani`
            // inputIdWp.value = id_wp

            if (title === 'tambah') {
                // ADD
                modalForm.setAttribute('action', '<?= base_url('petani/create') ?>')
                return
            }

            if (title === 'edit') {
                // ADD
                modalForm.setAttribute('action', '<?= base_url('petani/edit') ?>')
                const petani = data.split(',')
                id_petani.value = id;
                nik.value = petani[0]
                nama.value = petani[1]
                alamat.value = petani[2]
                luas_tanah.value = petani[3]
                jenis_tanaman_1.value = petani[4]
                jenis_tanaman_2.value = petani[5]
                jenis_tanaman_3.value = petani[6]
                previewFotoSPPT.setAttribute('src', `uploads/${petani[7]}`)
                foto_sppt.removeAttribute('required')
                return
            }
        }

        const showPreview = (event) => {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                previewFotoSPPT.setAttribute('src', src)
            }
        }
    </script>
    <!-- End Script Form -->

    <!-- Logout Modal -->
    <?php $this->view('templates/logout_modal'); ?>
    <!-- End Logout Modal -->

    <!-- Footer -->
    <?php $this->view('templates/footer'); ?>
    <!-- End Footer -->
</body>

</html>