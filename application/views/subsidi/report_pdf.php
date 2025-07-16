<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subsidi Petani | Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            text-transform: capitalize;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 40px 0;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Styling to ensure header only on the first page */
        @page {
            margin-top: 50px;
        }

        @page: first {
            margin-top: 150px;
        }

        header {
            position: fixed;
            top: -100px;
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    <h2><?= $title ?></h2>
    <table>
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">NIK</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">Luas Tanah</th>
                <th rowspan="2">Tanaman Bulan 1 - 4</th>
                <th rowspan="2">Tanaman Bulan 5 - 8</th>
                <th rowspan="2">Tanaman Bulan 9 - 12</th>
                <th rowspan="2">Tanggal</th>
                <th colspan="2" style="text-align: center;">Validasi</th>
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
                    <td><?= $item->luas_tanah ?> Hektar</td>
                    <td><?= $item->jenis_tanaman_1 ?></td>
                    <td><?= $item->jenis_tanaman_2 ?></td>
                    <td><?= $item->jenis_tanaman_3 ?></td>
                    <td><?= $item->tanggal ? $item->tanggal : '-' ?></td>
                    <td>
                        <?php if ($item->id_tani) : ?>
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
                        <?php if ($item->id_tani) : ?>
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
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>