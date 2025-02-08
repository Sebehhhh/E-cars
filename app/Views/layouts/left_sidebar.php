<div class="left-side-bar">
	<div class="brand-logo">
		<a href="<?= base_url('dashboard') ?>">
			<img src="<?= base_url('assets/vendors/images/logo_pama.png') ?>" alt="Logo PAMA" class="dark-logo" style="width: 50px; height: auto;">
			<img src="<?= base_url('assets/vendors/images/logo_pama.png') ?>" alt="Logo PAMA" class="light-logo" style="width: 50px; height: auto;">
		</a>

		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<!-- Menu Dashboard, visible to all users -->
				<li class="dropdown">
					<a href="<?= base_url('/') ?>" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
					</a>
				</li>

				<!-- Menu Pengguna, Kategori Sarana, Sarana, Kursi, visible only to admin -->
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon dw dw-user1"></span><span class="mtext">Pengguna</span>
					</a>
					<ul class="submenu">
						<li><a href="<?= base_url('pengguna') ?>">Daftar Pengguna</a></li>
						<li><a href="<?= base_url('pengguna/tambah') ?>">Tambah Pengguna</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon dw dw-tag"></span><span class="mtext">Kategori Sarana</span>
					</a>
					<ul class="submenu">
						<li><a href="<?= base_url('kategori-sarana') ?>">Daftar Kategori</a></li>
						<li><a href="<?= base_url('kategori-sarana/tambah') ?>">Tambah Kategori</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon dw dw-box"></span><span class="mtext">Sarana</span>
					</a>
					<ul class="submenu">
						<li><a href="<?= base_url('sarana') ?>">Daftar Sarana</a></li>
						<li><a href="<?= base_url('sarana/tambah') ?>">Tambah Sarana</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon dw dw-chair"></span><span class="mtext">Kursi</span>
					</a>
					<ul class="submenu">
						<li><a href="<?= base_url('kursi') ?>">Daftar Kursi</a></li>
						<li><a href="<?= base_url('kursi/tambah') ?>">Tambah Kursi</a></li>
					</ul>
				</li>

				<!-- Menu Booking, visible to all users -->
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon dw dw-calendar1"></span><span class="mtext">Booking</span>
					</a>
					<ul class="submenu">
						<li><a href="<?= base_url('booking') ?>">Daftar Booking</a></li>
						<li><a href="<?= base_url('booking/tambah') ?>">Tambah Booking</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>