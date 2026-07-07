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
let lastId = 0;

setInterval(function () {
    fetch('notifikasi.php')
    .then(response => response.json())
    .then(data => {
        if (data.length > 0) {
            let notif = data[0];

            if (notif.notifikasi_id != lastId) {
                lastId = notif.notifikasi_id;

                let audio = document.getElementById('notifSound');
                audio.currentTime = 0;
                audio.play();

                // popup notif
                showNotif(notif.pesan);

                fetch('update_suara.php?id=' + notif.notifikasi_id)
                .then(res => res.text())
                .then(res => console.log("update suara:", res));
            }
        }
    })
    .catch(err => console.log("error notif:", err));
}, 5000);

document.addEventListener("click", function(e){
    const item = e.target.closest(".notif-item");
    if(!item) return;

    e.preventDefault();
    e.stopPropagation();

    let id = item.dataset.id;
    fetch("baca_notifikasi.php?id=" + id)
    .then(res => res.text())
    .then(res => {
        if(res.trim() === "ok"){
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
    notif.innerHTML = pesan;
    notif.style.position="fixed";
    notif.style.top="20px";
    notif.style.right="20px";
    notif.style.background="#28a745";
    notif.style.color="white";
    notif.style.padding="15px";
    notif.style.borderRadius="10px";
    notif.style.zIndex="9999";

    document.body.appendChild(notif);
    setTimeout(function(){
        notif.remove();
    },5000);
}

</script>
<?php
// Total alat
$queryTotal = mysqli_query($conn, "SELECT COUNT(*) as total FROM peralatan");
$dataTotal = mysqli_fetch_assoc($queryTotal);
$total_peralatan = $dataTotal['total'];

// Data booking per tanggal
$booking = [];

$queryBooking = mysqli_query($conn, " SELECT tgl_pinjam, COUNT(*) as jumlah_booking FROM peminjaman WHERE status IN ('menunggu', 'diterima', 'ditolak') GROUP BY tgl_pinjam");

while($row = mysqli_fetch_assoc($queryBooking)){
    $booking[$row['tgl_pinjam']] = $row['jumlah_booking'];
}
?>

<script>
const bookingData = <?php echo json_encode($booking); ?>;
const totalAlat = <?php echo $total_peralatan; ?>;

let currentDate = new Date();

function renderCalendar(){
    const monthYearEl = document.getElementById('month-year');
    const gridEl = document.getElementById('calendar-grid');

    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();

    const monthNames = [
        "Januari","Februari","Maret","April",
        "Mei","Juni","Juli","Agustus",
        "September","Oktober","November","Desember"
    ];

    monthYearEl.textContent = monthNames[month] + " " + year;
    gridEl.innerHTML = '';

    const hari = ['Min','Sen','Sel','Rab','Kam','Jum','Sab'];
    hari.forEach(h => {
        const dayName = document.createElement('div');
        dayName.className = 'calendar-day-name';
        dayName.textContent = h;
        gridEl.appendChild(dayName);
    });

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    for(let i=0; i<firstDay; i++){
        const empty = document.createElement('div');
        empty.className = 'calendar-day empty';
        gridEl.appendChild(empty);
    }

    for(let i=1; i<=daysInMonth; i++){
        const dayEl = document.createElement('div');
        const tanggal =
            `${year}-${String(month+1).padStart(2,'0')}-${String(i).padStart(2,'0')}`;
        const jumlahBooking = bookingData[tanggal] || 0;

        dayEl.className = 'calendar-day';
        dayEl.textContent = i;

        if(jumlahBooking == 0){
            dayEl.classList.add('available');
            dayEl.title = 'Belum ada peminjaman';

        }
        else if(jumlahBooking < totalAlat){
            dayEl.classList.add('partial-booking');
            dayEl.title =
                jumlahBooking + ' dari ' +
                totalAlat + ' alat sudah dibooking';
        }
        else{
            dayEl.classList.add('full-booking');
            dayEl.title = 'Semua alat sudah dibooking';
        }

        gridEl.appendChild(dayEl);
    }
}
function prevMonth(){
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar();
}
function nextMonth(){
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar();
}
document.addEventListener('DOMContentLoaded', function(){
    renderCalendar();
});
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