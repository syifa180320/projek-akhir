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