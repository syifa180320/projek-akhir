<?php
include '../includes_admin/header.php';
?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="row mb-3"></div>
</div>

<!-- Pie Chart -->
<div class="col-xl-10 col-lg-5">
  <div class="card mb-4">
    <div class="card-header py-3">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <a class="btn btn-outline-primary" href="">
          Laporan Peminjaman
        </a>
        <div class="d-flex align-items-center gap-2 flex-wrap">
          <input type="text" id="searchInput" placeholder="Cari data..." class="form-control" style="width:200px;">
          <form method="GET" class="d-flex align-items-center gap-2 m-0">
            <input type="month" name="bulan" class="form-control" style="width:180px;" value="<?php echo $_GET['bulan'] ?? ''; ?>">
            <button type="submit" class="btn btn-primary btn-sm">
              Filter
            </button>
            <?php
            $bulan = $_GET['bulan'] ?? '';
            ?>
            <a href="cetak_pdf.php<?php echo $bulan ? '?bulan='.$bulan : ''; ?>"
               class="btn btn-danger btn-sm">
              PDF
            </a>
          </form>
        </div>
      </div>
    </div>

    <div class="table-responsive">
      <table class="laporan-table align-items-center table-flush" id="dataTable">
        <thead class="thead-light">
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Peralatan</th>
            <th class="text-center">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php
        include '../koneksi.php';

        $no = 1;
        if (!empty($_GET['bulan'])) {

            $bulan = $_GET['bulan'];
            $query = "SELECT peminjaman.*, GROUP_CONCAT(peralatan.nama_alat SEPARATOR ', ') AS alat FROM peminjaman JOIN peralatan ON FIND_IN_SET(peralatan.peralatan_id, peminjaman.peralatan_id) WHERE DATE_FORMAT(peminjaman.tgl_pinjam,'%Y-%m')='$bulan' AND peminjaman.status IN ('Diterima','Ditolak') GROUP BY peminjaman.peminjaman_id";

        } else {
            $query = "SELECT peminjaman.*, GROUP_CONCAT(peralatan.nama_alat SEPARATOR ', ') AS alat FROM peminjaman JOIN peralatan ON FIND_IN_SET(peralatan.peralatan_id, peminjaman.peralatan_id) WHERE peminjaman.status IN ('Diterima','Ditolak') GROUP BY peminjaman.peminjaman_id
            ";

        }

        $data = mysqli_query($conn, $query);
        while ($d = mysqli_fetch_array($data)) {
        ?>
                    <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo $d['nama']; ?></td>
                        <td class="text-center"><?php echo $d['tgl_pinjam']; ?></td>
                        <td class="text-center"><?php echo $d['alat']; ?></td>
                        <td class="text-center">
                          <?php if($d['status'] == 'diterima'){ ?>
                            <span class="badge badge-success">
                              <?php echo $d['status']; ?>
                            </span>
                          <?php }elseif($d['status'] == 'ditolak'){ ?>
                            <span class="badge badge-danger">
                              <?php echo $d['status']; ?>
                            </span>
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
        <!---Container Fluid-->

<?php include '../includes_admin/footer.php'; ?>