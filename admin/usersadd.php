<?php
    session_start();
    if(!isset($_SESSION['uid'])){
          header('location:../login.php');
      }
  
    include '../database.php';

    $query_select = 'select * from users';
    $run_query_select = mysqli_query($conn, $query_select);
    
    //cek parameter delete
    if (isset($_GET['delete'])){
    
        //proses delete
        $query_delete = 'delete from users where iduser = "'.$_GET['delete'].'" ';
        $run_query_delete = mysqli_query($conn, $query_delete);
    
        if($run_query_delete){
            echo "<script>window.location = 'users.php'</script>";
        }else{
            echo "<script>alert('Data gagal dihapus')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Trentekno - Users - Admin - Add</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="../assets/css/variables.css" rel="stylesheet">
  <link href="../assets/css/main.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <h1 style="color: red;">TrenTekno</h1>
      </a>
    </div>
  </header><!-- End Header -->

  <main id="main">
    <section id="login" class="login mb-5">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 text-center mb-3">
            <h1 class="page-title">Register User</h1>
          </div>
        </div>

        <div class="form mt-2"> <!--  -->
          <form action="" method="post" role="form" class="php-login-form">
            <div class="row">
              <div class="form-group row-md-4">
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required>
              </div>
              <div class="form-group row-md-4">
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
              </div>
              <div class="form-group row-md-4">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
              </div>
              <div class="form-group row-md-4">
                <input type="password" class="form-control" name="pass" id="password" placeholder="Password" required>
              </div>
            </div>

            <div class="text-center mt-3">
              <button type="submit" onclick="window.location.href = 'users.php'" name="kembali">Back</button>
              <button type="submit" name="simpan">Save</button>
            </div>
            <?php
            if(isset($_POST['simpan'])){

              //proses insert data
              $query_insert = 'insert into users (firstname, lastname, email, password) value
              ("'.$_POST['firstname'].'",
              "'.$_POST['lastname'].'",
              "'.$_POST['email'].'",
              "'.md5($_POST['pass']).'")';

              $run_query_insert = mysqli_query($conn, $query_insert);

              if($run_query_insert){
                echo "Data berhasil disimpan";
                echo "<script>window.location = 'users.php'</script>";
              }else{
                echo "Data gagal disimpan";
              }

            }
			  ?>
          </form>
          
        </div><!-- End Form -->
      </div>
    </section>
  </main><!-- End #main -->

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>