<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
      @keyframes zoomIn {
        from {
          transform: scale(1);
        }
        to {
          transform: scale(1.1);
        }
      }

      .nav-item > .nav-link {
        animation: zoomIn 0.3s ease;
      }

      .nav-item > .nav-link:hover,
      .nav-item > .nav-link:focus {
        animation: none;
        transform: scale(1.1);
      }

      .nav-link.active {
        background-color: #007aff;
        color: white;
      }
      
      .nav-link.active .nav-icon {
          color: white;
      }
      
      .nav-link.submenu {
        color: #ebecec;
      }

      .nav-link.submenu .nav-icon{
        color: #ebecec;
      }

      .form-inline {
        margin-top: 15px;
      }

    </style>
</head>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="" class="brand-link">
    <img src="img/polinema.png" alt="Polinema Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Survey Kepuasan</span>
  </a>

<div class="mt-2">
  <div class="sidebar">
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Cari" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="bi bi-search"></i>
            </button>
          </div>
      </div>
    </div>
    
    <nav>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">MENU</li>
        <li class="nav-item">
          <a href="#" class="nav-link <?php echo ($menu == 'biodata_user')? 'active' : '' ?>">
          <i class="nav-icon bi bi-person-vcard"></i>
          <p>BIODATA</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link <?php echo ($menu == 'form_soal')? 'active' : '' ?>">
          <i class="nav-icon bi bi-person-check"></i>
          <p>FORM SURVEY</p>
          </a>
        </li>
      </ul>
    <script>
      function toggleActive(event) {
      // Menghapus kelas "active" dari semua tautan di dalam navigasi
        var navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(function(link) {
          link.classList.remove('active');
        });
      // Menambahkan kelas "active" pada tautan yang diklik
      event.target.classList.add('active');
      }

      function changeSubmenuIcon() {
        var submenuIcon = document.querySelector('.nav-item.active .bi-circle');
        if (submenuIcon) {
          // Mengubah ikon submenu menjadi bi-record-circle
          submenuIcon.classList.remove('bi-circle');
          submenuIcon.classList.add('bi-record-circle');
          }
        }
        // Panggil fungsi changeSubmenuIcon ketika dokumen telah dimuat
        document.addEventListener("DOMContentLoaded", function(event) {
          changeSubmenuIcon();
          });
    </script>
  </nav>
</div>
</aside>