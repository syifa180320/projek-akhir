<?php
require '../vendor/autoload.php';
include '../koneksi.php';

use Dompdf\Dompdf;

$bulan = $_GET['bulan'] ?? '';

if (!empty($bulan)) {

    $query = "SELECT peminjaman.*, GROUP_CONCAT(peralatan.nama_alat SEPARATOR ', ') AS alat
              FROM peminjaman
              JOIN peralatan ON FIND_IN_SET(peralatan.peralatan_id, peminjaman.peralatan_id)
              WHERE DATE_FORMAT(peminjaman.tgl_pinjam,'%Y-%m') = '$bulan'
              AND peminjaman.status IN ('Diterima','Ditolak')
              GROUP BY peminjaman.peminjaman_id
              ORDER BY peminjaman.tgl_pinjam DESC";

} else {

    $query = "SELECT peminjaman.*, GROUP_CONCAT(peralatan.nama_alat SEPARATOR ', ') AS alat
              FROM peminjaman
              JOIN peralatan ON FIND_IN_SET(peralatan.peralatan_id, peminjaman.peralatan_id)
              WHERE peminjaman.status IN ('Diterima','Ditolak')
              GROUP BY peminjaman.peminjaman_id
              ORDER BY peminjaman.tgl_pinjam DESC";
}

$data = mysqli_query($conn, $query);

ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Peminjaman Sarana & Prasarana</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .judul{
            text-align: center;
            margin-bottom: 20px;
        }
        .judul h2{
            margin: 0;
        }
        .judul p{
            margin: 5px 0;
        }
        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table th{
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            background-color: #f2f2f2;
        }
        table td{
            border: 1px solid #000;
            padding: 6px;
            vertical-align: middle;
        }
        .footer{
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="judul">
        <h2>LAPORAN PEMINJAMAN SARANA & PRASARANA</h2>
        <p>Organisasi Mahasiswa Universitas BTH</p>
    </div>
    <?php if($bulan != '') { ?>
        <p>
            <b>
                Periode :
                <?php echo date('F Y', strtotime($bulan . '-01')); ?>
            </b>
        </p>
    <?php } else { ?>
        <p>
            <b>Data Peminjaman</b>
        </p>
    <?php } ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Peralatan</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            <?php
            $no = 1;
            $total = 0;
            while($d = mysqli_fetch_assoc($data)){
                $total++;
            ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td align="center"><?php echo $d['nama']; ?></td>
                <td align="center">
                    <?php echo date('d-m-Y', strtotime($d['tgl_pinjam'])); ?>
                </td>
                <td align="center"><?php echo $d['alat']; ?></td>
                <td align="center">
                    <?php echo ucfirst($d['status']); ?>
                </td>
            </tr>

            <?php } ?>
        </tbody>
    </table>
    <br>
    <p>
        <b>Total Peminjaman Selesai Diproses : <?php echo $total; ?></b>
    </p>
    <div class="footer">
        Dicetak pada :
        <?php echo date('d-m-Y'); ?>
    </div>
</body>
</html>

<?php
$html = ob_get_clean();

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

$dompdf->stream(
    'Laporan_Peminjaman.pdf',
    [
        'Attachment' => true
    ]
);

exit;
?>