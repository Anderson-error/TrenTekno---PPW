<?php
    session_start();
    if(!isset($_SESSION['uid'])){
          header('location:../login.php');
      }
  
    include '../database.php';

    $query_select = 'select * from users where iduser = "'.$_GET['id'].'" ';
	  $run_query_select = mysqli_query($conn, $query_select);
	  $d = mysqli_fetch_object($run_query_select);

    if(!$d){
      header('location:index.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title >Trentekno - Users - Admin - Edit</title>
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
    <section id="regis" class="regis mb-5">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 text-center mb-3">
            <h1 class="page-title">Edit User</h1>
          </div>
        </div>

        <div class="form mt-2"> <!--  -->
          <form action="" method="post" role="form" class="php-regis-form">
            <div class="row">
              <div class="form-group row-md-4">
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?= $d->firstname ?>" required>
              </div>
              <div class="form-group row-md-4">
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?= $d->lastname ?>" required>
              </div>
              <div class="form-group row-md-4">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= $d->email ?>" required>
              </div>
              <div class="form-group row-md-4">
                <input type="password" class="form-control" name="pass" id="password" placeholder="Password">
              </div>
            </div>

            <div class="text-center mt-3">
              <button type="submit" onclick="window.location.href='users.php'">Back</button>
              <button type="submit" name="simpan">Save</button>
            </div>
            <?php
            if(isset($_POST['simpan'])){

              $password = '';
    
              if ($_POST['pass'] != '') {
                $password = md5($_POST['pass']);
              }else{
                $password = $d->$password;
              }
    
              //proses update data
    
              $password = '';
    
              if ($_POST['pass'] != '') {
                $password = md5($_POST['pass']);
              }else{
                $password = $d->password;
              }
    
              $query_update = 'update users set
              firstname = "'.$_POST['firstname'].'",
              lastname = "'.$_POST['lastname'].'",
              email = "'.$_POST['email'].'",
              password = "'.$password.'"
              where iduser = "'.$_GET['id'].'" ';
    
              $run_query_update = mysqli_query($conn, $query_update);
    
              if ($run_query_select) {
                echo "<script>alert('Data berhasil diupdate')</script>";
                echo "<script>window.location = 'users.php'</script>";
              }else{
                echo "Data gagal diupdate" . mysqli_error($conn);
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