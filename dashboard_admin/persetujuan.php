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
                  <a class=" btn btn-outline-primary" href="">Pengajuan Diterima</a>
                  <div class="px-1 mt-1">
                    <input type="text" id="searchInput" placeholder="Cari data..." class="form-control mb-1">
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tanggal Pinjam</th>
                            <th class="text-center">Tanggal Kembali</th>
                            <th class="text-center">Peralatan</th>
                            <th class="text-center">Keperluan</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../koneksi.php';
                        $no=1;
                        $data = mysqli_query($conn," SELECT * FROM peminjaman WHERE status='diterima' ORDER BY tgl_pinjam DESC ");
                          while($d = mysqli_fetch_array($data)){ ?>
                          <tr>
                                  <td class="text-center"><?php echo $no++; ?></td>
                                  <td class="text-center"><?php echo $d['nama']; ?></td>
                                  <td class="text-center"><?php echo $d['tgl_pinjam']; ?></td>
                                  <td class="text-center"><?php echo $d['tgl_kembali']; ?></td>
                                  <td class="text-center">
                                    <?php
                                    $id_alat = explode(',', $d['peralatan_id']);

                                    foreach($id_alat as $id){
                                        $q = mysqli_query($conn,"
                                            SELECT nama_alat
                                            FROM peralatan
                                            WHERE peralatan_id='$id'
                                        ");

                                        if($a = mysqli_fetch_array($q)){
                                            echo "• ".$a['nama_alat']."<br>";
                                        }
                                    }
                                    ?>
                                  </td>
                                  <td class="text-center"><?php echo $d['keperluan']; ?></td>
                                  <td class="text-center"><?php echo $d['status']; ?></td>
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

<?php include '../includes_pengguna/footer.php'; ?>