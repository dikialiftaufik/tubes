<?php
require_once 'configdb.php';
include './views/header.php';
// Query untuk mengambil data makanan
$sql = "SELECT name AS nama_makanan, price AS harga, image_url AS gambar, description AS deskripsi FROM menu";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Menu Makanan</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color:rgb(4, 4, 4);
      margin: 0;
      padding: 0;
      padding-bottom: 70px; /* Untuk memberi ruang bagi panel keranjang */
      display: flex;
      flex-direction: column;
      min-height: 100vh; /* Ensure the body takes at least the full viewport height */
    }
    .container {
      width: 90%;
      max-width: 1200px;
      margin: auto;
      padding: 40px 0;
      flex: 1; /* Allow the container to grow and take available space */
    }
    h1 {
      text-align: center;
      margin-bottom: 40px;
      color: white;
    }
    .card-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }
    .card {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      width: 300px;
      overflow: hidden;
      transition: transform 0.3s ease;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .card h2 {
      font-size: 1.5rem;
      margin: 16px;
    }
    .card p {
      margin: 0 16px 16px;
      color: #555;
    }
    .order-button {
      display: block;
      width: calc(100% - 32px);
      margin: 0 16px 16px;
      padding: 10px;
      background-color: rgb(233, 2, 2);
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
      text-align: center;
      text-decoration: none;
    }
    .order-button:hover {
      background-color: rgb(124, 9, 9);
    }
    
    /* Style untuk panel keranjang */
    .cart-panel {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color:rgba(255, 61, 55, 0.97);
      color: white;
      padding: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 1000;
      box-shadow: 0 -2px 10px rgba(0,0,0,0.2);
      cursor: pointer;
      transition: all 0.3s ease;
      display: none; /* Awalnya tersembunyi */
    }
    
    .cart-panel:hover {
      background-color:rgb(201, 15, 15);
    }
    
    .cart-left {
      display: flex;
      flex-direction: column;
    }
    
    .cart-right {
      display: flex;
      align-items: center;
    }
    
    .cart-icon {
      font-size: 1.5rem;
      margin-left: 10px;
    }
    
    .cart-item-count {
      font-weight: bold;
      font-size: 1.2rem;
    }
    
    .cart-origin {
      font-size: 0.9rem;
      opacity: 0.9;
    }
    
    .cart-total {
      font-weight: bold;
      font-size: 1.2rem;
    }
    
    .notification {
      position: fixed;
      bottom: 80px;
      left: 50%;
      transform: translateX(-50%);
      background-color: rgba(0,0,0,0.8);
      color: white;
      padding: 12px 20px;
      border-radius: 8px;
      z-index: 1001;
      display: none;
      max-width: 80%;
      text-align: center;
    }

    /* Footer Styles */
    footer {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 10px 0;
      margin-top: 20px; /* Add some space above the footer */
    }

    footer a {
      color: white;
      text-decoration: none;
      margin: 0 10px;
    }

    footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Menu Makanan</h1>
    <div class="card-container">

      <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="card">
            <!-- langsung menggunakan image_url dari database -->
            <img 
              src="<?php echo $row['gambar']; ?>" 
              alt="<?php echo htmlspecialchars($row['nama_makanan']); ?>"
              onerror="this.onerror=null; this.src='assets/images/default.jpg';"
            />
            <h2><?php echo htmlspecialchars($row['nama_makanan']); ?></h2>
            <p><?php echo htmlspecialchars($row['deskripsi'] ?? ''); ?></p>
            <p>Harga: Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
            <button class="order-button" onclick="tambahKeKeranjang('<?php echo htmlspecialchars($row['nama_makanan']); ?>', <?php echo $row['harga']; ?>)">
              <i class="fas fa-shopping-cart"></i> Pesan
            </button>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p style="text-align: center; color: white;">Tidak ada data makanan tersedia.</p>
      <?php endif; ?>

    </div>
  </div>
  
  <div class="notification" id="notification"></div>
  
  <div class="cart-panel" id="cart-panel" onclick="window.location.href='keranjang.php'">
    <div class="cart-left">
      <div class="cart-item-count"><span id="total-items">0</span> item</div>
      <div class="cart-origin">Diantar dari <span id="restoran-name">Restoran Anda</span></div>
    </div>
    <div class="cart-right">
      <div class="cart-total">Rp <span id="total-price">0</span></div>
      <div class="cart-icon"><i class="fas fa-shopping-cart"></i></div>
    </div>
  </div>

  <footer>|
    <a href="saran.php">Kritik & Saran</a>
  |</footer>

  <script>
    // Periksa keranjang saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
      updateCartPanel();
    });
    
    function tambahKeKeranjang(nama, harga) {
      // Dapatkan keranjang yang ada atau buat array kosong jika belum ada
      let keranjang = JSON.parse(localStorage.getItem('keranjang')) || [];
      
      // Cek apakah item sudah ada di keranjang
      const indexItem = keranjang.findIndex(item => item.name === nama);
      
      if (indexItem !== -1) {
        // Jika item sudah ada, tambahkan quantity
        keranjang[indexItem].quantity += 1;
      } else {
        // Jika item belum ada, tambahkan item baru
        keranjang.push({
          name: nama,
          price: harga,
          quantity: 1
        });
      }
      
      // Simpan kembali ke localStorage
      localStorage.setItem('keranjang', JSON.stringify(keranjang));
      
      // Tampilkan notifikasi
      showNotification(nama + " telah ditambahkan ke keranjang");
      
      // Update panel keranjang
      updateCartPanel();
    }
    
    function showNotification(message) {
      const notification = document.getElementById('notification');
      notification.textContent = message;
      notification.style.display = 'block';
      
      // Hilangkan notifikasi setelah 2 detik
      setTimeout(function() {
        notification.style.display = 'none';
      }, 2000);
    }
    
    function updateCartPanel() {
      const keranjang = JSON.parse(localStorage.getItem('keranjang')) || [];
      const cartPanel = document.getElementById('cart-panel');
      const totalItems = document.getElementById('total-items');
      const totalPrice = document.getElementById('total-price');
      
      if (keranjang.length > 0) {
        // Hitung total item dan harga
        let itemCount = 0;
        let priceTotal = 0;
        
        keranjang.forEach(item => {
          itemCount += item.quantity;
          priceTotal += item.price * item.quantity;
        });
        
        // Update tampilan
        totalItems.textContent = itemCount;
        totalPrice.textContent = new Intl.NumberFormat('id-ID').format(priceTotal);
        
        // Tampilkan panel
        cartPanel.style.display = 'flex';
      } else {
        // Sembunyikan panel jika keranjang kosong
        cartPanel.style.display = 'none';
      }
    }
    
    // Tambahan menu makanan
    window.addEventListener('storage', function(e) {
      if (e.key === 'keranjang') {
        updateCartPanel();
      }
    });
  </script>
  
  <script src="assets/js/script.js"></script>
</body>
</html>

<?php include 'views/footer.php'; ?>