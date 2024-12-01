<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Data Sarana
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Data Sarana</h4>
        
    </div>
    <div class="pb-20 px-3">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">ID</th>
                    <th>Nama Sarana</th>
                    <th>No. Polisi</th>
                    <th>Kapasitas Kursi</th>
                    <th>Status</th>
                    <th class="datatable-nosort">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sarana as $item): ?>
                <tr>
                    <td class="table-plus"><?= $item['id'] ?></td>
                    <td><?= $item['nama'] ?></td>
                    <td><?= $item['no_pol'] ?></td>
                    <td><?= $item['kapasitas_kursi'] ?></td>
                    <td><?= $item['status'] ?></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="<?= base_url('sarana/edit/' . $item['id']) ?>"><i class="dw dw-edit2"></i> Edit</a>
                                <a class="dropdown-item" href="<?= base_url('sarana/delete/' . $item['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus sarana ini?');"><i class="dw dw-delete-3"></i> Hapus</a>
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