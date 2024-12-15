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
            <span>Profesor Teknologi</span>
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
      <a class="nav-link collapsed  bg-primary text-light " href="<?= BASEURL ?>ViewAdminController/user">
        <i class="bi bi-person"></i>
        <span>User</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= BASEURL ?>ViewAdminController/siswaDaftar">
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
        <h5 class="card-title">Data User</h5>
        
        <table class="table table-hover">
          <thead>
              <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Tipe Akun</th>
                  <th class="text-center">Aksi</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($data["list_person"] as $key => $value) { ?>
                  <tr>
                      <td class="text-center"><?= $key + 1 ?></td>
                      <td class="text-center"><?= $value["email"] ?></td>
                      <td class="text-center">
                          <?php
                            if($value["tipe"] > 1){
                              echo "Siswa";
                            }else{
                              echo "Administrator";
                            }
                          ?>
                      </td> 
                      <td class="text-center">
                          <div class="d-flex gap-3 justify-content-center">
                            <button class="btn btn-danger text-light" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $value['id_person'] ?>">
                              <i class="ri-delete-bin-2-line"></i>
                            </button>
                          </div>
                      </td>
                  </tr>
              <?php } ?>
          </tbody>
      </table>

       
      </div>
    </div>

   <!-- Grafik -->

</main>
<!-- Content -->
</div>


<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Edit Siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <!-- Nama Lengkap -->
          <div class="mb-3">
              <label for="det_name" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="det_name" placeholder="Rizkan Ramdani" disabled>
            </div>
            <!-- Email -->
            <div class="mb-3">
              <label for="det_email" class="form-label">Email address</label>
              <input type="text" class="form-control" id="det_email" placeholder="Rizkan Ramdani" disabled>
            </div>
            <!-- No.Telp -->
            <div class="mb-3">
              <label for="det_no" class="form-label">Aksi</label>
              <input type="text" class="form-control" id="det_no" placeholder="Rizkan Ramdani" disabled>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
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
        <a type="button" class="btn btn-danger" id="deleteConfirmBtn">Hapus</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal delete -->

<script>
  
  document.addEventListener('DOMContentLoaded', function () {

    const deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      const idPerson = button.getAttribute('data-id');
      const deleteConfirmBtn = deleteModal.querySelector('#deleteConfirmBtn');
      const baseUrl = "<?= BASEURL ?>AdminController/deleteUser/";
  
      deleteConfirmBtn.href = baseUrl + idPerson;
    });

  });

</script>