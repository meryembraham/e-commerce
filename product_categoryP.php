<?php
include "connexion.php";
$id     = $_GET['id'];
if ( empty(session_id()) ) session_start();
?>
<!doctype html>
<html lang="en">

<!-- Head -->

<head>
    <!-- Page Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="mask-icon" href="./assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./assets/css/libs.bundle.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/theme.bundle.css" />

    <!-- Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
        /**
          * Reinstate scrolling for non-JS clients
          */
        .simplebar-content-wrapper {
            overflow: auto;
        }
        </style>
    </noscript>

    <!-- Page Title -->
    <title>Alpine | Bootstrap 5 Ecommerce HTML Template</title>

</head>

<body class="">

    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom mx-0 p-0 flex-column  border-0">
        <?php include "navbar.php"; ?></nav>
    </nav>
    <!-- / Navbar-->
    <!-- / Navbar-->

    <!-- Main Section-->
    <section class="mt-0 ">

        <!-- Category Top Banner -->
        <div class="py-6 bg-img-cover bg-dark bg-overlay-gradient-dark position-relative overflow-hidden mb-4 bg-pos-center-center"
            style="background-image: url(./assets/images/banners/banner-1.jpg);">
            <div class="container position-relative z-index-20" data-aos="fade-right" data-aos-delay="300">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item breadcrumb-light"><a href="#">Home</a></li>
                        <li class="breadcrumb-item breadcrumb-light"><a href="#">Activities</a></li>
                        <li class="breadcrumb-item active breadcrumb-light" aria-current="page">Clothing</li>
                    </ol>
                </nav>
                <h1 class="fw-bold display-6 mb-4 text-white">Latest Arrivals (121)</h1>
                <div class="col-12 col-md-6">
                    <p class="lead text-white mb-0">
                        Move, stretch, jump and hike in our latest waterproof arrivals. We've got you covered for your
                        hike or climbing sessions, from Gortex jackets to lightweight waterproof pants. Discover our
                        latest range of outdoor clothing.
                    </p>
                </div>
            </div>
        </div>
        <!-- Category Top Banner -->

        <div class="container">

            <div class="row">


                <!-- Category Products-->
                <div class="col-12 col-lg-12">

                    <!-- Top Toolbar-->
                    <div class="mb-4 d-md-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start align-items-center flex-grow-1 mb-4 mb-md-0">
                            <small class="d-inline-block fw-bolder">Filtered by:</small>
                            <ul class="list-unstyled d-inline-block mb-0 ms-2">
                                <li class="bg-light py-1 fw-bolder px-2 cursor-pointer d-inline-block me-1 small">Type:
                                    Slip On <i class="ri-close-circle-line align-bottom ms-1"></i></li>
                            </ul>
                            <span
                                class="fw-bolder text-muted-hover text-decoration-underline ms-2 cursor-pointer small">Clear
                                All</span>
                        </div>
                        <div class="d-flex align-items-center flex-column flex-md-row">
                            <!-- Filter Trigger-->
                            <button
                                class="btn bg-light p-3 d-flex d-lg-none align-items-center fs-xs fw-bold text-uppercase w-100 mb-2 mb-md-0 w-md-auto"
                                type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilters"
                                aria-controls="offcanvasFilters">
                                <i class="ri-equalizer-line me-2"></i> Filters
                            </button>
                            <!-- / Filter Trigger-->
                            <div class="dropdown ms-md-2 lh-1 p-3 bg-light w-100 mb-2 mb-md-0 w-md-auto">
                                <p class="fs-xs fw-bold text-uppercase text-muted-hover p-0 m-0" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Sort By <i
                                        class="ri-arrow-drop-down-line ri-lg align-bottom"></i></p>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item fs-xs fw-bold text-uppercase text-muted-hover mb-2"
                                            href="#">Price: Hi Low</a></li>
                                    <li><a class="dropdown-item fs-xs fw-bold text-uppercase text-muted-hover mb-2"
                                            href="#">Price: Low Hi</a></li>
                                    <li><a class="dropdown-item fs-xs fw-bold text-uppercase text-muted-hover mb-2"
                                            href="#">Name</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- / Top Toolbar-->

                    <!-- Products-->
                    <div class="row g-4 mb-5">
                        <?php

include "connexion.php";

// 3- Prépararyion de la requete
$sql = "SELECT * FROM `category` WHERE id_c=$id ";

//echo $sql;
// 4- exécution de la requete
$query = mysqli_query($conn, $sql);




while ($array = mysqli_fetch_array($query)) {
    $libelle_c        = $array['libelle_c'];
    $id_c           = $array['id_c'];
    $description    = $array['description'];
    $id_parent      = $array['id_parent'];
    
    $sql_s = "SELECT * FROM `category` WHERE id_parent=$id_c";
    $query = mysqli_query($conn, $sql_s);
    while ($array = mysqli_fetch_array($query)) {
        $libelle_s        = $array['libelle_c'];
        $id_s           = $array['id_c'];
        $description    = $array['description'];
        $id_parent      = $array['id_parent'];
        $sql_p = "SELECT * FROM `produit` WHERE id_c= $id_s ; ";


// 4- exécution de la requete
$query = mysqli_query($conn, $sql_p);



while ($array = mysqli_fetch_array($query)) {
    $id_p         = $array['id_p'];
    $libelle           = $array['libelle_p'];
    $description    = $array['description_p'];
    $prix        = $array['prix'];
    $qte        = $array['qte_p'];
    $id_cat       = $array['id_c'];
    $id_mar    = $array['id_b'];
    $sql_img = "SELECT * FROM `img_produits` WHERE id_p=$id_p  LIMIT 1";

    //echo $sql;
    // 4- exécution de la requete
    $query_img = mysqli_query($conn, $sql_img);



    $array_img = mysqli_fetch_array($query_img);
    $id_img         = $array_img['id_img'];
    $libelle_img    = $array_img['libelle_img'];


?>
                        <div class="col-12 col-sm-6 col-md-4">
                            <!-- Card Product-->
                            <div class="card position-relative h-100 card-listing hover-trigger">
                                <div class="card-header">
                                    <picture class="position-relative overflow-hidden d-block bg-light">
                                        <img class="w-100 img-fluid position-relative z-index-10" title=""
                                            src="Admin/uploads/<?php echo $libelle_img; ?>" alt="">
                                    </picture>

                                    <div class="card-actions">
                                        <span
                                            class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
                                            Add</span>
                                        <div class="d-flex justify-content-center align-items-center flex-wrap mt-3">
                                            <button class="btn btn-outline-dark btn-sm mx-2">S</button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">M</button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">L</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 text-center">
                                    <div class="d-flex justify-content-center align-items-center mx-auto mb-1">
                                        <!-- Review Stars Small-->
                                        <div class="rating position-relative d-table">
                                            <div class="position-absolute stars" style="width: 90%">
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                            </div>
                                            <div class="stars">
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            </div>
                                        </div> <span class="small fw-bolder ms-2 text-muted"> 4.7 (456)</span>
                                    </div>
                                    <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                        href="product.php?id=<?php echo $id_p; ?>"><?php echo $libelle; ?></a>
                                    <p class="fw-bolder m-0 mt-2"><?php echo $prix; ?></p>
                                </div>
                            </div>
                            <!--/ Card Product-->
                        </div>





                        <?php                }}      } ?>

                    </div>

                    <!-- / Products-->

                    <!-- Pagiation-->
                    <!-- Pagination-->
                    <nav class="border-top mt-5 pt-5 d-flex justify-content-between align-items-center"
                        aria-label="Category Pagination">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#"><i
                                        class="ri-arrow-left-line align-bottom"></i> Prev</a></li>
                        </ul>
                        <ul class="pagination">
                            <li class="page-item active mx-1"><a class="page-link" href="#">1</a></li>
                            <li class="page-item mx-1"><a class="page-link" href="#">2</a></li>
                            <li class="page-item mx-1"><a class="page-link" href="#">3</a></li>
                        </ul>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Next <i
                                        class="ri-arrow-right-line align-bottom"></i></a></li>
                        </ul>
                    </nav> <!-- / Pagination-->

                    <!-- Related Categories-->
                    <div class="border-top mt-5 pt-5">
                        <p class="lead fw-bolder">Related Categories</p>
                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                            <a class="btn btn-sm btn-outline-dark rounded-pill me-2 mb-2 mb-md-0 text-white-hover"
                                href="#">Hiking
                                Shoes</a>
                            <a class="btn btn-sm btn-outline-dark rounded-pill me-2 mb-2 mb-md-0 text-white-hover"
                                href="#">Waterproof Trousers</a>
                            <a class="btn btn-sm btn-outline-dark rounded-pill me-2 mb-2 mb-md-0 text-white-hover"
                                href="#">Hiking
                                Shirts</a>
                            <a class="btn btn-sm btn-outline-dark rounded-pill me-2 mb-2 mb-md-0 text-white-hover"
                                href="#">Jackets</a>
                            <a class="btn btn-sm btn-outline-dark rounded-pill me-2 mb-2 mb-md-0 text-white-hover"
                                href="#">Gilets</a>
                            <a class="btn btn-sm btn-outline-dark rounded-pill me-2 mb-2 mb-md-0 text-white-hover"
                                href="#">Hiking
                                Socks</a>
                            <a class="btn btn-sm btn-outline-dark rounded-pill me-2 mb-2 mb-md-0 text-white-hover"
                                href="#">Rugsacks</a>
                        </div>
                    </div>
                    <!-- Related Categories-->

                </div>
                <!-- / Category Products-->

            </div>
        </div>

    </section>
    <!-- / Main Section-->

    <!-- Footer -->
    <!-- Footer-->
    <footer class="bg-dark mt-10  ">

        <!-- Footer socials-->
        <div class="bg-light py-4">
            <div class="container d-flex justify-content-center align-items-center py-2">
                <p class="lead fw-bolder mb-0 lh-1">Find us online</p>
                <ul class="list-unstyled d-flex justify-content-start align-items-center mb-0 ms-3 lh-1">
                    <li class="mx-1 mb-0 lh-1"><a
                            class="text-muted text-decoration-none opacity-75-hover transition-all lh-1" href="#"><i
                                class="ri-instagram-fill ri-xl lh-1"></i></a></li>
                    <li class="mx-1 mb-0 lh-1"><a
                            class="text-muted text-decoration-none opacity-75-hover transition-all lh-1" href="#"><i
                                class="ri-facebook-fill ri-xl lh-1"></i></a></li>
                    <li class="mx-1 mb-0 lh-1"><a
                            class="text-muted text-decoration-none opacity-75-hover transition-all lh-1" href="#"><i
                                class="ri-twitter-fill ri-xl lh-1"></i></a></li>
                    <li class="mx-1 mb-0 lh-1"><a
                            class="text-muted text-decoration-none opacity-75-hover transition-all lh-1" href="#"><i
                                class="ri-snapchat-fill ri-xl lh-1"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- / Footer socials-->

        <!-- Instagram Display-->
        <div class="container pt-8">
            <div class="row g-2">
                <div class="d-none d-md-block col-md-4" data-aos="fade-in" data-aos-delay="150">
                    <picture>
                        <img class="img-fluid" src="./assets/images/instagram/instagram-1.jpg"
                            alt="Bootstrap 5 Template by Pixel Rocket" data-zoomable>
                    </picture>
                </div>
                <div class="col-12 col-md-8" data-aos="fade-in" data-aos-delay="300">
                    <div class="row g-2">
                        <div class="col-3">
                            <picture>
                                <img class="img-fluid" src="./assets/images/instagram/instagram-2.jpg"
                                    alt="Bootstrap 5 Template by Pixel Rocket" data-zoomable>
                            </picture>
                        </div>
                        <div class="col-3">
                            <picture>
                                <img class="img-fluid" src="./assets/images/instagram/instagram-3.jpg"
                                    alt="Bootstrap 5 Template by Pixel Rocket" data-zoomable>
                            </picture>
                        </div>
                        <div class="col-3">
                            <picture>
                                <img class="img-fluid" src="./assets/images/instagram/instagram-4.jpg"
                                    alt="Bootstrap 5 Template by Pixel Rocket" data-zoomable>
                            </picture>
                        </div>
                        <div class="col-3">
                            <picture>
                                <img class="img-fluid" src="./assets/images/instagram/instagram-5.jpg"
                                    alt="Bootstrap 5 Template by Pixel Rocket" data-zoomable>
                            </picture>
                        </div>
                        <div class="col-3">
                            <picture>
                                <img class="img-fluid" src="./assets/images/instagram/instagram-6.jpg"
                                    alt="Bootstrap 5 Template by Pixel Rocket" data-zoomable>
                            </picture>
                        </div>
                        <div class="col-3">
                            <picture>
                                <img class="img-fluid" src="./assets/images/instagram/instagram-7.jpg"
                                    alt="Bootstrap 5 Template by Pixel Rocket" data-zoomable>
                            </picture>
                        </div>
                        <div class="col-3">
                            <picture>
                                <img class="img-fluid" src="./assets/images/instagram/instagram-8.jpg"
                                    alt="Bootstrap 5 Template by Pixel Rocket" data-zoomable>
                            </picture>
                        </div>
                        <div class="col-3">
                            <picture>
                                <img class="img-fluid" src="./assets/images/instagram/instagram-9.jpg"
                                    alt="Bootstrap 5 Template by Pixel Rocket" data-zoomable>
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <p class="text-muted m-0">Follow us on Instragram <span class="text-lowercase">@Alpine</span></p>
                <a class="text-link-border fw-bolder m-0 text-white" href="#">More On Instagram <i
                        class="ri-external-link-line align-bottom"></i></a>
            </div>
        </div>
        <!-- Instagram Display-->

        <!-- Info Bar-->
        <div class="container mt-7">
            <div class="row">

                <!-- Info box-->
                <div class="col-12 col-md-4 mb-3 mb-xxl-0 text-white" data-aos="fade-left">
                    <div
                        class="border-white-opacity border-2 p-4 d-flex flex-column flex-lg-row justify-content-start align-items-start h-100">
                        <i class="ri-questionnaire-line ri-lg mb-3 mb-lg-0"></i>
                        <div class="ms-lg-4">
                            <p class="mb-1 lh-1 fw-bold">Customer Services</p>
                            <small class="text-muted"><a class="text-muted" href="#">Click here</a> to chat with our
                                support team</small>
                        </div>
                    </div>
                </div>
                <!-- / Info box-->

                <!-- Info box-->
                <div class="col-12 col-md-4 mb-3 mb-xxl-0 text-white" data-aos="fade-left" data-aos-delay="250">
                    <div
                        class="border-white-opacity border-2 p-4 d-flex flex-column flex-lg-row justify-content-start align-items-start h-100">
                        <i class="ri-truck-line ri-lg mb-3 mb-lg-0"></i>
                        <div class="ms-lg-4">
                            <p class="mb-1 lh-1 fw-bold">Free Delivery</p>
                            <small class="text-muted">Free standard delivery on all orders over $100</small>
                        </div>
                    </div>
                </div>
                <!-- / Info box-->

                <!-- Info box-->
                <div class="col-12 col-md-4 mb-3 mb-xxl-0 text-white" data-aos="fade-left" data-aos-delay="500">
                    <div
                        class="border-white-opacity border-2 p-4 d-flex flex-column flex-lg-row justify-content-start align-items-start h-100">
                        <i class="ri-repeat-line ri-lg mb-3 mb-lg-0"></i>
                        <div class="ms-lg-4">
                            <p class="mb-1 lh-1 fw-bold">Returns</p>
                            <small class="text-muted">30 day money-back returns if you change your mind</small>
                        </div>
                    </div>
                </div>
                <!-- / Info box-->

            </div>
        </div>
        <!-- / Info Bar-->

        <!-- Menus & Newsletter-->
        <div class="border-top-white-opacity py-7 mt-7 text-white">
            <div class="container" data-aos="fade-in">
                <div class="row my-4 flex-wrap">

                    <!-- Footer Nav-->
                    <nav class="col-6 col-md mb-4 mb-md-0">
                        <h6 class="mb-4 fw-bolder fs-6">Shop</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a
                                    class="text-decoration-none text-white opacity-75 opacity-25-hover transition-all"
                                    href="./category.html">Menswear</a></li>
                            <li class="mb-2"><a
                                    class="text-decoration-none text-white opacity-75 opacity-25-hover transition-all"
                                    href="./category.html">Womenswear</a></li>
                            <li class="mb-2"><a
                                    class="text-decoration-none text-white opacity-75 opacity-25-hover transition-all"
                                    href="./category.html">Kidswear</a></li>
                            <li class="mb-2"><a
                                    class="text-decoration-none text-white opacity-75 opacity-25-hover transition-all"
                                    href="./category.html">New Arrivals</a></li>
                        </ul>
                    </nav>
                    <!-- /Footer Nav-->

                    <!-- Footer Nav-->
                    <nav class="col-6 col-md mb-4 mb-md-0">
                        <h6 class="mb-4 fw-bolder fs-6">Company</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a
                                    class="text-decoration-none text-white opacity-75 opacity-25-hover transition-all"
                                    href="#">About Us</a></li>
                            <li class="mb-2"><a
                                    class="text-decoration-none text-white opacity-75 opacity-25-hover transition-all"
                                    href="#">Our Blog</a></li>
                            <li class="mb-2"><a
                                    class="text-decoration-none text-white opacity-75 opacity-25-hover transition-all"
                                    href="#">FAQs</a></li>
                            <li class="mb-2"><a
                                    class="text-decoration-none text-white opacity-75 opacity-25-hover transition-all"
                                    href="#">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- /Footer Nav-->

                    <!-- Footer Nav-->
                    <nav class="d-none d-md-block col-md">
                        <h6 class="mb-4 fw-bolder fs-6">Navigation</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a
                                    class="text-decoration-none text-white opacity-75 opacity-25-hover transition-all"
                                    href="#">Register</a></li>
                            <li class="mb-2"><a
                                    class="text-decoration-none text-white opacity-75 opacity-25-hover transition-all"
                                    href="#">Cart</a></li>
                            <li class="mb-2"><a
                                    class="text-decoration-none text-white opacity-75 opacity-25-hover transition-all"
                                    href="#">Checkout</a></li>
                            <li class="mb-2"><a
                                    class="text-decoration-none text-white opacity-75 opacity-25-hover transition-all"
                                    href="#">Account</a></li>
                        </ul>
                    </nav>
                    <!-- /Footer Nav-->

                    <!-- Footer Contact-->
                    <div class="col-12 col-md-5">
                        <h6 class="mb-4 fw-bolder fs-6">Join Our Newsletter</h6>
                        <p class="opacity-75">Sign up to our newsletter and we'll email you a code worth 15%
                            off your first order. By subscribing to our mailing list you agree to our terms and
                            conditions.</p>
                        <form
                            class="bg-white d-flex justify-content-start align-items-center border-dark-focus-within transition-all mt-4">
                            <div class="input-group m-0">
                                <input type="text" class="form-control d-flex flex-grow-1 border-0 bg-transparent py-3"
                                    placeholder="Enter your email" aria-label="Enter your email">
                                <span class="input-group-text bg-transparent border-0"><i
                                        class="ri-arrow-right-line align-middle"></i></span>
                            </div>
                        </form>
                    </div>
                    <!-- /Footer Contact-->

                </div>
                <div
                    class="border-top-white-opacity justify-content-between flex-column flex-md-row align-items-center d-flex pt-6 mt-6 px-0">
                    <p class="small opacity-75">&copy; 2021 Alpine All Rights Reserved. Template by <a
                            class="text-white" href="https://www.pixelrocket.store">Pixel Rocket</a></p>
                    <nav>
                        <ul class="list-unstyled">
                            <li class="d-inline-block me-1 bg-white rounded px-2 pt-1"><i
                                    class="pi pi-paypal pi-sm"></i>
                            </li>
                            <li class="d-inline-block me-1 bg-white rounded px-2 pt-1"><i
                                    class="pi pi-mastercard pi-sm"></i>
                            </li>
                            <li class="d-inline-block me-1 bg-white rounded px-2 pt-1"><i
                                    class="pi pi-american-express pi-sm"></i></li>
                            <li class="d-inline-block bg-white rounded px-2 pt-1"><i class="pi pi-visa pi-sm"></i></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Menus & Newsletter-->

    </footer>
    <!-- / Footer-->
    <!-- Offcanvas Imports-->
    <!-- Cart Offcanvas-->
    <div class="offcanvas offcanvas-end d-none" tabindex="-1" id="offcanvasCart">
        <div class="offcanvas-header d-flex align-items-center">
            <h5 class="offcanvas-title" id="offcanvasCartLabel">Your Cart</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="d-flex flex-column justify-content-between w-100 h-100">
                <div>

                    <div class="mt-4 mb-5">
                        <p class="mb-2 fs-6"><i class="ri-truck-line align-bottom me-2"></i> <span
                                class="fw-bolder">$22</span> away
                            from free delivery</p>
                        <div class="progress f-h-1">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <!-- Cart Product-->
                    <div class="row mx-0 pb-4 mb-4 border-bottom">
                        <div class="col-3">
                            <picture class="d-block bg-light">
                                <img class="img-fluid" src="./assets/images/products/product-1.jpg"
                                    alt="Bootstrap 5 Template by Pixel Rocket">
                            </picture>
                        </div>
                        <div class="col-9">
                            <div>
                                <h6 class="justify-content-between d-flex align-items-start mb-2">
                                    Mens StormBreaker Jacket
                                    <i class="ri-close-line"></i>
                                </h6>
                                <small class="d-block text-muted fw-bolder">Size: Medium</small>
                                <small class="d-block text-muted fw-bolder">Qty: 1</small>
                            </div>
                            <p class="fw-bolder text-end m-0">$85.00</p>
                        </div>
                    </div>

                    <!-- Cart Product-->
                    <div class="row mx-0 pb-4 mb-4 border-bottom">
                        <div class="col-3">
                            <picture class="d-block bg-light">
                                <img class="img-fluid" src="./assets/images/products/product-2.jpg"
                                    alt="Bootstrap 5 Template by Pixel Rocket">
                            </picture>
                        </div>
                        <div class="col-9">
                            <div>
                                <h6 class="justify-content-between d-flex align-items-start mb-2">
                                    Mens Torrent Terrain Jacket
                                    <i class="ri-close-line"></i>
                                </h6>
                                <small class="d-block text-muted fw-bolder">Size: Medium</small>
                                <small class="d-block text-muted fw-bolder">Qty: 1</small>
                            </div>
                            <p class="fw-bolder text-end m-0">$99.00</p>
                        </div>
                    </div>

                </div>
                <div class="border-top pt-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="m-0 fw-bolder">Subtotal</p>
                        <p class="m-0 fw-bolder">$233.33</p>
                    </div>
                    <a href="./checkout.html"
                        class="btn btn-orange btn-orange-chunky mt-5 mb-2 d-block text-center">Checkout</a>
                    <a href="./cart.html"
                        class="btn btn-dark fw-bolder d-block text-center transition-all opacity-50-hover">View Cart</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Filters Offcanvas-->
    <div class="offcanvas offcanvas-end d-none" tabindex="-1" id="offcanvasFilters">
        <div class="offcanvas-header d-flex align-items-center">
            <h5 class="offcanvas-title" id="offcanvasFiltersLabel">Category Filters</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="d-flex flex-column justify-content-between w-100 h-100">

                <!-- Filters-->
                <div>
                    <!-- Filter Category -->
                    <div class="mb-4">
                        <h2 class="mb-4 fs-6 mt-2 fw-bolder">Jacket Category</h2>
                        <nav>
                            <ul class="list-unstyled list-default-text">
                                <li class="mb-2"><a
                                        class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i>
                                            Waterproof Jackets</span> <span class="text-muted ms-4">(21)</span></a>
                                </li>
                                <li class="mb-2"><a
                                        class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Down
                                            Jackets</span> <span class="text-muted ms-4">(13)</span></a>
                                </li>
                                <li class="mb-2"><a
                                        class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i>
                                            Windproof Jackets</span> <span class="text-muted ms-4">(18)</span></a>
                                </li>
                                <li class="mb-2"><a
                                        class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Hiking
                                            Jackets</span> <span class="text-muted ms-4">(25)</span></a>
                                </li>
                                <li class="mb-2"><a
                                        class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Climbing
                                            Jackets</span> <span class="text-muted ms-4">(11)</span></a>
                                </li>
                                <li class="mb-2"><a
                                        class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Trekking
                                            Jackets</span> <span class="text-muted ms-4">(19)</span></a>
                                </li>
                                <li class="mb-2"><a
                                        class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Allround
                                            Jackets</span> <span class="text-muted ms-4">(24)</span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- / Filter Category-->

                    <!-- Price Filter -->
                    <div class="py-4 widget-filter widget-filter-price border-top">
                        <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                            data-bs-toggle="collapse" href="#filter-modal-price" role="button" aria-expanded="false"
                            aria-controls="filter-modal-price">
                            Price
                        </a>
                        <div id="filter-modal-price" class="collapse">
                            <div class="filter-price mt-6"></div>
                            <div class="d-flex justify-content-between align-items-center mt-7">
                                <div class="input-group mb-0 me-2 border">
                                    <span class="input-group-text bg-transparent fs-7 p-2 text-muted border-0">$</span>
                                    <input type="number" min="00" max="1000" step="1"
                                        class="filter-min form-control-sm border flex-grow-1 text-muted border-0">
                                </div>
                                <div class="input-group mb-0 ms-2 border">
                                    <span class="input-group-text bg-transparent fs-7 p-2 text-muted border-0">$</span>
                                    <input type="number" min="00" max="1000" step="1"
                                        class="filter-max form-control-sm flex-grow-1 text-muted border-0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Price Filter -->

                    <!-- Brands Filter -->
                    <div class="py-4 widget-filter border-top">
                        <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                            data-bs-toggle="collapse" href="#filter-modal-brands" role="button" aria-expanded="false"
                            aria-controls="filter-modal-brands">
                            Brands
                        </a>
                        <div id="filter-modal-brands" class="collapse">
                            <div class="input-group my-3 py-1">
                                <input type="text" class="form-control py-2 filter-search rounded" placeholder="Search"
                                    aria-label="Search">
                                <span
                                    class="input-group-text bg-transparent p-2 position-absolute top-2 end-0 border-0 z-index-20"><i
                                        class="ri-search-2-line text-muted"></i></span>
                            </div>
                            <div class="simplebar-wrapper">
                                <div class="filter-options" data-pixr-simplebar>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-0">
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-0">Adidas <span
                                                class="text-muted">(21)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-1">
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-1">Asics <span
                                                class="text-muted">(13)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-2">
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-2">Canterbury <span
                                                class="text-muted">(18)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-3">
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-3">Converse <span
                                                class="text-muted">(25)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-4">
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-4">Donnay <span
                                                class="text-muted">(11)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-5">
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-5">Nike <span
                                                class="text-muted">(19)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-6">
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-6">Millet <span
                                                class="text-muted">(24)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-7">
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-7">Puma <span
                                                class="text-muted">(11)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-8">
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-8">Reebok <span
                                                class="text-muted">(19)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-9">
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-9">Under Armour <span
                                                class="text-muted">(24)</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Brands Filter -->

                    <!-- Type Filter -->
                    <div class="py-4 widget-filter border-top">
                        <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                            data-bs-toggle="collapse" href="#filter-modal-type" role="button" aria-expanded="false"
                            aria-controls="filter-modal-type">
                            Type
                        </a>
                        <div id="filter-modal-type" class="collapse">
                            <div class="input-group my-3 py-1">
                                <input type="text" class="form-control py-2 filter-search rounded" placeholder="Search"
                                    aria-label="Search">
                                <span
                                    class="input-group-text bg-transparent p-2 position-absolute top-2 end-0 border-0 z-index-20"><i
                                        class="ri-search-2-line text-muted"></i></span>
                            </div>
                            <div class="filter-options">
                                <div class="form-group form-check mb-0">
                                    <input type="checkbox" class="form-check-input" id="filter-type-modal-0">
                                    <label
                                        class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                        for="filter-type-modal-0">Slip On </label>
                                </div>
                                <div class="form-group form-check mb-0">
                                    <input type="checkbox" class="form-check-input" id="filter-type-modal-1">
                                    <label
                                        class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                        for="filter-type-modal-1">Strap Up </label>
                                </div>
                                <div class="form-group form-check mb-0">
                                    <input type="checkbox" class="form-check-input" id="filter-type-modal-2">
                                    <label
                                        class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                        for="filter-type-modal-2">Zip Up </label>
                                </div>
                                <div class="form-group form-check mb-0">
                                    <input type="checkbox" class="form-check-input" id="filter-type-modal-3">
                                    <label
                                        class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                        for="filter-type-modal-3">Toggle </label>
                                </div>
                                <div class="form-group form-check mb-0">
                                    <input type="checkbox" class="form-check-input" id="filter-type-modal-4">
                                    <label
                                        class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                        for="filter-type-modal-4">Auto </label>
                                </div>
                                <div class="form-group form-check mb-0">
                                    <input type="checkbox" class="form-check-input" id="filter-type-modal-5">
                                    <label
                                        class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                        for="filter-type-modal-5">Click </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Type Filter -->

                    <!-- Sizes Filter -->
                    <div class="py-4 widget-filter border-top">
                        <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                            data-bs-toggle="collapse" href="#filter-modal-sizes" role="button" aria-expanded="false"
                            aria-controls="filter-modal-sizes">
                            Sizes
                        </a>
                        <div id="filter-modal-sizes" class="collapse">
                            <div class="filter-options mt-3">
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-0">
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-0">6.5</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-1">
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-1">7</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-2">
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-2">7.5</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-3">
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-3">8</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-4">
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-4">8.5</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-5">
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-5">9</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-6">
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-6">9.5</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-7">
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-7">10</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-8">
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-8">10.5</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-9">
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-9">11</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-10">
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-10">11.5</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Sizes Filter -->

                    <!-- Colour Filter -->
                    <div class="py-4 widget-filter border-top">
                        <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                            data-bs-toggle="collapse" href="#filter-modal-colour" role="button" aria-expanded="false"
                            aria-controls="filter-modal-colour">
                            Colour
                        </a>
                        <div id="filter-modal-colour" class="collapse">
                            <div class="filter-options mt-3">
                                <div
                                    class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-primary">
                                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-0">
                                    <label class="form-check-label" for="filter-colours-modal-0"></label>
                                </div>
                                <div
                                    class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-success">
                                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-1">
                                    <label class="form-check-label" for="filter-colours-modal-1"></label>
                                </div>
                                <div
                                    class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-danger">
                                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-2">
                                    <label class="form-check-label" for="filter-colours-modal-2"></label>
                                </div>
                                <div
                                    class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-info">
                                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-3">
                                    <label class="form-check-label" for="filter-colours-modal-3"></label>
                                </div>
                                <div
                                    class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-warning">
                                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-4">
                                    <label class="form-check-label" for="filter-colours-modal-4"></label>
                                </div>
                                <div
                                    class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-dark">
                                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-5">
                                    <label class="form-check-label" for="filter-colours-modal-5"></label>
                                </div>
                                <div
                                    class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-secondary">
                                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-6">
                                    <label class="form-check-label" for="filter-colours-modal-6"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Colour Filter -->
                </div>
                <!-- / Filters-->

                <!-- Filter Button-->
                <div class="border-top pt-3">
                    <a href="#" class="btn btn-dark mt-2 d-block hover-lift-sm hover-boxshadow">Done</a>
                </div>
                <!-- /Filter Button-->
            </div>
        </div>
    </div>
    <!-- Review Offcanvas-->
    <div class="offcanvas offcanvas-end d-none" tabindex="-1" id="offcanvasReview">
        <div class="offcanvas-header d-flex align-items-center">
            <h5 class="offcanvas-title" id="offcanvasReviewLabel">Leave A Review</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Review Form -->
            <form>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewName">Your Name</label>
                    <input type="text" class="form-control" id="formReviewName" placeholder="Your Name">
                </div>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewEmail">Your Email</label>
                    <input type="text" class="form-control" id="formReviewEmail" placeholder="Your Email">
                </div>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewTitle">Your Review Title</label>
                    <input type="text" class="form-control" id="formReviewTitle" placeholder="Review Title">
                </div>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewReview">Your Review</label>
                    <textarea class="form-control" name="formReviewReview" id="formReviewReview" cols="30" rows="5"
                        placeholder="Your Review"></textarea>
                </div>
                <button type="submit" class="btn btn-dark hover-lift hover-boxshadow">Submit Review</button>
            </form>
            <!-- / Review Form-->
        </div>
    </div>
    <!-- Search Overlay-->
    <section class="search-overlay">
        <div class="container search-container">
            <div class="py-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="lead lh-1 m-0 fw-bold">What are you looking for?</p>
                    <button class="btn btn-light btn-close-search"><i class="ri-close-circle-line align-bottom"></i>
                        Close search</button>
                </div>
                <form>
                    <input type="text" class="form-control" id="searchForm"
                        placeholder="Search by product or category name...">
                </form>
                <div class="my-5">
                    <p class="lead fw-bolder">2 results found for <span class="fw-bold">"Waterproof Jacket"</span></p>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
                            <!-- Card Product-->
                            <div class="card position-relative h-100 card-listing hover-trigger">
                                <div class="card-header">
                                    <picture class="position-relative overflow-hidden d-block bg-light">
                                        <img class="w-100 img-fluid position-relative z-index-10" title=""
                                            src="./assets/images/products/product-1.jpg"
                                            alt="Bootstrap 5 Template by Pixel Rocket">
                                    </picture>
                                    <div class="card-actions">
                                        <span
                                            class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
                                            Add</span>
                                        <div class="d-flex justify-content-center align-items-center flex-wrap mt-3">
                                            <button class="btn btn-outline-dark btn-sm mx-2">S</button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">M</button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">L</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 text-center">
                                    <div class="d-flex justify-content-center align-items-center mx-auto mb-1">
                                        <!-- Review Stars Small-->
                                        <div class="rating position-relative d-table">
                                            <div class="position-absolute stars" style="width: 80%">
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                            </div>
                                            <div class="stars">
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            </div>
                                        </div> <span class="small fw-bolder ms-2 text-muted"> 4.2 (123)</span>
                                    </div>
                                    <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                        href="./product.html">Mens Pennie II Waterproof Jacket</a>
                                    <p class="fw-bolder m-0 mt-2">$325.66</p>
                                </div>
                            </div>
                            <!--/ Card Product-->
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <!-- Card Product-->
                            <div class="card position-relative h-100 card-listing hover-trigger">
                                <div class="card-header">
                                    <picture class="position-relative overflow-hidden d-block bg-light">
                                        <img class="w-100 img-fluid position-relative z-index-10" title=""
                                            src="./assets/images/products/product-2.jpg"
                                            alt="Bootstrap 5 Template by Pixel Rocket">
                                    </picture>
                                    <div class="card-actions">
                                        <span
                                            class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
                                            Add</span>
                                        <div class="d-flex justify-content-center align-items-center flex-wrap mt-3">
                                            <button class="btn btn-outline-dark btn-sm mx-2">S</button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">M</button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">L</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 text-center">
                                    <div class="d-flex justify-content-center align-items-center mx-auto mb-1">
                                        <!-- Review Stars Small-->
                                        <div class="rating position-relative d-table">
                                            <div class="position-absolute stars" style="width: 70%">
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                                <i class="ri-star-fill text-dark mr-1"></i>
                                            </div>
                                            <div class="stars">
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            </div>
                                        </div> <span class="small fw-bolder ms-2 text-muted"> 4.5 (1289)</span>
                                    </div>
                                    <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                        href="./product.html">Mens Storm Waterproof Jacket</a>
                                    <p class="fw-bolder m-0 mt-2">$499.99</p>
                                </div>
                            </div>
                            <!--/ Card Product-->
                        </div>
                    </div>
                </div>

                <div class="bg-dark p-4 text-white">
                    <p class="lead m-0">Didn't find what you are looking for? <a
                            class="transition-all opacity-50-hover text-white text-link-border border-white pb-1 border-2"
                            href="#">Send us a message.</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>