<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Tambah Sarana
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Tambah Sarana</h4>
    </div>
    <div class="pb-20 px-3">

    <?php if (isset($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
        <form action="<?= base_url('sarana/simpan') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
    <label for="kategori_id">Kategori</label>
    <select class="form-control" id="kategori_id" name="kategori_id" required>
        <option value="">Pilih Kategori</option>
        <?php foreach ($kategori as $kat): ?>
            <option value="<?= $kat['id'] ?>"><?= $kat['nama'] ?></option>
        <?php endforeach; ?>
    </select>
</div>
            <div class="form-group">
                <label for="nama">Nama Sarana</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="no_pol">No. Polisi</label>
                <input type="text" class="form-control" id="no_pol" name="no_pol" required>
            </div>
            <div class="form-group">
                <label for="kapasitas_kursi">Kapasitas Kursi</label>
                <input type="number" class="form-control" id="kapasitas_kursi" name="kapasitas_kursi" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                    </select>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('sarana') ?>" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>