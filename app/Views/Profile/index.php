<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Profile
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card-box pd-20 height-100-p mb-30">
    <div class="row align-items-center">
        <div class="col-md-12">
            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                User Profile <div class="weight-600 font-30 text-blue"><?= session()->get('user_name'); ?></div>
            </h4>
            <form action="<?= base_url('profile/update') ?>" method="post">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $user['nama'] ?>" required>
    </div>
    <div class="form-group">
        <label for="nrp">NRP:</label>
        <input type="text" class="form-control" id="nrp" name="nrp" value="<?= $user['nrp'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="role">Role:</label>
        <input type="text" class="form-control" id="role" name="role" value="<?= $user['role'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="jabatan">Jabatan:</label>
        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $user['jabatan'] ?>" required>
    </div>
    <div class="form-group">
        <label for="kontak">Kontak:</label>
        <input type="text" class="form-control" id="kontak" name="kontak" value="<?= $user['kontak'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Profile</button>
</form>

            <h3 class="mt-4">Change Password</h3>
            <form action="<?= base_url('profile/changePassword') ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Current Password:</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <button type="submit" class="btn btn-danger">Change Password</button>
            </form>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success mt-3"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger mt-3"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>