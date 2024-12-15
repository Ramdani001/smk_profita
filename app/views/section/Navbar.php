<nav class="shadow row position-fixed top-0 bg-light w-100 m-0 navbar-expand-lg" style="z-index: 100;">
    <div class="brand p-1 ps-md-5 col-8 col-md-4 d-flex align-items-center">
        <img src="<?= BASEURL ?>public/assets/img/logo.png" alt="logo" id="logo">
        <h4 class="ms-2">SMK PROFITA BANDUNG</h4>
    </div>
    <div id="btnMobile" class="col-1 fs-1 d-md-none" style="width: 30%; display: grid; justify-content: end; align-items: center;">
        <i class="fa-solid fa-bars"></i>
    </div>
    <div id="mScreen" class="col-md-8 col-6 mt-md-2">
        <div class="sosmed col-12 d-flex justify-content-end mt-1 gap-md-5 pe-5 w-100 text-dark" style="align-items: center;">
            <div class="nav-link sosmed-list" style="font-size: 20px;">
                <i class="fa-brands fa-facebook"></i> 
            </div>
            <div class="nav-link sosmed-list" style="font-size: 20px;">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <div class="nav-link sosmed-list" style="font-size: 20px;">
                <i class="fa-brands fa-youtube"></i>
            </div>
        </div> 
        <div class="d-flex align-items-center gap-3 mt-md-3 gap-4">
            <div class="nav-link">
                <a class="text-decoration-none text-menu text-dark" href="<?= BASEURL ?>Landing#heroSection">Beranda</a>
            </div>
            <div class="nav-link">
                <a class="text-decoration-none text-menu text-dark" href="<?= BASEURL ?>Landing#profileSection">Sambutan</a>
            </div>
            <div class="nav-link">
                <a class="text-decoration-none text-menu text-dark" href="<?= BASEURL ?>Landing/Akademika">Tenaga Pendidik</a>
            </div>
            <div class="nav-link">
                <a class="text-decoration-none text-menu text-dark" href="<?= BASEURL ?>Landing#galeriSection">Galeri</a>
            </div>
            <div class="nav-link">
                <a class="text-decoration-none text-menu text-dark" href="<?= BASEURL ?>Landing/Sarana">Sarana & Prasarana</a>
            </div>
            <div class="nav-link">
                <a class="text-decoration-none text-menu text-dark" href="<?= BASEURL ?>Landing#beritaSection">Berita</a>
            </div>
            <div class="nav-link">
                <a class="text-decoration-none text-menu text-dark" href="<?= BASEURL ?>Landing#kontakSection">Kontak</a>
            </div>
            <div class="nav-link">
                <a class="text-decoration-none text-menu text-dark" href="<?= BASEURL ?>LoginController">PPDB</a>
            </div>
        </div>
    </div>
</nav>