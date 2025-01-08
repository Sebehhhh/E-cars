<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title><?= $this->renderSection('title') ?></title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/vendors/images/apple-touch-icon.png') ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/vendors/images/favicon-32x32.png') ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/vendors/images/favicon-16x16.png') ?>">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/styles/core.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/styles/icon-font.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/styles/style.css') ?>">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>

	<style>
		.profile-initials {
    width: 100px; /* Atur lebar sesuai kebutuhan */
    height: 100px; /* Atur tinggi sesuai kebutuhan */
    border-radius: 50%; /* Membuat lingkaran */
    background-color: #007bff; /* Warna latar belakang */
    color: white; /* Warna teks */
    display: flex; /* Menggunakan flexbox untuk memusatkan teks */
    justify-content: center; /* Memusatkan secara horizontal */
    align-items: center; /* Memusatkan secara vertikal */
    font-size: 36px; /* Ukuran font */
    font-weight: bold; /* Ketebalan font */
}
	</style>
</head>
<body>
	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="<?= base_url('assets/vendors/images/deskapp-logo.svg') ?>" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

	<!-- header -->
    <?= $this->include('layouts/header') ?>
    
	<!-- right sidebar -->
    <?= $this->include('layouts/right_sidebar') ?>
    
	<!-- left sidebar -->
    <?= $this->include('layouts/left_sidebar') ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			
		<!-- content -->
		<?= $this->renderSection('content') ?>

		<div class="footer-wrap pd-20 mb-20 card-box">
    PAMA - Aplikasi Manajemen Perusahaan | Developed by Tim PAMA</a>
</div>
		</div>
	</div>
	<!-- js -->
<script src="<?= base_url('assets/vendors/scripts/core.js') ?>"></script>
<script src="<?= base_url('assets/vendors/scripts/script.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/scripts/process.js') ?>"></script>
<script src="<?= base_url('assets/vendors/scripts/layout-settings.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/datatables/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js') ?>"></script>
<!-- buttons for Export datatable -->
<script src="<?= base_url('assets/src/plugins/datatables/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/datatables/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/datatables/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/datatables/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/datatables/js/buttons.flash.min.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/datatables/js/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/datatables/js/vfs_fonts.js') ?>"></script>
<!-- Datatable Setting js -->
<script src="<?= base_url('assets/vendors/scripts/datatable-setting.js') ?>"></script>
</body>
</html>