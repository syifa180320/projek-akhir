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
                  <a class=" btn btn-outline-primary" href="">Data Pengguna</a>
                  <div class="px-1 mt-1">
                    <input type="text" id="searchInput" placeholder="Cari data..." class="form-control mb-1">
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush table-bordered" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                          <th class="text-center">No</th></th>
                          <th class="text-center">Nama Pengguna</th>
                          <th class="text-center">No HP</th>
                          <th class="text-center">Gmail</th>
                      </tr>
                      </thead>
                      <tbody>
                        
                        <?php
                          include '../koneksi.php';
                          $no = "1";
                          $data = mysqli_query($conn, "SELECT * from user WHERE role='pengguna'");
                          while ($d = mysqli_fetch_array($data)){
                              ?>
                          <tr>
                                  <td class="text-center"><?php echo $no++; ?></td>
                                  <td class="text-center"><?php echo $d['nama']; ?></td>
                                  <td class="text-center"><?php echo $d['tlp']; ?></td>
                                  <td class="text-center"><?php echo $d['gmail']; ?></td>
                              </tr>
                      </tbody>
                          <?php } ?>
                          </table>
                        </div>
                       <div class="card-footer"></div>
                      </div>

        <!---Container Fluid-->

<?php include '../includes_pengguna/footer.php'; ?>