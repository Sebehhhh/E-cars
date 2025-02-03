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

            <!-- Layout Kursi -->
            <div class="form-group">
                <label>Pilih Kursi</label>
                <div id="kursi-layout" class="d-flex flex-column align-items-center"></div>
                <input type="hidden" name="kursi_id" id="kursi_id">
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

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('booking') ?>" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
<script>
    const kursiLayout = {
        1: [1, 3, 3, 3, 4],
        2: [1, 3, 3]
    };

    document.getElementById('sarana_id').addEventListener('change', function () {
        const sarana = this.value;
        const layout = kursiLayout[sarana] || [];
        const kursiContainer = document.getElementById('kursi-layout');
        kursiContainer.innerHTML = '';

        fetch(`<?= base_url('api/kursi/') ?>${sarana}`)
            .then(response => response.json())
            .then(data => {
                let seatNumber = 1;
                layout.forEach(rowSize => {
                    let rowDiv = document.createElement('div');
                    rowDiv.classList.add('d-flex', 'justify-content-center', 'mb-2');

                    for (let i = 0; i < rowSize; i++) {
                        let seat = document.createElement('button');
                        seat.classList.add('btn', 'm-1');
                        seat.textContent = seatNumber;
                        seat.dataset.kursiId = seatNumber;

                        let isBooked = data.some(kursi => kursi.nomor_kursi == seatNumber && kursi.status_kursi == 'terisi');
                        if (isBooked) {
                            seat.classList.add('btn-danger');
                            seat.disabled = true;
                        } else {
                            seat.classList.add('btn-outline-primary');
                            seat.onclick = function () {
                                document.querySelectorAll('#kursi-layout button').forEach(btn => btn.classList.remove('btn-success'));
                                this.classList.add('btn-success');
                                document.getElementById('kursi_id').value = this.dataset.kursiId;
                            };
                        }
                        rowDiv.appendChild(seat);
                        seatNumber++;
                    }
                    kursiContainer.appendChild(rowDiv);
                });
            });
    });
</script>

<?= $this->endSection() ?>
