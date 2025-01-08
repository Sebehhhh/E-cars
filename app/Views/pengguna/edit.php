<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Edit Pengguna
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Edit Pengguna</h4>
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

        <form action="<?= base_url('pengguna/update/' . $user['id']) ?>" method="post">
            <div class="form-group">
                <label for="nrp">NRP</label>
                <input type="text" class="form-control" id="nrp" name="nrp" value="<?= $user['nrp'] ?>" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>" required>
            </div>
            <!-- <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin" <?= ($user['role'] == 'Admin') ? 'selected' : '' ?>>Admin</option>
                    <option value="karyawan" <?= ($user['role'] == 'Karyawan') ? 'selected' : '' ?>>Karyawan</option>
                </select>
            </div> -->
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $user['jabatan'] ?>" required>
            </div>
            <div class="form-group">
                <label for="kontak">Kontak</label>
                <input type="text" class="form-control" id="kontak" name="kontak" value="<?= $user['kontak'] ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password (kosongkan jika tidak ingin mengubah)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= base_url('pengguna') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>