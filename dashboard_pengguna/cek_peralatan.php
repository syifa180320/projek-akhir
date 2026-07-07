<?php

include "../koneksi.php";

$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];

$data = mysqli_query($conn,"SELECT * FROM peralatan");

while($d = mysqli_fetch_array($data)){

    $dipinjam = false;

    $id_alat = $d['peralatan_id'];

    $cek = mysqli_query($conn," SELECT * FROM peminjaman WHERE FIND_IN_SET('$id_alat', peralatan_id)AND LOWER(TRIM(status))='diterima'
    AND (
    tgl_pinjam <= '$tgl_kembali'
    AND
    tgl_kembali >= '$tgl_pinjam'
)
");

    if(mysqli_num_rows($cek) > 0){
        $dipinjam = true;
    }
?>

<div class="col-md-4 mb-3">
    <label class="card p-2 <?= $dipinjam ? 'bg-light' : '' ?>" style="<?= $dipinjam ? 'opacity:.5' : '' ?>">
       <img src="../gambar/<?= $d['gambar']; ?>" style="height:120px;object-fit:cover;">
        <div class="mt-2">
            <input type="checkbox" name="peralatan_id[]" value="<?= $d['peralatan_id']; ?>" <?= $dipinjam ? 'disabled' : '' ?>> <?= $d['nama_alat']; ?>

        <br>

        <?php if($dipinjam){ ?>
            <span class="badge badge-secondary">
            Sudah di Pinjam
            </span>

        <?php }else{ ?>
            <span class="badge badge-success">
            Tersedia
            </span>

        <?php } ?>

        </div>
    </label>
</div>

<?php } ?>