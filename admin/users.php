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

  <title>Trentekno - Users - Admin</title>
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
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

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

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li class="dropdown"><a href="category.html"><span>Actions</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="users.php">User</a></li>
              <li><a href="#">Blog</a></li>
              <!-- <li><a href="#">Drop Down 3</a></li> -->
              <!-- <li><a href="#">Drop Down 4</a></li> -->
            </ul>
          </li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        
      </nav><!-- .navbar -->

      <div class="position-relative">
        <!-- <button type="submit" name="logout">Logout</button> -->
        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->
      </div>
    </div>
  </header><!-- End Header -->

  <main id="main">
    <div class="content mt-5">
    <a href="usersadd.php" class="btn" title="Add admin"><i class="bi bi-plus-circle-fill"></i></a>
    <table class="table">
        <thead>
            <tr>
                <th width="45">NO</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th width="100">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php if(mysqli_num_rows($run_query_select) > 0){ ?>

            <?php $nomor =1;?>

            <?php while ($row = mysqli_fetch_array($run_query_select)){ ?>

            <tr>
                <td align="center"><?= $nomor++ ?></td>
                <td><?= $row['firstname']?></td>
                <td><?= $row['email']?></td>
                <td align="center">
                    <a href="usersedit.php?id=<?= $row['iduser'] ?>" class="btn" title="Edit data"><i class="bi bi-pencil-square"></i></a>
                    <a href="?delete=<?= $row['iduser'] ?>" class="btn" onclick="return confirm('Yakin ingin hapus ?')" title="Hapus data"><i class="bi bi-trash-fill"></i></a>
                </td>
            </tr>
            <?php }}else{ ?>

            <tr>
                <td colspan="4">Tidak ada data</td>
            </tr>

            <?php } ?>
        </tbody>
    </table>
    </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="footer-legal">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            <div class="copyright">
              © Copyright <strong><span>TrenTekno</span></strong>. All Rights Reserved
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>