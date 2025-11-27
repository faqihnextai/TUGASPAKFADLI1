<style>
    /* Styling khusus untuk kategori box */
    .category-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 15px;
        border: 1px solid #eee;
        border-radius: 12px;
        transition: all 0.2s ease;
        text-decoration: none;
        color: #333;
        height: 100%;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }
    .category-box:hover {
        border-color: #5e35b1;
        box-shadow: 0 5px 15px rgba(94, 53, 177, 0.1);
        text-decoration: none;
    }
    .category-icon {
        width: 60px;
        height: 60px;
        background-color: #f1f5f9; /* Abu-abu muda */
        border-radius: 50%;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: #5e35b1; /* Ungu Breezzer */
    }
    .widget-card {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        padding: 20px;
        border: 1px solid #eee;
    }
    .nav-tabs .nav-link.active {
        color: #5e35b1 !important;
        border-color: #fff #fff #5e35b1 !important;
        font-weight: 600;
    }
</style>

<div class="row mb-5">
    <div class="col-md-12">
        <h2 class="font-weight-bold" style="color: #333;">Kategori Pilihan</h2>
    </div>
</div>

<div class="row mb-5">
    <?php
    // Data Kategori (Ini adalah bagian yang bisa diisi dari Database Seeder)
    $categories = [
        ['name' => 'Gadget Terbaru', 'slug' => 'gadget', 'icon' => '📱'],
        ['name' => 'Perkakas Rumah', 'slug' => 'perkakas', 'icon' => '🛠️'],
        ['name' => 'Komputer & Laptop', 'slug' => 'komputer', 'icon' => '💻'],
        ['name' => 'Aksesori Audio', 'slug' => 'audio', 'icon' => '🎧'],
        ['name' => 'Kamera Digital', 'slug' => 'kamera', 'icon' => '📸'],
    ];

    foreach ($categories as $cat):
    ?>
    <div class="col-6 col-md-2 mb-3">
        <a href="<?= base_url('category/' . $cat['slug']) ?>" class="category-box">
            <div class="category-icon"><?= $cat['icon'] ?></div>
            <p class="font-weight-bold mb-0" style="font-size: 0.9rem;"><?= $cat['name'] ?></p>
        </a>
    </div>
    <?php endforeach; ?>
</div>

<div class="row mb-5">
    <div class="col-md-12">
        <div class="widget-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="font-weight-bold mb-0" style="font-size: 1.5rem;">Top Up & Tagihan</h3>
                <a href="#" class="text-primary font-weight-bold" style="color: #5e35b1 !important;">Lihat Semua</a>
            </div>

            <ul class="nav nav-tabs border-0 mb-4" id="topUpTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pulsa-tab" data-toggle="tab" href="#pulsa" role="tab">Pulsa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="paket-data-tab" data-toggle="tab" href="#paket-data" role="tab">Paket Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="listrik-tab" data-toggle="tab" href="#listrik" role="tab">Listrik PLN</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="pulsa" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-5 mb-2">
                            <label for="nomor-telepon" class="text-muted">Nomor Telepon</label>
                            <input type="text" class="form-control" id="nomor-telepon" placeholder="Masukkan Nomor">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="nominal" class="text-muted">Nominal</label>
                            <select class="form-control" id="nominal">
                                <option>Pilih Nominal</option>
                                <option>Rp 50.000</option>
                                <option>Rp 100.000</option>
                            </select>
                        </div>
                        <div class="col-md-3 d-flex align-items-end mb-2">
                            <button class="btn btn-block font-weight-bold" style="background-color: #5e35b1; color: #fff; border-radius: 8px;">Beli</button>
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
</div>