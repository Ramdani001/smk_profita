<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center z-2" style="background-color: white;">

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
      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="<?= BASEURL ?>public/assets/img/profile/contoh.jpeg" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2"><?= $data['auth']['nama'] ?></span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?= $data['auth']['nama'] ?></h6>
            <span><?= $data['auth']['email'] ?></span>
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
      <a class="nav-link collapsed" href="ViewAdminController/">
        <i class="bi bi-person"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= BASEURL ?>ViewAdminController/user">
        <i class="bi bi-person"></i>
        <span>User</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed bg-primary text-light " href="<?= BASEURL ?>ViewAdminController/siswaDaftar">
        <i class="ri-graduation-cap-fill"></i>
        <span>Siswa Daftar</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= BASEURL ?>ViewAdminController/laporan">
        <i class="ri-folder-chart-fill"></i>
        <span>Laporan Pendaftaran</span>
      </a>
    </li>

  </ul>
</aside>
<!-- End Sidebar-->

<!-- Content -->
<main class="d-flex w-100 h-100 me-1 rounded shadow-lg p-3 card z-1" style="height: 87vh; margin-top: 5%; margin-left: 24%;">
   
   <!-- Grafik -->

    <div class="card">
      <div class="card-body">
        
        <div class="p-2">
          <span>Filter Data</span>
          <select id="filter_data" class="form-select" aria-label="Default select example">
            <option value="getAll" selected>All</option>
            <option value="reguler">Reguler</option>
            <option value="pindahan">Pindahan</option>
          </select>
        </div>
        <table class="table table-hover" id="siswaTable">
          <thead>
            <th class="text-center">No</th>
            <th class="text-center">Profile</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Asal Sekolah</th>
            <th class="text-center">No.Telepon</th>
            <th class="text-center">Status</th>
            <th class="text-center">Aksi</th>
          </thead>
          <tbody id="tableBody">
            <!-- Rows will be inserted here by JavaScript -->
          </tbody>
        </table>
       
      </div>
    </div>

   <!-- Grafik -->

</main>
<!-- Content -->
</div>

<!-- Modal Detail -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <!-- Personal -->
         <div>
          <h5>
            <b>
              <u>Data Diri</u>
            </b>
          </h5>
         </div>
        <div style="display: flex; gap: 20px; justify-content: space-between; flex-wrap: wrap;">
          <!-- No Pendaftaran -->
          <!-- <div class="mb-3">
            <label for="det_pendaftaran" class="form-label">No Pendaftaran</label>
            <input type="text" class="form-control" id="det_pendaftaran" disabled>
          </div> -->
          <!-- Nama Lengkap -->
          <div class="mb-3">
            <label for="det_name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="det_name" disabled>
          </div>
          <!-- Asal Sekolah -->
          <div class="mb-3">
            <label for="det_asal_sekolah" class="form-label">Asal Sekolah</label>
            <input type="text" class="form-control" id="det_asal_sekolah" disabled>
          </div>
          <!-- NPSN Sekolah Asal -->
          <!-- <div class="mb-3">
            <label for="det_npsn_asal_sekolah" class="form-label">NPSN Asal Sekolah</label>
            <input type="text" class="form-control" id="det_npsn_asal_sekolah" disabled>
          </div> -->
          <!-- NISN -->
          <div class="mb-3">
            <label for="det_nisn" class="form-label">NISN</label>
            <input type="text" class="form-control" id="det_nisn" disabled>
          </div>
          <!-- NIK -->
          <!-- <div class="mb-3">
            <label for="det_nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="det_nik" disabled>
          </div> -->
          <!-- Kewarganegaraan -->
          <div class="mb-3">
            <label for="det_kewarganegaraan" class="form-label">Kewarganegaraan</label>
            <input type="text" class="form-control" id="det_kewarganegaraan" disabled>
          </div>
          <!-- Tempat Lahir -->
          <div class="mb-3">
            <label for="det_tmp_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="det_tmp_lahir" disabled>
          </div>
          <!-- Tanggal Lahir -->
          <div class="mb-3">
            <label for="det_tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="text" class="form-control" id="det_tgl_lahir" disabled>
          </div>
          <!-- Jenis Kelamin -->
          <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" id="jenis_kelamin" disabled>
          </div>
          <!-- Anak Ke -->
          <div class="mb-3">
            <label for="det_anak_ke" class="form-label">Anak Ke</label>
            <input type="text" class="form-control" id="det_anak_ke" disabled>
          </div>
          <!-- Jumlah Saudara/i -->
          <div class="mb-3">
            <label for="det_jml_saudara" class="form-label">Jumlah Saudara/i</label>
            <input type="text" class="form-control" id="det_jml_saudara" disabled>
          </div>
          <!-- Agama -->
          <div class="mb-3">
            <label for="det_agama" class="form-label">Agama</label>
            <input type="text" class="form-control" id="det_agama" disabled>
          </div>
          <!-- Cita-cita -->
          <div class="mb-3">
            <label for="det_cita_cita" class="form-label">Cita-cita</label>
            <input type="text" class="form-control" id="det_cita_cita" disabled>
          </div>
          <!-- Hobi -->
          <div class="mb-3">
            <label for="det_hobi" class="form-label">Hobi</label>
            <input type="text" class="form-control" id="det_hobi" disabled>
          </div>
          <!-- Email -->
          <div class="mb-3">
            <label for="det_email" class="form-label">Email</label>
            <input type="text" class="form-control" id="det_email" disabled>
          </div>
          <!-- No. Handphone -->
          <div class="mb-3">
            <label for="det_phone" class="form-label">No. Handphone</label>
            <input type="text" class="form-control" id="det_phone" disabled>
          </div>
          <!-- Yang Membiayai Sekolah -->
          <!-- <div class="mb-3">
            <label for="det_biayai" class="form-label">Yang Membiayai Sekolah</label>
            <input type="text" class="form-control" id="det_biayai" disabled>
          </div> -->
          <!-- SD -->
          <!-- <div class="mb-3">
            <label for="det_sd" class="form-label">SD</label>
            <input type="text" class="form-control" id="det_sd" disabled>
          </div> -->
          <!-- Jurusan -->
          <div class="mb-3">
            <label for="det_jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="det_jurusan" disabled>
          </div>
          <!-- SMP -->
          <!-- <div class="mb-3">
            <label for="det_smp" class="form-label">SMP</label>
            <input type="text" class="form-control" id="det_smp" disabled>
          </div> -->
          <!-- No.KIP -->
          <!-- <div class="mb-3">
            <label for="det_no_kip" class="form-label">No.KIP</label>
            <input type="text" class="form-control" id="det_no_kip" disabled>
          </div> -->
          <!-- No.KK -->
          <!-- <div class="mb-3">
            <label for="det_no_kk" class="form-label">No.KK</label>
            <input type="text" class="form-control" id="det_no_kk" disabled>
          </div> -->
          <!-- Kepala Keluarga -->
          <!-- <div class="mb-3">
            <label for="det_kepala_keluarga" class="form-label">Kepala Keluarga</label>
            <input type="text" class="form-control" id="det_kepala_keluarga" disabled>
          </div> -->

          <!-- Bawah -->
        </div>
        <!-- Personal -->
        <!-- Alamat -->
          <div>
            <h5>
              <b>
                <u>Alamat</u>
              </b>
            </h5>
         </div>

         <!-- Content -->
          <div>
            <div class="d-flex" style="gap: 20px;">
              <span style="width: 200px;">Alamat</span>
              <span>:</span>
              <textarea id="det_alamat" cols="100" disabled></textarea>
            </div>
            <!-- RT/RW -->
            <div class="d-flex mt-4" style="gap: 30px;">
              <div class="d-flex" style="gap: 20px;">
                <span style="width: 130px;">RT</span>
                <span>:</span>
                <input type="text" class="form-control" id="det_rt" style="width: 50px;" disabled>
              </div>
              <div class="d-flex" style="gap: 20px;">
                <span>RW</span>
                <span>:</span>
                <input type="text" class="form-control" id="det_rw" style="width: 50px;" disabled>
              </div>
              <!-- RT/RW -->
              <!-- Desa -->
              <div class="d-flex" style="gap: 20px;">
                <span>Desa/Kelurahan</span>
                <span>:</span>
                <input type="text" class="form-control" id="det_desa" disabled>
              </div>
              <!-- Desa -->
              <!-- Kec -->
              <div class="d-flex" style="gap: 20px;">
                <span>Kecamatan</span>
                <span>:</span>
                <input type="text" class="form-control" id="det_kecamatan" disabled>
              </div>
              <!-- Kec -->
            </div>
            <!--  -->
            <div style="display: flex; gap: 40px; flex-wrap: wrap;" class="mt-4">
              <!-- Kab/Kot -->
              <div class="d-flex" style="gap: 20px;">
                <span style="width: 210px;">Kabupaten/Kota</span>
                <span>:</span>
                <input type="text" class="form-control" id="det_kab_kot" disabled>
              </div>
              <!-- Kab/Kot -->
              <!-- Provinsi -->
              <div class="d-flex" style="gap: 20px;">
                <span>Provinsi</span>
                <span>:</span>
                <input type="text" class="form-control" id="det_provinsi" disabled>
              </div>
              <!-- Provinsi -->
              <!-- Kode Pos -->
              <div class="d-flex" style="gap: 20px;">
                <span style=" width: 210px;">Kode Pos</span>
                <span>:</span>
                <input type="text" class="form-control" id="det_kode_pos" disabled>
              </div>
              <!-- Kode Pos -->
              <!-- Transportasi -->
              <!-- <div class="d-flex" style="gap: 20px;">
                <span>Transportasi</span>
                <span>:</span>
                <input type="text" class="form-control" id="det_transport" disabled>
              </div> -->
              <!-- Transportasi -->
              <!-- Jarak Ke Sekolah -->
              <!-- <div class="d-flex" style="gap: 20px;">
                <span style="width: 210px;">Jarak Ke Sekolah</span>
                <span>:</span>
                <input type="text" class="form-control" id="det_jarak_kesekolah" disabled>
              </div> -->
              <!-- Jarak Ke Sekolah -->
              <!-- Waktu Tempuh -->
              <!-- <div class="d-flex" style="gap: 20px;">
                <span>Waktu Tempuh</span>
                <span>:</span>
                <input type="text" class="form-control" id="det_tempuh" disabled>
              </div> -->
              <!-- Waktu Tempuh -->
            </div>
            <!--  -->
          </div>
         <!-- Content -->

        <!-- Alamat -->
        <!-- ORTU -->
          <div>
              <h5>
                <b>
                  <u>Data Orang Tua</u>
                </b>
              </h5>
          </div>
          <!-- Content -->
           <h6>
            <u>Ayah</u>
           </h6>
          <div style="display: flex; gap: 20px; flex-wrap: wrap;">
          <!-- Nama Ayah -->
          <div class="mb-3">
            <label for="det_ayah" class="form-label">Nama Ayah</label>
            <input type="text" class="form-control" id="det_ayah" disabled>
          </div>
          <!-- Status Ayah -->
          <!-- <div class="mb-3">
            <label for="det_stat_ayah" class="form-label">Status Ayah</label>
            <input type="text" class="form-control" id="det_stat_ayah" disabled>
          </div> -->
          <!-- NIK -->
          <!-- <div class="mb-3">
            <label for="det_nik_ayah" class="form-label">NIK</label>
            <input type="text" class="form-control" id="det_nik_ayah" disabled>
          </div> -->
          <!-- Tempat Lahir -->
          <div class="mb-3">
            <label for="det_lahir_ayah" class="form-label">Tanggal Lahir</label>
            <input type="text" class="form-control" id="det_lahir_ayah" disabled>
          </div>
          <!-- Pendidikan -->
          <div class="mb-3">
            <label for="det_pendidikan_ayah" class="form-label">Pendidikan</label>
            <input type="text" class="form-control" id="det_pendidikan_ayah" disabled>
          </div>
          <!-- Pekerjaan -->
          <div class="mb-3">
            <label for="det_nik" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" id="det_pekerjaan_ayah" disabled>
          </div>
          <!-- Penghasilan -->
          <div class="mb-3">
            <label for="det_penghasilan_ayah" class="form-label">Penghasilan</label>
            <input type="text" class="form-control" id="det_penghasilan_ayah" disabled>
          </div>
        </div>
        <!-- IBU -->
            <h6>
              <u>Ibu</u>
            </h6>
            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
            <!-- Nama Ibu -->
            <div class="mb-3">
              <label for="det_ibu" class="form-label">Nama Ibu</label>
              <input type="text" class="form-control" id="det_ibu" disabled>
            </div>
            <!-- Status Ibu -->
            <!-- <div class="mb-3">
              <label for="det_stat_ibu" class="form-label">Status Ibu</label>
              <input type="text" class="form-control" id="det_stat_ibu" disabled>
            </div> -->
            <!-- NIK -->
            <!-- <div class="mb-3">
              <label for="det_nik_ibu" class="form-label">NIK</label>
              <input type="text" class="form-control" id="det_nik_ibu" disabled>
            </div> -->
            <!-- Tempat Lahir -->
            <div class="mb-3">
              <label for="det_lahir_ibu" class="form-label">Tanggal Lahir</label>
              <input type="text" class="form-control" id="det_lahir_ibu" disabled>
            </div>
            <!-- Pendidikan -->
            <div class="mb-3">
              <label for="det_pendidikan_ibu" class="form-label">Pendidikan</label>
              <input type="text" class="form-control" id="det_pendidikan_ibu" disabled>
            </div>
            <!-- Pekerjaan -->
            <div class="mb-3">
              <label for="det_pekerjaan_ibu" class="form-label">Pekerjaan</label>
              <input type="text" class="form-control" id="det_pekerjaan_ibu" disabled>
            </div>
            <!-- Penghasilan -->
            <div class="mb-3">
              <label for="det_penghasilan_ibu" class="form-label">Penghasilan</label>
              <input type="text" class="form-control" id="det_penghasilan_ibu" disabled>
            </div>
          </div>
        <!-- IBU -->
        <!-- IBU -->
            <h6>
              <u>Wali</u>
            </h6>
            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
            <!-- Nama Ibu -->
            <div class="mb-3">
              <label for="det_ibu" class="form-label">Nama Wali</label>
              <input type="text" class="form-control" id="name_wali" disabled>
            </div>
            <!-- NIK -->
            <div class="mb-3">
              <label for="det_nik_ibu" class="form-label">No. Wali</label>
              <input type="text" class="form-control" id="no_wali" disabled>
            </div>
            <!-- Tempat Lahir -->
            <div class="mb-3">
              <label for="det_lahir_ibu" class="form-label">Hubungan Wali</label>
              <input type="text" class="form-control" id="hubungan_wali" disabled>
            </div>
            <!-- Pendidikan -->
            <div class="mb-3">
              <label for="det_pendidikan_ibu" class="form-label">Pekerjaan Wali</label>
              <input type="text" class="form-control" id="pekerjaan_wali" disabled>
            </div>
            <!-- Penghasilan -->
            <div class="mb-3">
              <label for="det_penghasilan_ibu" class="form-label">Alamat Wali</label>
              <input type="text" class="form-control" id="alamat_wali" disabled>
            </div>
          </div>
        <!-- IBU -->
        <!-- Content -->
        <!-- ORTU -->
        <hr class="pt-1 pb-1">
        <h6>
          <b>
            <u>Berkas</u>
          </b>
        </h6>
        <div class="d-flex gap-4 justify-content-center flex-wrap">

          <!-- KK Berkas -->
          <div>
            <h6>
              <b>
                Kartu Keluarga
              </b>
            </h6>
            <div>
              <a href="#" id="det_down_kk"  title="ImageName" target="_blank">
                <img src="" alt="" id="det_kk" style="width: 200px; height: 250px;">
              </a>
            </div>
          </div>

          <!-- Akta Kelahiran Berkas -->
          <div>
            <h6>
              <b>
                Akta Kelahiran
              </b>
            </h6>
            <div >
              <a href="#" id="det_down_akta"  title="ImageName" target="_blank">
                <img src="" alt="" id="det_akta" style="width: 200px; height: 250px;">
              </a>
            </div>
          </div>

          <!-- Ijazah/SKL Berkas -->
          <div>
            <h6>
              <b>
                Ijazah/SKL
              </b>
            </h6>
            <div>
            <a href="#" id="det_down_ijazah"  title="ImageName" target="_blank">
                <img src="" alt="" id="det_ijazah" style="width: 200px; height: 250px;">
              </a>
            </div>
          </div>

          <!-- Kartu Indonesia Pintar Berkas -->
          <div>
            <h6>
              <b>
                Kartu Indonesia Pintar
              </b>
            </h6>
            <div>
              <a href="#" id="det_down_kip"  title="ImageName" target="_blank">
                <img src="" alt="" id="det_kip" style="width: 200px; height: 250px;">
              </a>
            </div>
          </div>

          <!-- Kelakuan -->
          <div>
            <h6>
              <b>
                Surat Keterangan Kelakuan Baik
              </b>
            </h6>
            <div>
              <a href="#" id="det_down_kelakuan"  title="ImageName" target="_blank">
                <img src="" alt="" id="det_kelakuan" style="width: 200px; height: 250px;">
              </a>
            </div>
          </div>

          <!-- KTP Ortu -->
          <div>
            <h6>
              <b>
                KTP Orang Tua
              </b>
            </h6>
            <div>
              <a href="#" id="det_down_ortu"  title="ImageName" target="_blank">
                <img src="" alt="" id="det_ortu" style="width: 200px; height: 250px;">
              </a>
            </div>
          </div>

          <!-- Surat Keterangan Sehat -->
          <div>
            <h6>
              <b>
                Surat Keterangan Sehat
              </b>
            </h6>
            <div>
              <a href="#" id="det_down_sehat"  title="ImageName" target="_blank">
                <img src="" alt="" id="det_sehat" style="width: 200px; height: 250px;">
              </a>
            </div>
          </div>

          <!-- Pas Foto -->
          <div>
            <h6>
              <b>
                Pas Foto
              </b>
            </h6>
            <div>
              <a href="#" id="det_down_pas_foto"  title="ImageName" target="_blank">
                <img src="" alt="" id="det_foto" style="width: 200px; height: 250px;">
              </a>
            </div>
          </div>

          <!-- Surat Keterangan Lulus -->
          <div>
            <h6>
              <b>
                Surat Keterangan Lulus
              </b>
            </h6>
            <div>
              <a href="#" id="det_down_lulus"  title="ImageName" target="_blank">
                <img src="" alt="" id="det_lulus" style="width: 200px; height: 250px;">
              </a>
            </div>
          </div>

          <div id="berkas_pindah" class="d-none">
            <h6>
              <b>
                Surat Keterangan Pindah
              </b>
            </h6>
            <div>
              <a href="#" id="det_down_pindah"  title="ImageName" target="_blank">
                <img src="" alt="" id="det_pindah" style="width: 200px; height: 250px;">
              </a>
            </div>
          </div>

          
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Detail -->
 
<input type="hidden" value="<?= BASEURL ?>" id="base_url">
<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Status Pendaftaran Siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>AdminController/editStatus" method="POST">
          <div style="">
            <div class="w-50">
              <!-- <div><span>No. Pendaftaran</span></div> -->
              <input type="text" style="border: 0; width: 0; font-size: 30px; font-weight: bold; display: none; background: transparent; widt: 100%;" name="edit_pendaftaran" id="edit_pendaftaran" >
            </div>
            <div class="w-100">
              <div><span>Status Siswa</span></div>
              <select class="form-select" aria-label="Default select example" name="edit_stat_siswa" id="edit_stat_siswa" style="width: 100%;">
                <option selected>-- Status Siswa --</option>
                <option value="0">Menunggu</option>
                <option value="1">Di terima</option>
                <option value="2">Di Tolak</option>
              </select>
            </div>
          </div>
          <input type="hidden" name="det_id_siswa" id="det_id_siswa">
          <input type="hidden" name="det_id_person" id="det_id_person">

          <div class="d-flex gap-4 justify-content-center flex-wrap">

            
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
    </div>
  </div>
</div>
<!-- Modal Edit -->

<!-- Modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body text-center">
          <div class="card-title">Information!</div>
          
          <i class="ri-question-line fs-1 pt-2 text-warning"></i>
          <h4>
            Anda Yakin Ingin Menghapus Data Ini 
          </h4>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal delete -->
<script>
  
  document.addEventListener('DOMContentLoaded', function () {
    const base_url = document.getElementById('base_url').value;

    const detailModal = document.getElementById('exampleModal');
    detailModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const siswa = JSON.parse(button.getAttribute('data-siswa'));

        console.log(siswa);

        // document.getElementById('det_pendaftaran').value = siswa.no_pendaftaran;
        document.getElementById('det_name').value = siswa.nama;
        document.getElementById('det_asal_sekolah').value = siswa.asal_sekolah;
        // document.getElementById('det_npsn_asal_sekolah').value = siswa.npsn_sekolah_asal;
        document.getElementById('det_nisn').value = siswa.nisn;
        // document.getElementById('det_nik').value = siswa.nik;

        document.getElementById('det_kewarganegaraan').value = siswa.kewarganegaraan;
        document.getElementById('det_tmp_lahir').value = siswa.tempat_lhir;
        document.getElementById('det_tgl_lahir').value = siswa.tanggal_lahir;
        document.getElementById('jenis_kelamin').value = siswa.jk;
        document.getElementById('det_anak_ke').value = siswa.anak_ke;
        document.getElementById('det_jml_saudara').value = siswa.jml_saudara;
        document.getElementById('det_agama').value = siswa.agama;
        document.getElementById('det_cita_cita').value = siswa.cita_cita;
        document.getElementById('det_hobi').value = siswa.hobi;
        document.getElementById('det_email').value = siswa.email;
        document.getElementById('det_phone').value = siswa.no_telp;
        // document.getElementById('det_biayai').value = siswa.biaya_sekolah;
        // document.getElementById('det_sd').value = siswa.sd;
        document.getElementById('det_jurusan').value = siswa.jurusan;
        // document.getElementById('det_smp').value = siswa.smp;
        // document.getElementById('det_no_kip').value = siswa.kip;
        // document.getElementById('det_no_kip').value = siswa.kip;
        // document.getElementById('det_no_kk').value = siswa.no_kk;
        // document.getElementById('det_kepala_keluarga').value = siswa.kepala_keluarga;

        document.getElementById('det_alamat').value = siswa.alamat;
        document.getElementById('det_rt').value = siswa.rt;
        document.getElementById('det_rw').value = siswa.rw;
        document.getElementById('det_desa').value = siswa.desa;
        document.getElementById('det_kecamatan').value = siswa.kecamatan;
        document.getElementById('det_kab_kot').value = siswa.kab_kota;
        document.getElementById('det_provinsi').value = siswa.provinsi;
        document.getElementById('det_kode_pos').value = siswa.kode_pos;
        // document.getElementById('det_transport').value = siswa.transportasi;
        // document.getElementById('det_jarak_kesekolah').value = siswa.jarak_sekolah;
        // document.getElementById('det_tempuh').value = siswa.waktu_tempuh;
        document.getElementById('det_ayah').value = siswa.nama_ayah;
        // document.getElementById('det_stat_ayah').value = siswa.status_ayah;
        // document.getElementById('det_nik_ayah').value = siswa.nik_ayah;
        document.getElementById('det_lahir_ayah').value = siswa.tgl_lhr_ayah;
        document.getElementById('det_pendidikan_ayah').value = siswa.pendidikan_ayah;
        document.getElementById('det_pekerjaan_ayah').value = siswa.pekerjaan_ayah;
        document.getElementById('det_penghasilan_ayah').value = siswa.penghasilan_ayah;

        // Ibu
        document.getElementById('det_ibu').value = siswa.nama_ibu;
        document.getElementById('det_lahir_ibu').value = siswa.tgl_lhr_ibu;
        document.getElementById('det_pendidikan_ibu').value = siswa.pendidikan_ibu;
        document.getElementById('det_pekerjaan_ibu').value = siswa.pekerjaan_ibu;
        document.getElementById('det_penghasilan_ibu').value = siswa.penghasilan_ibu;
        // document.getElementById('det_nik_ibu').value = siswa.nik_ibu;

        // Wali
        document.getElementById('name_wali').value = siswa.name_wali;
        document.getElementById('no_wali').value = siswa.no_wali;
        document.getElementById('hubungan_wali').value = siswa.hubungan_wali;
        // document.getElementById('det_pekerjaan_ibu').value = siswa.pekerjaan_ibu;
        document.getElementById('pekerjaan_wali').value = siswa.pekerjaan_wali;
        document.getElementById('alamat_wali').value = siswa.alamat_wali;

        
        // Download Berkas
        
        // 
        const base = base_url+"public/assets/img/akta/";
        const fl = siswa.akta; 

        document.getElementById('det_down_akta').href = base + fl;
        document.getElementById('det_down_akta').download = fl;

        // 
        const base2 = base_url+"public/assets/img/ijazah/";
        const fl2 = siswa.ijazah; 

        document.getElementById('det_down_ijazah').href = base2 + fl2;
        document.getElementById('det_down_ijazah').download = fl2;

        // 
        const base3 = base_url+"public/assets/img/kip/";
        const fl3 = siswa.kip; 

        document.getElementById('det_down_kip').href = base3 + fl3;
        document.getElementById('det_down_kip').download = fl3;

        // 
        const base4 = base_url+"public/assets/img/kelakuan/";
        const fl4 = siswa.kelakuan; 

        document.getElementById('det_down_kelakuan').href = base4 + fl4;
        document.getElementById('det_down_kelakuan').download = fl4;

        // 
        const base5 = base_url+"public/assets/img/ortu/";
        const fl5 = siswa.ortu; 

        document.getElementById('det_down_ortu').href = base5 + fl5;
        document.getElementById('det_down_ortu').download = fl5;

        // 
        const base6 = base_url+"public/assets/img/sehat/";
        const fl6 = siswa.sehat; 

        document.getElementById('det_down_sehat').href = base6 + fl6;
        document.getElementById('det_down_sehat').download = fl6;

        // 
        const base7 = base_url+"public/assets/img/pas_foto/";
        const fl7 = siswa.pas_foto; 

        document.getElementById('det_down_pas_foto').href = base7 + fl7;
        document.getElementById('det_down_pas_foto').download = fl7;

        // 
        const base8 = base_url+"public/assets/img/lulus/";
        const fl8 = siswa.lulus; 

        document.getElementById('det_down_lulus').href = base8 + fl8;
        document.getElementById('det_down_lulus').download = fl8;

        const base9 = base_url+"public/assets/img/pindah/";
        const fl9 = siswa.pindah; 

        document.getElementById('det_down_pindah').href = base9 + fl9;
        document.getElementById('det_down_pindah').download = fl9;

        // Assuming `siswa` is defined and has a property `jenis_daftar`
if (siswa.jenis_daftar === "Pindahan") {
    document.getElementById("berkas_pindah").classList.remove("d-none");
} else {
    document.getElementById("berkas_pindah").classList.add("d-none");
    console.log("Tidak ada");
}


        console.log(siswa.jenis_daftar)
        // Img
        document.getElementById('det_kk').src = base_url+"public/assets/img/kk/"+siswa.kk;
        document.getElementById('det_akta').src = base_url+"public/assets/img/akta/"+siswa.akta;
        document.getElementById('det_ijazah').src = base_url+"public/assets/img/ijazah/"+siswa.ijazah;
        document.getElementById('det_kip').src = base_url+"public/assets/img/kip/"+siswa.kip;
        document.getElementById('det_kelakuan').src = base_url+"public/assets/img/kelakuan/"+siswa.kelakuan;
        document.getElementById('det_ortu').src = base_url+"public/assets/img/ortu/"+siswa.ortu;
        document.getElementById('det_sehat').src = base_url+"public/assets/img/sehat/"+siswa.sehat;
        document.getElementById('det_foto').src = base_url+"public/assets/img/pas_foto/"+siswa.pas_foto;
        document.getElementById('det_lulus').src = base_url+"public/assets/img/lulus/"+siswa.lulus;
        document.getElementById('det_pindah').src = base_url+"public/assets/img/pindah/"+siswa.pindah;


    });

    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
      const base_url = document.getElementById('base_url').value;
        const button = event.relatedTarget;
        const siswa = JSON.parse(button.getAttribute('data-siswa'));

        document.getElementById('edit_pendaftaran').value = siswa.no_pendaftaran;
        document.getElementById('det_id_siswa').value = siswa.id_siswa;
        document.getElementById('det_id_person').value = siswa.id_person;
        document.getElementById('form_update').action = base_url;

        // document.getElementById('edit_nisn').value = siswa.nisn;
        // document.getElementById('edit_name').value = siswa.nama;
        // document.getElementById('edit_email').value = siswa.email;
        // document.getElementById('edit_no').value = siswa.no_telp;

        // Img
        // document.getElementById('edit_kk').src = base_url+"public/assets/img/kk/"+siswa.kk;
        // document.getElementById('edit_akta').src = base_url+"public/assets/img/akta/"+siswa.akta;
        // document.getElementById('edit_ijazah').src = base_url+"public/assets/img/ijazah/"+siswa.ijazah;
        // document.getElementById('edit_kip').src = base_url+"public/assets/img/kip/"+siswa.kip;
        
    });

  });

</script>