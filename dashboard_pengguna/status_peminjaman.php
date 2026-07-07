<?php
include '../includes_pengguna/header.php';
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-3"></div>
        </div>
            <!-- Pie Chart -->
            <div class="col-xl-10 col-lg-5">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <a class=" btn btn-outline-primary" href="">Status Peminjaman</a>
                  <div class="px-1 mt-1">
                    <input type="text" id="searchInput" placeholder="Cari data..." class="form-control mb-1">
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Penanggung Jawab</th>
                            <th class="text-center">Peralatan</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                        <?php
                            include '../koneksi.php';
                            $id = $_SESSION['id'];

                            $user = mysqli_query($conn," SELECT * FROM user WHERE id='$id'");
                            $u = mysqli_fetch_assoc($user);
                            $nama = $u['nama'];
                            $no = 1;

                            $data = mysqli_query($conn," SELECT peminjaman.*, GROUP_CONCAT(peralatan.nama_alat SEPARATOR ', ') AS alat FROM peminjaman JOIN peralatan ON FIND_IN_SET(peralatan.peralatan_id, peminjaman.peralatan_id) WHERE peminjaman.id='$id' GROUP BY peminjaman.peminjaman_id ORDER BY peminjaman.peminjaman_id DESC");
                            while($d = mysqli_fetch_array($data)){
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td class="text-center"><?php echo $d['pj']; ?></td>
                                <td class="text-center"><?php echo $d['alat']; ?></td>
                                <td class="text-center"><?php echo $d['tgl_pinjam']; ?></td>
                                <td class="text-center"><?php echo $d['status']; ?></td>
                            </tr>
                            <?php } ?>
                          </table>
                        </div>
                       <div class="card-footer"></div>
                      </div>
                    </div>
                  </div>
        <!---Container Fluid-->

 <?php include '../includes_pengguna/footer.php'; ?>
