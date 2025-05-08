<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/header') ?>

<div class="container mt-5">
    <div class="form-container">
        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <h2 class="mb-4">Tambah Artikel Baru</h2>
        <!-- Form for adding new article -->
        <form action="<?= site_url('articles') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="mb-3">
                <label for="title" class="form-label">Judul Artikel</label>
                <input type="text" class="form-control" id="title" name="title" required placeholder="Masukkan judul artikel">
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Nama Penulis</label>
                <input type="text" class="form-control" id="author" name="author" required placeholder="Masukkan nama penulis">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Konten Artikel</label>
                <textarea class="form-control" id="content" name="content" rows="5" required placeholder="Masukkan konten artikel"></textarea>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Tanggal Artikel</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar Artikel</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
            
            <div class="mb-3" id="imagePreviewContainer" style="display: none;">
                <label>Preview Image:</label>
                <!-- Gambar Preview yang akan ditampilkan setelah memilih gambar -->
                <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid" style="max-width: 300px; height: auto;" />
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan Artikel</button>
        </form>
    </div>
</div>

<script>
    // Ambil elemen input file dan preview image container
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');

    // Event listener ketika file dipilih
    imageInput.addEventListener('change', function(event) {
        const file = event.target.files[0];

        // Jika ada file yang dipilih
        if (file) {
            const reader = new FileReader();
            
            // Setelah file dibaca, set gambar preview
            reader.onload = function(e) {
                imagePreview.src = e.target.result; // Set source gambar
                imagePreviewContainer.style.display = 'block'; // Tampilkan gambar preview
            }
            
            reader.readAsDataURL(file); // Membaca file gambar sebagai data URL
        } else {
            // Jika tidak ada file yang dipilih, sembunyikan preview
            imagePreviewContainer.style.display = 'none';
        }
    });

    // Pada halaman pertama, pastikan preview gambar tersembunyi jika belum ada gambar
    if (!imageInput.files.length) {
        imagePreviewContainer.style.display = 'none';
    }
</script>

<?= $this->include('layouts/footer') ?>

<?= $this->endSection() ?>
