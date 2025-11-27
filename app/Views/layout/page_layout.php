<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Breezzer | Market Electronial Shop</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />

    <style>
        body {
            background: #f1f5f9;
            margin: 0;
            font-family: 'Inter', sans-serif;
            color: #333;
        }
        /* Override default bootstrap jumbotron/header/footer untuk mengikuti tema */
        .jumbotron-fluid {
            background-color: #f1f5f9; /* Latar belakang abu-abu muda */
            padding: 2rem 1rem;
            margin-bottom: 0;
        }
        .container {
            max-width: 1200px; /* Lebar maksimum untuk konten */
        }
    </style>
</head>

<body>

    <?= $this->include('layout/navbar') ?>
    
    <?= $this->include('layout/header') ?>
    
    <div class="container my-4">
        <?= $this->renderSection('content') ?>
    </div>
    
    <?= $this->include('layout/footer') ?>

	<script src="<?= base_url('js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

</body>

</html>