<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<!-- Include header -->
<?= $this->include('layouts/header') ?>

<div class="container mt-5">
    <!-- Menampilkan pesan sukses -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Tombol untuk menambahkan artikel baru -->
    <div class="mb-4 text-end">
        <a href="<?= site_url('articles/create') ?>" class="btn btn-success">Tambah Artikel</a>
    </div>

    <div class="row">
        <!-- Looping artikel -->
        <?php if (!empty($articles) && is_array($articles)): ?>
            <?php foreach ($articles as $article): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Menampilkan gambar artikel, jika ada -->
                        <?php if (!empty($article['image'])): ?>
                            <img src="<?= base_url('uploads/' . esc($article['image'])) ?>" class="card-img-top" alt="<?= esc($article['title']) ?>">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="No Image">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($article['title']) ?></h5>
                            <p class="card-text"><?= esc(substr($article['content'], 0, 100)) ?>...</p>
                            <!-- Link ke halaman detail artikel -->
                            <a href="<?= base_url('articles/' . $article['id']) ?>" class="btn btn-primary">Baca Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Belum ada artikel yang tersedia.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Include footer -->
<?= $this->include('layouts/footer') ?>

<?= $this->endSection() ?>
