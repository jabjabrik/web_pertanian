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
                        <a href="<?= base_url('subsidi/report') ?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                            <i class="bi bi-printer"></i> Buat Laporan
                        </a>
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
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">NIK</th>
                                            <th rowspan="2">Nama</th>
                                            <th rowspan="2">SPPT</th>
                                            <th rowspan="2">Luas Tanah</th>
                                            <th rowspan="2">Tanaman</th>
                                            <th rowspan="2">Pupuk</th>
                                            <th rowspan="2">Tanggal</th>
                                            <th colspan="2" style="text-align: center;">Validasi</th>
                                            <th rowspan="2" style="text-align: center;">Aksi</th>
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
                                                <td><?= $item->jenis_tanaman ?></td>
                                                <td><?= $item->jenis_pupuk ? $item->jenis_pupuk : '-' ?></td>
                                                <td><?= $item->tanggal ? $item->tanggal : '-' ?></td>
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
                                                            <?php $subsidi_update = "$item->tanggal,$item->jenis_pupuk"; ?>
                                                            <?php if (!$item->id_subsidi) : ?>
                                                                <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal_form" onclick="setForm('tambah', '', '<?= $item->id_tani ?>')">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            <?php else : ?>
                                                                <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal_form" onclick="setForm('edit', '<?= $subsidi_update ?>', '<?= $item->id_tani ?>')">
                                                                    <i class="bi bi-pencil-square"></i>
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
                                                                    <a href="<?= base_url("subsidi/reject/$item->id_subsidi/$role") ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menolak data subsidi?');">
                                                                        <i class="bi bi-x-circle"></i>
                                                                    </a>
                                                                <?php endif ?>
                                                            <?php else : ?>
                                                                <?php if ($item->validasi_desa == 'proses' || $item->validasi_desa == 'ditolak') : ?>
                                                                    <a href="<?= base_url("subsidi/approve/$item->id_subsidi/$role") ?>" class="btn btn-outline-primary btn-sm" onclick="return confirm('Apakah Anda yakin ingin menyetujui data subsidi?');">
                                                                        <i class="bi bi-check-circle"></i>
                                                                    </a>
                                                                <?php endif ?>
                                                                <?php if ($item->validasi_desa == 'proses' || $item->validasi_desa == 'disetujui') : ?>
                                                                    <a href="<?= base_url("subsidi/reject/$item->id_subsidi/$role") ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menolak data subsidi?');">
                                                                        <i class="bi bi-x-circle"></i>
                                                                    </a>
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
                            <div class="form-group col-6">
                                <label for="tanggal">Tanggal Penetapan</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="jenis_pupuk">Jenis Pupuk</label>
                                <select class="form-control" id="jenis_pupuk" name="jenis_pupuk" required>
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
        const jenis_pupuk = document.querySelector('#jenis_pupuk');


        const clearForm = () => {
            id_petani.value = ''
            tanggal.value = ''
            jenis_pupuk.value = ''
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
                jenis_pupuk.value = subsidi[1]
                return
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