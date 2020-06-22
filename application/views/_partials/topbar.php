<!-- <nav class="main-header navbar navbar-expand navbar-light navbar-white "> -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-success">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right  fadeIn animated">
        <div class="dropdown-divider"></div>
        <?php
        $akses = sessdata('akses');
        $url = '';
        if ($akses == 'CUST') {
          $url = 'authcust';
        } else {
          $url = 'auth';
        }
        ?>
        <a href="<?php echo base_url().$url; ?>/logout" class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
