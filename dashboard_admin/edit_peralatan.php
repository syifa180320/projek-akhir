<?php
include '../includes_admin/header.php';
?>

        <!-- Container Fluid-->
      <div id="layoutSidenav_content">
        <main>
       <!-- Main Content -->
        <div class="main">
          <div class="topbar-tambah">
            <h2>Edit Data Peralatan</h2>
              <div style="display:flex; align-items:center; gap:8px;">
                <span>👤</span>
                <span>Admin</span>
              </div>
            </div>
            <?php 
            include '../koneksi.php';
            $peralatan_id = $_GET['peralatan_id'];
            $data = mysqli_query($conn,"SELECT * from peralatan where peralatan_id='$peralatan_id'");
            while ($d = mysqli_fetch_array($data)){
            ?>
            <form class="form-container" method="post" action="update_peralatan.php">
                <div class="form-group">
                  <input type="hidden" name="peralatan_id" value="<?= $d['peralatan_id'] ?>">
                </div>

                <div class="form-group">
                  <label>Nama Peralatan :</label>
                  <input type="text" name="nama_alat" class="form-control "value="<?= $d['nama_alat'] ?>">
                </div>

                <div class="form-group">
                  <label>Kondisi :</label>
                  <input type="text" name="kondisi" class="form-control "value="<?= $d['kondisi'] ?>">
                </div>



                <button type="submit" class="submit-btn">Simpan Perubahan</button>
              </form>
              <?php } ?>
          </div>
        </main>
        <!---Container Fluid-->
        
<?php include '../includes_pengguna/footer.php'; ?>
