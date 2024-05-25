<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="<?= base_url('dashboard') ?>" class="app-brand-link">
            <span class="app-brand-logo demo">
              <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
                <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" />
              </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Desa Lauwa</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <li class="menu-item <?php if ($active == "Dashboard") {
                                  echo "active";
                                } ?>">
            <a href="<?= base_url('dashboard') ?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-smart-home"></i>
              <div data-i18n="Dashboard">Dashboard</div>
            </a>
          </li>
          <li class="menu-item <?php if ($active == "Profil") {
                                  echo "active";
                                } ?>">
            <a href="<?= base_url('profiles') ?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-user-exclamation"></i>
              <div data-i18n="Profil">Profil</div>
            </a>
          </li>
          <li class="menu-item <?php if ($active == "Informasi") {
                                  echo "active";
                                } ?>">
            <a href="<?= base_url('informations') ?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-info-circle"></i>
              <div data-i18n="Informasi">Informasi</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons ti ti-notes"></i>
              <div data-i18n="Pelayanan">Pelayanan</div>
              <div class="badge bg-label-primary rounded-pill ms-auto">6</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="<?= base_url('') ?>" class="menu-link">
                  <div data-i18n="SK Penghasilan Orang Tua">SK Penghasilan Orang Tua</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?= base_url('') ?>" class="menu-link">
                  <div data-i18n="SK Tidak Mampu">SK Tidak Mampu</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?= base_url('') ?>" class="menu-link">
                  <div data-i18n="SK Kelahiran">SK Kelahiran</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?= base_url('') ?>" class="menu-link">
                  <div data-i18n="SK Kematian">SK Kematian</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?= base_url('') ?>" class="menu-link">
                  <div data-i18n="SP Pengantar Nikah">SP Pengantar Nikah</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?= base_url('') ?>" class="menu-link">
                  <div data-i18n="SP Keterangan Catatan Kepolisian">SP Keterangan Catatan Kepolisian</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="<?= base_url('') ?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-photo"></i>
              <div data-i18n="Galeri">Galeri</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= base_url('') ?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-address-book"></i>
              <div data-i18n="Kontak">Kontak</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= base_url('') ?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-users"></i>
              <div data-i18n="Users">Users</div>
            </a>
          </li>
          <li class="menu-item active mt-3">
            <a href="<?= base_url('') ?>" class="menu-link" style="background: linear-gradient(72.47deg, #f06767 22.16%, rgba(240, 103, 103, 0.7) 76.47%);">
              <i class="menu-icon tf-icons ti ti-logout"></i>
              <div data-i18n="Logout">Logout</div>
            </a>
          </li>
        </ul>
      </aside>

      <div class="layout-page">
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="ti ti-menu-2 ti-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="nav-item d-flex align-items-center">
              <h4 class="ps-1 ps-sm-2 my-2"><?= $active ?></h4>
            </div>
          </div>
        </nav>

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">