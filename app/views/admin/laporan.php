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
      <a class="nav-link collapsed" href="<?= BASEURL ?>ViewAdminController/user">
        <i class="bi bi-person"></i>
        <span>User</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed " href="<?= BASEURL ?>ViewAdminController/siswaDaftar">
        <i class="ri-graduation-cap-fill"></i>
        <span>Siswa Daftar</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed bg-primary text-light" href="<?= BASEURL ?>ViewAdminController/laporan">
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
        <h5 class="card-title">Jurusan Yang Diminati</h5>

        <!-- Pie Chart -->
        <canvas id="pieChart" style="max-height: 400px;"></canvas>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
          document.addEventListener("DOMContentLoaded", () => {

            $.ajax({
                url: '<?= BASEURL ?>ViewAdminController/chart',
                success: function(data) {

                  console.log('Success:', data);
                    new Chart(document.querySelector('#pieChart'), {
                          type: 'pie',
                          data: {
                            labels: data.labels,
                            datasets: [{
                              label: [data.labels.akuntansi],
                              data: data.data,
                              backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)',
                                'rgb(255, 205, 200)'
                              ],
                              hoverOffset: 4
                            }]
                          }
                        });

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle error here
                    console.error('Error:', textStatus, errorThrown);
                }
            });
            // 
          });
        </script>
        <!-- End Pie CHart -->

      </div>
    </div>
   <!-- Grafik -->
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between items-align-center">
          <h5 class="card-title">Data Siswa </h5>

          <div class="d-flex gap-4 h-100">
            
            <button id="export-excel" class="btn btn-success mt-3" style="height: 10%;">
              <i class="ri-file-excel-2-fill"></i>
            </button>

            <button id="export-pdf" class="btn btn-primary mt-3" style="height: 10%;">
              <i class="ri-printer-fill"></i>
            </button>

          </div>

        </div>
        <div class="p-2 ">
          <form action="<?= BASEURL ?>ViewAdminController/reportFilter" method="POST" class="d-flex" style="justify-content: space-between;">
            <div class="d-flex">
              <div class="pe-3">
                <span>Filter Data</span>
                <select id="filter_data" name="filter_data" class="form-select" aria-label="Default select example">
                  <option value="getAll" selected>All</option>
                  <option value="Reguler">Reguler</option>
                  <option value="Pindahan">Pindahan</option>
                </select>
              </div>
              <div>
                <span>Status Daftar</span>
                <select id="filter_status" name="filter_status" class="form-select" aria-label="Default select example">
                  <option value="getAll" selected>All</option>
                  <option value="1">Diterima</option>
                  <option value="2">Ditolak</option>
                  <option value="0">Menunggu</option>
                </select>
              </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
          </form>
        </div>
        <table class="table table-hover">
          <thead>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Asal Sekolah</th>
            <th class="text-center">No.Telepon</th>
            <th class="text-center">Status</th>
          </thead>
          <tbody>
            <?php foreach ($data["list_siswa"] as $key => $value) { ?>
              <tr>
                <td class="text-center">
                  <img style="width: 30px; height: 30px; border-radius: 100%;" src="<?= BASEURL ?>public/assets/img/profile/contoh.jpeg" alt="foto">
                </td>
                <td class="text-center"><?= $value["nama"] ?></td>
                <td class="text-center"><?= $value["asal_sekolah"] ?></td>
                <td class="text-center"><?= $value["no_telp"] ?></td>
                <!-- <td class="text-center">
                  <button class="btn btn-danger"><?= $value["st"] ?></button>
                </td> -->
                <td class="text-center">
                  <button class="btn 
                  <?php
                      if($value["st"] == 0 ){
                        echo "btn-secondary";
                      }else if($value['st'] == 1){
                        echo "btn-success";
                      }else{
                        echo "btn-danger";
                      }
                    ?>
                  ">
                    <?php
                      if($value["st"] == 0 ){
                        echo "Menunggu";
                      }else if($value['st'] == 1){
                        echo "Diterima";
                      }else{
                        echo "Ditolak";
                      }
                    ?>
                  </button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>



</main>
<!-- Content -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {

    document.getElementById('export-pdf').addEventListener('click', function () {
      const { jsPDF } = window.jspdf;

      html2canvas(document.querySelector('table')).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const doc = new jsPDF({
          orientation: 'portrait',
          unit: 'mm',
          format: 'a4'
        });

        const imgProps= doc.getImageProperties(imgData);
        const pdfWidth = doc.internal.pageSize.getWidth();
        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

        doc.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
        doc.save('Laporan Pendaftaran.pdf');
      });
    });

    document.getElementById('export-excel').addEventListener('click', function () {
      let table = document.querySelector('table');
      let workbook = XLSX.utils.table_to_book(table, {sheet: "Sheet1"});
      XLSX.writeFile(workbook, 'Laporan Pendaftaran.xlsx');
    });

  });
</script>