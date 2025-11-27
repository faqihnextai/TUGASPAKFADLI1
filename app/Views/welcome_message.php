<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
     <?= $this->include('widget/category_widgets') ?>
    </div>
</div>
<?= $this->endSection() ?>