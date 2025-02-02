<?php
  session_start();
  
  if( !isset($_SESSION["login"]) ) {
    header("Location: ../../../../login.php") ;
    exit;
  }
  $ds = DIRECTORY_SEPARATOR;  
  $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  include '../../../../config/db.php';
?>


    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Profil</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Profil</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../../../assets/img/profile_empty.png" alt="Profile" class="rounded-circle">
              <h2><?php echo $_SESSION['name']; ?></h2>
              <h3></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card" style="height:450px">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Ringkasan</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ubah Password</button>
                </li>

              </ul>
              
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  

                  <h5 class="card-title">Detail Profil</h5>
                  <?php
                  $iduser = $_SESSION['id'];
                  $query = mysqli_query($db_connect, "SELECT * FROM tbl_users
                                                      WHERE id_user = '$iduser'");
                    $nomor = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                        <div class="col-lg-9 col-md-8"><?php echo $row['name'] ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">No Handphone</div>
                        <div class="col-lg-9 col-md-8"><?php echo $row['no_whatsapp'] ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8"><?php echo $row['email'] ?></div>
                      </div>
                  <?php  
                  }
                  ?>



                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                <?php
                $iduser = $_SESSION['id'];
                  $query = mysqli_query($db_connect, "SELECT * FROM tbl_users
                                                      WHERE id_user = '$iduser'");
                    $nomor = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                       <!-- Profile Edit Form -->
                  <form method="post" action="../../../../backend/proses_edit_profil.php">
                    <!-- <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Gambar profil</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/profile-img.jpg" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div> -->
                    <input type="hidden" name="id_user" value="<?php echo $row["id_user"] ?>">
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" value="<?php echo $row['name']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">No Handphone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="no_whatsapp" type="text" class="form-control" id="Phone" value="<?php echo $row['no_whatsapp']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?php echo $row['email']; ?>">
                      </div>
                    </div>
                   
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Ganti Perubahan</button>
                    </div>
                  </form><!-- End Profile Edit Form -->
                  <?php
                    }
                    ?>

                </div>

              </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="post" action="../../../../backend/proses_ubah_sandi.php">
                  <input type="hidden" name="username" value="<?php echo $_SESSION['name'] ?>">
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">kata sandi saat ini</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pass_lama" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">kata sandi baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pass_baru" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Masukkan kembali Kata Sandi Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="konfirmasi_pass" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Ganti kata sandi</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
      </section>
    </main>
    <!-- End #main -->

<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>
