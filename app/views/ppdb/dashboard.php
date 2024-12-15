<!-- Mengambil nama -->
<?php

    if($_SESSION['alert_message']){
      echo "<script> alert('".$_SESSION['alert_message']."') </script>";
    }

    $person = $data['person'];
    $siswa = $data['siswa'];
    $parent = $data['parent'];
    $berkas = $data['berkas'];
 
    // Foto Profile
    $foto_profile = "";
    if($berkas){
      $foto_profile = $berkas['profile'];
    }
    // Foto Profile 

    $status_ayah = "";

    if($parent){
      $status_ayah = $parent['status_ayah'];
    }

    $options = array(
        'Hidup' => 'Masih Hidup',
        'Meninggal' => 'Meninggal'
    );

    // Pendidikan Ibu
    $pendidikan_ibu = "";
    $pendidikan_ayah = "";

    if($parent){
      $pendidikan_ibu = $parent['pendidikan_ibu'];
      $pendidikan_ayah = $parent['pendidikan_ayah'];
    }

    $opt_pendidikan = array(
      'SD' => 'SD',
      'SMP' => 'SMP',
      'SMK/SMA' => 'SMK/SMA',
      'D1' => 'D1',
      'D2' => 'D2',
      'D3' => 'D3',
      'S1' => 'S1',
      'S2' => 'S2',
      'S3' => 'S3'
    );

    $penghasilan_ibu = "";
    $penghasilan_ayah = "";

    $opt_penghasilan = array(
      '0' => '0',
      '1.000.000 - 2.000.000' => '1.000.000 - 2.000.000',
      '2.000.000 - 4.000.000' => '2.000.000 - 4.000.000',
      '4.000.000 - 6.000.000' =>  '4.000.000 - 6.000.000',
      '6.000.000 - 10.000.000' => '6.000.000 - 10.000.000'
    );

    $jenis_kelamin = "";

    if($siswa){
      $jenis_kelamin = $person['jk'];
    }

    $opt_jk = array(
      'Laki-laki' => 'Laki-laki',
      'Perempuan' => 'Perempuan'
    );

    
    $agama = "";

    if($person){
      $agama = $person['agama'];
    }

    $opt_agama = array(
      'Islam' => 'Islam',
      'Kristen' => 'Kristen',
      'Katolik' => 'Katolik',
      'Hindu' => 'Hindu',
      'Budha' => 'Budha',
      'Khonghucu' => 'Khonghucu'
    );

    // Jurusan
    $jurusan = "";

    if($siswa){
      $jurusan = $siswa['jurusan'];
    }

    $opt_jurusan = array(
      'Akuntansi' => 'Akuntansi',
      'Penjualan' => 'Penjualan',
      'Administrator Perkantoran' => 'Administrator Perkantoran'
    );

?>

<script>
  if(<?= $siswa['st'] ?> == 2){
    alert("Mohon maaf anda tidak bisa melanjutkan proses pendaftaran dikarenakan anda Tidak Lolos dalam tahap seleksi administrasi");
  }else if(<?= $siswa['st'] ?> == 1){
    alert("Selamat anda telah diterima untuk melanjutkan PENDATARAN diharapkan untuk datang ke SMK Profita Bandung dengan membawa surat lolos seleksi administrasi yang ada di fitur pesan");
  }
</script>
<!-- =========== -->

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

  <input type="hidden" id="status_siswa_df" value="<?= (int)$siswa['st'] ?>">

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

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

        <?php
          if($berkas){
            echo '
              <img src="'.BASEURL.'public/assets/img/profile/'.$berkas['profile'].'" alt="Profile" class="rounded-circle" style="width: 30px; height: 30px;">
            ';
          }else{
            echo '<img src="public/assets/img/default.png" alt="Profile" class="rounded-circle" style="width: 30px; height: 30px;">';
          }
        ?>

          <!-- <img src="public/assets/img/profile/contoh.jpeg" alt="Profile" class="rounded-circle"> -->

          <span class="d-none d-md-block dropdown-toggle ps-2"><?= $person['nama'] ?></span>
        </a><!-- End Profile Iamge Icon -->
        

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?= $person['nama'] ?></h6>
            <span> <?php echo ($person['tipe'] == 3) ? 'Siswa' : 'Administrator'; ?> </span>
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
      <a class="nav-link collapsed" href="/ditappdb/PPDBController/index/<?= $person['id_person'] ?>">
        <i class="bi bi-person"></i>
        <span>Formulir</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="/ditappdb/PPDBController/berkas/<?= $person['id_person'] ?>">
        <i class="bi bi-person"></i>
        <span>Upload Berkas</span>
      </a>
    </li>

    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="PPDBController/cetakKartu/<?= $person['id_person'] ?>">
        <i class="bi bi-question-circle"></i>
        <span>Cetak Kartu</span>
      </a>
    </li> -->

  </ul>
</aside>
<!-- End Sidebar-->

<!-- Content -->
<main class="d-flex w-100 h-100 me-1 rounded shadow-lg p-3 card z-1" style="height: 87vh; margin-top: 5%; margin-left: 24%;">

<!-- Icon W.a -->
<div class="bottom-0 rigth-0 w-full p-2" style="position: fixed; right: 0;">
    <a href="https://wa.link/3k09wn" target="_blank">
      <img src="<?= BASEURL ?>public/assets/img/wa-icon.png" alt="as" width="50">
    </a>
  </div>
  <!-- Icon W.a -->
<div class="d-flex">
      <div class="card-title w-100" style="border-bottom: 1px solid gray;">
        Formulir Pendaftaran Siswa Baru
      </div>
      <div class="d-flex p-3 gap-4">
        <button id="btn_reguler" class="btn btn-primary" onclick="changeSiswa(1)">Reguler</button>
        <button id="btn_pindah" class="btn btn-secondary" onclick="changeSiswa(2)">Pindahan</button>
      </div>
    </div>
    <div class="header border p-2 d-flex">
      <!-- Btn Data Diri -->
      <div class="pe-3 d-flex">
        <button id="sub_dataDiri" class="btn btn-primary" disabled>
          <i class="ri-account-box-fill"></i>
          Data Diri
        </button>
      </div>
      <div class="me-3">
        <i class="ri-arrow-right-double-fill text-secondary fs-3"></i>
      </div>

      <!-- Btn Alamat -->
      <div class="pe-3 d-flex">
        <button id="sub_alamat" class="btn btn-secondary" disabled>
          <i class="ri-home-8-fill"></i>
          Alamat
        </button>
      </div>
      <div class="me-3">
        <i class="ri-arrow-right-double-fill text-secondary fs-3"></i>
      </div>

      <!-- Btn Data Orang Tua -->
      <div class="pe-3 d-flex">
        <button id="sub_orangtua" class="btn btn-secondary" disabled> <i class="ri-parent-fill"></i> Data Orang Tua</button>
      </div>
      <div class="me-3">
        <i class="ri-arrow-right-double-fill text-secondary fs-3"></i>
      </div>

      <!-- Btn Foto -->
      <div class="pe-3 d-flex">
        <button id="sub_fotoUpload" class="btn btn-secondary" disabled>
          <i class="ri-image-2-fill"></i>  
          Foto
        </button>
      </div>
      
    </div>
 
  <form action="<?= BASEURL ?>PPDBController/insertFormulir/<?= $person['id_person'] ?>" method="post" enctype="multipart/form-data">
    <!-- form data diri -->
 
    <input type="hidden" value="<?= $person['id_person'] ?>" name="id_person" id="id_person">

    <div id="form-diri">
      <div class=" w-100 p-3 border d-flex flex-wrap" style="background-color: #f9f8f8;">
        <table class="w-100">
          <tr>
            <!-- <td>
              <div class="row g-3 align-items-center m-2">
              <div class="col-6">
                <label for="inputPassword6" class="col-form-label">No. Pendaftaran</label>
              </div>
              <div class="col-6">
                <input type="Text" id="no_pendaftaran" name="no_pendaftaran" class="form-control" 
                  value="<?php
                            if($siswa){
                              echo $siswa['no_pendaftaran'];
                            }else{
                              echo "";
                            }
                          ?>"
                  >
              </div>
            </div>
            </td> -->
            <td>
              <!-- Nama Lengkap -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="nama_lengkap" class="col-form-label">Nama Lengkap</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="<?= $person['nama'] ?>">
                </div>
              </div>
              <!-- No Daftar -->
             
            </td>

            <td> 
                <!-- No Daftar -->
                <div class="row g-3 align-items-center m-2">
                  <div class="col-6">
                    <label for="nisn" class="col-form-label">NISN</label>
                  </div>
                  <div class="col-6">
                    <input type="Text" id="nisn" name="nisn" class="form-control" value="<?php if($siswa){
                        echo $siswa['nisn'];
                    }else{
                      echo "";
                    } ?>" >
                  </div>
                </div>
            </td>
          </tr>
          <tr>
            <!-- <td>
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="npsn_sekolah" class="col-form-label">NPSN Sekolah Asal</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="npsn_sekolah" name="npsn_sekolah" class="form-control" value="<?php if($siswa){
                        echo $siswa['npsn_sekolah_asal'];
                    }else{
                      echo "";
                    } ?>"  >
                </div>
              </div>
            </td> -->
            <td>
            <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin</label>
                </div>
                <div class="col-6">
                  <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                      <?php
                      foreach ($opt_jk as $value => $label) {
                          $selected = ($value == $jenis_kelamin) ? 'selected' : '';
                          echo "<option value=\"$value\" $selected>$label</option>";
                      }
                      ?>
                  </select>
                </div>
              </div>
              
            </td>
            <td>
              <!-- Nama Lengkap -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="inputPassword6" class="col-form-label">Asal Sekolah</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="asal_sekolah" name="asal_sekolah" class="form-control text-start" value="<?php if($siswa){
                        echo ltrim($siswa['asal_sekolah']);
                    }else{
                      echo ltrim("");
                      } ?>">
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <!-- <td>
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="nik" class="col-form-label">NIK</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="nik" name="nik" class="form-control" value="<?php if($siswa){
                        echo $siswa['nik'];
                    }else{
                      echo "";
                    } ?>" >
                </div>
              </div>
            </td> -->
            <td>
              <!-- Nama Lengkap -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="tempat" class="col-form-label">Tempat Lahir</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="tempat" name="tempat" class="form-control" value="<?= $person['tempat_lhir'] ?>" >
                </div>
              </div>
            </td>
            <td>
              <!-- Tanggal Lahir -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
                </div>
                <div class="col-6">
                  <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="<?= $person['tanggal_lahir'] ?>" >
                </div>
              </div>
            </td>
          </tr>
          <tr>
          <td>
             <!-- kewarganegaraan -->
             <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="kewarganegaraan" class="col-form-label">Kewarganegaraan</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="kewarganegaraan" name="kewarganegaraan" class="form-control" value="<?= $person['kewarganegaraan'] ?>" >
                </div>
              </div>
            </td>
            <td>
              <!-- Anak Ke -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="anak_ke" class="col-form-label">Anak Ke</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="anak_ke" name="anak_ke" class="form-control" value="<?php
                    if($siswa){
                      echo $siswa['anak_ke'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
          </tr>
          <tr>
          <td>
                <!-- Jumlah Saudara -->
                <div class="row g-3 align-items-center m-2">
                  <div class="col-6">
                    <label for="jml_saudara" class="col-form-label">Jumlah Saudara/i</label>
                  </div>
                  <div class="col-6">
                    <input type="Text" id="jml_saudara" name="jml_saudara" class="form-control" value="<?php if($siswa){echo $siswa['jml_saudara'];
                        }else{
                          echo "";
                        }
                      ?>" >
                  </div>
                </div>
            </td>
            <td>
                <!-- Agama -->
                <div class="row g-3 align-items-center m-2">
                  <div class="col-6">
                    <label for="agama" class="col-form-label">Agama</label>
                  </div>
                  <div class="col-6">
                  <select class="form-select" name="agama" id="agama">
                      <?php
                      foreach ($opt_agama as $value => $label) {
                          $selected = ($value == $agama) ? 'selected' : '';
                          echo "<option value=\"$value\" $selected>$label</option>";
                      }
                      ?>
                  </select>
                    <!-- <input type="Text" id="agama" name="agama" class="form-control" value="<?php
                      if($person){
                        echo $person['agama'];
                      }else{
                        echo "";
                      }
                    ?>" > -->
                  </div>
                </div>
            </td>
          </tr>
          <tr>
          <td>
              <!-- Cita-Cita -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="cita_cita" class="col-form-label">Cita-Cita</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="cita_cita" name="cita_cita" class="form-control" value="<?php
                    if($siswa){
                      echo $siswa['cita_cita'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
            <td>
              <!-- Hobi -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="hobi" class="col-form-label">Hobi</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="hobi" name="hobi" class="form-control" value="<?php
                    if($siswa){
                      echo $siswa['hobi'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
          </tr>
          <tr>
          <td>
              <!-- Email -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="email" class="col-form-label">Email</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="email" name="email" class="form-control" value="<?php
                      if($person){
                        echo$person['email'];
                      }else{
                        echo "";
                      }
                    ?>">
                </div>
              </div>
            </td>
            <td>
              <!-- No.Handphone -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="no_telp" class="col-form-label">No. Handphone</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="no_telp" name="no_telp" class="form-control" value="<?php
                      if($person){
                        echo $person['no_telp'];
                      }else{
                        echo "";
                      }
                    ?>" >
                </div>
              </div>
            </td>
          </tr>
          <tr>
          <td>
                <!-- jurusan -->
                <div class="row g-3 align-items-center m-2">
                  <div class="col-6">
                    <label for="jurusan" class="col-form-label">Jurusan</label>
                  </div>
                  <div class="col-6">
                    <select class="form-select" name="jurusan" id="jurusan">
                        <?php
                        foreach ($opt_jurusan as $value => $label) {
                            $selected = ($value == $jurusan) ? 'selected' : '';
                            echo "<option value=\"$value\" $selected>$label</option>";
                        }
                        ?>
                    </select>
                  </div>
                </div>
            </td>
            <td>
              <!-- No.Kip -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="kip" class="col-form-label">No.KIP</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="kip" name="kip" class="form-control" value="<?php
                    if($siswa){
                      echo $siswa['kip'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
            <input type="hidden" name="jenis_daftar" id="jenis_daftar" value="<?php if($siswa){echo $siswa['jenis_daftar'];}else{ echo ""; } ?>">
            <input type="hidden" name="local_jenis_daftar" id="local_jenis_daftar" value="<?php if($siswa){echo $siswa['jenis_daftar'];}else{ echo ""; } ?>">
          </tr>
          <tr>
          <td id="al_awal" class="d-none">
              <!-- Kelas Awal -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="kip" class="col-form-label">Kelas Awal</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="kelas_awal" name="kelas_awal" class="form-control" value="<?php
                    if($siswa){
                      echo $siswa['kelas_awal'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div> 
            </td>
          <td id="al_pindah" class="d-none">
              <!-- Alasan Pindah -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="kip" class="col-form-label">Alasan Pindah</label>
                </div>
                <div class="col-6">
                  <textarea type="Text" id="alasan_pindah" name="alasan_pindah" class="form-control"><?php
                    if($siswa){
                      echo $siswa['alasan_pindah'];
                    }else{
                      echo "";
                    }
                  ?></textarea>
                </div>
              </div>
            </td>
          </tr>
          <!-- <tr> -->
            
            <!-- <td>
                  <div class="row g-3 align-items-center m-2">
                    <div class="col-6">
                      <label for="biaya_sekolah" class="col-form-label">Yang Membiayai Sekolah</label>
                    </div>
                    <div class="col-6">
                      <input type="Text" id="biaya_sekolah" name="biaya_sekolah" class="form-control" value="<?php
                        if($siswa){
                          echo $siswa['biaya_sekolah'];
                        }else{
                          echo "";
                        }
                      ?>" >
                    </div>
                  </div>
            </td> -->
          <!-- </tr>
          <tr> -->
            <!-- <td>
                
                <div class="row g-3 align-items-center m-2">
                  <div class="col-6">
                    <label for="paud" class="col-form-label">SD</label>
                  </div>
                  <div class="col-6">
                    <input type="Text" id="paud" name="paud" class="form-control" value="<?php
                      if($siswa){
                        echo $siswa['sd'];
                      }else{
                        echo "";
                      }
                    ?>" >
                  </div>
                </div>
            </td> -->
            
          <!-- </tr>
          <tr> -->
            <!-- <td>
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="tk" class="col-form-label">SMP</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="tk" name="tk" class="form-control" value="<?php if($siswa){
                      echo $siswa['smp'];
                    }else{
                      echo "";
                    }
                  ?>
                  " >
                </div>
              </div>
            </td> -->
            
          <!-- </tr>
          <tr> -->
            <!-- <td>
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="kk" class="col-form-label">No.KK</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="no_kk" name="no_kk" class="form-control" value="<?php
                    if($siswa){
                      echo $siswa['no_kk'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
          </td> -->
          <!-- <td> -->
            <!-- Kepala Keluarga -->
            <!-- <div class="row g-3 align-items-center m-2">
              <div class="col-6">
                <label for="kepala_keluarga" class="col-form-label">Kepala Keluarga</label>
              </div>
              <div class="col-6">
                <input type="Text" id="kepala_keluarga" name="kepala_keluarga" class="form-control"   value="<?php
                  if($siswa){
                    echo $siswa['kepala_keluarga'];
                  }else{
                    echo "";
                  }
                ?>">
              </div>
            </div> -->
          <!-- </td> -->
          <!-- </tr> -->
        </table>
        <div class="d-flex justify-content-end w-100 mt-3">
          <button type="button" class="btn btn-primary" style="width: 20%;" onclick="nextPage(1)">Next</button>
        </div>
        </div>
      <hr>
      <span class="text-secondary mb-2" style="padding-bottom: 10px;">*Harap isi data dengan Sebenar-benarnya</span>
    </div>
    <!-- form data diri -->

    <!-- form Data alamat --> 
    <div id="form-alamat" class="d-none">
      <div action="#"  class="w-100 p-3 border d-flex flex-wrap" style="background-color: #f9f8f8;">
        <table class="w-100">
          <tr>
            <td colspan="2">
              <!-- Alamat -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-3">
                  <label for="alamat" class="col-form-label">Alamat</label>
                </div>
                <div class="col-9">
                  <textarea name="alamat" id="alamat" class="form-control"  style="text-align: left;"><?php if($person){ echo $person['alamat'];
                      }else{
                        echo "";
                      }?></textarea>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <!-- Nama Lengkap -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="nama_lengkap" class="col-form-label">RT/RW</label>
                </div>
                <div class="col-6 d-flex gap-3">
                  <input type="number" id="rt" name="rt" class="form-control" value="<?php
                  if($person){
                    echo $person['rt'];
                  }else{
                    echo "";
                  } ?>" >
                  <input type="number" id="rw" name="rw" class="form-control" value="<?php
                  if($person){
                    echo $person['rw'];
                  }else{
                    echo "";
                  } ?>" >
                </div>
              </div>
            </td>
            <td>
              <!-- Nama Lengkap -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="desa" class="col-form-label">Kelurahan</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="desa" name="desa" class="form-control" value="<?php
                    if($person){
                      echo $person['desa'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <!-- Tanggal Lahir -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="tanggal_lahir" class="col-form-label">Kecamatan</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="kecamatan" name="kecamatan" class="form-control" value="<?php
                    if($person){
                      echo $person['kecamatan'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
            <td>
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="kab_kota" class="col-form-label">Kabupaten/Kota</label>
                </div>
                <div class="col-6"> 
                  <input type="Text" id="kab_kota" name="kab_kota" class="form-control" value="<?php
                    if($person){
                      echo $person['kab_kota'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <!-- Anak Ke -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="provinsi" class="col-form-label">Provinsi</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="provinsi" name="provinsi" class="form-control" value="<?php
                    if($person){
                      echo $person['provinsi'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
            <td>
                <!-- Jumlah Saudara -->
                <div class="row g-3 align-items-center m-2">
                  <div class="col-6">
                    <label for="kode_pos" class="col-form-label">Kode Pos</label>
                  </div>
                  <div class="col-6">
                    <input type="number" id="kode_pos" name="kode_pos" class="form-control" value="<?php if($person){
                        echo $person['kode_pos'];
                      }else{
                        echo "";
                      }
                    ?>" >
                  </div>
                </div>
            </td>
          </tr>
        </table>
        <div class="d-flex justify-content-end w-100 mt-3">
          <button type="button" class="btn btn-secondary me-3" style="width: 20%;" onclick="nextPage(11)">Back</button>
          <button type="button" class="btn btn-primary" style="width: 20%;" onclick="nextPage(2)">Next</button>
        </div>
        </div>
      <hr>
      <span class="text-secondary mb-2" style="padding-bottom: 10px;">*Harap isi data dengan Sebenar-benarnya</span>
    </div>
    <!-- form Data alamat -->
    <!-- form Data orangtuan -->
    <div id="form-orangtua" class="d-none">
      
      <div class="w-100 p-3 border d-flex flex-wrap" style="background-color: #f9f8f8;">
        <table class="w-100">
          <tr>
            <td colspan="2">
              <h6>
                <b>
                  <u>Ayah</u>
                </b>
              </h6>
            </td>
          </tr>
          <tr>
            <td>
              <!-- Status Ayah -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="nik" class="col-form-label">Status Ayah</label>
                </div>
                <div class="col-6">
                  <!-- <select class="form-select" name="status_ayah" id="status_ayah">
                    <option value="Hidup">Masih Hidup</option>
                    <option value="Meninggal">Meninggal</option>
                  </select> -->
                  
                  <select class="form-select" name="status_ayah" id="status_ayah">
                      <?php
                      foreach ($options as $value => $label) {
                          $selected = ($value == $status_ayah) ? 'selected' : '';
                          echo "<option value=\"$value\" $selected>$label</option>";
                      }
                      ?>
                  </select>
                  
                </div>
              </div>
            </td>
            <td> 
              <!-- Tgl Ayah -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="nik_ayah" class="col-form-label">Tanggal Lahir Ayah</label>
                </div>
                <div class="col-6">
                  <input type="date" id="tgl_lhr_ayar" name="tgl_lhr_ayar" class="form-control" value="<?php
                    if($parent){
                      echo $parent['tgl_lhr_ayah'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <!-- Status Ayah -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="nik" class="col-form-label">Nama Ayah</label>
                </div>
                <div class="col-6">
                <input type="Text" id="nama_ayah" name="nama_ayah" class="form-control" value="<?php
                  if($parent){
                    echo $parent['nama_ayah'];
                  }else{
                    echo "";
                  }
                ?>" >
                </div>
              </div>
            </td>
            <td>
              <!-- Tempat Lahir -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="lhr_ayah" class="col-form-label">Tempat Lahir</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="lhr_ayah" name="lhr_ayah" class="form-control" value="<?php
                    if($parent){
                      echo $parent['lhir_ayah'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <!-- Pendidikan Ayah -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="nik" class="col-form-label">Pendidikan Ayah</label>
                </div>
                <div class="col-6">
                  <!-- <input type="Text" id="pendidikan_ayah" name="pendidikan_ayah" class="form-control" value="<?= $parent['pendidikan_ayah'] ?>" > -->
                  <select class="form-select" name="pendidikan_ayah" id="pendidikan_ayah">
                      <?php
                      foreach ($opt_pendidikan as $value => $label) {
                          $selected = ($value == $pendidikan_ayah) ? 'selected' : '';
                          echo "<option value=\"$value\" $selected>$label</option>";
                      }
                      ?>
                  </select>
                </div>
              </div>
            </td>
            <td>
              <!-- Pekerjaan -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="pekerjaan_ayah" class="col-form-label">Pekerjaan</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="form-control" value="<?php
                    if($parent){
                      echo $parent['pekerjaan_ayah'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
          </tr>
          
          <tr>
            <td>
              <!-- penghasilan Ayah -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="penghasilan_ayah" class="col-form-label">Penghasilan Ayah</label>
                </div>
                <div class="col-6">
                   <!-- <select class="form-select" name="penghasilan_ayah" id="penghasilan_ayah" value="<?= $parent['penghasilan_ayah'] ?>">
                    <option value="1.000.000 - 2.000.000">1.000.000 - 2.000.000</option>
                    <option value="2.000.000 - 4.000.000">2.000.000 - 4.000.000</option>
                    <option value="4.000.000 - 6.000.000">4.000.000 - 6.000.000</option>
                    <option value="6.000.000 - 10.000.000">6.000.000 - 10.000.000</option>
                  </select> -->

                  <select class="form-select" name="penghasilan_ayah" id="penghasilan_ayah">
                      <?php
                      foreach ($opt_penghasilan as $value => $label) {
                          $selected = ($value == $penghasilan_ayah) ? 'selected' : '';
                          echo "<option value=\"$value\" $selected>$label</option>";
                      }
                      ?>
                  </select>

                </div>
              </div>
            </td>
            <td>
              <!-- No Hp Ibu -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="no_ibu" class="col-form-label">No. HP Ayah</label>
                </div>
                <div class="col-6">
                  <input type="text" id="no_ayah" name="no_ayah" class="form-control" style="width: 100%;" value="<?php
                    if($parent){
                      echo $parent['no_ayah'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <h6>
                <b>
                  <u>Ibu</u>
                </b>
              </h6>
            </td>
          </tr>
          <tr>
            <td>
             <!-- Status Ibu -->
             <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="status_ibu" class="col-form-label">Status Ibu</label>
                </div>
                <div class="col-6">
                  <select class="form-select" name="status_ibu" id="status_ibu" value="<?= $parent['status_ibu'] ?>">
                    <option value="Masih Hidup">Masih Hidup</option>
                    <option value="Meninggal">Meninggal</option>
                  </select>
                </div>
              </div>
            </td>
            <td>
              <!-- nama Ibu -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="nama_ibu" class="col-form-label">Nama Ibu</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="nama_ibu" name="nama_ibu" class="form-control" value="<?php
                    if($parent){
                      echo $parent['nama_ibu'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <!-- Tempat Lahir IBU -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="lhr_ibu" class="col-form-label">Tempat Lahir</label>
                </div>
                <div class="col-6">
                  <input type="Text" id="lhr_ibu" name="lhr_ibu" class="form-control" value="<?php
                    if($parent){
                      echo $parent['lhir_ibu'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
            <td>
              <!-- Tgl Lhir Ibu -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="nama_ibu" class="col-form-label">Tanggal Lahir</label>
                </div>
                <div class="col-6">
                  <input type="date" id="tgl_lhir_ibu" name="tgl_lhir_ibu" class="form-control" value="<?php
                    if($parent){
                      echo $parent['tgl_lhr_ibu'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <!-- No Hp Ibu -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="no_ibu" class="col-form-label">No. HP Ibu</label>
                </div>
                <div class="col-6">
                  <input type="text" id="no_ibu" name="no_ibu" class="form-control" style="width: 200px;" value="<?php
                    if($parent){
                      echo $parent['no_ibu'];
                    }else{
                      echo "";
                    }
                  ?>" >
                </div>
              </div>
            </td>
            <td>
            <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="no_ibu" class="col-form-label">Pekerjaan Ibu</label>
                </div>
                <div class="col-6">
                  <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="form-control" style="width: 200px;" value="<?php
                    if($parent){
                      echo $parent['pekerjaan_ibu'];
                    }else{
                      echo "";
                    }
                  ?>" > 
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <!-- Pendidikan Ibu -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="pendidikan_ibu" class="col-form-label">Pendidikan Ibu</label>
                </div>
                <div class="col-6">

                  <select class="form-select" name="pendidikan_ibu" id="pendidikan_ibu">
                      <?php
                      foreach ($opt_pendidikan as $value => $label) {
                          $selected = ($value == $pendidikan_ibu) ? 'selected' : '';
                          echo "<option value=\"$value\" $selected>$label</option>";
                      }
                      ?>
                  </select>

                </div>
              </div>
            </td>
            <td>  
              <!-- Penghasilan Ibu -->
              <div class="row g-3 align-items-center m-2">
                <div class="col-6">
                  <label for="penghasilan_ibu" class="col-form-label">Penghasilan Ibu</label>
                </div>
                <div class="col-6">
                  <select class="form-select" name="penghasilan_ibu" id="penghasilan_ibu">
                      <?php
                      foreach ($opt_penghasilan as $value => $label) {
                          $selected = ($value == $penghasilan_ibu) ? 'selected' : '';
                          echo "<option value=\"$value\" $selected>$label</option>";
                      }
                      ?>
                  </select>

                </div>
              </div>
            </td>
          </tr>
        </table>
        
        <div id="wali_murid" class="p-3">
           <h6>
            <b>
              <u>Wali Murid</u>
            </b>
           </h6>

           <div class="d-flex mt-2" style="gap: 20px;">
                 <div>
                    <span>Nama Wali Murid</span>
                    <input type="text" id="name_wali" name="name_wali" class="form-control" value="<?php
                      if($parent){
                        echo $parent['name_wali'];
                      }else{
                        echo "";
                      }
                    ?>">
                 </div>
                 <!--  -->
                 <div>
                    <span>No Telepon</span>
                    <input type="text" id="no_wali" name="no_wali" class="form-control" value="<?php
                      if($parent){
                        echo $parent['no_wali'];
                      }else{
                        echo "";
                      }
                    ?>">
                 </div>
                 <!--  -->
                 <div>
                    <span>Hubungan Dengan Siswa</span>
                    <input type="text" id="hubungan_wali" name="hubungan_wali" class="form-control" value="<?php
                      if($parent){
                        echo $parent['hubungan_wali'];
                      }else{
                        echo "";
                      }
                    ?>">
                 </div>
                 <!--  -->
                 <div>
                    <span>Pekerjaan</span>
                    <input type="text" id="pekerjaan_wali" name="pekerjaan_wali" class="form-control" value="<?php
                      if($parent){
                        echo $parent['pekerjaan_wali'];
                      }else{
                        echo "";
                      }
                    ?>">
                 </div>
                 <!--  -->
           </div>
           <!-- Alamat -->
           <div>
              <span>Alamat</span>
              <div>
                <textarea name="alamat_wali" id="alamat_wali" cols="100" class="form-control" style="text-align: left;"><?php if($parent){ echo $parent['alamat_wali'];
                    }else{
                      echo "";
                    }?></textarea>
              </div>
           </div>
           <!-- Alamat -->
 
        </div>

        <div class="d-flex justify-content-end w-100 mt-3">
          <button type="button" class="btn btn-secondary me-3" style="width: 20%;" onclick="nextPage(21)">Back</button>
          <button type="button" class="btn btn-primary" style="width: 20%;" onclick="nextPage(3)">Next</button>
        </div>
      </div>
      <hr>
      <span class="text-secondary mb-2" style="padding-bottom: 10px;">*Harap isi data dengan Sebenar-benarnya</span>
    </div>
    <!-- form Data orangtua -->
    <!-- form Data foto -->
    <div id="form-foto" class="d-none">
      <div class="w-100 p-3 border d-flex flex-wrap" style="background-color: #f9f8f8;">
        <table class="w-100">
          <tr>
            <td>
              <img src="<?= BASEURL ?>public/assets/img/profile/<?= $foto_profile ?>" alt="" style="width: 300px;">
            </td>
          </tr>
          <tr>
            <td>
              <!-- Foto Siswa -->
              <div class="row g-3 align-items-center m-2">
                  <input type="file" class="form-control" id="foto_siswa" name="foto_siswa">
                </div>
              </div>
            </td> 
          </tr>
        </table>
        <div class="d-flex justify-content-end w-100 mt-3">
          <button type="button" class="btn btn-secondary me-3" style="width: 20%;" onclick="nextPage(31)">Back</button>
          <button type="submit" class="btn btn-primary" style="width: 20%;">Simpan</button>
        </div>
        
      </div>
    </div>
    <!-- form Data foto -->
    </form>
  </div>

  
  
</main>
<!-- Content -->

</div>