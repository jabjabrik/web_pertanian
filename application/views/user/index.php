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
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal_form" onclick="setForm('tambah')">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data User
                    </button>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: .9em">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($user as $item) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $item->username ?></td>
                                                <td><?= $item->password ?></td>
                                                <td style="text-transform: capitalize;"><?= $item->role ?></td>
                                                <td>
                                                    <?php $user_update = "$item->username,$item->password,$item->role"; ?>
                                                    <button class=" btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal_form" onclick="setForm('edit', '<?= $user_update ?>', '<?= $item->id_user ?>')">
                                                        <i class="bi bi-pencil-square"></i>
                                                        Edit
                                                    </button>
                                                    <a href="<?= base_url("user/delete/$item->id_user") ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data?');">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </a>
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
                    <h5 class="modal-title" id="exampleModalLabel" style="text-transform: capitalize;">Tambah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="modal-form" method="post" action="<?= base_url('user/create') ?>" autocomplete="off">
                    <div class="modal-body">
                        <div class="row">
                            <input name="id_user" id="id_user" hidden>
                            <div class="form-group col-6">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="password">Password</label>
                                <input type="text" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="role">Role User</label>
                                <select class="form-control" name="role" id="role" required>
                                    <option value="" selected>--Pilih Role--</option>
                                    <option value="desa">desa</option>
                                    <option value="bpp">bpp</option>
                                    <option value="kelompok tani">kelompok tani</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button id="save" type="submit" class="btn btn-primary">Simpan</button>
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
        const id_user = document.querySelector('#id_user')
        const username = document.querySelector('#username')
        const password = document.querySelector('#password')
        const role = document.querySelector('#role')

        const clearForm = () => {
            id_user.value = ''
            username.value = ''
            password.value = ''
            role.value = ''
        }

        const setForm = (title, data = null, id = null) => {
            clearForm();
            modalTitle.innerHTML = `${title} Data User`

            if (title === 'tambah') {
                // ADD
                modalForm.setAttribute('action', '<?= base_url('user/create') ?>')
                return
            }

            if (title === 'edit') {
                // ADD
                modalForm.setAttribute('action', '<?= base_url('user/edit') ?>')
                const user = data.split(',')
                id_user.value = id
                username.value = user[0]
                password.value = user[1]
                role.value = user[2]
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