  <?php
include '../includes_admin/header.php';
include "../koneksi.php";

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
$total_laporan = getTotal($conn, 'peminjaman');
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Selamat Datang Admin !!</h1>
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
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Pengguna</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo $total_pengguna; ?>
                        </div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                          <span class="text-success mr-2">
                            <i class="fa fa-arrow-up"></i> 3.48%
                          </span>
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
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Peralatan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo $total_peralatan; ?>
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
                      <div class="text-xs font-weight-bold text-uppercase mb-1">laporan peminjaman</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo $total_laporan; ?>
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

            <!-- Area Chart -->
            <div class="col-xl-4 col-lg-7">
                <div class="card mb-4">
                    <div class="calendar">

                        <div class="calendar-header">
                            <button onclick="prevMonth()" class="nav-btn">‹</button>
                            <h3 id="month-year"></h3>
                            <button onclick="nextMonth()" class="nav-btn">›</button>
                        </div>

                        <div class="calendar-grid" id="calendar-grid">
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
            <!-- Pie Chart -->
            <div class="col-xl-8 col-lg-5">
            <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Persetujuan Peminjaman</h6>
            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari nama peminjam, organisasi, atau alat...">
            </div>
                </div>
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Organisasi</th>
                            <th class="text-center">PJ</th>
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
                        $data = mysqli_query($conn," SELECT peminjaman.*, GROUP_CONCAT(peralatan.nama_alat SEPARATOR ', ') AS alat FROM peminjaman JOIN peralatan ON FIND_IN_SET(peralatan.peralatan_id, peminjaman.peralatan_id) GROUP BY peminjaman.peminjaman_id");
                        while($d = mysqli_fetch_array($data)){ ?>
                          <tr>
                                  <td class="text-center"><?php echo $no++; ?></td>
                                  <td class="text-center"><?php echo $d['nama']; ?></td>
                                  <td class="text-center"><?php echo $d['pj']; ?></td>
                                  <td class="text-center"><?php echo $d['tgl_pinjam']; ?></td>
                                  <td class="text-center"><?php echo $d['tgl_kembali']; ?></td>
                                  <td class="text-center"><?php echo $d['alat']; ?></td>
                                  <td class="text-center">
                                      <?php 
                                      $status = strtolower($d['status']);

                                      if ($status == 'diterima') {
                                          echo "<button class='badge badge-success' disabled>Diterima</button>";
                                      } 
                                      elseif ($status == 'ditolak') {
                                          echo "<button class='badge badge-danger' disabled>Ditolak</button>";
                                      } 
                                      else {
                                      ?>
                                          <a href="setujui.php?id=<?= $d['peminjaman_id'] ?>" class="badge badge-success">Setujui</a>
                                          <a href="tolak.php?id=<?= $d['peminjaman_id'] ?>" class="badge badge-danger">Tolak</a>
                                      <?php } ?>
                                </td>
                          </tr>
                        <?php } ?>
                   </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
</div>
</div>
        <!---Container Fluid-->
<?php include '../includes_pengguna/footer.php'; ?>