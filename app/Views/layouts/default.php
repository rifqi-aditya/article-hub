<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($title ?? 'My App') ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <!-- Icon -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

  <?= $this->include('partials/navbar') ?>

  <!-- Konten utama -->
  <div class="container mt-4">
    <?= $this->renderSection('content') ?>
  </div>

  <!-- Footer -->
  <?= $this->include('partials/footer') ?>

  <!-- Bootstrap JS Bundle (with Popper) -->
  <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- Custom JS -->
  <script src="<?= base_url('assets/js/script.js') ?>"></script>
  

</body>
</html>