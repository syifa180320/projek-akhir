<?php
include '../includes_admin/header.php';
?>

        <!-- Container Fluid-->
      <div id="layoutSidenav_content">
        <main>
       <!-- Main Content -->
        <div class="main">
          <div class="topbar-tambah">
            <h2>Tambah Data Pengguna</h2>
            <div style="display:flex; align-items:center; gap:8px;">
              <span>👤</span>
              <span>Admin</span>
            </div>
          </div>

            <form class="form-container" method="post" action="aksipengguna.php"  enctype="multipart/form-data">
                <div class="form-group">
                  <label>Nama Ormawa :</label>
                  <input type="text" name="nama" placeholder="Masukkan Nama Omawa">
                </div>
                <div class="form-group">
                  <label>username :</label>
                  <input type="text" name="username" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                  <label>Password :</label>
                  <input type="text" name="password" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                  <label>Daftar Sebagai :</label>
                    <select name="role" class="w-full px-4 py-3 border rounded-xl">
                        <option value="pengguna">Pengguna / Mahasiswa</option>
                    </select>
                </div>
               
              <button type="submit" class="submit-btn">Simpan</button>
            </form>
          </div>
        </main>
</div>
        <!---Container Fluid-->

<?php include '../includes_admin/footer.php'; ?>
