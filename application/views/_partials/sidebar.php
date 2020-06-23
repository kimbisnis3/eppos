<?php
  $akses        = sessdata('akses');
  $join_akses   = datauser("super") != 1 ? "JOIN makses ON makses.ref_menu = mmenu.id" : "";
  $where_akses  = datauser("super") != 1 ? "AND makses.ref_level = '$akses'" : "";
  $q_menuinduk  = "SELECT * FROM (
                  SELECT DISTINCT
                    mindukmenu.id,
                    mindukmenu.kode,
                    mindukmenu.nama,
                    mindukmenu.icon,
                    mindukmenu.class,
                    mindukmenu.urutan,
                    mindukmenu.aktif,
                    mindukmenu.url,
                    1 tipe
                  FROM
                  mindukmenu
                  LEFT JOIN mmenu ON mmenu.ref_indukmenu = mindukmenu.kode
                  $join_akses
                  WHERE
                  1 = 1
                  AND mmenu.aktif = 1
                  $where_akses
                  	UNION ALL
                  SELECT DISTINCT
                  	mmenu.id,
                  	mmenu.kode,
                  	mmenu.nama,
                  	mmenu.icon,
                  	mmenu.class,
                  	mmenu.urutan,
                  	mmenu.aktif,
                  	mmenu.url,
                  	2 tipe
                  FROM
                  	mmenu
                  $join_akses
                  WHERE
                  	1 = 1
                  	AND mmenu.aktif = 1
                  	AND mmenu.ref_indukmenu = 'N'
                  	$where_akses) x";
  $q_menuinduk .= " ORDER BY urutan ASC";
  $menuinduk= db_query($q_menuinduk)->result_array();
 ?>
<aside class="main-sidebar sidebar-dark-success elevation-4">
  <a href="<?php echo base_url() ?>landing" class="brand-link">
    <img src="<?php echo base_url().compdata('image') ?>" alt="Logo" class="brand-image img-circle elevation-3" onerror="this.src='<?php echo base_url(); ?>assets/gambar/noimage.png'" style="opacity: .8">
    <span class="brand-text font-weight-light"><?php echo compdata('nama') ?></span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url().datauser('image') ?>" class="img-circle elevation-2" id="user-img-sidebar" alt="User Image" onerror="this.src='<?php echo base_url(); ?>assets/gambar/noimage.png'">
      </div>
      <div class="info">
        <a class="d-block"><?php echo datauser('nama')." ( ".datauser('namalevel')." )" ?></a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php foreach ($menuinduk as $i => $v): ?>
          <?php if ($v['tipe'] == 1): ?>
            <li class="nav-item has-treeview induk-li-<?php echo $v['class'] ?>">
              <a href="#" class="nav-link induk-<?php echo $v['class'] ?>">
                <i class="nav-icon <?php echo $v['icon'] ?>"></i>
                <p>
                  <?php echo $v['nama'] ?>
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php
                  $kodeinduk= $v['kode'];
                  $akses  = sessdata('akses');
                  $q_menu = "SELECT DISTINCT
                    mmenu.*
                    FROM mmenu
                  LEFT JOIN makses ON mmenu.id = makses.ref_menu
                  WHERE
                  1 = 1
                  AND mmenu.ref_indukmenu = '$kodeinduk'
                  AND mmenu.aktif = '1'";
                  if (datauser('super') != 1) {
                    $q_menu .= " AND makses.ref_level = '$akses'";
                  }
                  $q_menu .= " ORDER BY urutan ASC";
                  $menu = db_query($q_menu)->result_array();
                ?>
                <?php foreach ($menu as $u => $t): ?>
                  <li class="nav-item">
                    <a href="<?php echo base_url().$t['url']; ?>" class="nav-link anak-<?php echo $t['class'] ?>">
                      <i class="<?php echo $t['icon'] ?> nav-icon"></i>
                      <p><?php echo $t['nama'] ?></p>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </li>
          <?php endif; ?>
          <?php if ($v['tipe'] == 2): ?>
            <li class="nav-item has-treeview">
              <a href="<?php echo base_url().$v['url']; ?>" class="nav-link anak-<?php echo $v['class'] ?>">
                <i class="nav-icon <?php echo $v['icon'] ?>"></i>
                <p>
                  <?php echo $v['nama'] ?>
                </p>
              </a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
</aside>
