<nav class="navbar navbar-expand-lg navbar-light py-1" style="background-color: #f1f5f9; font-size: 0.85rem;">
    <div class="container">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-secondary px-2" href="<?= base_url('about') ?>">About Breezzer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary px-2" href="<?= base_url('contact') ?>">Sell with Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary px-2" href="<?= base_url('faqs') ?>">Help & FAQs</a>
            </li>
        </ul>

        <ul class="navbar-nav">
            <?php if (logged_in()): ?>
                <li class="nav-item">
                    <span class="nav-link text-secondary">
                        Hello, <?= user()->username ?>
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="<?= base_url('logout') ?>">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="<?= base_url('login') ?>">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="<?= base_url('register') ?>">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div class="navbar navbar-expand-lg navbar-light py-3" style="background-color: #ffffff; border-bottom: 1px solid #eee;">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="<?= base_url() ?>" style="font-size: 1.8rem; color: #5e35b1;">
            Breezzer
        </a>

        <div class="dropdown mr-3">
            <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: 600;">
                Category
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= base_url('category/elektrik-rumah') ?>">Elektrik Rumah</a>
                <a class="dropdown-item" href="<?= base_url('category/perkakas-dan-industri') ?>">Perkakas & Industri</a>
                <a class="dropdown-item" href="<?= base_url('category/gadget-dan-ponsel') ?>">Gadget & Ponsel</a>
                <a class="dropdown-item" href="<?= base_url('category/aksesori-komputer') ?>">Aksesori Komputer</a>
                <a class="dropdown-item" href="<?= base_url('category/kamera-dan-fotografi') ?>">Kamera & Fotografi</a>
            </div>
        </div>
        
        <div class="flex-grow-1 mx-4">
            <form class="form-inline w-100">
                <div class="input-group w-100">
                    <input type="search" class="form-control" placeholder="Search in Breezzer..." aria-label="Search" style="border-radius: 8px 0 0 8px; border-color: #ddd;">
                    <div class="input-group-append">
                        <button class="btn" type="submit" style="background-color: #5e35b1; color: #fff; border-radius: 0 8px 8px 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.098zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="d-flex align-items-center ml-4">
            <button class="btn btn-outline-secondary rounded-circle mr-3" style="width: 40px; height: 40px; border-color: #ccc; padding: 0;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L5.423 11H13a.5.5 0 0 1 .485.621l-1.5 3a.5.5 0 0 1-.9.049L10 14h3a.5.5 0 0 0 .485-.379l1.5-3A.5.5 0 0 0 14.5 11H13a.5.5 0 0 0-.485-.379L10.577 3H5.423L5 1.5H.5z"/>
                </svg>
            </button>
            
            <?php if (!logged_in()): ?>
                <a class="btn font-weight-bold py-2 px-4 ml-2" 
                   href="<?= base_url('login') ?>" 
                   style="background-color: #5e35b1; color: #fff; border-radius: 8px;">
                    Sign In
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>