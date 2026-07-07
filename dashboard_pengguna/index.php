<?php
session_start();
include '../includes_pengguna/header.php';
include "../koneksi.php";
$id = $_SESSION['id'];

// fungsi untuk hitung total
function getTotal($conn, $table, $where = "") {
    $sql = "SELECT COUNT(*) AS total FROM $table";
    if ($where) {
        $sql .= " WHERE $where";
    }

    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}

// panggil fungsi
$total_pengguna = getTotal($conn, 'user', "role='pengguna'");
$total_peralatan = getTotal($conn, 'peralatan');

// Menunggu
$qMenunggu = mysqli_query($conn," SELECT COUNT(*) AS total FROM peminjaman WHERE id='$id' AND status='menunggu'");
$menunggu = mysqli_fetch_assoc($qMenunggu)['total'];

// Diterima
$qDiterima = mysqli_query($conn," SELECT COUNT(*) AS total FROM peminjaman WHERE id='$id' AND status='diterima'");
$diterima = mysqli_fetch_assoc($qDiterima)['total'];

// Ditolak
$qDitolak = mysqli_query($conn," SELECT COUNT(*) AS total FROM peminjaman WHERE id='$id' AND status='ditolak'");
$ditolak = mysqli_fetch_assoc($qDitolak)['total'];

?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
    Selamat Datang, <?php echo htmlspecialchars($namaLogin); ?>!
</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Menunggu Persetujuan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $menunggu; ?>
                            </div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span>Peningkatan Hari Ini</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-3x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pengajuan Diterima</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $diterima; ?>
                            </div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span>Peningkatan Hari Ini</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-3x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pengajuan Ditolak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $ditolak; ?>
                            </div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                <span>Peningkatan Hari Ini</span>
                            </div>
                            </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-chart-area fa-3x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- KALENDER -->
        <div class="col-xl-4 col-lg-7">
            <div class="card mb-4">
                <div class="calendar">
                    <div class="calendar-header">
                        <button onclick="prevMonth()" class="nav-btn">‹</button>
                        <h3 id="month-year">Juni 2026</h3>
                        <button onclick="nextMonth()" class="nav-btn">›</button>
                    </div>

                    <div class="calendar-grid" id="calendar-grid">
                        <!-- Diisi oleh JavaScript -->
                    </div>
                    <div style="margin-top:15px;">
                    <span style="display:inline-block;width:15px;height:15px;background:#007bff;border-radius:3px;"></span>
                    Sebagian Booking

                    <span style="display:inline-block;width:15px;height:15px;background:#dc3545;margin-left:15px;border-radius:3px;"></span>
                    Full Booking
                </div>
                </div>
              </div>
            </div>

    <!-- Pie Chart / Status Peminjaman -->
        <div class="col-xl-8 col-lg-5">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Peminjaman</h6>
                </div>
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Organisasi</th>
                                <th class="text-center">Tgl Pinjam</th>
                                <th class="text-center">Tgl Kembali</th>
                                <th class="text-center">Peralatan</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        include '../koneksi.php';
                        $no=1;
                        $data = mysqli_query($conn,"SELECT peminjaman.*, GROUP_CONCAT(peralatan.nama_alat SEPARATOR ', ') AS alat FROM peminjaman JOIN peralatan ON FIND_IN_SET(peralatan.peralatan_id, peminjaman.peralatan_id) GROUP BY peminjaman.peminjaman_id");
                        while($d = mysqli_fetch_array($data)){ ?>
                          <tr>
                                  <td class="text-center"><?php echo $no++; ?></td>
                                  <td class="text-center"><?php echo $d['nama']; ?></td>
                                  <td class="text-center"><?php echo $d['tgl_pinjam']; ?></td>
                                  <td class="text-center"><?php echo $d['tgl_kembali']; ?></td>
                                  <td class="text-center"><?php echo $d['alat']; ?></td>
                                  <td class="text-center"><?php echo $d['status']; ?></td>
                              </tr>
                          <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- MODAL FORM PEMINJAMAN -->
<div class="modal fade" id="modalPinjam" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Form Peminjaman</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>

            <form action="proses_pinjam.php" method="POST"  enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Organisasi</label>
                        <select name="nama" class="form-control" required>
                            <option value="">-- Pilih Organisasi --</option>

                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM user WHERE role='pengguna'");
                            while($data = mysqli_fetch_assoc($query)){
                            ?>
                                <option value="<?= $data['nama']; ?>">
                                    <?= $data['nama']; ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Peminjam</label>
                        <input type="text" name="pj" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" required>
                        </div>
                    </div>

                    <hr>

                    <label>Pilih Peralatan</label>
                    <div class="row" id="daftarPeralatan">
                       <?php
                        include "../koneksi.php";

                        $tgl_pinjam  = $_POST['tgl_pinjam'] ?? '';
                        $tgl_kembali = $_POST['tgl_kembali'] ?? '';

                        $data = mysqli_query($conn,"SELECT * FROM peralatan");
                        while($d = mysqli_fetch_array($data)){
                            $dipinjam = false;
                            $id_alat = $d['peralatan_id'];
                            $cek = mysqli_query($conn," SELECT * FROM peminjaman WHERE FIND_IN_SET('$id_alat', peralatan_id) AND status='diterima' AND (
                                ('$tgl_pinjam' BETWEEN tgl_pinjam AND tgl_kembali)
                                OR
                                ('$tgl_kembali' BETWEEN tgl_pinjam AND tgl_kembali)
                                OR
                                (tgl_pinjam BETWEEN '$tgl_pinjam' AND '$tgl_kembali')
                            )
                            ");

                            if(mysqli_num_rows($cek) > 0){
                                $dipinjam = true;
                            }
                        ?>
                        <div class="col-md-4 mb-3">
                            <label class="card p-2 <?= $dipinjam ? 'bg-light' : '' ?>"
                                style="<?= $dipinjam ? 'opacity:.5' : '' ?>">
                                <img src="../gambar/<?= $d['gambar']; ?>"
                                    style="height:120px;object-fit:cover;">
                                <div class="mt-2">
                                    <input type="checkbox" name="peralatan_id[]" value="<?= $d['peralatan_id']; ?>" <?= $dipinjam ? 'disabled' : '' ?>>
                                    <?= $d['nama_alat']; ?>
                                    <br>
                                    <?php if($dipinjam){ ?>
                                        <span class="badge badge-secondary">
                                            Sedang Dipinjam
                                        </span>
                                    <?php }else{ ?>
                                        <span class="badge badge-success">
                                            Tersedia
                                        </span>
                                    <?php } ?>
                                </div>
                            </label>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Keperluan</label>
                        <textarea name="keperluan" rows="4" class="form-control"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../includes_pengguna/footer.php'; ?>

