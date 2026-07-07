<?php
include '../includes_admin/header.php';
include '../koneksi.php';

/* Ambil data user yang login */
$id = $_SESSION['id'];

$query = mysqli_query($conn, "SELECT * FROM user WHERE role='admin'");
$user = mysqli_fetch_assoc($query);

if (!$user) {
    die("Data admin tidak ditemukan");
}
?>

<!-- Container Fluid -->
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card profile-card">
            <!-- HEADER -->
            <div class="profile-header d-flex justify-content-between align-items-center">
                <h4>
                    <i class="fas fa-user-circle"></i>
                    Profil Admin
                </h4>
                <button type="button" class="btn btn-profile" data-toggle="modal" data-target="#modalEditProfile">
                    <i class="fas fa-user-edit"></i> 
                    Edit Profil </button>
            </div>

            <!-- BODY -->
            <div class="profile-body">
                <div class="row">
                    <!-- FOTO & IDENTITAS -->
                    <div class="col-md-4 profile-left">
                        <?php if(!empty($user['gambar'])) { ?>
                            <img src="../gambar/<?php echo $user['gambar']; ?>" class="profile-photo">
                        <?php } else { ?>
                            <img src="../gambar/default.png" class="profile-photo">
                        <?php } ?>

                        <div class="profile-name"> <?php echo $user['nama']; ?></div>
                        <div class="profile-role">Pengguna Sistem Peminjaman</div>
                        <span class="profile-status" badge badge-success>Aktif </span>
                    </div>

                    <!-- DATA -->
                    <div class="col-md-8">
                        <h5 class="info-title">Informasi Akun</h5>
                        <table class="table table-bordered profile-table">
                            <tr>
                                <th>Nama Lengkap</th>
                                <td><?php echo $user['nama']; ?></td>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <td><?php echo !empty($user['tlp']) ? $user['tlp'] : '-'; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo !empty($user['gmail']) ? $user['gmail'] : '-'; ?></td>
                            </tr>
                            <tr>
                                <th>Status Akun</th>
                                <td>
                                    <span class="badge badge-success">Aktif</span>
                                </td>
                            </tr>
                        </table>


                        <!-- MENU TAMBAHAN -->
                    <div class="menu-section">
                        <h5 class="menu-title">Fitur Tambahan</h5>
                        <div class="profile-menu">
                            <a href="#" class="menu-item" data-toggle="modal" data-target="#modalPassword">
                                <div class="menu-left">
                                    <i class="fas fa-lock"></i>
                                    Privasi & Keamanan
                                </div>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <a href="#" class="menu-item" data-toggle="modal" data-target="#modalTentang">
                                <div class="menu-left">
                                    <i class="fas fa-info-circle"></i>
                                    Tentang Aplikasi
                                </div>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- FOOTER -->
            <div class="profile-footer">
                Sistem Peminjaman Sarana & Prasarana UBTH
            </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- EDIT PROFILE -->
<div class="modal fade" id="modalEditProfile" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <!-- HEADER -->
            <div class="profile-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <i class="fas fa-user-edit"></i>
                    Edit Profil
                </h4>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <!-- FORM -->
            <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                <div class="profile-body">
                    <div class="row">
                        <!-- FOTO -->
                        <div class="col-md-4 profile-left">
                            <input type="hidden" name="id" value="<?= $user['id']; ?>">
                            <?php
                            $foto = !empty($user['gambar']) ? $user['gambar'] : 'default.png';
                            ?>
                            <img src="../gambar/<?= $foto; ?>" class="profile-photo">
                            <div class="profile-name"> <?= $user['nama']; ?></div>
                            <div class="profile-role">Pengguna Sistem Peminjaman</div>
                            <div class="mt-4">
                                <label>Ganti Foto Profil</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                        </div>

                        <!-- DATA -->
                        <div class="col-md-8">
                            <h5 class="info-title">Informasi Akun</h5>
                            <table class="table table-bordered profile-table">
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td>
                                        <input type="text"name="nama" class="form-control" value="<?= $user['nama']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>No Handphone</th>
                                    <td>
                                        <input type="text" name="tlp" class="form-control" value="<?= $user['tlp']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>
                                        <input type="email" name="gmail" class="form-control" value="<?= $user['gmail']; ?>">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- MODAL UBAH PASSWORD -->
<div class="modal fade" id="modalPassword" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-lock"></i>
                    Ubah Kata Sandi
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form action="update_password.php" method="POST">
                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Password Lama</label>
                        <input type="password" name="password_lama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="password_baru" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="konfirmasi_password" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- MODAL TENTANG APLIKASI -->
<div class="modal fade" id="modalTentang" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-info-circle"></i>
                    Tentang Aplikasi
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="text-center mb-3">
                    <i class="fas fa-university fa-4x text-primary"></i>
                    <h4 class="mt-3">
                        Sistem Peminjaman Sarana & Prasarana
                    </h4>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>Versi Aplikasi</th>
                        <td>1.0</td>
                    </tr>

                    <tr>
                        <th>Institusi</th>
                        <td>Universitas BTH</td>
                    </tr>

                    <tr>
                        <th>Fungsi Sistem</th>
                        <td>
                            Sistem ini digunakan untuk membantu proses
                            pengajuan, persetujuan, dan monitoring
                            peminjaman sarana dan prasarana secara online.
                        </td>
                    </tr>

                    <tr>
                        <th>Dikembangkan Oleh</th>
                        <td>Dede Syifa Maspupah</td>
                    </tr>

                    <tr>
                        <th>Tahun</th>
                        <td>2026</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../includes_admin/footer.php'; ?>