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

                    <?php if ($this->session->userdata('role') != 'kelompok tani') : ?>
                        <div class="btn-group" role="group">
                            <a href="<?= base_url('subsidi/report') ?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-printer"></i> Buat Laporan
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= base_url('subsidi/report/excel') ?>" target="_blank">Laporan Excel</a>
                                <a class="dropdown-item" href="<?= base_url('subsidi/report/pdf') ?>" target="_blank">Laporan PDF</a>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pupuk Subsidi Kelompok Tani</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: .8em;white-space: nowrap;">
                                    <thead>
                                        <tr>
                                            <th class="align-middle text-center" rowspan="2">No</th>
                                            <th class="align-middle text-center" rowspan="2">NIK</th>
                                            <th class="align-middle text-center" rowspan="2">Nama</th>
                                            <th class="align-middle text-center" rowspan="2">SPPT</th>
                                            <th class="align-middle text-center" rowspan="2">Luas Tanah</th>
                                            <th class="align-middle text-center" rowspan="2">Tanggal</th>
                                            <th class="align-middle text-center" rowspan="2">Subsidi Pupuk</th>
                                            <!-- <th rowspan="2">Tanaman</th>
                                            <th rowspan="2">Pupuk</th> -->
                                            <th class="align-middle text-center" colspan="2" style="text-align: center;">Validasi</th>
                                            <th class="align-middle text-center" rowspan="2" style="text-align: center;">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th>BPP</th>
                                            <th>DESA</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-transform: capitalize;">
                                        <?php $no = 1; ?>
                                        <?php foreach ($subsidi_pupuk as $item) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $item->nik ?></td>
                                                <td><?= $item->nama ?></td>
                                                <td>
                                                    <a target="_blank" style="text-transform: none; " href="<?= base_url("uploads/$item->foto_sppt") ?>">
                                                        <i class="bi bi-box-arrow-up-right"></i> lihat
                                                    </a>
                                                </td>
                                                <td><?= $item->luas_tanah ?></td>
                                                <!-- <td><?= $item->jenis_tanaman_1 ?></td>
                                                <td><?= $item->jenis_pupuk_1 ? $item->jenis_pupuk_1 : '-' ?></td> -->
                                                <td><?= $item->tanggal ? $item->tanggal : '-' ?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <?php $subsidi_detail = "$item->jenis_tanaman_1,$item->jenis_tanaman_2,$item->jenis_tanaman_3,$item->jenis_pupuk_1,$item->jenis_pupuk_2,$item->jenis_pupuk_3"; ?>
                                                        <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal_subsidi" onclick="setSubsidi('<?= $subsidi_detail ?>')">
                                                            <i class="bi bi-eye"></i> lihat
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php if ($item->validasi_bpp) : ?>
                                                        <?php if ($item->validasi_bpp == 'proses') : ?>
                                                            <i class="bi bi-clock text-secondary"></i>
                                                        <?php elseif ($item->validasi_bpp == 'ditolak') : ?>
                                                            <i class="bi bi-x-circle text-danger"></i>
                                                        <?php else : ?>
                                                            <i class="bi bi-check-circle text-success"></i>
                                                        <?php endif ?>
                                                        <?= $item->validasi_bpp ?>
                                                    <?php else : ?>
                                                        -
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <?php if ($item->validasi_desa) : ?>
                                                        <?php if ($item->validasi_desa == 'proses') : ?>
                                                            <i class="bi bi-clock text-secondary"></i>
                                                        <?php elseif ($item->validasi_desa == 'ditolak') : ?>
                                                            <i class="bi bi-x-circle text-danger"></i>
                                                        <?php else : ?>
                                                            <i class="bi bi-check-circle text-success"></i>
                                                        <?php endif ?>
                                                        <?= $item->validasi_desa ?>
                                                    <?php else : ?>
                                                        -
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <?php if ($role == 'kelompok tani') : ?>
                                                            <?php $subsidi_update = "$item->tanggal,$item->jenis_pupuk_1,$item->jenis_pupuk_2,$item->jenis_pupuk_3"; ?>
                                                            <?php if (!$item->id_subsidi) : ?>
                                                                <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal_form" onclick="setForm('tambah', '', '<?= $item->id_tani ?>')">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            <?php else : ?>
                                                                <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal_form" onclick="setForm('edit', '<?= $subsidi_update ?>', '<?= $item->id_tani ?>')">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                </button>
                                                            <?php endif ?>
                                                            <?php if ($item->validasi_bpp == 'ditolak') : ?>
                                                                <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modal_pesan" onclick="form_pesan('Penolakan BPP', '<?= $item->penolakan_bpp ?>')">
                                                                    <i class="bi bi-bell-fill"></i>
                                                                </button>
                                                            <?php endif ?>
                                                            <?php if ($item->validasi_desa == 'ditolak') : ?>
                                                                <button class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modal_pesan" onclick="form_pesan('Penolakan Desa', '<?= $item->penolakan_desa ?>')">
                                                                    <i class="bi bi-bell-fill"></i>
                                                                </button>
                                                            <?php endif ?>
                                                        <?php else : ?>
                                                            <?php if ($item->id_subsidi) : ?>
                                                                <a href="<?= base_url("subsidi/delete/$item->id_subsidi") ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data?');">
                                                                    <i class="bi bi-trash"></i>
                                                                </a>
                                                            <?php endif ?>
                                                            <?php if ($role == 'bpp') : ?>
                                                                <?php if ($item->validasi_bpp == 'proses' || $item->validasi_bpp == 'ditolak') : ?>
                                                                    <a href="<?= base_url("subsidi/approve/$item->id_subsidi/$role") ?>" class="btn btn-outline-primary btn-sm" onclick="return confirm('Apakah Anda yakin ingin menyetujui data subsidi?');">
                                                                        <i class="bi bi-check-circle"></i>
                                                                    </a>
                                                                <?php endif ?>
                                                                <?php if ($item->validasi_bpp == 'proses' || $item->validasi_bpp == 'disetujui') : ?>
                                                                    <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal_penolakan" onclick="set_form_penolakan('<?= $item->id_subsidi ?>', 'bpp')">
                                                                        <i class="bi bi-x-circle"></i>
                                                                    </button>
                                                                <?php endif ?>
                                                                <?php if ($item->validasi_bpp == 'ditolak') : ?>
                                                                    <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modal_pesan" onclick="form_pesan('Penolakan BPP', '<?= $item->penolakan_bpp ?>')">
                                                                        <i class="bi bi-bell-fill"></i>
                                                                    </button>
                                                                <?php endif ?>
                                                            <?php else : ?>
                                                                <?php if ($item->validasi_desa == 'proses' || $item->validasi_desa == 'ditolak') : ?>
                                                                    <a href="<?= base_url("subsidi/approve/$item->id_subsidi/$role") ?>" class="btn btn-outline-primary btn-sm" onclick="return confirm('Apakah Anda yakin ingin menyetujui data subsidi?');">
                                                                        <i class="bi bi-check-circle"></i>
                                                                    </a>
                                                                <?php endif ?>
                                                                <?php if ($item->validasi_desa == 'proses' || $item->validasi_desa == 'disetujui') : ?>
                                                                    <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal_penolakan" onclick="set_form_penolakan('<?= $item->id_subsidi ?>', 'desa')">
                                                                        <i class="bi bi-x-circle"></i>
                                                                    </button>
                                                                <?php endif ?>
                                                                <?php if ($item->validasi_desa == 'ditolak') : ?>
                                                                    <button class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modal_pesan" onclick="form_pesan('Penolakan Desa', '<?= $item->penolakan_desa ?>')">
                                                                        <i class="bi bi-bell-fill"></i>
                                                                    </button>
                                                                <?php endif ?>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                    </div>
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

    <!-- Modal Subsidi -->
    <div class="modal fade" id="modal_subsidi" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="white-space: nowrap; font-size: .9em;">
                        <thead>
                            <tr>
                                <th class="align-middle text-center no-sort" colspan="3">Rencana Tanam Bulanan</th>
                            </tr>
                            <tr>
                                <th class="align-middle text-center no-sort">Bulan</th>
                                <th class="align-middle text-center no-sort">Tanaman</th>
                                <th class="align-middle text-center no-sort">Subsidi Pupuk</th>
                            </tr>
                        </thead>
                        <tbody style="text-transform: capitalize;">
                            <tr>
                                <td class="align-middle text-center">1 - 4</td>
                                <td id="tanaman_1" class="align-middle text-center"></td>
                                <td id="pupuk_1" class="align-middle text-center"></td>
                            </tr>
                            <tr>
                                <td class="align-middle text-center">5 - 8</td>
                                <td id="tanaman_2" class="align-middle text-center"></td>
                                <td id="pupuk_2" class="align-middle text-center"></td>
                            </tr>
                            <tr>
                                <td class="align-middle text-center">9 - 12</td>
                                <td id="tanaman_3" class="align-middle text-center"></td>
                                <td id="pupuk_3" class="align-middle text-center"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Subsidi -->

    <!-- Modal Form Pesan -->
    <div class="modal fade" id="modal_pesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="text-transform: capitalize;">Pesan Penolakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda tidak dapat mengedit data subsidi pupuk yang sudah disetujui.</p>
                    <p>Silakan hubungi petugas BPP atau Desa untuk melakukan perubahan data.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Form -->

    <!-- Modal Form -->
    <div class="modal fade" id="modal_penolakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Penolakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="modal-form" method="post" action="<?= base_url('subsidi/reject') ?>">
                    <div class="modal-body">
                        <div class="row">
                            <input type="text" name="id_subsidi" id="id_subsidi" hidden>
                            <input type="text" name="role" id="role" hidden>
                            <div class="form-group col-12">
                                <label for="pesan_penolakan">Pesan Penolakan</label>
                                <input type="text" id="pesan_penolakan" name="pesan_penolakan" class="form-control" required>
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

    <!-- Modal Form -->
    <div class="modal fade" id="modal_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="text-transform: capitalize;">Tambah Data Subsidi Pupuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="modal-form" method="post" action="<?= base_url('subsidi/create') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <input type="text" name="id_petani" id="id_petani" hidden>
                            <div class="form-group col-12">
                                <label for="tanggal">Tanggal Penetapan</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="jenis_pupuk_1">Jenis Pupuk Bulan 1 - 4</label>
                                <select class="form-control" id="jenis_pupuk_1" name="jenis_pupuk_1">
                                    <option value="" selected>--</option>
                                    <option value="pupuk urea">pupuk urea</option>
                                    <option value="pupuk NPK">pupuk NPK</option>
                                    <option value="pupuk KCL">pupuk KCL</option>
                                    <option value="pupuk SP-36">pupuk SP-36</option>
                                    <option value="pupuk ZA">pupuk ZA</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="jenis_pupuk_2">Jenis Pupuk Bulan 5 - 8</label>
                                <select class="form-control" id="jenis_pupuk_2" name="jenis_pupuk_2">
                                    <option value="" selected>--</option>
                                    <option value="pupuk urea">pupuk urea</option>
                                    <option value="pupuk NPK">pupuk NPK</option>
                                    <option value="pupuk KCL">pupuk KCL</option>
                                    <option value="pupuk SP-36">pupuk SP-36</option>
                                    <option value="pupuk ZA">pupuk ZA</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="jenis_pupuk_3">Jenis Pupuk Bulan 9 - 12</label>
                                <select class="form-control" id="jenis_pupuk_3" name="jenis_pupuk_3">
                                    <option value="" selected>--</option>
                                    <option value="pupuk urea">pupuk urea</option>
                                    <option value="pupuk NPK">pupuk NPK</option>
                                    <option value="pupuk KCL">pupuk KCL</option>
                                    <option value="pupuk SP-36">pupuk SP-36</option>
                                    <option value="pupuk ZA">pupuk ZA</option>
                                </select>
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
        const tanggal = document.querySelector('#tanggal');
        const jenis_pupuk_1 = document.querySelector('#jenis_pupuk_1');
        const jenis_pupuk_2 = document.querySelector('#jenis_pupuk_2');
        const jenis_pupuk_3 = document.querySelector('#jenis_pupuk_3');


        const clearForm = () => {
            id_petani.value = ''
            tanggal.value = ''
            jenis_pupuk_1.value = ''
            jenis_pupuk_2.value = ''
            jenis_pupuk_3.value = ''
        }

        const setForm = (title, data = null, id) => {
            clearForm();
            modalTitle.innerHTML = `${title} Data Subsidi Pupuk`
            id_petani.value = id

            if (title === 'tambah') {
                // ADD
                modalForm.setAttribute('action', '<?= base_url('subsidi/create') ?>')
                return
            }

            if (title === 'edit') {
                // EDIT
                modalForm.setAttribute('action', '<?= base_url('subsidi/edit') ?>')
                const subsidi = data.split(',')
                tanggal.value = subsidi[0]
                jenis_pupuk_1.value = subsidi[1]
                jenis_pupuk_2.value = subsidi[2]
                jenis_pupuk_3.value = subsidi[3]
                return
            }
        }

        const tanaman_1 = document.querySelector('#tanaman_1');
        const tanaman_2 = document.querySelector('#tanaman_2');
        const tanaman_3 = document.querySelector('#tanaman_3');
        const pupuk_1 = document.querySelector('#pupuk_1');
        const pupuk_2 = document.querySelector('#pupuk_2');
        const pupuk_3 = document.querySelector('#pupuk_3');

        const setSubsidi = (data) => {
            const subsidi = data.split(',');

            tanaman_1.innerHTML = subsidi[0];
            tanaman_2.innerHTML = subsidi[1];
            tanaman_3.innerHTML = subsidi[2];
            if (subsidi[3]) {
                pupuk_1.innerHTML = subsidi[3]
            } else {
                pupuk_1.innerHTML = '-'
            }

            if (subsidi[4]) {
                pupuk_2.innerHTML = subsidi[4]
            } else {
                pupuk_2.innerHTML = '-'
            }

            if (subsidi[5]) {
                pupuk_3.innerHTML = subsidi[5]
            } else {
                pupuk_3.innerHTML = '-'
            }
        }


        const set_form_penolakan = (id, role) => {
            const modal_penolakan = document.querySelector('#modal_penolakan');

            modal_penolakan.querySelector('#id_subsidi').value = id;
            modal_penolakan.querySelector('#role').value = role;
        }

        const form_pesan = (title, msg) => {
            const modalPenolakan = document.querySelector('#modal_pesan');
            const modalTitle = modalPenolakan.querySelector('.modal-title');
            const modalBody = modalPenolakan.querySelector('.modal-body');

            modalTitle.textContent = title;
            modalBody.innerHTML = `<p>${msg}</p>`;

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