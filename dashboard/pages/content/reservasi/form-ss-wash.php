<?php
  session_start();
  
  if( !isset($_SESSION["login"]) ) {
    header("Location: ../../../../login.php") ;
    exit;
  }

  $ds = DIRECTORY_SEPARATOR;  
  $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  include '../../../../config/db.php'
?>

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Reservasi</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="./reservasi.php">Reservasi</a></li>
            <li class="breadcrumb-item"><a href="./reservasi-ss.php">Reservasi Self Service</a></li>
            <li class="breadcrumb-item active">Form Self Service</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

    <section class="section dashboard">
    <div class="row align-items-top">
      <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Reservasi</h5>
            <p>Pastikan Jenis Layanan sudah sesuai dengan berat pakaian anda, jika terdapat kelebihan berat maka akan diinformasikan biaya tambahan melalu surel</p>
            <!-- Form Reservasi -->
              <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Jenis Layanan</label>
                <input class="form-control" type="text" placeholder="Wash It Yourself" aria-label="Disabled input example" disabled>
              </div>
             
              <br>  
              <h4>Self Service</h4>
                  <form action="../../../../backend/proses_reservasi-wash.php" method="post">
                    <div style="margin: 10px; text-align: justify;">
                      <h5 class="card-title">Jam Reservasi</h5>

                      <input type="radio" id="jam0700" name="jam" class="btn-check" value="07:00">
                      <label for="jam0700" class="btn btn-light rounded-pill mb-2">07:00</label>

                      <input type="radio" id="jam0740" name="jam" class="btn-check" value="07.40"/>
                      <label for="jam0740" class="btn btn-light rounded-pill mb-2">07:40</label>

                      <input type="radio" id="jam0820" name="jam" class="btn-check" value="08.20"/>
                      <label for="jam0820" class="btn btn-light rounded-pill mb-2">08:20</label>

                      <input type="radio" id="jam0900" name="jam" class="btn-check" value="09.00"/>
                      <label for="jam0900" class="btn btn-light rounded-pill mb-2">09:00</label>

                      <input type="radio" id="jam0940" name="jam" class="btn-check" value="09.40"/>
                      <label for="jam0940" class="btn btn-light rounded-pill mb-2">09:40</label>

                      <input type="radio" id="jam1020" name="jam" class="btn-check" value="10:20"/>
                      <label for="jam1020" class="btn btn-light rounded-pill mb-2">10:20</label>

                      <input type="radio" id="jam1100" name="jam" class="btn-check" value="11:00"/>
                      <label for="jam1100" class="btn btn-light rounded-pill mb-2">11:00</label>

                      <input type="radio" id="jam1140" name="jam" class="btn-check" value="11:40"/>
                      <label for="jam1140" class="btn btn-light rounded-pill mb-2">11:40</label>

                      <input type="radio" id="jam1220" name="jam" class="btn-check" value="12:20"/>
                      <label for="jam1220" class="btn btn-light rounded-pill mb-2">12:20</label>

                      <input type="radio" id="jam1300" name="jam" class="btn-check" value="13:00"/>
                      <label for="jam1300" class="btn btn-light rounded-pill mb-2">13:00</label>

                      <input type="radio" id="jam1340" name="jam" class="btn-check" value="13:40"/>
                      <label for="jam1340" class="btn btn-light rounded-pill mb-2">13:40</label>

                      <input type="radio" id="jam1420" name="jam" class="btn-check" value="14:20"/>
                      <label for="jam1420" class="btn btn-light rounded-pill mb-2">14:20</label>

                      <input type="radio" id="jam1500" name="jam" class="btn-check" value="15:00"/>
                      <label for="jam1500" class="btn btn-light rounded-pill mb-2">15:00</label>

                      <input type="radio" id="jam1540" name="jam" class="btn-check" value="15:40"/>
                      <label for="jam1540" class="btn btn-light rounded-pill mb-2">15:40</label>

                      <input type="radio" id="jam1620" name="jam" class="btn-check" value="16:20"/>
                      <label for="jam1620" class="btn btn-light rounded-pill mb-2">16:20</label>

                      <input type="radio" id="jam1700" name="jam" class="btn-check" value="17:00"/>
                      <label for="jam1700" class="btn btn-light rounded-pill mb-2">17:00</label>

                      <input type="radio" id="jam1740" name="jam" class="btn-check" value="17:40"/>
                      <label for="jam1740" class="btn btn-light rounded-pill mb-2">17:40</label>

                      <input type="radio" id="jam1820" name="jam" class="btn-check" value="18:20"/>
                      <label for="jam1820" class="btn btn-light rounded-pill mb-2">18:20</label>

                      <input type="radio" id="jam1900" name="jam" class="btn-check" value="19:00"/>
                      <label for="jam1900" class="btn btn-light rounded-pill mb-2">19:00</label>

                      <input type="radio" id="jam1940" name="jam" class="btn-check" value="19:40"/>
                      <label for="jam1940" class="btn btn-light rounded-pill mb-2">19:40</label>

                      <input type="radio" id="jam2020" name="jam" class="btn-check" value="20:20"/>
                      <label for="jam2020" class="btn btn-light rounded-pill mb-2">20:20</label>

                      <input type="radio" id="jam2100" name="jam" class="btn-check" value="21:00"/>
                      <label for="jam2100" class="btn btn-light rounded-pill mb-2">21:00</label>
                      </br>
                      </br>
                      <input type="submit" class="btn btn-primary" value="reservasi">
                    </div>
                  </form> 
                </div>
              </div>
          </div>
        </div>
      </div>

      
    </div>
        <style>
          .card input[type="radio"] {
              display: none;
          }

          .card input[type="radio"] + label.btn {
              background-color:#f4dbd4;
              color: #ffffff;
          }

          .card input[type="radio"]:checked + label.btn {
              background-color: #d4edf4;
              color: #000000;
          }
        </style>
        </div>
      </div>
      </div>
    </div>
    </section>
  </main>
    <!-- End #main -->

<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>