<?php
include '../includes_pengguna/header.php';
?>

        <!-- Container Fluid-->
      <div id="layoutSidenav_content">
        <main>
       <!-- Main Content -->
        <div class="main">
          <div class="topbar-tambah">
            <h2>Ajukan Peminjaman</h2>
            <div style="display:flex; align-items:center; gap:5px;">
              <span>👤</span>
              <span>Pengguna</span>
            </div>
          </div>

            <form class="form-container" method="post" action="aksi_pengajuan.php">
                <div class="form-group">
                  <label>Nama / Organisasi :</label>
                  <input type="text" name="nama" placeholder="Nama / Organisasi">
                </div>
                <div class="form-group">
                  <label>Nama Penanggung Jawab :</label>
                  <input type="text" name="penanggung_jawab" placeholder="Penanggung Jawab">
                </div>
                <div class="form-group">
                  <label>Peralatan :</label>
                  <select name="peralatan_id">
                  <?php
                  include '../koneksi.php';
                  $data = mysqli_query($conn,"SELECT * FROM peralatan");
                  while($d = mysqli_fetch_array($data)){
                    echo "<option value='".$d['peralatan_id']."'>".$d['nama_alat']."</option>";
                  }
                  ?>
                </select>
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tanggal">
                </div>
                <div class="form-group">
                  <label>Jam Mulai</label>
                  <input type="time" name="jam_mulai">
                </div>
                <div class="form-group">
                  <label>Jam Selesai</label>
                  <input type="time" name="jam_selesai">
                </div>
                <div class="form-group">
                  <label>Keperluan</label>
                  <textarea name="keperluan"></textarea>
                </div>
              <button type="submit" class="submit-btn">Kirim Pengajuan</button>
            </form>

          </div>
        </main>
        <!---Container Fluid-->
        
<?php include '../includes_pengguna/footer.php'; ?>

