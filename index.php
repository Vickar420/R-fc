<?php
require_once 'config/config.php';

if (isset($_SESSION["user"])) {
  $id = $_SESSION["user"];
  $result = query("SELECT * FROM users WHERE id_user = $id")[0];
  if ($result['roles'] == 'ADMIN') {
    header("Location: admin");
  } elseif ($result["roles"] == 'OWNER') {
    header("Location: owner");
  }
}

if (isset($_SESSION["driver"])) {
  header("Location: driver");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Ranisa Chicken</title>
  <link rel="shortcut icon" href="images/logo ranisa.webp">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="assets/style/main.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
  <script src="https://kit.fontawesome.com/7e039003e6.js" crossorigin="anonymous"></script>

  <style>
    .store-adventeges {
      padding: 40px;
      background-color: #F7F7E8;
    }

    #features {
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .lomba h1 {
      text-align: center;
      margin-bottom: 50px;
      color: rgb(26, 26, 26);
    }

    .feature-row {
      width: 80%;
      margin: auto;
      display: flex;
      align-items: center;
      justify-content: space-around;
      flex-wrap: wrap;
    }

    .feature-col {
      flex-basis: 25%;
      text-align: center;
    }

    .feature-col img {
      width: 80%;
      border-radius: 50%;
    }

    .feature-col h4 {
      margin-bottom: 15px;
      font-size: 20px;
      font-weight: 400;
      margin-top: 20px;
      font-weight: 600;
    }

    .feature-btn {
      margin: 40px;
      display: flex;
      align-items: flex-end;
      justify-content: center;
    }

    .feature-btn .line {
      text-align: right;
      display: inline-block;
      margin-right: 25px;
    }

    .line-1 {
      width: 15px;
      height: 15px;
      background: #ffa200;
      display: inline-block;
    }

    .line-2 {
      width: 80px;
      height: 1px;
      background: #ffa200;
      display: inline-block;
    }

    .line-3 {
      width: 60px;
      height: 1px;
      background: #ffa200;
      display: inline-block;
    }

    .line {
      line-height: 8px;
    }

    .square {
      height: 12px;
      width: 12px;
      display: inline-block;
      background: #ffa200;
      margin: 15px 0;
    }

    #about,
    #offer {
      padding: 100px 0;
      display: flex;
      align-items: center;
      flex-wrap: wrap;
    }

    .about-left-col {
      flex-basis: 50%;
    }

    .map {
      margin-left: 70px;
    }

    .fa-location-dot {
      color: rgb(237, 154, 0);
    }

    .about-left-col img {
      width: 80%;
      margin-left: 70px;
    }

    .about-right-col {
      flex-basis: 50%;
      text-align: right;
    }

    .about-text {
      max-width: 500px;
      margin-right: 100px;
      display: inline-block;
    }

    .about-text h2 {
      margin: 50px 0 10px;
      font-size: 24px;
      font-style: italic;
    }

    .about-text h3 {
      font-size: 16px;
      font-style: italic;
      color: #797979;
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
      <a href="index.php" class="navbar-brand" title="home">
        <img src="images/logo ranisa.webp" class="w-25" alt="logo" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collpase navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="products.php" class="nav-link">All Products</a>
          </li>
          <li class="nav-item">
            <a href="about.php" class="nav-link">About</a>
          </li>
          <?php
          if (!isset($_SESSION["login"]) && !isset($_SESSION["user"])) : ?>
            <li class="nav-item">
              <a href="register.php" class="nav-link">Sign Up</a>
            </li>
            <li class="nav-item">
              <a href="login.php" class="btn btn-success nav-link px-4 text-black" style=" 
  background: transparent;
  outline: none;
  border: 2px solid #ff9900;
  font-weight: bold;
  cursor: pointer;">Sign In</a>
            </li>
          <?php else : ?>
            <li class="nav-item dropdown">
              <?php
              $id = $_SESSION["user"];
              $user = query("SELECT * FROM users WHERE id_user = $id")[0];
              ?>
              <a href="#" class="nav-link font-weight-bold" id="navbarDropdown" role="button" data-toggle="dropdown">
                <!-- <img
                      src="../assets/images/user_pc.png"
                      alt="profile"
                      class="rounded-circle mr-2 profile-picture"
                    /> -->
                Hi, <?= $user["name"]; ?>
              </a>
              <div class="dropdown-menu">
                <?php if ($user["roles"] == 'ADMIN') : ?>
                  <a href="admin" class="dropdown-item">
                    Dashboard
                  </a>
                <?php else : ?>
                  <a href="user" class="dropdown-item">
                    Dashboard
                  </a>
                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item">logout</a>
              </div>
            </li>
            <li class="nav-item">
              <?php
              $id = $user["id_user"];
              $carts = rows("SELECT * FROM carts WHERE user_id = $id");
              ?>
              <?php if ($carts >= 1) : ?>
                <a href="cart.php" class="nav-link d-inline-block">
                  <img src="assets/images/shopping-cart-filled.svg" alt="cart-empty" />
                  <div class="cart-badge"><?= $carts; ?></div>
                </a>
              <?php else : ?>
                <a href="cart.php" class="nav-link d-inline-block">
                  <img src="assets/images/icon-cart-empty.svg" alt="cart-empty" />
                </a>
              <?php endif; ?>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->

  <!-- page content -->
  <div class="page-content page-home" data-aos="zoom-in">
    <section class="store-landing">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md-5">
            <img src="images/ayambg.png" class="w-100" alt="" />
          </div>
          <div class="col-md-6">
            <h1 style="font-weight: bold; margin-bottom: 15px;">Ranisa Chicken</h1>
            <span class="square"></span>
            <p>
            <p class="store-subtitle-landing" style="line-height: 28px; color: rgb(146, 146, 146);">
              Fried Chicken paling lezat yang Terbuat Dari 100%
              Ayam Segar Dan Pilihan Diracik Dengan Bumbu
              Rempah Kualitas Terbaik Membuat Citarasa
              Yang Khas, Enak, Gurih Dan Lezat
              <br><br>
            <p>Berbagai menu yang disediakan, Tentunya akan membuat lidah dan perut anda terpuaskan</p>
            </p>
            <a href="products.php" class="btn btn-success px-4 py-2 mt-4" style="color: #000; 
  background: transparent;
  outline: none;
  border: 2px solid #ff9900;
  font-weight: bold;
  cursor: pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 20 20">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
              </svg> Pesan Sekarang</a>
            <div><br></div>
            <div class="line" style="line-height: 8px;">
              <span class="line-1"></span><br>
              <span class="line-2"></span><br>
              <span class="line-3"></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Pilihan Menu -->

    <section id="features">

      <div class="lomba">
        <h1>Pilih dan Nikmati</h1>
      </div>
      <div class="feature-row">
        <div class="feature-col">
          <img src="images/ayampolos.JPG">
          <h4>Ranisa Original</h4>
          <p>Fried Chicken gurih nan lezat, lebih gurih dari KFC</p>
        </div>
        <div class="feature-col">
          <img src="images/ayamsadas.JPG">
          <h4>Ranisa Saus Pedas</h4>
          <p>Ayam Goreng dengan Saus Pedas yang akan memanjakan lidah</p>
        </div>
        <div class="feature-col">
          <img src="images/ayamsauskeju.JPG">
          <h4>Ranisa Saus Keju</h4>
          <p>Saus Keju yang selalu membuat mata tertuju</p>
        </div>
        <div class="feature-col">
          <img src="images/ayamgeprek.JPG">
          <h4>Ranisa Sambel Geprek</h4>
          <p>Ayam Goreng dengan Sambel Geprek. Sumpah ini enak bgt!</p>
        </div>
      </div>

      <div class="feature-btn">
        <div class="line">
          <span class="line-1"></span><br>
          <span class="line-2"></span><br>
          <span class="line-3"></span>
        </div>
        <a href="products.php" class="btn btn-success px-4 py-2 mt-4" style="color: #000; 
  background: transparent;
  outline: none;
  border: 2px solid #ff9900;
  font-weight: bold;
  cursor: pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 20 20">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
          </svg> Pesan Sekarang</a>
      </div>
    </section>

    <!-- kenapa -->
    <section class="store-adventeges" style="margin-top: 100px;" id="adventeges">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="title-adventeges" style="text-align: center; font-size: 24px; font-weight: 600; margin-bottom: 20px;">Kelebihan Belanja Disini</div>
          </div>
        </div>
        <div class="row">
          <div class="col-6 col-md-4" data-aos="fade-down" data-aos-delay="100">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row justify-content-center align-content-center">
                  <div class="col-10 col-md-4">
                    <div class="adventeges-thumbnail mb-lg-0 mb-2">
                      <img src="assets/images/fast.svg" class="w-100" alt="" />
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="adventege-description text-center text-lg-left">
                      <div class="title-text">Fast Delivery</div>
                      <div class="subtitle-text">
                        Tanpa perlu mengunjungi toko, pesanan Anda akan diantarkan
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4" data-aos="fade-down" data-aos-delay="200">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row justify-content-center align-content-center">
                  <div class="col-10 col-md-4">
                    <div class="adventeges-thumbnail mb-lg-0 mb-2">
                      <img src="assets/images/money.svg" class="w-100" alt="" />
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="adventege-description text-center text-lg-left">
                      <div class="title-text">More Efficient</div>
                      <div class="subtitle-text">
                        Harga yang murah dan biaya ongkir yang minimum
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4" data-aos="fade-down" data-aos-delay="300">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row justify-content-center align-content-center">
                  <div class="col-10 col-md-4">
                    <div class="adventeges-thumbnail mb-lg-0 mb-2">
                      <img src="assets/images/env.svg" class="w-100" alt="" />
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="adventege-description text-center text-lg-left">
                      <div class="title-text">Environment Friendly</div>
                      <div class="subtitle-text">
                        Limbah dapur akan kami jadikan pupuk dan Kurir kami sudah menggunakan kendaraan listrik
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="store-products-kilogram" style="margin-top: 100px;">
      <div class="container">
        <div class="row">
          <div class="col-12" data-aos="fade-up">
            <h5 style="font-weight: 600; margin-bottom: 15px;">New Products</h5>
          </div>
        </div>
        <div class="row">
          <?php
          $products = query("SELECT * FROM products LIMIT 8");
          $iteration = 0;
          ?>

          <?php foreach ($products as $product) : ?>
            <?php
            $idProduct = $product["id_product"];
            $galleries = query("SELECT * FROM products_galleries INNER JOIN products ON products_galleries.product_id = products.id_product WHERE products_galleries.product_id = $idProduct");
            ?>
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="<?= $iteration += 100; ?>">
              <?php if ($product["stock"] > 0) : ?>
                <a href="details.php?id=<?= $idProduct; ?>" class="component-products d-block">
                  <div class="products-thumbnail">
                    <div class="products-image" style="background-image: url('assets/images/<?= $galleries[0]["photos"] ?>')">
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="products-text"><?= $product["product_name"]; ?></div>

                      <div class="products-price">Rp. <?= number_format($product["price"]); ?></div>
                    </div>
                    <div>
                      <div class="text-muted">1 Porsi</div>
                    </div>
                  </div>
                </a>
              <?php else : ?>
                <div class="component-products d-block">
                  <div class="products-thumbnail position-relative">
                    <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center bg-dark" style="opacity: .7;">
                      <div class="text-decoration-none font-weight-bold text-white" style="font-weight: 500;">SOLD OUT</div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="products-text"><?= $product["product_name"]; ?></div>

                      <div class="products-price">Rp. <?= number_format($product["price"]); ?></div>
                    </div>
                    <div>
                      <div class="text-muted">1 Porsi</div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div>
  <!-- akhir slider -->

  <!--About-->

  <section id="about">
    <div class="about-left-col">
      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.3416552493006!2d106.82499752916263!3d-6.346549066826944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eda8097df455%3A0x36f336047ce13f25!2sFRIED%20CHICKEN%20RANISA%20PRATAMA!5e0!3m2!1sid!2sid!4v1674407366426!5m2!1sid!2sid" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

      </div>
    </div>
    <div class="about-right-col">
      <div class="about-text">
        <h1>Lokasi Outlet <i class="fa-solid fa-location-dot fa-bounce"></i></h1>

        <span class="square"></span>
        <p>Jl. Srengseng Sawah, Raya Kel No.5 F <br>
          RT.7/RW.6, Srengseng Sawah, Kec. Jagakarsa, <br>Kota Jakarta Selatan,
          Daerah Khusus Ibukota Jakarta 12640</p><br><br>

        <div class="line">
          <span class="line-1"></span><br>
          <span class="line-2"></span><br>
          <span class="line-3"></span>
        </div>
        <br>
        <iframe src="https://www.google.com/maps/embed?pb=!3m2!1sid!2sid!4v1674408480654!5m2!1sid!2sid!6m8!1m7!1s9FGMr4TjXBW_Vfyk2iKDKw!2m2!1d-6.346508665472957!2d106.8256239702447!3f206.95970227178674!4f-14.882871552842431!5f0.7820865974627469" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


      </div>
    </div>
  </section>

  <!-- footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <p class="pt-4 pb-2">
            &copy; 2023 Copyright by Ranisa Jagakarsa. All Rights Reserved.
          </p>
          <p>ranisajagakarsa@gmail.com</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- akhir footer -->

  <!-- Bootstrap core JavaScript -->
  <script src="assets/vendor/jquery/jquery.slim.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="assets/js/navbar-scroll.js"></script>
</body>

</html>