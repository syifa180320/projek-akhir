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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <a class="m-0 float-right btn btn-outline-primary" href="tambah_peralatan.php">Tambah Alat <i
                      class="fas fa-chevron-right"></i></a>
                  <div class="px-1 mt-1">
                    <input type="text" id="searchInput" placeholder="Cari data..." class="form-control mb-1">
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                          <th class="text-center">No</th></th>
                          <th class="text-center">Kode Peralatan</th></th>
                          <th class="text-center">Nama Peralatan</th>
                          <th class="text-center">Kondisi</th>
                          <th>Aksi</th>
                      </tr>
                      </thead>

                        <?php
                          include '../koneksi.php';
                          $no = 1;
                          $urutan_kode = 1;
                          $data = mysqli_query($conn, "SELECT * from peralatan");
                          while ($d = mysqli_fetch_array($data)){
                            $kode = "D" . sprintf("%03d", $urutan_kode);
                              ?>
                          <tr>
                                  <td class="text-center"><?php echo $no++; ?></td>
                                  <td class="text-center"><?php echo $kode; ?></td>
                                  <td class="text-center"><?php echo $d['nama_alat']; ?></td>
                                  <td class="text-center"><?php echo $d['kondisi']; ?></td>
                                  <td>
                                    <a href="edit_peralatan.php?peralatan_id=<?= $d['peralatan_id'] ?>" class="btn btn-sm btn-outline-primary"  title="edit_peralatan">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="hapus_peralatan.php?peralatan_id=<?= $d['peralatan_id'] ?>" class="btn btn-sm btn-outline-danger" title="hapus_peralatan" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                  </td>
                              </tr>
                          <?php $urutan_kode++; } ?>
                          </table>
                        </div>
                       <div class="card-footer"></div>
                      </div>
                    </div>
                  </div>
        <!---Container Fluid-->

<?php include '../includes_pengguna/footer.php'; ?>