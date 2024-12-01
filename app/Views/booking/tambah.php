<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Tambah Booking
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Form Tambah Booking</h4>
    </div>
    <div class="pb-20 px-3">
        <form action="<?= base_url('booking/simpan') ?>" method="post">
            <?= csrf_field() ?>

            <!-- Sarana -->
            <div class="form-group">
                <label for="sarana_id">Sarana</label>
                <select name="sarana_id" id="sarana_id" class="form-control" required>
                    <option value="" disabled selected>Pilih Sarana</option>
                    <?php foreach ($sarana as $item): ?>
                        <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Kursi -->
            <div class="form-group">
                <label for="kursi_id">Kursi</label>
                <select name="kursi_id" id="kursi_id" class="form-control" required>
                    <option value="" disabled selected>Pilih Kursi</option>
                    <!-- Kursi akan dimuat secara dinamis melalui JavaScript -->
                </select>
            </div>

            <!-- Tanggal Booking -->
            <div class="form-group">
                <label for="tanggal_booking">Tanggal Booking</label>
                <input type="datetime-local" name="tanggal_booking" id="tanggal_booking" class="form-control" required>
            </div>

            <!-- Keterangan -->
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
            </div>

            <!-- Hidden Input untuk User ID -->
            <input type="hidden" name="user_id" value="<?= session('user_id') ?>">

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('booking') ?>" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
<script>
    // Memuat kursi secara dinamis berdasarkan sarana yang dipilih
    document.getElementById('sarana_id').addEventListener('change', function () {
        const saranaId = this.value;
        const kursiSelect = document.getElementById('kursi_id');
        kursiSelect.innerHTML = '<option value="" disabled selected>Memuat kursi...</option>';

        fetch(`<?= base_url('api/kursi/') ?>${saranaId}`)
            .then(response => response.json())
            .then(data => {
                kursiSelect.innerHTML = '<option value="" disabled selected>Pilih Kursi</option>';
                data.forEach(kursi => {
                    kursiSelect.innerHTML += `<option value="${kursi.id}">${kursi.nomor_kursi}</option>`;
                });
            });
    });
</script>


<?= $this->endSection() ?>
