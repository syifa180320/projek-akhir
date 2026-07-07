</div>
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://www.instagram.com/dedesyifa_maspupah?igsh=ejM3eHpjeWQzbmc3" target="_blank">Dede Syifa Maspupah</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
     
      <!-- Scroll to top -->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

    <audio id="notifSound">
        <source src="suara/notif.mp3" type="audio/mpeg">
    </audio>

<script>

let lastCount = 0;

setInterval(function(){
fetch('notifikasi.php')
.then(response => response.json())
.then(data => {
    console.log(data);
    if(data.length > lastCount){
        console.log(data[0]);
        document.getElementById('notifSound').play();
        let pesan = data[0].pesan;
        alert(pesan);
        showNotif(pesan);
    }
    lastCount = data.length;
});

document.addEventListener("click", function(e){
    const item = e.target.closest(".notif-item");
    if(!item) return;

    e.preventDefault();

    let id = item.dataset.id;

    fetch("baca_notifikasi.php?id=" + id)
    .then(res => res.text())
    .then(res => {
        if(res.trim() == "ok"){
            item.classList.remove("notif-belum");
            item.classList.add("notif-sudah");
            let dot = item.querySelector(".notif-dot");
            if(dot){
                dot.remove();
            }
        }
    });
});


function showNotif(pesan){
    let notif = document.createElement("div");
    
    notif.textContent = pesan;
    notif.style.position = "fixed";
    notif.style.top = "20px";
    notif.style.right = "20px";
    notif.style.width = "350px";
    notif.style.background = "#28a745";
    notif.style.color = "#fff";
    notif.style.padding = "15px";
    notif.style.fontSize = "14px";
    notif.style.borderRadius = "10px";
    notif.style.zIndex = "99999";
    notif.style.boxShadow = "0 0 10px rgba(0,0,0,.3)";

    document.body.appendChild(notif);

    setTimeout(() => {
        notif.remove();
    }, 5000);
}

</script>

<?php
$dataBooking = [];
$q = mysqli_query($conn," SELECT peralatan_id, tgl_pinjam, tgl_kembali FROM peminjaman WHERE LOWER(TRIM(status))='diterima' ");

while($row=mysqli_fetch_assoc($q)){
    $dataBooking[] = $row;
}

?>

<script>
const bookingData = <?= json_encode($dataBooking); ?>;
const totalAlat = <?= $total_peralatan; ?>;
</script>

<script>
// Variabel global untuk tracking bulan & tahun
let currentDate = new Date(); 

function renderCalendar() {
    const monthYearEl = document.getElementById('month-year');
    const gridEl = document.getElementById('calendar-grid');
    
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    
    // Format bulan dan tahun yang lebih ringkas
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"];
    monthYearEl.textContent = `${monthNames[month]} ${year}`;
    
    gridEl.innerHTML = '';
    
    // Nama hari
    const hari = ['Min','Sen','Sel','Rab','Kam','Jum','Sab'];
    hari.forEach(h => {
        const dayName = document.createElement('div');
        dayName.className = 'calendar-day-name';
        dayName.textContent = h;
        gridEl.appendChild(dayName);
    });
    
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    
    // Kosongkan hari sebelum tanggal 1
    for (let i = 0; i < firstDay; i++) {
        const empty = document.createElement('div');
        empty.className = 'calendar-day empty';
        gridEl.appendChild(empty);
    }
    
    // Total alat 
    const totalAlat = <?php echo $total_peralatan; ?>;
    
    for (let i = 1; i <= daysInMonth; i++) {
        const dayEl = document.createElement('div');
        dayEl.className = 'calendar-day';
        dayEl.textContent = i;
        
        const tanggal = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
        const alatDipinjam = new Set();

        bookingData.forEach(item => {

            const mulai = item.tgl_pinjam;
        const selesai = item.tgl_kembali;

    if(
    tanggal >= mulai &&
    tanggal <= selesai
){

        const daftarAlat = item.peralatan_id.split(',');

        daftarAlat.forEach(id => {
            alatDipinjam.add(id.trim());
        });
    }
});

const jumlahDipinjam = alatDipinjam.size;
        
// Cek booking
if(jumlahDipinjam === 0){

}
else if(jumlahDipinjam < totalAlat){
    dayEl.style.backgroundColor = '#007bff';
    dayEl.style.color = '#fff';
}
else{
    dayEl.style.backgroundColor = '#dc3545';
    dayEl.style.color = '#fff';
}
        dayEl.onclick = () => pilihTanggal(tanggal); 
        gridEl.appendChild(dayEl);
    }
}

function prevMonth() {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar();
}

function nextMonth() {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar();
}

function isiTanggalHariIni(){

    const hariIni = new Date();

    const pinjam = hariIni.toISOString().split('T')[0];

    document.getElementById("tgl_pinjam").value = pinjam;

    hariIni.setDate(hariIni.getDate()+1);

    const kembali = hariIni.toISOString().split('T')[0];

    document.getElementById("tgl_kembali").value = kembali;

}

function pilihTanggal(tanggal){

    document.getElementById('tgl_pinjam').value = tanggal;

    const tglKembali = new Date(tanggal);

    tglKembali.setDate(tglKembali.getDate() + 1);

    document.getElementById('tgl_kembali').value =
        tglKembali.toISOString().split('T')[0];

    cekPeralatan();

    $('#modalPinjam').modal('show');
}


// Inisialisasi kalender
document.addEventListener('DOMContentLoaded', function() {
    renderCalendar();
});
</script>

<script>
function cekPeralatan(){
    let tgl_pinjam =
        $('#tgl_pinjam').val();
    let tgl_kembali =
        $('#tgl_kembali').val();
    if(tgl_pinjam=='' || tgl_kembali==''){
        return;
    }
    $.ajax({
        url:'cek_peralatan.php',
        type:'POST',
        data:{
            tgl_pinjam:tgl_pinjam,
            tgl_kembali:tgl_kembali
        },

        success:function(res){
            $('#daftarPeralatan')
            .html(res);
        }
    });
}

</script>
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../assets/js/ruang-admin.min.js"></script>
  <script src="../assets/vendor/chart.js/Chart.min.js"></script>
  <script src="../assets/js/demo/chart-area-demo.js"></script>  
  <script>
document.addEventListener("DOMContentLoaded", function () {

    const input = document.getElementById("searchInput");
    const rows = document.querySelectorAll("#dataTable tr");

    input.addEventListener("input", function () {
        let keyword = this.value.toLowerCase().trim();

        rows.forEach(row => {
            let text = row.innerText.toLowerCase();

            if (text.includes(keyword)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });

});
</script>
</body>
</html>