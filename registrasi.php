<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi - Universitas BTH</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .login-bg {
      background-image: url('gambar/bsc.jpg');
      background-size: cover;
      background-position: center;
    }
  </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

<div class="w-full max-w-6xl mx-auto bg-white shadow-2xl overflow-hidden flex flex-col md:flex-row rounded-xl">

  <!-- KIRI -->
  <div class="md:w-1/2 login-bg relative h-96 md:h-auto min-h-[500px]">
    <div class="absolute inset-0 bg-gradient-to-r from-black/30 to-transparent"></div>

    <div class="absolute top-6 left-6 bg-white/90 px-4 py-2 rounded-lg shadow">
      <img src="gambar/logoBTH.png" class="h-10">
    </div>
  </div>

  <!-- KANAN -->
  <div class="md:w-1/2 p-10 flex flex-col justify-center">

    <div class="flex justify-center mb-3">
      <img src="gambar/logoBTH.png" class="h-24">
    </div>

    <div class="text-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800">REGISTRASI</h1>
      <p class="text-gray-600 mt-2">Silakan buat akun Anda</p>
    </div>

    <!-- FORM -->
    <form action="proses_registrasi.php" method="POST" class="space-y-4">

      <!-- Nama -->
       <label class="block text-sm font-medium text-gray-700 mb-1">Nama/Organisasi</label>
      <input type="text" name="nama" placeholder="Nama / organisasi"
        class="w-full px-4 py-3 border rounded-xl" required>

      <!-- Username -->
       <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
      <input type="text" name="username" placeholder="Username"
        class="w-full px-4 py-3 border rounded-xl" required>

      <!-- Password -->
       <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
      <input type="password" name="password" placeholder="Password"
        class="w-full px-4 py-3 border rounded-xl" required>

      <!-- No HP -->
       <label class="block text-sm font-medium text-gray-700 mb-1">No HP</label>
      <input type="text" name="tlp" placeholder="No HP"
        class="w-full px-4 py-3 border rounded-xl" required>

      <!-- Gmail -->
       <label class="block text-sm font-medium text-gray-700 mb-1">Gmail</label>
      <input type="email" name="gmail" placeholder="Gmail"
        class="w-full px-4 py-3 border rounded-xl" required>

      <!-- Role -->
       <label class="block text-sm font-medium text-gray-700 mb-1">Login Sebagai</label>
      <select name="role" class="w-full px-4 py-3 border rounded-xl">
        <option value="pengguna">Pengguna / Mahasiswa</option>
      </select>

      <!-- Tombol -->
      <button type="submit"
        class="w-full bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700">
        Daftar
      </button>

    </form>

    <div class="text-center mt-6 text-sm">
      Sudah punya akun?
      <a href="login.php" class="text-blue-600">Login</a>
    </div>

  </div>
</div>

</body>
</html>