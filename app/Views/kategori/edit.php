<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Edit Kategori Sarana
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Edit Kategori Sarana</h4>
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
        <form action="<?= base_url('kategori-sarana/update/' . $kategori['id']) ?>" method="post">
            <div class="form-group">
                <label for="nama">Nama Kategori</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $kategori['nama'] ?>" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"><?= $kategori['deskripsi'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= base_url('kategori-sarana') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>