<?php
include '../includes_admin/header.php';
?>

        <!-- Container Fluid-->
      <div id="layoutSidenav_content">
        <main>
       <!-- Main Content -->
        <div class="main">
          <div class="topbar-tambah">
            <h2>Tambah Data Peralatan</h2>
            <div style="display:flex; align-items:center; gap:8px;">
              <span>👤</span>
              <span>Admin</span>
            </div>
          </div>

            <form class="form-container" method="post" action="aksiperalatan.php">
                <div class="form-group">
                  <label>Nama Peralatan :</label>
                  <input type="text" name="nama_alat" placeholder="Masukkan Nama Peralatan">
                </div>
                <div class="form-group">
                  <label>Kondisi :</label>
                  <input type="text" name="kondisi" placeholder="Kondisi">
                </div>
              <button type="submit" class="submit-btn">Simpan</button>
            </form>
          </div>
        </main>
        <!---Container Fluid-->

<?php include '../includes_pengguna/footer.php'; ?>

