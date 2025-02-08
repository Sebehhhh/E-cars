<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card-box pd-20 height-100-p mb-30">
    <div class="row align-items-center">
        <div class="col-md-4">
            <img src="<?= base_url('assets/vendors/images/banner-img.png') ?>" alt="Booking Mobil Dinas">
        </div>
        <div class="col-md-8">
            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                Selamat datang <div class="weight-600 font-30 text-blue"><?= session()->get('user_name'); ?></div>
            </h4>
            <p class="font-18 max-width-600">
                Selamat datang di sistem booking tumpangan mobil dinas PT PAMA Banjarbaru. 
                Aplikasi ini memudahkan Anda dalam melakukan pemesanan kendaraan dinas secara cepat dan efisien. 
                Pilih mobil yang tersedia, tentukan waktu pemakaian, dan nikmati kemudahan dalam perjalanan dinas Anda.
            </p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
