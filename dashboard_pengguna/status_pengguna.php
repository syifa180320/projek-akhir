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
                  <a class=" btn btn-outline-primary" href="">Status Pengguna</a>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>

                        <?php
                        include '../koneksi.php';
                        $no=1;
                        $data = mysqli_query($conn,"SELECT * FROM peminjaman");
                        while($d = mysqli_fetch_array($data)){ ?>
                          <tr>
                                  <td class="text-center"><?php echo $no++; ?></td>
                                  <td class="text-center"><?php echo $d['nama']; ?></td>
                                  <td class="text-center"><?php echo $d['tanggal']; ?></td>
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
