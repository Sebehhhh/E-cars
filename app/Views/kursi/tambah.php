<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Tambah Kursi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Tambah Kursi</h4>
    </div>
    <div class="pb-20 px-3">
        <form action="<?= base_url('kursi/store') ?>" method="POST">
            <div class="form-group">
                <label for="sarana_id">Sarana</label>
                <select class="form-control" id="sarana_id" name="sarana_id" required>
                    <option value="">Pilih Sarana</option>
                    <?php foreach ($sarana as $item): ?>
                        <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nomor_kursi">Nomor Kursi</label>
                <input type="number" class="form-control" id="nomor_kursi" name="nomor_kursi" required>
            </div>
            <div class="form-group">
                <label for="status_kursi">Status Kursi</label>
                <select class="form-control" id="status_kursi" name="status_kursi" required>
                    <option value="kosong">Kosong</option>
                    <option value="terisi">Terisi</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('kursi') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>