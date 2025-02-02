<?php
  session_start();
  $ds = DIRECTORY_SEPARATOR;  
  $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  include '../../../../config/db.php';
?>


    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Edit Planggan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="./pelanggan.php">Pelanggan</a></li>
            <li class="breadcrumb-item active">Edit Pelanggan</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section dashboard">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <?php
            $id = $_GET["id"];
            $sql = "SELECT * FROM tbl_users WHERE id_user=$id";
  
            $result = $db_connect->query($sql);
  
            if ($result === FALSE) {
              die("Error: " . $db_connect->error);
            }
  
            if ($row = $result->fetch_assoc()) {
            ?>
            <h5 class="card-title">Edit Pelanggan</h5>
            <p></p>
              <form method="post" action="../../../../backend/proses_edit_pelanggan.php">
                <input type="hidden" name="id_user" value="<?php echo $row["id_user"] ?>">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ID User</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nomor" value="<?php echo $row['id_user']; ?>" disabled>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Role</label>
                  <div class="col-sm-10">
                    <select class="form-select" name = "role" aria-label="Default select example">
                      <option selected>-- Pilih Jenis Role --</option>
                      <option value="user" <?php if ($row['role'] == "user") echo "selected"?>>User</option>
                      <option value="admin" <?php if ($row['role'] == "admin") echo "selected"?>>Admin</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">No WhatsApp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_whatsapp" value="<?php echo $row['no_whatsapp']; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->
          </div>
          <?php
            }
            ?>

        </div>
      </div>
    </section>
  </main>
    <!-- End #main -->

<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>
