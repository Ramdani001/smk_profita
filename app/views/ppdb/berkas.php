<?php
  $person = $data['person'];
  $berkas = $data['berkas'];
  
  $siswa = $data['siswa'];

  $kk = "";
  if($berkas){
     
    if($berkas['kk']){
      $kk = $berkas['kk'];
    }
    
    if($berkas['akta']){
      $akta = $berkas['akta'];
    }
    
    if($berkas['ijazah']){
      $ijazah = $berkas['ijazah'];
    }
    
    if($berkas['kip']){
      $kip = $berkas['kip'];
    }

    if($berkas['ortu']){
      $ortu = $berkas['ortu'];
    }

    if($berkas['kelakuan']){
      $kelakuan = $berkas['kelakuan'];
    }

    if($berkas['pas_foto']){
      $pasFoto = $berkas['pas_foto'];
    }

    if($berkas['lulus']){
      $lulus = $berkas['lulus'];
    }

    if($berkas['sehat']){
      $sehat = $berkas['sehat'];
    }

    if($berkas['pindah']){
      $pindah = $berkas['pindah'];
    }

  }

?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center z-2" style="background-color: #6dc146;">

  <div class="d-flex align-items-center justify-content-center">
    <a class="logo d-flex align-items-center ps-md-5">
      <div class="text-center">
          <span class="d-none d-lg-block">SMK PROFITA</span>
          <span class="d-none d-lg-block" style="font-size: 14px;">Bandung</span>
      </div>
    </a>
  </div><!-- End Logo -->


  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

    <?php
        if($siswa){
          if((int)$siswa['st'] != 0) {
            echo '
                <div class="me-3 fs-4" style="color: rgb(33, 37, 41);">
                <div style="width: 15px; height: 15px; background-color: blue; position: absolute; border-radius: 100%; margin-top: 2px; margin-left: -5px;"></div>
                  <a href="'.BASEURL.'/AdminController/messages/'.$person['id_person'].'" target="_blank" style="text-decoration: none; color: blue;">
                  <i class="bi bi-envelope"></i> 
                  </a>
                </div>
            ';
          }else{
            echo '
                <div class="me-3 fs-4" style="color: rgb(33, 37, 41);">
                  <button type="button" style="background: none; border: none;" id="pesan_button">
                    <i class="bi bi-envelope"></i> 
                  </button>
                </div>
            ';
          }
        }
      ?>

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a> 
      </li>
      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

        <?php
          if($berkas){
            echo '
              <img src="'.BASEURL.'public/assets/img/profile/'.$berkas['profile'].'" alt="Profile" class="rounded-circle" style="width: 30px; height: 30px;">
            ';
          }else{
            echo '<img src="'.BASEURL.'public/assets/img/default.png" alt="Profile" class="rounded-circle" style="width: 30px; height: 30px;">';
          }
        ?>


<span class="d-none d-md-block dropdown-toggle ps-2"><?= $person['nama'] ?></span>
        </a><!-- End Profile Iamge Icon -->
 
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?= $person['nama'] ?></h6>
            <span><?php echo ($person['tipe'] == 3) ? 'Siswa' : 'Administrator'; ?></span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= BASEURL ?>LoginController/logout">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav>

</header>
<!-- End Header -->


<div class="d-flex justify-content-center">
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= BASEURL ?>PPDBController/index/<?= $person['id_person'] ?>">
        <i class="bi bi-person"></i>
        <span>Formulir</span>
      </a>
    </li>
 
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= BASEURL ?>PPDBController/berkas/<?= $person['id_person'] ?>">
        <i class="bi bi-person"></i>
        <span>Upload Berkas</span>
      </a>
    </li>

    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="<?= BASEURL ?>PPDBController/cetakKartu/<?= $person['id_person'] ?>">
        <i class="bi bi-question-circle"></i>
        <span>Cetak Kartu</span>
      </a>
    </li> -->

  </ul>
</aside>
<!-- End Sidebar-->
<!-- Content -->
<main class="d-flex w-100 h-100 me-1 rounded shadow-lg p-3 card z-1" style="height: 87vh; margin-top: 5%; margin-left: 24%;">
    <h3 class="text-decoration-underline">
        UPLOAD BERKAS
    </h3>  
    <form action="<?= BASEURL ?>PPDBController/updateBerkas/<?= $person['id_person'] ?>" enctype="multipart/form-data" method="POST">
 
      <input type="hidden" name="id_person" id="id_person" value="<?= $person['id_person'] ?>">
 
          <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 30px;">
            <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 30px;">
            <div class="mb-3" style="display: grid; gap: 5px; justify-items: center; width: 250px;"> 
                <span for="aktaFile" class="text-center">Akta</span>

                <img src="<?= BASEURL ?>public/assets/img/akta/<?= $akta ?>" alt="" style="width: 200px;">

                <input class="form-control" type="file" id="aktaFile" name="aktaFile">
            </div>

            <div class="mb-3" style="display: grid; gap: 5px; justify-items: center; width: 250px;"> 
                <span for="kkFile" class="text-center">Kartu Keluarga</span>

                <img src="<?= BASEURL ?>public/assets/img/kk/<?= $kk ?>" alt="" style="width: 200px;">

                <input class="form-control" type="file" id="kkFile" name="kkFile">
            </div>

            <div class="mb-3" style="display: grid; gap: 5px; justify-items: center; width: 250px;">
                <label for="ortu" class="form-label">KTP Orang Tua</label>

                <img src="<?= BASEURL ?>public/assets/img/ortu/<?= $ortu ?>" alt="" style="width: 200px;">

                <input class="form-control" type="file" name="ortuFile" id="ortuFile">
            </div>

            <div class="mb-3" style="display: grid; gap: 5px; justify-items: center; width: 250px;">
                <label for="sehatFile" class="form-label">Kartu Keterangan Sehat</label>

                <img src="<?= BASEURL ?>public/assets/img/sehat/<?= $sehat ?>" alt="" style="width: 200px;">

                <input class="form-control" type="file" name="sehatFile" id="sehatFile">
            </div>

            <div class="mb-3" style="display: grid; gap: 5px; justify-items: center; width: 250px;">
                <label for="kelakuanFile" class="form-label">Surat Kelakuan Baik Dari <br> Sekolah Asal</label>

                <img src="<?= BASEURL ?>public/assets/img/kelakuan/<?= $kelakuan ?>" alt="" style="width: 200px;">

                <input class="form-control" type="file" name="kelakuanFile" id="kelakuanFile" style="height: 40px;">
            </div>

            <div class="mb-3" style="display: grid; gap: 5px; justify-items: center; width: 250px;">
                <label for="pasFotoFile" class="form-label">Pas Foto Ukuran 3x4</label>

                <img src="<?= BASEURL ?>public/assets/img/pas_foto/<?= $pasFoto ?>" alt="" style="width: 200px;">

                <input class="form-control" type="file" name="pasFotoFile" id="pasFotoFile" style="height: 40px;">
            </div>

            <div class="mb-3" style="display: grid; gap: 5px; justify-items: center; width: 250px;">
                <div class="text-center">
                  <div for="lulusFile">Keterangan Lulus <br> Dari Sekolah Asal</div>
                  <div>(SMP/MTs)</div>
                </div>

                <img src="<?= BASEURL ?>public/assets/img/lulus/<?= $lulus ?>" alt="" style="width: 200px;">

                <input class="form-control" type="file" id="lulusFile" name="lulusFile" style="height: 40px;">
            </div>
            <div class="mb-3" style="display: grid; gap: 5px; justify-items: center; width: 250px;">
                <label for="ijazahFile" class="form-label">Ijazah SLTP <br> (Jika Sudah Ada) </label>

                <img src="<?= BASEURL ?>public/assets/img/ijazah/<?= $ijazah ?>" alt="" style="width: 200px;">

                <input class="form-control" type="file" id="ijazahFile" name="ijazahFile" style="height: 40px;">
            </div>
            <div class="mb-3" style="display: grid; gap: 5px; justify-items: center; width: 250px;">
                <label for="kipFile" class="form-label">Kartu Indonesia Pintar <br> (Bila Memiliki) </label>

                <img src="<?= BASEURL ?>public/assets/img/kip/<?= $kip ?>" alt="" style="width: 200px;">

                <input class="form-control" type="file" id="kipFile" name="kipFile" style="height: 40px;">
            </div>
            <div class="mb-3 <?php if($siswa['jenis_daftar'] == 'Reguler') { echo 'd-none'; } ?>" style="display: grid; gap: 5px; justify-items: center; width: 250px;">
                <label for="PindahFile" class="form-label">Surat Pindah Dari Sekolah Asal

                <img src="<?= BASEURL ?>public/assets/img/pindah/<?= $pindah ?>" alt="" style="width: 200px;">

                <input class="form-control" type="file" id="PindahFile" name="PindahFile" style="height: 40px;">
            </div>
            <!-- Bawah -->
          </div>

          <label for="kipFile" class="form-label">
                    <span style="font-size: 10px;">
                        <i>**Upload jika memilikinya</i>
                    </span>
                </label>

          <div class="d-flex justify-content-end" style="">
              <button class="btn btn-primary" type="submit">Submit</button>
          </div>
    </form>
</main>
<!-- Content -->
</div>