<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
    <div class="container mt-5 mb-5">
        <!-- Artikel Detail -->
        <div class="card shadow-lg border-light rounded">
            <!-- Card Header: Title, Author, Date -->
            <div class="card-header bg-dark text-white">
                <h2 class="card-title"><?= esc($article['title']) ?></h2>
                <p class="card-text">
                    <small class="text-light">By <?= esc($article['author']) ?> on <?= esc($article['created_at']) ?></small>
                </p>
            </div>

            <!-- Card Body: Image and Content -->
            <div class="card-body">
                <!-- Gambar Artikel -->
                <?php if (!empty($article['image'])): ?>
                    <img src="<?= base_url('uploads/' . esc($article['image'])) ?>" class="img-fluid rounded mb-4" alt="Artikel Image">
                <?php else: ?>
                    <img src="https://via.placeholder.com/800x400" class="img-fluid rounded mb-4" alt="No Image Available">
                <?php endif; ?>

                <!-- Konten Artikel -->
                <p class="card-text"><?= esc($article['content']) ?></p>
            </div>

            <!-- Card Footer: Optional Additional Info -->
            <div class="card-footer text-muted">
                <small>Artikel ini terakhir diupdate pada <?= esc($article['updated_at']) ?></small>
                <!-- Tombol Edit dan Delete -->
                <div class="mt-3">
                    <a href="<?= base_url('articles/edit/' . $article['id']) ?>" class="btn btn-warning me-2">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <!-- Tombol Delete (Trigger Modal) -->
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Artikel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus artikel ini? Aksi ini tidak dapat dibatalkan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <!-- Link untuk Menghapus Artikel -->
                    <a href="<?= site_url('articles/delete/' . $article['id']) ?>" class="btn btn-danger">
                        Hapus
                    </a>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>