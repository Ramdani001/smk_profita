
<!-- Message -->
<div class="position-absolute d-flex w-100 justify-content-center" style="margin-top: 10px;">
  <?php
    Flasher::flash();
  ?>
</div>
<!-- Message -->

<section id="login" class="d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="card w-25" style="height: 70%;">
    <div class="card-body">
      
      <h2 class="text-center">SMK PROFITA</h2>
      <form action="<?= BASEURL ?>/AdminController/Auth/login" method="post" class="p-2 mt-5">
        <div class="mb-3"> 
          <label for="emailLogin" class="form-label">Email address</label>
          <input type="email" class="form-control" id="emailLogin" name="email" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
        <label class="mt-2">Tidak Memiliki Akun? 
          <a href="#" class="text-decoration-none"  onclick="auth('register')">Daftar</a>
        </label>
      </div>
    </form>
  </div>
</section>

<section id="daftar" class="d-none justify-content-center align-items-center" style="height: 100vh;" >
  <div class="card" style="height: 80%;">
    <div class="card-body">
      <h2 class="text-center">SMK PROFITA</h2>
      <form action="<?= BASEURL ?>/AdminController/auth/register" method="post" class="p-2">
        <div class="mb-3">
          <label for="name" class="form-label">Nama Lengkap</label>
          <input type="text" name="name" id="name1" class="form-control" id="name" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="email1" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password1" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
        <label class="mt-2">Sudah Punya Akun? 
          <a href="#" class="text-decoration-none" onclick="auth('login')">Login</a>
        </label>
      </div>
    </form>
  </div>
</section>


<script>
  $(document).on('ready', function() {
    <?php
      session_start();
      if(isset($_SESSION['message'])){
        echo 'alert("'.$_SESSION['message'].'");';
      }

      if(isset($_SESSION['message']) && $_SESSION['message'] === 'Gagal dibuat!'){

        echo '<script>alert("'.$_SESSION['message'].'");</script>';
        echo "<script>
                auth('register');
              </script>";
        unset($_SESSION['message']);  
      }else{
        unset($_SESSION['message']);
      }
    ?>
  });
</script>