<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export to Excel</title>
    <!-- Tambahkan library exceljs dan file-saver -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.3.0/exceljs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
</head>

<body>
    <table id="myTable" style="display:none;">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">NIK</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">Luas Tanah</th>
                <th rowspan="2">Tanaman Bulan 1 - 4</th>
                <th rowspan="2">Tanaman Bulan 5 - 8</th>
                <th rowspan="2">Tanaman Bulan 9 - 12</th>
                <th rowspan="2">Pupuk Bulan 1 - 4</th>
                <th rowspan="2">Pupuk Bulan 5 - 8</th>
                <th rowspan="2">Pupuk Bulan 69 - 12</th>
                <th rowspan="2">Tanggal</th>
            </tr>
        </thead>
        <tbody>
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
                    <td><?= $item->jenis_pupuk_1 ? $item->jenis_pupuk_1 : '-' ?></td>
                    <td><?= $item->jenis_pupuk_2 ? $item->jenis_pupuk_2 : '-' ?></td>
                    <td><?= $item->jenis_pupuk_3 ? $item->jenis_pupuk_3 : '-' ?></td>
                    <td><?= $item->tanggal ? $item->tanggal : '-' ?></td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        async function exportTableToExcel(tableID, filename = '') {
            const table = document.getElementById(tableID);
            const wb = new ExcelJS.Workbook();
            const ws = wb.addWorksheet('Sheet1');

            const rows = [];
            const colWidths = [];

            for (let i = 0, row; row = table.rows[i]; i++) {
                const cells = [];
                for (let j = 0, col; col = row.cells[j]; j++) {
                    const cellText = col.innerText || '';
                    cells.push(cellText);

                    // Hitung panjang maksimum teks untuk autosize
                    const cellLength = cellText.toString().length;
                    if (!colWidths[j] || cellLength > colWidths[j]) {
                        colWidths[j] = cellLength;
                    }
                }
                rows.push(cells);
            }

            ws.addRows(rows);

            // Set lebar kolom
            ws.columns.forEach((column, index) => {
                column.width = colWidths[index] + 2;
            });

            // Tambahkan border dan alignment
            ws.eachRow((row, rowNumber) => {
                row.eachCell((cell, colNumber) => {
                    cell.border = {
                        top: {
                            style: 'thin'
                        },
                        left: {
                            style: 'thin'
                        },
                        bottom: {
                            style: 'thin'
                        },
                        right: {
                            style: 'thin'
                        }
                    };
                    cell.alignment = {
                        vertical: 'middle',
                        horizontal: 'center'
                    };
                });
            });

            filename = filename ? filename + '.xlsx' : 'excel_data.xlsx';

            const buffer = await wb.xlsx.writeBuffer();
            const blob = new Blob([buffer], {
                type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
            });
            saveAs(blob, filename);
        }


        // Jalankan fungsi ekspor saat halaman dimuat
        window.onload = function() {
            exportTableToExcel('myTable', 'laporan_subsidi_pupuk');
        }
    </script>
</body>

</html>