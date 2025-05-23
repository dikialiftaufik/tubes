<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Report</title>
  <link rel="icon" type="image/x-icon" href="logoapk.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    .btn-status {
      transition: all 0.3s;
    }

    .btn-status-pending {
      background-color: #ffc107;
      border-color: #ffc107;
      color: white;
    }

    .btn-status-completed {
      background-color: #28a745;
      border-color: #28a745;
      color: white;
    }

    .btn-status-canceled {
      background-color: #dc3545;
      border-color: #dc3545;
      color: white;
    }

    .btn-payment-dibayar {
      background-color: #4caf50;
      border-color: #4caf50;
      color: white;
    }

    .btn-payment-belumdibayar {
      background-color: #f44336;
      border-color: #f44336;
      color: white;
    }

    #showModal .modal-header {
      background-color: #ffc107;
      color: white;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    #editModal .modal-header {
      background-color: #007bff;
      color: white;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .sidebar.collapsed {
        display: none;
      }

      .content {
        margin-left: 0;
      }

      .logo-container {
        display: none;
        /* Sembunyikan logo pada desktop view */
      }

      #sidebar .d-flex.align-items-center.justify-content-between {
        display: flex;
      }

      .row {
        gap: 15px;
      }
    }

    @media (max-width: 576px) {
      .card-title {
        font-size: 1.5rem;
      }

      .chart-controls {
        flex-direction: column;
      }
    }

    .chart-container {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    .stat-card {
      transition: transform 0.3s;
    }

    .stat-card:hover {
      transform: translateY(-5px);
    }

    .chart-controls {
      background: white;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .chart-title {
      font-size: 1.2rem;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .footer-custom {
      background-color: #dcdcdc;
      /* Warna latar */
      padding: 15px 0;
      /* Padding vertikal */
      font-size: 0.875rem;
      /* Ukuran font */
      color: #000;
      /* Warna teks */
      display: flex;
      /* Gunakan flexbox */
      justify-content: center;
      /* Pusatkan horizontal */
      align-items: center;
      /* Pusatkan vertikal */
      text-align: center;
      /* Pusatkan teks */
      width: 100%;
      /* Lebar penuh */
      position: relative;
      /* Posisi default */
    }

    .footer-custom a {
      text-decoration: none;
      color: inherit;
    }

    .footer-custom a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div id="sidebar" class="sidebar">
    <div class="d-flex align-items-center justify-content-between d-md-none p-2">
      <!-- Logo dan Judul Website -->
      <div class="d-flex align-items-center">
        <img src="logoapk.png" alt="Logo" style="width: 40px; height: 40px;" />
        <span class="ms-2 fw-bold">BOLOOO</span>
      </div>
      <!-- Tombol Toggle -->
      <button class="btn btn-outline-light" id="toggleSidebarMobile">
        <i class="bi bi-list"></i>
      </button>
    </div>

    <div class="logo-container d-none d-md-flex">
      <img src="logoapk.png" alt="Logo" />
      <span>BOLOOO</span>
    </div>

    <div class="menu-item active-menu-item">
      <a href="dashboard.html"><i class="bi bi-house-door me-2"></i> <span>Dashboard</span></a>
    </div>
    <div class="menu-item">
      <a href="report.html"><i class="bi bi-bar-chart-line me-2"></i> <span>Report</span></a>
    </div>
    <div class="menu-item">
      <a href="mainCourse.html"><i class="bi bi-egg-fried me-2"></i> <span>Main Course</span></a>
    </div>
    <div class="menu-item">
      <a href="drinks.html"><i class="bi bi-cup me-2"></i> <span>Drinks</span></a>
    </div>
    <div class="menu-item">
      <a href="sideDish.html"><i class="bi bi-egg me-2"></i></i> <span>Side Dish</span></a>
    </div>
    <div class="menu-item">
      <a href="package.html"><i class="bi bi-basket3 me-2"></i></i> <span>Paket</span></a>
    </div>
    <div class="menu-item">
      <a href="order.html"><i class="bi bi-cart3 me-2"></i> <span>Pesanan</span></a>
    </div>
    <div class="menu-item">
      <a href="reservation.html"><i class="bi bi-calendar2-check me-2"></i> <span>Reservasi</span></a>
    </div>
    <div class="menu-item">
      <a href="users.html"><i class="bi bi-person me-2"></i> <span>Users</span></a>
    </div>
    <div class="menu-item dropdown" id="dropdownMenu">
      <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-briefcase me-2"></i> <span>Karir</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-start">
        <li>
          <a class="dropdown-item" href="jobs.html">
            <i class="bi bi-person-badge me-2"></i>Lowongan
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="applicant.html">
            <i class="bi bi-person-badge me-2"></i>Pelamar
          </a>
        </li>
      </ul>
    </div>

  </div>


  <!-- Main Content -->
  <div id="content" class="content">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm rounded">
      <div class="container-fluid">
        <button id="toggleSidebar" class="btn btn-outline-secondary me-3">
          <i class="bi bi-list"></i>
        </button>
        <a class="navbar-brand" href="#">Report</a>
        <div class="dropdown ms-auto">
          <button class="profile-button rounded" type="button" id="profileDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="fotozufar.jpg" alt="Profile" class="rounded-circle" />
            <div class="text-start">
              <strong>Ahmad Zufar</strong><br />
              <small class="text-muted">Super Admin</small>
            </div>
          </button>
          <ul class="dropdown-menu dropdown-menu-end profile-dropdown shadow" aria-labelledby="profileDropdown">
            <li>
              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                <i class="bi bi-person me-2"></i>Profil
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item text-danger" href="login.html"><i
                  class="bi bi-box-arrow-right me-2"></i>Keluar</a>
            </li>
          </ul>
        </div>

        <!-- Profile Modal -->
        <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body">
                <form id="profileForm">
                  <div class="mb-3 text-center">
                    <img id="profilePicturePreview" src="fotozufar.jpg" alt="Profile Picture"
                      class="rounded-circle mb-2" style="width: 100px; height: 100px" />
                    <br />
                    <button type="button" id="editPictureButton" class="btn btn-outline-primary btn-sm mt-2"
                      style="display: none">
                      Ubah Foto Profil</button><br /><br />
                    <input type="file" id="profilePictureInput" class="form-control" style="display: none"
                      accept="image/*" />
                  </div>

                  <!-- Two-Column Layout -->
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="name" class="form-label">Nama Lengkap</label>
                      <div class="input-group">
                        <span class="input-group-text">
                          <i class="bi bi-person"></i>
                        </span>
                        <input type="text" id="name" class="form-control" value="Ahmad Zufar Fathoni" disabled />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group">
                        <span class="input-group-text">
                          <i class="bi bi-person"></i>
                        </span>
                        <input type="text" id="username" class="form-control" value="Ahmad Zufar" disabled />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label for="email" class="form-label">Email</label>
                      <div class="input-group">
                        <span class="input-group-text">
                          <i class="bi bi-envelope"></i>
                        </span>
                        <input type="email" id="email" class="form-control" value="zufar25@gmail.com" disabled />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="password" class="form-label">Password</label>
                      <div class="input-group">
                        <span class="input-group-text">
                          <i class="bi bi-lock"></i>
                        </span>
                        <input type="password" id="password" class="form-control" value="admin123" disabled />
                      </div>
                    </div>

                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Tutup
                </button>
                <button type="button" id="editButton" class="btn btn-success">
                  Edit
                </button>
                <button type="button" id="saveButton" class="btn btn-success" style="display: none">
                  Simpan
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMenuModal">
        <i class="bi bi-plus-circle me-2"></i>Tambah Laporan
      </button><br>
      <hr>
      <div class="filter-date">
        <input type="date" id="start-date" />
        <input type="date" id="end-date" />
        <button onclick="filterByDate()">Temukan</button>
        <button onclick="resetFilter()">Reset</button>
      </div>
      <div class="container mt-4">
        <table id="orderTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Pemesan</th>
              <th>Pesanan</th>
              <th>Jumlah</th>
              <th>Total Bayar</th>
              <th>Tanggal Pesanan</th>
              <th>Status Pembayaran</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Data akan diisi menggunakan JavaScript -->
          </tbody>
        </table>
      </div>

      <!-- Modal Show -->
      <div class="modal fade" id="showModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-warning text-white">
              <h5 class="modal-title">
                <i class="bi bi-card-list me-2"></i> Detail
              </h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <form id="showForm">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card shadow-sm border-0">
                      <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label fw-bold">Nama Pelanggan</label>
                          <input type="text" class="form-control" value="Rehan" id="showCustomerName" disabled />
                        </div>
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" value="rhn240@gmail.com" class="form-control" id="showEmail" disabled />
                          </div>
                          <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nomor Telepon</label>
                            <input type="text" value="089357636798" class="form-control" id="showPhone" disabled />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label fw-bold">Pesanan</label>
                          <input id="showOrder" value="Nasi Goreng" class="form-control" disabled />
                        </div>
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Jumlah</label>
                            <input type="number" value="2" class="form-control" id="showQuantity" disabled />
                          </div>
                          <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Total Bayar</label>
                            <input type="text" class="form-control" value="40.000" id="showTotal" disabled />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tanggal Pesanan</label>
                            <input class="form-control" value="12/25/2024" id="showOrderStatus" disabled />
                          </div>
                          <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Status Pembayaran</label>
                            <input class="form-control" value="Dibayar" id="showPaymentStatus" disabled />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer d-flex justify-content-between">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                <i class="bi bi-x-circle"></i> Tutup
              </button>
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">
                <i class="bi bi-check-circle"></i> Selesai
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Edit -->
      <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title">
                <i class="bi bi-pencil-square me-2"></i> Edit Pesanan
              </h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <form id="editForm">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card shadow-sm border-0">
                      <div class="card-body">
                       <div class="row">
                         <div class="col-md-6 mb-3">
                          <label class="form-label fw-bold">Nama Pelanggan</label>
                          <input type="text" class="form-control" value="Rehan" id="editCustomerName" />
                         </div>
                          <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" value="rhn240@gmail.com" class="form-control" id="editEmail" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nomor Telepon</label>
                            <input type="text" value="089357636798" class="form-control" id="editPhone" />
                          </div>
                          <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Pesanan</label>
                            <select id="editOrder" class="form-select">
                              <option>Sate Ayam</option>
                              <option>Tongseng Ayam</option>
                              <option>Sate Sapi</option>
                              <option>Nasi Goreng</option>
                              <option>Sate Kambing</option>
                              <option>Tongseng Sapi</option>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Jumlah</label>
                            <input type="number" class="form-control" id="editQuantity" />
                          </div>
                          <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Total Bayar</label>
                            <input type="text" class="form-control" id="editTotal" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="editOrderDate" class="form-label fw-bold">Tanggal Pesanan</label>
                            <input type="date" id="editOrderDate" class="form-control" />
                          </div>
                          <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Status Pembayaran</label>
                            <select id="editPaymentStatus" class="form-select">
                              <option value="dibayar">Dibayar</option>
                              <option value="belumdibayar">Belum Dibayar</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
            <div class="modal-footer d-flex justify-content-between">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                <i class="bi bi-x-circle"></i> Batal
              </button>
              <button type="button" class="btn btn-primary" id="updateMenu">
                Perbarui
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Delete Confirmation Modal -->
      <div class="modal fade" id="deleteMenuModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete Menu</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <p>
                Apakah Kamu Yakin Menghapus Laporan Ini?
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Cancel
              </button>
              <button type="button" class="btn btn-danger" id="confirmDelete">
                Delete
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Add Menu Modal -->
      <div class="modal fade" id="addMenuModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-success text-white">
              <h5 class="modal-title">
                <i class="bi bi-plus-circle me-2"></i> Tambah Laporan Baru
              </h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <form id="addMenuForm">
                <div class="mb-3">
                  <label class="form-label fw-bold">Nama Pemesan</label>
                  <input type="text" class="form-control" id="menuName" placeholder="Masukkan Nama Customer" required />
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">Pesanan</label>
                  <select id="menuOrder" class="form-select">
                    <option>Sate Ayam</option>
                    <option>Tongseng Ayam</option>
                    <option>Sate Sapi</option>
                    <option>Nasi Goreng</option>
                    <option>Sate Kambing</option>
                    <option>Tongseng Sapi</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">Jumlah</label>
                  <input type="number" step="1" class="form-control" id="menuQuantity"
                    placeholder="Masukkan Jumlah Pesanan" required min="0" />
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">Total Bayar</label>
                  <input type="number" step="0.001" class="form-control" id="menuTotal"
                    placeholder="Masukkan Total Bayar" required min="0" />
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">Tanggal Pesanan</label>
                  <input type="date" class="form-control" id="menuOrderDate" placeholder="Pilih Tanggal" required />
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">Status Pembayaran</label>
                  <select id="menuPaymentStatus" class="form-select">
                    <option value="dibayar">Dibayar</option>
                    <option value="belumdibayar">Belum Dibayar</option>
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer d-flex justify-content-between">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                <i class="bi bi-x-circle"></i> Batal
              </button>
              <button type="button" class="btn btn-success" id="saveMenu">
                <i class="bi bi-check-circle"></i> Simpan
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- Edit Menu Modal -->
      <div class="modal fade" id="editMenuModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Menu</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <form id="editMenuForm">
                <input type="hidden" id="editMenuId" />
                <div class="mb-3">
                  <label class="form-label">Gambar Menu</label>
                  <input type="file" class="form-control" id="editMenuImage" accept="image/*" />
                  <div id="editImagePreview"></div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama Menu</label>
                  <input type="text" class="form-control" id="editMenuName" required />
                </div>
                <div class="mb-3">
                  <label class="form-label">Harga (Rp)</label>
                  <input type="number" step="0.001" class="form-control" id="editMenuPrice" required min="0" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Kalori (kkal)</label>
                  <input type="number" class="form-control" id="editMenuCalories" required min="0" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="editMenuIngredients">Bahan Utama</label>
                  <input id="editMenuIngredients" required />
                </div>
                <div class="mb-3">
                  <label class="form-label">Deskripsi</label>
                  <textarea class="form-control" id="editMenuDescription" rows="3" required></textarea>
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Batal
              </button>
              <button type="button" class="btn btn-primary" id="updateMenu">
                Perbarui
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Delete Confirmation Modal -->
      <div class="modal fade" id="deleteMenuModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete Menu</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <p>
                Are you sure you want to delete this menu item? This action cannot
                be undone.
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Cancel
              </button>
              <button type="button" class="btn btn-danger" id="confirmDelete">
                Delete
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer-custom text-center">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <p class="mb-0">
            © 2024 BOLOOO: All Rights Reserved
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
  <script>

    $(document).ready(function () {
      $('#saveMenu').on('click', function () {
        // Ambil nilai dari form
        const customerName = $('#menuName').val();
        const order = $('#menuOrder').val();
        const quantity = $('#menuQuantity').val();
        const total = $('#menuTotal').val();
        const orderDate = $('#menuOrderDate').val();
        const paymentStatus = $('#menuPaymentStatus').val();

        // Validasi form
        if (!customerName || !order || !quantity || !total || !orderDate || !paymentStatus) {
          alert("Harap isi semua field!");
          return;
        }

        // Fungsi untuk memformat angka dengan titik
        function formatPrice(input) {
          let cursorPosition = input.selectionStart; // Simpan posisi kursor
          let value = input.value.replace(/\./g, ''); // Hapus semua titik

          if (!isNaN(value)) {
            // Format ulang angka dengan titik
            const formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            input.value = formattedValue;

            // Kembalikan posisi kursor ke tempat yang sesuai
            const diff = formattedValue.length - value.length;
            input.setSelectionRange(cursorPosition + diff, cursorPosition + diff);
          }
        }

        // Buat objek data baru
        const newReport = {
          id: Date.now(), // ID unik berdasarkan timestamp
          name: customerName,
          order: order,
          quantity: quantity,
          total: total,
          tanggalPemesanan: orderDate,
          paymentStatus: paymentStatus,
        };

        // Tambahkan data baru ke dalam array `orders`
        orders.push(newReport);

        // Perbarui tabel
        const table = $('#orderTable').DataTable();
        table.row.add(newReport).draw();

        // Tutup modal
        $('#addMenuModal').modal('hide');

        // Reset form
        $('#addMenuForm')[0].reset();

        // Tampilkan SweetAlert2
        Swal.fire({
          icon: 'success',
          title: 'Laporan Berhasil Ditambahkan!',
          text: `Laporan ${newReport.name} telah ditambahkan ke daftar.`,
          confirmButtonText: "OK"
        });
      });
    });


    function resetFilter() {
      document.getElementById('start-date').value = '';
      document.getElementById('end-date').value = '';

      const table = $('#orderTable').DataTable();
      table.clear().rows.add(orders).draw(); // Menampilkan semua data kembali
    }


    function filterByDate() {
      const startDate = new Date(document.getElementById('start-date').value);
      const endDate = new Date(document.getElementById('end-date').value);

      // Ambil data dari tabel
      const table = $('#orderTable').DataTable();
      const data = table.data();

      // Filter data berdasarkan tanggal
      const filteredData = data.filter(row => {
        const orderDate = new Date(row.tanggalPemesanan);
        return orderDate >= startDate && orderDate <= endDate;
      });

      // Bersihkan tabel dan tambahkan data yang difilter
      table.clear();
      table.rows.add(filteredData).draw();
    }


    const orders = [
      {
        id: 1,
        name: "Rehan",
        email: "rhn25@example.com",
        phone: "081234567890",
        order: "Nasi Goreng",
        quantity: 2,
        total: "Rp50.000",
        tanggalPemesanan: "2024-12-25", // Format tanggal harus sesuai ISO (YYYY-MM-DD)
        paymentStatus: "dibayar",
      },
      {
        id: 2,
        name: "Bayu",
        email: "bay25@example.com",
        phone: "081234567890",
        order: "Sate Ayam",
        quantity: 2,
        total: "Rp40.000",
        tanggalPemesanan: "2025-01-02", // Format tanggal harus sesuai ISO (YYYY-MM-DD)
        paymentStatus: "dibayar",
      },
      {
        id: 3,
        name: "Ahmad",
        email: "mad25@example.com",
        phone: "089534567890",
        order: "Sate Kambing",
        quantity: 2,
        total: "Rp60.000",
        tanggalPemesanan: "2025-01-03", // Format tanggal harus sesuai ISO (YYYY-MM-DD)
        paymentStatus: "dibayar",
      },
      {
        id: 4,
        name: "Zufar",
        email: "mad25@example.com",
        phone: "089534567890",
        order: "Tongseng Ayam",
        quantity: 2,
        total: "Rp50.000",
        tanggalPemesanan: "2025-01-06", // Format tanggal harus sesuai ISO (YYYY-MM-DD)
        paymentStatus: "dibayar",
      },
    ];

    $(document).ready(function () {
      const table = $("#orderTable").DataTable({
        data: orders,
        columns: [
          { data: null, render: (data, type, row, meta) => meta.row + 1 },
          { data: "name" },
          { data: "order" },
          { data: "quantity" },
          { data: "total" },
          { data: "tanggalPemesanan" },
          {
            data: "paymentStatus",
            render: (data) => {
              const classes = {
                dibayar: "btn btn-primary btn-small btn-status",
                belumdibayar: "btn btn-secondary btn-small btn-status",
              }[data.toLowerCase()];
              return `<button class="${classes}">${data}</button>`;
            },
          },
          {
            data: null,
            render: (data) => `
                    <button class='btn btn-primary btn-small show-btn' data-id='${data.id}'><i class="bi bi-eye"></i></button>
                    <button class='btn btn-warning btn-small edit-btn' data-id='${data.id}'><i class="bi bi-pencil"></i></button>
                    <button class='btn btn-danger btn-small delete-btn' data-id='${data.id}'><i class="bi bi-trash"></i></button>
                `,
          },
        ],
      });

    });
    $(document).ready(function () {
      // Event listener untuk tombol "Simpan"
      document.getElementById('saveMenu').addEventListener('click', function () {
        // Kode untuk menambahkan laporan baru
      });
    });

    // Fungsi untuk menambahkan menu baru
    function addNewMenu() {
      const form = document.getElementById("addMenuForm");
      if (!form.checkValidity()) {
        form.reportValidity(); // Tampilkan pesan validasi jika form tidak valid
        return;
      }

      // Ambil nilai dari form
      const menuName = document.getElementById("menuName").value;
      const menuPrice = parseFloat(document.getElementById("menuPrice").value.replace(/\./g, "")) || 0;
      const menuCalories = parseInt(document.getElementById("menuCalories").value) || 0;
      const menuIngredients = document.getElementById("menuIngredients").value;
      const menuDescription = document.getElementById("menuDescription").value;
      const menuImage = document.getElementById("menuImage").files[0];

      // Buat objek menu baru
      const newMenu = {
        id: Date.now(), // ID unik berdasarkan timestamp
        name: menuName,
        price: menuPrice,
        calories: menuCalories,
        ingredients: menuIngredients.split(",").map(item => ({ value: item.trim() })), // Konversi string ke array
        description: menuDescription,
        image: menuImage ? URL.createObjectURL(menuImage) : "https://via.placeholder.com/150", // Gunakan URL gambar yang diunggah
      };

      // Tambahkan menu baru ke dalam array `menuData`
      menuData.push(newMenu);

      // Perbarui tabel
      const table = $("#menuTable").DataTable();
      table.row.add(newMenu).draw();

      // Tutup modal
      $('#addMenuModal').modal('hide');

      // Reset form
      form.reset();
      document.getElementById("imagePreview").innerHTML = `<img src="https://via.placeholder.com/150" alt="Image Preview" class="img-fluid rounded">`;

      // Tampilkan notifikasi sukses
      Swal.fire({
        icon: "success",
        title: "Menu Berhasil Ditambahkan!",
        text: `Menu ${newMenu.name} telah ditambahkan ke daftar.`,
        confirmButtonText: "OK",
      });
    }

    // Event listener untuk tombol Simpan
    document.getElementById("saveMenu").addEventListener("click", addNewMenu);

    // Event listener untuk tombol Batal (tidak perlu fungsi khusus karena modal akan ditutup otomatis)


    function filterByDate() {
      const startDate = new Date(document.getElementById('start-date').value);
      const endDate = new Date(document.getElementById('end-date').value);

      const table = $('#orderTable').DataTable();
      const data = table.data().toArray();

      const filteredData = data.filter(row => {
        const orderDate = new Date(row.tanggalPemesanan);
        return orderDate >= startDate && orderDate <= endDate;
      });

      table.clear();
      table.rows.add(filteredData).draw();
    }

    function resetFilter() {
      // Kosongkan input tanggal
      document.getElementById('start-date').value = '';
      document.getElementById('end-date').value = '';

      // Ambil instance DataTable
      const table = $('#orderTable').DataTable();

      // Bersihkan tabel dan tambahkan data awal
      table.clear();
      table.rows.add(orders).draw();
    }

    $(document).ready(function () {
      const orders = [
        {
          id: 1,
          name: "Rehan",
          email: "rhn25@example.com",
          phone: "081234567890",
          order: "Nasi Goreng",
          quantity: 2,
          total: "Rp50.000",
          tanggalPemesanan: "2024-12-25",
          paymentStatus: "dibayar",
        },

        {
          id: 2,
          name: "Bayu",
          email: "bay25@example.com",
          phone: "081234567890",
          order: "Sate Ayam",
          quantity: 2,
          total: "Rp40.000",
          tanggalPemesanan: "2025-01-02",
          paymentStatus: "dibayar",
        },
        {
          id: 3,
          name: "Ahmad",
          email: "mad25@example.com",
          phone: "089534567890",
          order: "Sate Kambing",
          quantity: 2,
          total: "Rp60.000",
          tanggalPemesanan: "2025-01-03", // Format tanggal harus sesuai ISO (YYYY-MM-DD)
          paymentStatus: "dibayar",
        },
        {
          id: 4,
          name: "Zufar",
          email: "mad25@example.com",
          phone: "089534567890",
          order: "Tongseng Ayam",
          quantity: 2,
          total: "Rp50.000",
          tanggalPemesanan: "2025-01-06", // Format tanggal harus sesuai ISO (YYYY-MM-DD)
          paymentStatus: "dibayar",
        },
      ];


      const table = $("#orderTable").DataTable({
        data: orders,
        columns: [
          { data: null, render: (data, type, row, meta) => meta.row + 1 },
          { data: "name" },
          { data: "order" },
          { data: "quantity" },
          { data: "total" },
          {
            data: "tanggalPemesanan",
            render: (data) => {
              const classes = {
                1: "12/25/2024",
                2: "01/02/2025",
                3: "01/05/2025",
              }[data.toLowerCase()];
              return `<button class="${classes}">${data}</button>`;
            },
          },
          {
            data: "paymentStatus",
            render: (data) => {
              const classes = {
                dibayar: "btn btn-primary btn-small btn-status",
                belumdibayar: "btn btn-secondary btn-small btn-status",
              }[data.toLowerCase()];
              return `<button class="${classes}">${data}</button>`;
            },
          },
          {
            data: null,
            render: (data) => `
                <button class='btn btn-primary btn-small show-btn' data-id='${data.id}'><i class="bi bi-eye"></i></button>
                <button class='btn btn-warning btn-small edit-btn' data-id='${data.id}'><i class="bi bi-pencil"></i></button>
                <button class='btn btn-danger btn-small delete-btn' data-id='${data.id}'><i class="bi bi-trash"></i></button>
              `,
          },
        ],
      });

      // Event listener untuk tombol show
      $("#orderTable").on("click", ".show-btn", function () {
        const id = $(this).data("id"); // Ambil ID dari tombol yang diklik
        const order = orders.find((o) => o.id === id); // Cari data berdasarkan ID

        if (order) {
          // Isi data ke dalam modal show
          $("#showCustomerName").val(order.name);
          $("#showEmail").val(order.email);
          $("#showPhone").val(order.phone);
          $("#showOrder").val(order.order);
          $("#showQuantity").val(order.quantity);
          $("#showTotal").val(order.total);
          $("#showOrderStatus").val(order.tanggalPemesanan);
          $("#showPaymentStatus").val(order.paymentStatus);

          // Tampilkan modal
          $("#showModal").modal("show");
        } else {
          console.error(`Order dengan ID ${id} tidak ditemukan.`);
        }
      });

      // Event listener untuk tombol edit
      $("#orderTable").on("click", ".edit-btn", function () {
        const id = $(this).data("id"); // Ambil ID dari tombol yang diklik
        const order = orders.find((o) => o.id === id); // Cari data berdasarkan ID

        if (order) {
          // Isi data ke dalam modal edit
          $("#editCustomerName").val(order.name);
          $("#editEmail").val(order.email);
          $("#editPhone").val(order.phone);
          $("#editOrder").val(order.order);
          $("#editQuantity").val(order.quantity);
          $("#editTotal").val(order.total);
          $("#editOrderDate").val(order.tanggalPemesanan);
          $("#editPaymentStatus").val(order.paymentStatus);

          // Simpan ID di modal untuk referensi saat update
          $("#editModal").data("id", id);

          // Tampilkan modal edit
          $("#editModal").modal("show");
        } else {
          console.error(`Order dengan ID ${id} tidak ditemukan.`);
        }
      });

      // Event listener untuk tombol update di modal edit
      $("#updateMenu").on("click", function () {
        const id = $("#editModal").data("id"); // Ambil ID dari modal
        const order = orders.find((o) => o.id === id); // Cari data berdasarkan ID

        if (order) {
          // Update data dengan nilai dari form edit
          order.name = $("#editCustomerName").val();
          order.email = $("#editEmail").val();
          order.phone = $("#editPhone").val();
          order.order = $("#editOrder").val();
          order.quantity = $("#editQuantity").val();
          order.total = $("#editTotal").val();
          order.tanggalPemesanan = $("#editOrderDate").val();
          order.paymentStatus = $("#editPaymentStatus").val();

          // Perbarui tabel
          const table = $('#orderTable').DataTable();
          table.clear().rows.add(orders).draw();

          // Tutup modal
          $("#editModal").modal("hide");

          // Tampilkan notifikasi sukses
          Swal.fire({
            icon: "success",
            title: "Data Berhasil Diperbarui!",
            text: `Data ${order.name} telah diperbarui.`,
            confirmButtonText: "OK",
          });
        } else {
          console.error(`Order dengan ID ${id} tidak ditemukan.`);
        }
      });

      // Event listener untuk tombol delete
      $("#orderTable").on("click", ".delete-btn", function () {
        const id = $(this).data("id"); // Ambil ID dari tombol yang diklik
        const index = orders.findIndex((o) => o.id === id); // Cari index item berdasarkan ID

        if (index !== -1) {
          Swal.fire({
            title: "Yakin ingin menghapus?",
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
          }).then((result) => {
            if (result.isConfirmed) {
              orders.splice(index, 1); // Hapus item dari array berdasarkan index
              table.clear().rows.add(orders).draw(); // Perbarui tabel
              Swal.fire("Dihapus!", "Data berhasil dihapus.", "success");
            }
          });
        }
      });
    });

    document.addEventListener("DOMContentLoaded", function () {
      const menuItems = document.querySelectorAll(".menu-item a");
      const currentUrl = window.location.href;

      menuItems.forEach((menuItem) => {
        if (currentUrl.includes(menuItem.getAttribute("href"))) {
          menuItem.parentElement.classList.add("active-menu-item");
        } else {
          menuItem.parentElement.classList.remove("active-menu-item");
        }
      });
    });

    const ingredientColors = {
      "air": "#87CEEB",
      "es batu": "#B0C4DE",
      "gula": "#E65100",
      "gula pasir": "#FFF8E1",
      "jeruk peras": "#FF8C00",
      "teh": "#6B4226",
      "susu kental manis": "#F0E68C",
      "sirup": "#FF4C4C",
      "mangga": "#F5A623",
      "alpukat": "#336633",
      "semangka": "#FF0000",
      "melon": "#93C572",
      "nanas": "#FFD700",
      "jambu biji": "#F2545B"
    };

    function isColorDark(hex) {
      // Hapus tanda #
      hex = hex.replace("#", "");

      // Pisahkan warna menjadi RGB
      const r = parseInt(hex.substring(0, 2), 16);
      const g = parseInt(hex.substring(2, 4), 16);
      const b = parseInt(hex.substring(4, 6), 16);

      // Hitung luminance (perceptual brightness)
      const luminance = (0.299 * r + 0.587 * g + 0.114 * b) / 255;

      // Return true jika warna gelap
      return luminance < 0.5;
    }

    document.addEventListener("DOMContentLoaded", function () {
      // Sample data
      let menuData = [
        {
          id: 1,
          image: "../img/drinks/es-teh.jpg",
          name: "Es Teh",
          price: 5000,
          calories: 100,
          ingredients: [
            { value: "Teh" },
            { value: "gula" },
            { value: "air" },
            { value: "es batu" },
          ],
          description: "Kesegaran teh manis dingin yang sempurna untuk menemani makanan Anda. Manisnya pas, segarnya luar biasa.",
        },
        {
          id: 2,
          image: "../img/drinks/es-jeruk.jpg",
          name: "Es Jeruk",
          price: 6000,
          calories: 120,
          ingredients: [
            { value: "Jeruk peras" },
            { value: "gula" },
            { value: "air" },
            { value: "es batu" },
          ],
          description: "Minuman jeruk segar dengan sentuhan manis alami. Sempurna untuk menghilangkan dahaga di hari panas!",
        },
        {
          id: 3,
          image: "../img/drinks/es-campur.webp",
          name: "Es campur",
          price: 10000,
          calories: 250,
          ingredients: [
            { value: "Sirup" },
            { value: "es batu" },
            { value: "susu kental manis" },
            { value: "gula pasir" },
            { value: "mangga" },
            { value: "alpukat" },
            { value: "semangka" },
            { value: "melon" },
            { value: "nanas" },
          ],
          description: "Perpaduan sempurna antara es batu yang dingin dan segar, susu kental manis, serta sirup manis yang menggoda, disajikan dengan berbagai potongan buah segar.",
        },

      ];

      const input = document.querySelector('#menuIngredients');
      const tagify = new Tagify(input, {
        whitelist: ["Air", "Es Batu", "Gula", "Gula Pasir", "Jeruk Peras", "Teh", "Susu Kental Manis", "Sirup", "Mangga", "Alpukat", "Semangka", "Melon", "Nanas", "Jambu Biji"],
        dropdown: {
          maxItems: 10,           // jumlah maksimum saran dropdown
          classname: "suggestion-list", // nama kelas CSS untuk dropdown
          enabled: 0,              // akan muncul setelah mengetikkan minimal 0 karakter
          closeOnSelect: false     // tetap terbuka setelah memilih
        }
      });

      // Format currency
      const formatCurrency = (amount) => {
        return new Intl.NumberFormat("id-ID", {
          style: "currency",
          currency: "IDR",
        }).format(amount);
      };
      // Fungsi untuk memformat angka dengan titik
      // Fungsi untuk memformat angka dengan titik
      function formatPrice(input) {
        let cursorPosition = input.selectionStart; // Simpan posisi kursor
        let value = input.value.replace(/\./g, ''); // Hapus semua titik

        if (!isNaN(value)) {
          // Format ulang angka dengan titik
          const formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
          input.value = formattedValue;

          // Kembalikan posisi kursor ke tempat yang sesuai
          const diff = formattedValue.length - value.length;
          input.setSelectionRange(cursorPosition + diff, cursorPosition + diff);
        }
      }

      // Tambahkan event listener pada input harga
      const priceInputs = document.querySelectorAll("#editMenuPrice, #menuPrice");

      priceInputs.forEach(input => {
        // Format angka hanya saat pengguna selesai mengetik (blur)
        input.addEventListener("blur", function () {
          formatPrice(this);
        });

        // Cegah karakter non-angka saat mengetik
        input.addEventListener("input", function () {
          this.value = this.value.replace(/[^\d]/g, '');
        });
      });


      // Menambahkan event listener pada input harga
      document.getElementById("editMenuPrice").addEventListener("input", function () {
        formatPrice(this);
      });
      document.getElementById("menuPrice").addEventListener("input", function () {
        formatPrice(this);
      });

      // Initialize DataTable
      const table = $("#menuTable").DataTable({
        data: menuData,
        columns: [
          {
            data: null,
            render: function (data, type, row, meta) {
              return parseInt(meta.row, 10) + 1; // Paksa menjadi angka
            },
            className: "text-center", // Tambahkan styling jika perlu
          },
          {
            data: "image",
            render: function (data, type, row) {
              return `<img src="${data}" class="menu-image" alt="${row.name}">`;
            },
          },
          { data: "name" },
          {
            data: "price",
            render: function (data) {
              return formatCurrency(data);
            },
          },
          {
            data: null,
            render: function (data, type, row) {
              return row.calories ? `${row.calories} kkal` : '-';
            }
          },
          {
            data: "ingredients",
            render: function (data, type, row) {
              if (typeof data === "string") {
                data = data.split(", ").map((item) => ({ value: item }));
              }

              if (Array.isArray(data)) {
                return data
                  .map((ingredient) => {
                    const color = ingredientColors[ingredient.value.toLowerCase()] || "#9E9E9E"; // Warna default abu-abu
                    const textColor = isColorDark(color) ? "white" : "black"; // Tentukan warna teks
                    return `<span class="badge me-1" style="
                        background-color: ${color}; 
                        color: ${textColor}; 
                        font-size: 0.75rem; 
                        padding: 0.4em 0.6em; 
                        border-radius: 12px; 
                        margin-right: 0.5rem; 
                        margin-bottom: 0.5rem; 
                        display: inline-block;
                    ">
                        ${ingredient.value}
                    </span>`;
                  })
                  .join("");
              }

              return "-";
            },
          },

          {
            data: null,
            render: function (data, type, row) {
              return row.description || '-';
            }
          },
          {
            data: null,
            render: function (data, type, row) {
              return `
                    <div class="action-buttons">
                      <button class="btn btn-sm btn-outline-warning show-btn" data-id="${row.id}">
                            <i class="bi bi-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-success edit-btn" data-id="${row.id}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger delete-btn" data-id="${row.id}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                `;
            },
          }
        ],
        responsive: true,
        dom: '<"d-flex justify-content-between align-items-center mb-3"<"d-flex gap-3"l><"ms-auto"f>>rt<"d-flex justify-content-between align-items-center"<"text-muted"i><"ms-auto"p>>',
        language: {
          lengthMenu: "Tampilkan _MENU_ entries",
          search: "Cari menu:",
          paginate: {
            next: "Next",
            previous: "Previous",
          },
        },
      });

      // Fungsi untuk membuka modal Show Menu
      function showMenu(id) {
        const menu = menuData.find((item) => item.id === id);
        if (menu) {
          // Isi data ke dalam modal
          document.getElementById("showMenuId").value = menu.id || "";
          document.getElementById("showMenuName").value = menu.name || "";
          document.getElementById("showMenuPrice").value = menu.price || "";
          document.getElementById("showMenuCalories").value = menu.calories || "";
          document.getElementById("showMenuDescription").value = menu.description || "";

          // Inisialisasi Tagify untuk ingredients pada modal show
          const showIngredientsInput = document.getElementById("showMenuIngredients");

          // Hapus instance Tagify sebelumnya jika ada
          if (showIngredientsInput.tagify) {
            showIngredientsInput.tagify.destroy();
          }

          const tagifyShow = new Tagify(showIngredientsInput, {
            whitelist: ["Daging Ayam", "Daging Kambing", "Daging Sapi", "Nasi", "Bumbu Kacang", "Kecap", "Lada Bubuk", "Santan", "Rempah", "Cabai", "Bawang", "Sayuran", "Jeroan"],
            dropdown: {
              maxItems: 10,
              classname: "suggestion-list",
              enabled: 0,
              closeOnSelect: false
            },
            // Jadikan read-only
            readOnly: true
          });

          // Bersihkan tag sebelumnya dan tambahkan tag sesuai data menu
          tagifyShow.removeAllTags();

          // Pastikan menu.ingredients adalah array yang valid
          if (Array.isArray(menu.ingredients)) {
            tagifyShow.addTags(menu.ingredients);
          } else if (typeof menu.ingredients === 'string') {
            // Jika ingredients adalah string, pisahkan dengan koma
            tagifyShow.addTags(menu.ingredients.split(',').map(i => i.trim()));
          }

          const imagePreview = document.getElementById("showImagePreview");
          imagePreview.innerHTML = menu.image
            ? `<img src="${menu.image}" alt="${menu.name}" class="img-fluid" style="max-width: 200px;">`
            : "<p>Tidak ada gambar tersedia</p>";

          // Tampilkan modal
          const modal = new bootstrap.Modal(document.getElementById("showMenuModal"));
          modal.show();
        } else {
          console.error(`Menu dengan ID ${id} tidak ditemukan.`);
        }
      }

      // Contoh event listener untuk tombol Show
      document.querySelectorAll(".show-btn").forEach((button) => {
        button.addEventListener("click", (e) => {
          const id = parseInt(e.target.closest("button").dataset.id);
          showMenu(id);
        });
      });


      // Delegasi event untuk tombol edit
      $('#menuTable').on('click', '.edit-btn', function () {
        const id = $(this).data('id');
        editMenu(id);
      });


      // Delegasi event untuk tombol delete 
      $('#menuTable').on('click', '.delete-btn', function () {
        const id = $(this).data('id');
        deleteMenu(id);
      });


      // Sidebar toggle functionality
      const toggleSidebarBtn = document.getElementById("toggleSidebar");
      toggleSidebarBtn.addEventListener("click", () => {
        const sidebar = document.getElementById("sidebar");
        const content = document.getElementById("content");
        sidebar.classList.toggle("collapsed");
        content.classList.toggle("collapsed");
        table.columns.adjust().responsive.recalc();
      });

      // Save menu function
      window.saveMenu = () => {
        const form = document.getElementById("addMenuForm");
        if (!form.checkValidity()) {
          form.reportValidity();
          return;
        }

        // Pastikan semua ID input sesuai dengan form
        const newMenu = {
          id: Date.now(), // ID unik
          image: URL.createObjectURL(
            document.getElementById("menuImage").files[0]
          ),
          name: document.getElementById("menuName").value,
          price: parseFloat(document.getElementById("menuPrice").value.replace(/\./g, "")) || 0,            // Ubah dari menuPrice ke editMenuPrice
          calories: parseInt(document.getElementById("menuCalories").value), // Ubah dari menuCalories ke editMenuCalories
          ingredients: JSON.parse(document.getElementById("menuIngredients").value), // Parse JSON dari Tagify
          description: document.getElementById("menuDescription").value,
        };

        menuData.push(newMenu);
        table.clear().rows.add(menuData).draw(); // Perbarui tabel

        // Tutup modal Bootstrap
        bootstrap.Modal.getInstance(document.getElementById("addMenuModal")).hide();
        form.reset();
        document.getElementById("imagePreview").innerHTML = "";

        // Tambahkan SweetAlert
        Swal.fire({
          icon: 'success',
          title: 'Menu Berhasil Ditambahkan!',
          text: `Menu ${newMenu.name} telah ditambahkan ke daftar.`,
          confirmButtonText: "OK"
        });

        // Reset form
        form.reset();
        document.getElementById("imagePreview").innerHTML = "";
      };

      // Edit menu function
      window.editMenu = (id) => {
        const menu = menuData.find((item) => item.id === id);
        if (menu) {
          document.getElementById("editMenuId").value = menu.id;
          document.getElementById("editMenuName").value = menu.name || "";
          document.getElementById("editMenuPrice").value = menu.price || "";
          document.getElementById("editMenuCalories").value = menu.calories || "";
          document.getElementById("editMenuDescription").value = menu.description || "";

          // Inisialisasi Tagify untuk edit menu
          const editIngredientsInput = document.getElementById("editMenuIngredients");
          const tagifyEdit = new Tagify(editIngredientsInput, {
            whitelist: ["Air", "Es Batu", "Gula", "Gula Pasir", "Jeruk Peras", "Teh", "Susu Kental Manis", "Sirup", "Mangga", "Alpukat", "Semangka", "Melon", "Nanas", "Jambu Biji"],
            dropdown: {
              maxItems: 10,
              classname: "suggestion-list",
              enabled: 0, // Tidak langsung terbuka
              closeOnSelect: false,
            },
          });

          // Bersihkan tag sebelumnya dan tambahkan tag sesuai data menu
          tagifyEdit.removeAllTags();
          tagifyEdit.addTags(menu.ingredients.map((i) => i.value));

          // Gambar preview
          const editImagePreview = document.getElementById("editImagePreview");
          editImagePreview.innerHTML = menu.image
            ? `<img src="${menu.image}" alt="Preview" style="max-width: 200px; max-height: 200px;">`
            : "<p>No image available</p>";

          // Tampilkan modal edit
          $('#editMenuModal').modal('show');
        } else {
          console.error(`Menu with ID ${id} not found`);
        }
      };

      // Tambahkan fungsi untuk menghapus backdrop yang tersisa
      function removeBackdrops() {
        document.querySelectorAll('.modal-backdrop').forEach((backdrop) => {
          backdrop.remove();
        });
      }

      // Tambahkan event listener untuk modal edit
      document.getElementById("editMenuModal").addEventListener("hidden.bs.modal", () => {
        removeBackdrops(); // Hapus backdrop ketika modal ditutup
      });


      // Update menu function
      window.updateMenu = () => {
        const form = document.getElementById("editMenuForm");
        if (!form.checkValidity()) {
          form.reportValidity();
          return;
        }

        const id = parseInt(document.getElementById("editMenuId").value);
        const index = menuData.findIndex((item) => item.id === id);

        if (index !== -1) {
          const imageFile = document.getElementById("editMenuImage").files[0];
          const editIngredientsInput = document.getElementById("editMenuIngredients");
          const tagifyEdit = new Tagify(editIngredientsInput);

          const updatedMenu = {
            id: id,
            name: document.getElementById("editMenuName").value || "",
            price: parseFloat(document.getElementById("editMenuPrice").value.replace(/\./g, "")) || 0,
            calories: parseInt(document.getElementById("editMenuCalories").value) || 0,
            ingredients: tagifyEdit.value, // Ambil nilai Tagify
            description: document.getElementById("editMenuDescription").value || "",
            image: imageFile ? URL.createObjectURL(imageFile) : menuData[index].image,
          };

          menuData[index] = updatedMenu;

          // Update DataTable
          table.row((idx, data) => data.id === id).data(updatedMenu).draw();

          // Tutup modal dan reset form
          bootstrap.Modal.getInstance(document.getElementById("editMenuModal")).hide();
          form.reset();
          document.getElementById("editImagePreview").innerHTML = "";

          // Notifikasi berhasil
          Swal.fire({
            icon: "success",
            title: "Menu Berhasil Diperbarui",
            text: `Menu ${updatedMenu.name} berhasil diperbarui`,
            confirmButtonText: "OK",
          });
        } else {
          console.error(`Menu with ID ${id} not found`);
        }
      };


      // Delete menu function
      window.deleteMenu = (id) => {
        Swal.fire({
          title: "Apakah Anda yakin?",
          text: "Menu ini akan terhapus secara permanen. Anda tidak akan bisa mengembalikan aksi ini.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Ya, hapus!",
          cancelButtonText: "Batal",
        }).then((result) => {
          if (result.isConfirmed) {
            menuData = menuData.filter((item) => item.id !== id);
            table.clear().rows.add(menuData).draw(); // Perbarui tabel

            Swal.fire(
              "Terhapus!",
              "Menus berhasil terhapus!",
              "success"
            );
          }
        });
      };

      // Initialize event listeners for modal buttons
      document.getElementById("saveMenu").addEventListener("click", saveMenu);
      document
        .getElementById("updateMenu")
        .addEventListener("click", updateMenu);

      // Image preview handlers
      document.getElementById("menuImage").addEventListener("change", (e) => {
        const preview = document.getElementById("imagePreview");
        const file = e.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (e) => {
            preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
          };
          reader.readAsDataURL(file);
        }
      });

      document
        .getElementById("editMenuImage")
        .addEventListener("change", (e) => {
          const preview = document.getElementById("editImagePreview");
          const file = e.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
              preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
            };
            reader.readAsDataURL(file);
          }
        });
    });

    document.addEventListener("DOMContentLoaded", () => {
      const editButton = document.getElementById("editButton");
      const saveButton = document.getElementById("saveButton");
      const editPictureButton = document.getElementById("editPictureButton");
      const profilePictureInput = document.getElementById(
        "profilePictureInput"
      );
      const profilePicturePreview = document.getElementById(
        "profilePicturePreview"
      );
      const formFields = document.querySelectorAll(
        "#profileForm input, #profileForm select"
      );

      // Enable Editing
      editButton.addEventListener("click", () => {
        formFields.forEach((field) => field.removeAttribute("disabled"));
        editButton.style.display = "none";
        saveButton.style.display = "inline-block";
        editPictureButton.style.display = "inline-block"; // Show Change Picture button
      });

      // Save Changes
      saveButton.addEventListener("click", () => {
        formFields.forEach((field) => field.setAttribute("disabled", "true"));
        editButton.style.display = "inline-block";
        saveButton.style.display = "none";
        editPictureButton.style.display = "none"; // Hide Change Picture button

        // SweetAlert2 Confirmation
        Swal.fire({
          icon: "success",
          title: "Profil Diperbarui",
          text: "Profil Anda telah sukses diperbarui.",
          confirmButtonText: "OK",
        });
      });

      // Change Profile Picture
      editPictureButton.addEventListener("click", () => {
        profilePictureInput.click();
      });

      profilePictureInput.addEventListener("change", () => {
        const file = profilePictureInput.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (e) => {
            profilePicturePreview.src = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      });
    });

    document.getElementById("toggleSidebarMobile").addEventListener("click", () => {
      document.getElementById("sidebar").classList.toggle("collapsed");
    });

    document.addEventListener("DOMContentLoaded", function () {
      const menuItems = document.querySelectorAll(".menu-item a");
      const currentUrl = window.location.href;

      menuItems.forEach((menuItem) => {
        if (currentUrl.includes(menuItem.getAttribute("href"))) {
          menuItem.parentElement.classList.add("active-menu-item");
        } else {
          menuItem.parentElement.classList.remove("active-menu-item");
        }
      });
    });


    function isColorDark(hex) {
      // Hapus tanda #
      hex = hex.replace("#", "");

      // Pisahkan warna menjadi RGB
      const r = parseInt(hex.substring(0, 2), 16);
      const g = parseInt(hex.substring(2, 4), 16);
      const b = parseInt(hex.substring(4, 6), 16);

      // Hitung luminance (perceptual brightness)
      const luminance = (0.299 * r + 0.587 * g + 0.114 * b) / 255;

      // Return true jika warna gelap
      return luminance < 0.5;
    }


    document.addEventListener("DOMContentLoaded", function () {
      // Sample data
      let menuData = [
        {
          id: 1,
          image: "../img/side-dish/sosis-solo.webp",
          name: "Sosis Solo",
          price: 3000,
          calories: 120,
          ingredients: [
            { value: "Daging ayam" },
            { value: "bumbu" },
            { value: "adonan telur" },
          ],
          description: "Camilan khas Jawa Tengah yang menghadirkan cita rasa autentik Indonesia. Terbuat dari kulit dadar lembut yang membungkus isian daging ayam yang gurih.",
        },
        {
          id: 2,
          image: "../img/side-dish/tahu.jpg",
          name: "Tahu",
          price: 2500,
          calories: 100,
          ingredients: [
            { value: "Kedelai" },
          ],
          description: "Tahu Goreng kami dibuat dari tahu berkualitas tinggi. Renyah di luar, lembut di dalam.",
        },
        {
          id: 3,
          image: "../img/side-dish/tempe.jpg",
          name: "Tempe",
          price: 2500,
          calories: 100,
          ingredients: [
            { value: "Kedelai" },
          ],
          description: "Terbuat dari tempe pilihan yang digoreng hingga renyah dengan aroma khas yang menggugah selera.",
        },
      ];

      const input = document.querySelector('#menuIngredients');
      const tagify = new Tagify(input, {
        whitelist: ["Daging Ayam", "Bumbu", "Adonan Telur", "Kedelai"],
        dropdown: {
          maxItems: 10,           // jumlah maksimum saran dropdown
          classname: "suggestion-list", // nama kelas CSS untuk dropdown
          enabled: 0,              // akan muncul setelah mengetikkan minimal 0 karakter
          closeOnSelect: false     // tetap terbuka setelah memilih
        }
      });

      // Format currency
      const formatCurrency = (amount) => {
        return new Intl.NumberFormat("id-ID", {
          style: "currency",
          currency: "IDR",
        }).format(amount);
      };
      // Fungsi untuk memformat angka dengan titik
      // Fungsi untuk memformat angka dengan titik
      function formatPrice(input) {
        let cursorPosition = input.selectionStart; // Simpan posisi kursor
        let value = input.value.replace(/\./g, ''); // Hapus semua titik

        if (!isNaN(value)) {
          // Format ulang angka dengan titik
          const formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
          input.value = formattedValue;

          // Kembalikan posisi kursor ke tempat yang sesuai
          const diff = formattedValue.length - value.length;
          input.setSelectionRange(cursorPosition + diff, cursorPosition + diff);
        }
      }

      // Tambahkan event listener pada input harga
      const priceInputs = document.querySelectorAll("#editMenuPrice, #menuPrice");

      priceInputs.forEach(input => {
        // Format angka hanya saat pengguna selesai mengetik (blur)
        input.addEventListener("blur", function () {
          formatPrice(this);
        });

        // Cegah karakter non-angka saat mengetik
        input.addEventListener("input", function () {
          this.value = this.value.replace(/[^\d]/g, '');
        });
      });


      // Menambahkan event listener pada input harga
      document.getElementById("editMenuPrice").addEventListener("input", function () {
        formatPrice(this);
      });
      document.getElementById("menuPrice").addEventListener("input", function () {
        formatPrice(this);
      });

      // Initialize DataTable
      const table = $("#menuTable").DataTable({
        data: menuData,
        columns: [
          {
            data: null,
            render: function (data, type, row, meta) {
              return parseInt(meta.row, 10) + 1; // Paksa menjadi angka
            },
            className: "text-center", // Tambahkan styling jika perlu
          },
          {
            data: "image",
            render: function (data, type, row) {
              return `<img src="${data}" class="menu-image" alt="${row.name}">`;
            },
          },
          { data: "name" },
          {
            data: "price",
            render: function (data) {
              return formatCurrency(data);
            },
          },
          {
            data: null,
            render: function (data, type, row) {
              return row.calories ? `${row.calories} kkal` : '-';
            }
          },
          {
            data: "ingredients",
            render: function (data, type, row) {
              if (typeof data === "string") {
                data = data.split(", ").map((item) => ({ value: item }));
              }

              if (Array.isArray(data)) {
                return data
                  .map((ingredient) => {
                    const color = ingredientColors[ingredient.value.toLowerCase()] || "#9E9E9E"; // Warna default abu-abu
                    const textColor = isColorDark(color) ? "white" : "black"; // Tentukan warna teks
                    return `<span class="badge me-1" style="
                        background-color: ${color}; 
                        color: ${textColor}; 
                        font-size: 0.75rem; 
                        padding: 0.4em 0.6em; 
                        border-radius: 12px; 
                        margin-right: 0.5rem; 
                        margin-bottom: 0.5rem; 
                        display: inline-block;
                    ">
                        ${ingredient.value}
                    </span>`;
                  })
                  .join("");
              }

              return "-";
            },
          },

          {
            data: null,
            render: function (data, type, row) {
              return row.description || '-';
            }
          },
          {
            data: null,
            render: function (data, type, row) {
              return `
                    <div class="action-buttons">
                        <button class="btn btn-sm btn-outline-success edit-btn" data-id="${row.id}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger delete-btn" data-id="${row.id}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                `;
            },
          }
        ],
        responsive: true,
        dom: '<"d-flex justify-content-between align-items-center mb-3"<"d-flex gap-3"l><"ms-auto"f>>rt<"d-flex justify-content-between align-items-center"<"text-muted"i><"ms-auto"p>>',
        language: {
          lengthMenu: "Tampilkan _MENU_ entries",
          search: "Cari menu:",
          paginate: {
            next: "Next",
            previous: "Previous",
          },
        },
      });

      // Delegasi event untuk tombol edit
      $('#menuTable').on('click', '.edit-btn', function () {
        const id = $(this).data('id');
        editMenu(id);
      });

      // Delegasi event untuk tombol delete 
      $('#menuTable').on('click', '.delete-btn', function () {
        const id = $(this).data('id');
        deleteMenu(id);
      });

      // Sidebar toggle functionality
      const toggleSidebarBtn = document.getElementById("toggleSidebar");
      toggleSidebarBtn.addEventListener("click", () => {
        const sidebar = document.getElementById("sidebar");
        const content = document.getElementById("content");
        sidebar.classList.toggle("collapsed");
        content.classList.toggle("collapsed");
        table.columns.adjust().responsive.recalc();
      });

      // Save menu function
      window.saveMenu = () => {
        const form = document.getElementById("addMenuForm");
        if (!form.checkValidity()) {
          form.reportValidity();
          return;
        }

        // Pastikan semua ID input sesuai dengan form
        const newMenu = {
          id: Date.now(), // ID unik
          image: URL.createObjectURL(
            document.getElementById("menuImage").files[0]
          ),
          name: document.getElementById("menuName").value,
          price: parseFloat(document.getElementById("menuPrice").value.replace(/\./g, "")) || 0,            // Ubah dari menuPrice ke editMenuPrice
          calories: parseInt(document.getElementById("menuCalories").value), // Ubah dari menuCalories ke editMenuCalories
          ingredients: JSON.parse(document.getElementById("menuIngredients").value), // Parse JSON dari Tagify
          description: document.getElementById("menuDescription").value,
        };

        menuData.push(newMenu);
        table.clear().rows.add(menuData).draw(); // Perbarui tabel

        // Tutup modal Bootstrap
        bootstrap.Modal.getInstance(document.getElementById("addMenuModal")).hide();
        form.reset();
        document.getElementById("imagePreview").innerHTML = "";

        // Tambahkan SweetAlert
        Swal.fire({
          icon: 'success',
          title: 'Menu Berhasil Ditambahkan!',
          text: `Menu ${newMenu.name} telah ditambahkan ke daftar.`,
          confirmButtonText: "OK"
        });

        // Reset form
        form.reset();
        document.getElementById("imagePreview").innerHTML = "";
      };

      // Edit menu function
      window.editMenu = (id) => {
        const menu = menuData.find((item) => item.id === id);
        if (menu) {
          document.getElementById("editMenuId").value = menu.id;
          document.getElementById("editMenuName").value = menu.name || "";
          document.getElementById("editMenuPrice").value = menu.price || "";
          document.getElementById("editMenuCalories").value = menu.calories || "";
          document.getElementById("editMenuDescription").value = menu.description || "";

          // Inisialisasi Tagify untuk edit menu
          const editIngredientsInput = document.getElementById("editMenuIngredients");
          const tagifyEdit = new Tagify(editIngredientsInput, {
            whitelist: ["Daging Ayam", "Bumbu", "Adonan Telur", "Kedelai"],
            dropdown: {
              maxItems: 10,
              classname: "suggestion-list",
              enabled: 0, // Tidak langsung terbuka
              closeOnSelect: false,
            },
          });

          // Bersihkan tag sebelumnya dan tambahkan tag sesuai data menu
          tagifyEdit.removeAllTags();
          tagifyEdit.addTags(menu.ingredients.map((i) => i.value));

          // Gambar preview
          const editImagePreview = document.getElementById("editImagePreview");
          editImagePreview.innerHTML = menu.image
            ? `<img src="${menu.image}" alt="Preview" style="max-width: 200px; max-height: 200px;">`
            : "<p>No image available</p>";

          // Tampilkan modal edit
          $('#editMenuModal').modal('show');
        } else {
          console.error(`Menu with ID ${id} not found`);
        }
      };

      // Tambahkan fungsi untuk menghapus backdrop yang tersisa
      function removeBackdrops() {
        document.querySelectorAll('.modal-backdrop').forEach((backdrop) => {
          backdrop.remove();
        });
      }

      // Tambahkan event listener untuk modal edit
      document.getElementById("editMenuModal").addEventListener("hidden.bs.modal", () => {
        removeBackdrops(); // Hapus backdrop ketika modal ditutup
      });

      // Update menu function
      window.updateMenu = () => {
        const form = document.getElementById("editMenuForm");
        if (!form.checkValidity()) {
          form.reportValidity();
          return;
        }

        const id = parseInt(document.getElementById("editMenuId").value);
        const index = menuData.findIndex((item) => item.id === id);

        if (index !== -1) {
          const imageFile = document.getElementById("editMenuImage").files[0];
          const editIngredientsInput = document.getElementById("editMenuIngredients");
          const tagifyEdit = new Tagify(editIngredientsInput);

          const updatedMenu = {
            id: id,
            name: document.getElementById("editMenuName").value || "",
            price: parseFloat(document.getElementById("editMenuPrice").value.replace(/\./g, "")) || 0,
            calories: parseInt(document.getElementById("editMenuCalories").value) || 0,
            ingredients: tagifyEdit.value, // Ambil nilai Tagify
            description: document.getElementById("editMenuDescription").value || "",
            image: imageFile ? URL.createObjectURL(imageFile) : menuData[index].image,
          };

          menuData[index] = updatedMenu;

          // Update DataTable
          table.row((idx, data) => data.id === id).data(updatedMenu).draw();

          // Tutup modal dan reset form
          bootstrap.Modal.getInstance(document.getElementById("editMenuModal")).hide();
          form.reset();
          document.getElementById("editImagePreview").innerHTML = "";

          // Notifikasi berhasil
          Swal.fire({
            icon: "success",
            title: "Menu Berhasil Diperbarui",
            text: `Menu ${updatedMenu.name} berhasil diperbarui`,
            confirmButtonText: "OK",
          });
        } else {
          console.error(`Menu with ID ${id} not found`);
        }
      };

      // Delete menu function
      window.deleteMenu = (id) => {
        Swal.fire({
          title: "Apakah Anda yakin?",
          text: "Menu ini akan terhapus secara permanen. Anda tidak akan bisa mengembalikan aksi ini.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Ya, hapus!",
          cancelButtonText: "Batal",
        }).then((result) => {
          if (result.isConfirmed) {
            menuData = menuData.filter((item) => item.id !== id);
            table.clear().rows.add(menuData).draw(); // Perbarui tabel

            Swal.fire(
              "Terhapus!",
              "Menus berhasil terhapus!",
              "success"
            );
          }
        });
      };

      // Initialize event listeners for modal buttons
      document.getElementById("saveMenu").addEventListener("click", saveMenu);
      document
        .getElementById("updateMenu")
        .addEventListener("click", updateMenu);

      // Image preview handlers
      document.getElementById("menuImage").addEventListener("change", (e) => {
        const preview = document.getElementById("imagePreview");
        const file = e.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (e) => {
            preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
          };
          reader.readAsDataURL(file);
        }
      });

      document
        .getElementById("editMenuImage")
        .addEventListener("change", (e) => {
          const preview = document.getElementById("editImagePreview");
          const file = e.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
              preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
            };
            reader.readAsDataURL(file);
          }
        });
    });

    document.addEventListener("DOMContentLoaded", () => {
      const editButton = document.getElementById("editButton");
      const saveButton = document.getElementById("saveButton");
      const editPictureButton = document.getElementById("editPictureButton");
      const profilePictureInput = document.getElementById(
        "profilePictureInput"
      );
      const profilePicturePreview = document.getElementById(
        "profilePicturePreview"
      );
      const formFields = document.querySelectorAll(
        "#profileForm input, #profileForm select"
      );

      // Enable Editing
      editButton.addEventListener("click", () => {
        formFields.forEach((field) => field.removeAttribute("disabled"));
        editButton.style.display = "none";
        saveButton.style.display = "inline-block";
        editPictureButton.style.display = "inline-block"; // Show Change Picture button
      });

      // Save Changes
      saveButton.addEventListener("click", () => {
        formFields.forEach((field) => field.setAttribute("disabled", "true"));
        editButton.style.display = "inline-block";
        saveButton.style.display = "none";
        editPictureButton.style.display = "none"; // Hide Change Picture button

        // SweetAlert2 Confirmation
        Swal.fire({
          icon: "success",
          title: "Profil Diperbarui",
          text: "Profil Anda telah sukses diperbarui.",
          confirmButtonText: "OK",
        });
      });

      // Change Profile Picture
      editPictureButton.addEventListener("click", () => {
        profilePictureInput.click();
      });

      profilePictureInput.addEventListener("change", () => {
        const file = profilePictureInput.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (e) => {
            profilePicturePreview.src = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      });
    });

  </script>
</body>

</html>