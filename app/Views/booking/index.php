<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Daftar Booking
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Daftar Booking</h4>
    </div>
    <div class="pb-20 px-3">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Nama Sarana</th>
                    <th>Nomor Kursi</th>
                    <th>Nama Pengguna</th>
                    <th>Tanggal Booking</th>
                    <th>Status Booking</th>
                    <th class="datatable-nosort">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td class="table-plus"><?= $booking['sarana_nama'] ?></td>
                    <td><?= $booking['nomor_kursi'] ?></td>
                    <td><?= $booking['user_nama'] ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($booking['tanggal_booking'])) ?></td>
                    <td>
                        <?php if ($booking['status_booking'] === 'aktif'): ?>
                            <span class="badge badge-success">Aktif</span>
                        <?php elseif ($booking['status_booking'] === 'dibatalkan'): ?>
                            <span class="badge badge-danger">Dibatalkan</span>
                        <?php else: ?>
                            <span class="badge badge-secondary">Selesai</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                
                                <?php if (session()->get('role') === 'admin' && $booking['status_booking'] === 'aktif'): ?>
                                    <a class="dropdown-item" href="<?= base_url('booking/batal/' . $booking['id'] . '/' . $booking['sarana_id']) ?>" 
   onclick="return confirm('Apakah Anda yakin ingin membatalkan booking ini?');">
   <i class="dw dw-delete-3"></i> Batalkan
</a>

                                <?php endif; ?>

                                <!-- Tombol untuk menandai selesai booking hanya jika user adalah admin -->
                                <?php if (session()->get('role') === 'admin' && $booking['status_booking'] === 'aktif'): ?>
                                    <a class="dropdown-item" href="<?= base_url('booking/selesai/' . $booking['id'] . '/' . $booking['sarana_id']) ?>" 
   onclick="return confirm('Apakah Anda yakin ingin menandai booking ini sebagai selesai?');">
   <i class="dw dw-check"></i> Tandai Selesai
</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Simple Datatable End -->

<?= $this->endSection() ?>
