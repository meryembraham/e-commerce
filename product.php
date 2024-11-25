<?php
include "connexion.php";
include_once("fonction_panier.php");

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Check if the session is not already started
    if (empty(session_id())) {
        session_start();
    }

    // Insert review
    if (isset($_POST['valid'])) {
        $id_p = $id;
        $libelle = $_POST['libelle'];
        $description = $_POST['description'];
        $id_u = $_SESSION['id_u'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];

        $sql_r = "INSERT INTO `reviews`(`id_p`, `id_u`, `libelle_t`, `description_t`, `nom_u`, `email_u`) 
        VALUES ('$id_p','$id_u','$libelle','$description','$nom','$email')";
        echo $sql_r;
        // Execute the query
        $query = mysqli_query($conn, $sql_r);

        // Redirect to the product page with the corresponding ID
        header("location:product.php?id=$id");
    }
}
if (isset($_GET['idsupp'])) {
    $isup = $_GET['idsupp'];
    supprimerArticle($isup);
    header('location:product.php?id=$id');
}
if (isset($_POST['btnm'])) {

    echo "eeeee" . $qtt;
    $qtt = $_POST["quant"];
    $idm = $_POST["idm"];
    modifierQTeArticle($idm, $qtt);
    header('location:product.php?id=$id');
}
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
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom mx-0 p-0 flex-column  ">
        <?php include "navbar.php"; ?>
    </nav>
    <!-- / Navbar-->
    <!-- / Navbar-->

    <!-- Main Section-->
    <section class="mt-5 ">
        <!-- Page Content Goes Here -->

        <!-- Product Top-->
        <section class="container">

            <!-- Breadcrumbs-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Activities</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Clothing</li>
                </ol>
            </nav> <!-- /Breadcrumbs-->

            <div class="row g-5">
                <?php

                // 3- Prépararyion de la requete liste produits
                $sql = "SELECT * FROM `produit` WHERE id_p=$id; ";

                //echo $sql;
                // 4- exécution de la requete
                $query = mysqli_query($conn, $sql);

                // 5-Vérification
                $num = mysqli_num_rows($query);


                while ($array = mysqli_fetch_array($query)) {
                    $id_p         = $array['id_p'];
                    $libelle           = $array['libelle_p'];
                    $description    = $array['description_p'];
                    $prix        = $array['prix'];
                    $qte        = $array['qte_p'];
                    $id_cat       = $array['id_c'];
                    $id_mar    = $array['id_b'];
                    // 3- Prépararyion de la requete brand
                    $sql_b = "SELECT * FROM `brands` WHERE id_b=$id_mar;";

                    $exec_b = mysqli_query($conn, $sql_b);
                    $array_b      = mysqli_fetch_array($exec_b);
                    $libelle_br     = $array_b['libelle_b'];
                    $logo     = $array_b['logo'];
                ?>
                <!-- Images Section-->
                <div class="col-12 col-lg-7">
                    <div class="row g-1">
                        <div class="swiper-container gallery-thumbs-vertical col-2 pb-4">
                            <div class="swiper-wrapper">
                                <?php

                                    // 3- Prépararyion de la requete
                                    $sql_img = "SELECT * FROM `img_produits` WHERE id_p=$id  ";


                                    // 4- exécution de la requete
                                    $query_img = mysqli_query($conn, $sql_img);

                                    // 5-Vérification
                                    $num_img = mysqli_num_rows($query_img);


                                    while ($array_img = mysqli_fetch_array($query_img)) {
                                        $id_img         = $array_img['id_img'];
                                        $libelle_img    = $array_img['libelle_img'];




                                    ?>
                                <div class="swiper-slide bg-light bg-light h-auto">
                                    <picture>
                                        <img class="img-fluid mx-auto d-table"
                                            src="Admin/uploads/<?php echo $libelle_img; ?>"
                                            alt="Bootstrap 5 Template by Pixel Rocket" data-zoomable>
                                    </picture>

                                </div>

                                <?php } ?>
                            </div>
                        </div>
                        <div class="swiper-container gallery-top-vertical col-10">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide bg-white h-auto">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto"
                                            src="Admin/uploads/<?php echo $libelle_img; ?>"
                                            alt="Bootstrap 5 Template by Pixel Rocket" data-zoomable>
                                    </picture>
                                </div>
                                <div class="swiper-slide bg-white h-auto">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto"
                                            src="Admin/uploads/<?php echo $libelle_img; ?>"
                                            alt="Bootstrap 5 Template by Pixel Rocket" data-zoomable>
                                    </picture>
                                </div>
                                <div class="swiper-slide bg-white h-auto">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto"
                                            src="Admin/uploads/<?php echo $libelle_img; ?>"
                                            alt="Bootstrap 5 Template by Pixel Rocket" data-zoomable>
                                    </picture>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Images Section-->

                <!-- Product Info Section-->
                <div class="col-12 col-lg-5">
                    <div class="pb-3">

                        <!-- Product Name, Review, Brand, Price-->
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <p class="small fw-bolder text-uppercase tracking-wider text-muted mb-0 lh-1">
                                <?php echo $libelle_br; ?></p>
                            <div class="d-flex justify-content-start align-items-center">
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
                                </div> <small class="text-muted d-inline-block ms-2 fs-bolder">(1288)</small>
                            </div>
                        </div>
                        <h1 class="mb-2 fs-2 fw-bold"><?php echo $libelle; ?></h1>
                        <div class="d-flex justify-content-start align-items-center">
                            <p class="lead fw-bolder m-0 fs-3 lh-1 text-danger me-2"><?php echo $prix; ?>$</p>
                            <s class="lh-1 me-2"><span class="fw-bolder m-0">$94.99</span></s>
                            <p class="lead fw-bolder m-0 fs-6 lh-1 text-success">Save $10.00</p>
                        </div>
                        <!-- /Product Name, Review, Brand, Price-->

                        <!-- Product Views-->
                        <div class="d-flex justify-content-start mt-3">
                            <div class="alert bg-light rounded py-1 px-2 d-table m-0">
                                <div class="d-flex justify-content-start align-items-center">
                                    <i class="ri-fire-fill lh-1 text-orange"></i>
                                    <div class="ms-2">
                                        <small class="opacity-75 fw-bolder lh-1">167 views today</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Views-->

                        <!-- Product Options-->
                        <div class="border-top mt-4 mb-3">
                            <div class="product-option mb-4 mt-4">
                                <small class="text-uppercase d-block fw-bolder mb-2">
                                    Colour : <span class="selected-option fw-bold">Crimson Blue</span>
                                </small>
                                <div class="d-flex justify-content-start">
                                    <div
                                        class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom">
                                        <input type="radio" class="form-check-color-input" id="option-colour-1"
                                            name="option-colour" value="Dark Black">
                                        <label class="form-check-label" for="option-colour-1"></label>
                                    </div>
                                    <div
                                        class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-warning">
                                        <input type="radio" class="form-check-color-input" id="option-colour-2"
                                            name="option-colour" value="Sun Yellow">
                                        <label class="form-check-label" for="option-colour-2"></label>
                                    </div>
                                    <div
                                        class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-info">
                                        <input type="radio" class="form-check-color-input" id="option-colour-3"
                                            name="option-colour" value="Crimson Blue" checked>
                                        <label class="form-check-label" for="option-colour-3"></label>
                                    </div>
                                    <div
                                        class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-danger">
                                        <input type="radio" class="form-check-color-input" id="option-colour-4"
                                            name="option-colour" value="Cherry Red">
                                        <label class="form-check-label" for="option-colour-4"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="product-option">
                                <small class="text-uppercase d-block fw-bolder mb-2">
                                    Size (UK) : <span class="selected-option fw-bold"></span>
                                </small>
                                <div class="form-group">
                                    <select name="selectSize" class="form-control" data-choices>
                                        <option value="">Please Select Size</option>
                                        <option value="Extra Small">XS</option>
                                        <option value="Medium">M</option>
                                        <option value="Large">L</option>
                                        <option value="Extra Large">XL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <a type="submit" class="btn btn-dark btn-dark-chunky flex-grow-1 me-2 text-white"
                                    href="add_cart.php?id=<?php echo $id_p; ?>">Add To
                                    Cart</a>
                                <button class="btn btn-orange btn-orange-chunky"><i class="ri-heart-line"></i></button>
                            </div>
                        </div>
                        <!-- /Product Options-->

                        <!-- Add To Cart-->

                        <!-- /Add To Cart-->

                        <!-- Socials-->
                        <div class="my-4">
                            <div class="d-flex justify-content-start align-items-center">
                                <p class="fw-bolder lh-1 mb-0 me-3">Share</p>
                                <ul
                                    class="list-unstyled p-0 m-0 d-flex justify-content-start lh-1 align-items-center mt-1">
                                    <li class="me-2"><a class="text-decoration-none" href="#" role="button"><i
                                                class="ri-facebook-box-fill"></i></a></li>
                                    <li class="me-2"><a class="text-decoration-none" href="#" role="button"><i
                                                class="ri-instagram-fill"></i></a></li>
                                    <li class="me-2"><a class="text-decoration-none" href="#" role="button"><i
                                                class="ri-pinterest-fill"></i></a></li>
                                    <li class="me-2"><a class="text-decoration-none" href="#" role="button"><i
                                                class="ri-twitter-fill"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Socials-->

                        <!-- Special Offers-->
                        <div class="bg-light rounded py-2 px-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex border-0 px-0 bg-transparent">
                                    <i class="ri-truck-line"></i>
                                    <span class="fs-6 ms-3">Standard delivery free for orders over $99. Next day
                                        delivery $9.99</span>
                                </li>
                            </ul>
                        </div>
                        <!-- /Special Offers-->

                    </div>
                </div>
                <!-- / Product Info Section-->
            </div>

        </section>
        <!-- / Product Top-->

        <section>

            <!-- Product Tabs-->
            <div class="mt-7 pt-5 border-top">
                <div class="container">
                    <!-- Tab Nav-->
                    <ul class="nav justify-content-center nav-tabs nav-tabs-border mb-4" id="myTab" role="tablist">
                        <li class="nav-item w-100 mb-2 mb-sm-0 w-sm-auto mx-sm-3" role="presentation">
                            <a class="nav-link fs-5 fw-bolder nav-link-underline mx-sm-3 px-0 active" id="details-tab"
                                data-bs-toggle="tab" href="#details" role="tab" aria-controls="details"
                                aria-selected="true">The Details</a>
                        </li>
                        <li class="nav-item w-100 mb-2 mb-sm-0 w-sm-auto mx-sm-3" role="presentation">
                            <a class="nav-link fs-5 fw-bolder nav-link-underline mx-sm-3 px-0" id="reviews-tab"
                                data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                aria-selected="false">Reviews</a>
                        </li>
                        <li class="nav-item w-100 mb-2 mb-sm-0 w-sm-auto mx-sm-3" role="presentation">
                            <a class="nav-link fs-5 fw-bolder nav-link-underline mx-sm-3 px-0" id="delivery-tab"
                                data-bs-toggle="tab" href="#delivery" role="tab" aria-controls="delivery"
                                aria-selected="false">Delivery</a>
                        </li>
                        <li class="nav-item w-100 mb-2 mb-sm-0 w-sm-auto mx-sm-3" role="presentation">
                            <a class="nav-link fs-5 fw-bolder nav-link-underline mx-sm-3 px-0" id="returns-tab"
                                data-bs-toggle="tab" href="#returns" role="tab" aria-controls="returns"
                                aria-selected="false">Returns</a>
                        </li>
                    </ul>
                    <!-- / Tab Nav-->

                    <!-- Tab Content-->
                    <div class="tab-content" id="myTabContent">

                        <!-- Tab Details Content-->
                        <div class="tab-pane fade show active py-5" id="details" role="tabpanel"
                            aria-labelledby="details-tab">
                            <div class="col-12 col-lg-10 mx-auto">
                                <div class="row g-5">
                                    <div class="col-12 col-md-6">
                                        <p><?php echo $description; ?>..</p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <ul>
                                            <li>Stretchy cotton-modal jersey stripe</li>
                                            <li>Garment washed</li>
                                            <li>Flat, covered elastic waistband</li>
                                            <li>58% pima cotton/38% viscose </li>
                                            <li>Modal/4% Lycra® elastane</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab Details Content-->

                        <!-- Review Tab Content-->
                        <div class="tab-pane fade py-5" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <!-- Customer Reviews-->
                            <section class="reviews">
                                <div class="col-lg-12 text-center pb-5">

                                    <h2 class="fs-1 fw-bold d-flex align-items-center justify-content-center">4.88
                                        <small class="text-muted fw-bolder ms-3 fw-bolder fs-6">(1288 reviews)</small>
                                    </h2>
                                    <div class="d-flex justify-content-center">
                                        <!-- Review Stars Medium-->
                                        <div class="rating position-relative d-table">
                                            <div class="position-absolute stars" style="width: 80%">
                                                <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                                <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                                <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                                <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                                <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                            </div>
                                            <div class="stars">
                                                <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                                <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                                <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                                <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                                <i class="ri-star-fill ri-2x mr-1 text-muted"></i>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="bg-light rounded py-3 px-4 mt-3 col-12 col-md-6 col-lg-5 mx-auto">
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 bg-transparent">
                                                <span class="fw-bolder">Fit</span>
                                                <!-- Review Stars Small-->
                                                <div class="rating position-relative d-table">
                                                    <div class="position-absolute stars" style="width: 25%">
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
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 bg-transparent">
                                                <span class="fw-bolder">Value for money</span>
                                                <!-- Review Stars Small-->
                                                <div class="rating position-relative d-table">
                                                    <div class="position-absolute stars" style="width: 75%">
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
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 bg-transparent">
                                                <span class="fw-bolder">Build quality</span>
                                                <!-- Review Stars Small-->
                                                <div class="rating position-relative d-table">
                                                    <div class="position-absolute stars" style="width: 65%">
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
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 bg-transparent">
                                                <span class="fw-bolder">Style</span>
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
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Review Modal-->
                                    <?php if (isset($_SESSION['id_u']) && $_SESSION['id_u'] !== null) {

                                        echo "<button type='button'
                                        class='btn btn-dark mt-4 hover-lift-sm hover-boxshadow disable-child-pointer'
                                        data-bs-toggle='offcanvas' data-bs-target='#offcanvasReview'
                                        aria-controls='offcanvasReview'>
                                        Write A Review <i class='ri-discuss-line align-bottom ms-1'></i></button>"; ?>

                                    <?php } else {
                                    }
                                    ?>

                                    <!-- / Review Modal Button-->

                                </div>

                                <!-- Single Review-->
                                <?php

                                // 3- Prépararyion de la requete liste produits
                                $sql = "SELECT * FROM `reviews` WHERE id_p=$id; ";

                                //echo $sql;
                                // 4- exécution de la requete
                                $query = mysqli_query($conn, $sql);

                                // 5-Vérification
                                $num = mysqli_num_rows($query);


                                while ($array = mysqli_fetch_array($query)) {

                                    $libelle           = $array['libelle_t'];
                                    $description    = $array['description_t'];
                                    $nom        = $array['nom_u'];

                                ?>
                                <article class="py-5 border-bottom border-top">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <small class="text-muted fw-bolder">08/12/2021</small>
                                            <p class="fw-bolder"><?php echo $nom ?></p>
                                            <span class="bg-success-faded fs-xs fw-bolder text-uppercase p-2">Verified
                                                Customer</span>
                                        </div>
                                        <div class="col-12 col-md-8 mt-4 mt-md-0">
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
                                            </div>
                                            <p class="fw-bolder mt-4"><?php echo $libelle ?></p>
                                            <p><?php echo $description ?></p>

                                            <small class="fw-bolder bg-light d-table rounded py-1 px-2">Yes, I would
                                                recommend the product</small>
                                            <div
                                                class="d-block d-md-flex mt-3 justify-content-between align-items-center">
                                                <a href="#"
                                                    class="btn btn-link text-muted p-0 text-decoration-none w-100 w-md-auto fw-bolder text-start"
                                                    title=""><small>Was this review helpful?
                                                        <i class="ri-thumb-up-line ms-4"></i> 112 <i
                                                            class="ri-thumb-down-line ms-2"></i>
                                                        23</small></a>
                                                <a href="#"
                                                    class="btn btn-link text-muted p-0 text-decoration-none w-100 w-md-auto fw-bolder text-start mt-3 mt-md-0"
                                                    title=""><small>Flag as
                                                        inappropriate <i class="ri-flag-2-line ms-2"></i></small></a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <?php } ?>
                                <!-- /Single Review-->


                                <a href="#" class="btn btn-dark d-table mx-auto mt-6 mb-3 hover-lift-sm hover-boxshadow"
                                    title="">Load More
                                    Reviews</a>
                                <p class="text-muted text-center fw-bolder">Showing 3 of 1234</p>

                            </section>
                        </div>
                        <!-- / Review Tab Content-->

                        <!-- Delivery Tab Content-->
                        <div class="tab-pane fade py-5" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                            <div class="col-12 col-md-10 col-lg-8 mx-auto">
                                <p>We are now offering contact-free delivery so that you can still receive your parcels
                                    safely without requiring a
                                    signature. Please see below for the available delivery methods, costs and
                                    timescales.</p>
                                <ul class="list-group list-group-flush mb-4">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center px-0 py-4 bg-transparent">
                                        <div>
                                            <span class="fw-bolder d-block">Standard Delivery</span>
                                            <span class="text-muted">Delivery within 5 days of placing your
                                                order.</span>
                                        </div>
                                        <p class="m-0 lh-1 fw-bolder">$12.99</p>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center px-0 py-4 bg-transparent">
                                        <div>
                                            <span class="fw-bolder d-block">Priority Delivery</span>
                                            <span class="text-muted">Delivery within 2 days of placing your
                                                order.</span>
                                        </div>
                                        <p class="m-0 lh-1 fw-bolder">$17.99</p>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center px-0 py-4 bg-transparent">
                                        <div>
                                            <span class="fw-bolder d-block">Next Day Delivery</span>
                                            <span class="text-muted">Delivery within 24 hours of placing your
                                                order.</span>
                                        </div>
                                        <p class="m-0 lh-1 fw-bolder">$33.99</p>
                                    </li>
                                </ul>
                                <div class="bg-light rounded p-3">
                                    <p class="fs-6">Form more information, please see our delivery FAQs <a
                                            href="#">here</a></p>
                                    <p class="m-0 fs-6">If you do not find the answer to your query, please contact our
                                        customer support team on
                                        <b>0800 123 456</b> or email us at <b>support@domain.com</b>. We aim to respond
                                        within 48 hours to queries.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- / Delivery Tab Content-->

                        <!-- Returns Tab Content-->
                        <div class="tab-pane fade py-5" id="returns" role="tabpanel" aria-labelledby="returns-tab">
                            <div class="col-12 col-md-10 col-lg-8 mx-auto">
                                <p>We believe you will completely happy with your item, however if you aren't, there's
                                    no need to worry. We've
                                    listed below the ways you can return your item to us.</p>
                                <ul class="list-group list-group-flush mb-4">
                                    <li class="list-group-item px-0 py-4 bg-transparent">
                                        <p class="fw-bolder">Return via post</p>
                                        <p class="fs-6">To return your items for free through the postal system, please
                                            complete the returns form that
                                            comes with your order. You'll find a label at the bottom of the form. Simply
                                            peel the label and head to your
                                            nearest post office.</p>
                                    </li>
                                    <li class="list-group-item px-0 py-4 bg-transparent">
                                        <p class="fw-bolder">Return in person</p>
                                        <p class="fs-6">To return your items for free in person, simply stop into any
                                            one of our locations and speak
                                            to a member of our in-store team.</p>
                                    </li>
                                </ul>
                                <div class="bg-light rounded p-3">
                                    <p class="fs-6">Form more information, please see our returns FAQs <a
                                            href="#">here</a></p>
                                    <p class="m-0 fs-6">If you do not find the answer to your query, please contact our
                                        customer support team on
                                        <b>0800 123 456</b> or email us at <b>support@domain.com</b>. We aim to respond
                                        within 48 hours to queries.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- / Returns Tab Content-->

                    </div>
                    <!-- / Tab Content-->
                </div>
            </div>
            <!-- / Product Tabs-->
            <?php } ?>
        </section>

        <!-- Related Products-->
        <div class="container my-8">
            <h3 class="fs-4 fw-bold mb-5 text-center">You May Also Like</h3>
            <!-- Swiper Latest -->
            <div class="swiper-container overflow-visible" data-swiper data-options='{
                    "spaceBetween": 25,
                    "cssMode": true,
                    "roundLengths": true,
                    "scrollbar": {
                      "el": ".swiper-scrollbar",
                      "hide": false,
                      "draggable": true
                    },      
                    "navigation": {
                      "nextEl": ".swiper-next",
                      "prevEl": ".swiper-prev"
                    },  
                    "breakpoints": {
                      "576": {
                        "slidesPerView": 1
                      },
                      "768": {
                        "slidesPerView": 2
                      },
                      "992": {
                        "slidesPerView": 3
                      },
                      "1200": {
                        "slidesPerView": 4
                      }            
                    }
                  }'>
                <div class="swiper-wrapper pb-5 pe-1">
                    <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title=""
                                        src="./assets/images/products/product-1.jpg" alt="">
                                </picture>
                                <picture class="position-absolute z-index-20 start-0 top-0 hover-show bg-light">
                                    <img class="w-100 img-fluid" title="" src="./assets/images/products/product-1b.jpg"
                                        alt="">
                                </picture>
                                <div class="card-actions">
                                    <span class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
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
                                    </div> <span class="small fw-bolder ms-2 text-muted"> 4.7
                                        (456)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Full Zip Hoodie</a>
                                <p class="fw-bolder m-0 mt-2">$1129.99</p>
                            </div>
                        </div>
                        <!--/ Card Product-->
                    </div>
                    <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                            <span class="badge card-badge bg-secondary">-25%</span>
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title=""
                                        src="./assets/images/products/product-2.jpg" alt="">
                                </picture>
                                <div class="card-actions">
                                    <span class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
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
                                        <div class="position-absolute stars" style="width: 60%">
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
                                    </div> <span class="small fw-bolder ms-2 text-muted"> 4.4
                                        (1289)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Mens Sherpa Hoodie</a>
                                <div class="d-flex justify-content-center align-items-center mt-2">
                                    <p class="mb-0 me-2 text-danger fw-bolder">$<span>599.55</span>
                                    </p>
                                    <p class="mb-0 text-muted fw-bolder"><s>$<span>150.00</span></s>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/ Card Product-->
                    </div>
                    <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                            <span class="badge card-badge bg-secondary">-65%</span>
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title=""
                                        src="./assets/images/products/product-3.jpg" alt="">
                                </picture>
                                <div class="card-actions">
                                    <span class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
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
                                        <div class="position-absolute stars" style="width: 20%">
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
                                    </div> <span class="small fw-bolder ms-2 text-muted"> 4.7
                                        (754)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Womens Essentials Hoodie</a>
                                <div class="d-flex justify-content-center align-items-center mt-2">
                                    <p class="mb-0 me-2 text-danger fw-bolder">$<span>779.55</span>
                                    </p>
                                    <p class="mb-0 text-muted fw-bolder">
                                        <s>$<span>1100.00</span></s>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/ Card Product-->
                    </div>
                    <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title=""
                                        src="./assets/images/products/product-4.jpg" alt="">
                                </picture>
                                <div class="card-actions">
                                    <span class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
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
                                    </div> <span class="small fw-bolder ms-2 text-muted"> 4.4
                                        (1289)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Elevated Lined Hoodie</a>
                                <p class="fw-bolder m-0 mt-2">$1829.99</p>
                            </div>
                        </div>
                        <!--/ Card Product-->
                    </div>
                    <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title=""
                                        src="./assets/images/products/product-5.jpg" alt="">
                                </picture>
                                <picture class="position-absolute z-index-20 start-0 top-0 hover-show bg-light">
                                    <img class="w-100 img-fluid" title="" src="./assets/images/products/product-5b.jpg"
                                        alt="">
                                </picture>
                                <div class="card-actions">
                                    <span class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
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
                                        <div class="position-absolute stars" style="width: 84%">
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
                                    </div> <span class="small fw-bolder ms-2 text-muted"> 4.8
                                        (189)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Mens Slab Hoodie</a>
                                <p class="fw-bolder m-0 mt-2">$29.99</p>
                            </div>
                        </div>
                        <!--/ Card Product-->
                    </div>
                    <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title=""
                                        src="./assets/images/products/product-6.jpg" alt="">
                                </picture>
                                <div class="card-actions">
                                    <span class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
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
                                        <div class="position-absolute stars" style="width: 60%">
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
                                    </div> <span class="small fw-bolder ms-2 text-muted"> 4.5
                                        (1567)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Blocked Striped Hoodie</a>
                                <p class="fw-bolder m-0 mt-2">$1329.99</p>
                            </div>
                        </div>
                        <!--/ Card Product-->
                    </div>
                    <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                            <span class="badge card-badge bg-secondary">-13%</span>
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title=""
                                        src="./assets/images/products/product-7.jpg" alt="">
                                </picture>
                                <div class="card-actions">
                                    <span class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
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
                                        <div class="position-absolute stars" style="width: 60%">
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
                                    </div> <span class="small fw-bolder ms-2 text-muted"> 4.4
                                        (1289)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Womens Classic Hoodie</a>
                                <div class="d-flex justify-content-center align-items-center mt-2">
                                    <p class="mb-0 me-2 text-danger fw-bolder">$<span>599.55</span>
                                    </p>
                                    <p class="mb-0 text-muted fw-bolder"><s>$<span>150.00</span></s>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/ Card Product-->
                    </div>
                    <div class="swiper-slide d-flex h-auto">
                        <!-- Card Product-->
                        <div class="card position-relative h-100 card-listing hover-trigger">
                            <span class="badge card-badge bg-secondary">-33%</span>
                            <div class="card-header">
                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title=""
                                        src="./assets/images/products/product-8.jpg" alt="">
                                </picture>
                                <div class="card-actions">
                                    <span class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
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
                                        <div class="position-absolute stars" style="width: 20%">
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
                                    </div> <span class="small fw-bolder ms-2 text-muted"> 4.7
                                        (754)</span>
                                </div>
                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                    href="./product.html">Mens Sherpa Hoodie</a>
                                <div class="d-flex justify-content-center align-items-center mt-2">
                                    <p class="mb-0 me-2 text-danger fw-bolder">$<span>779.55</span>
                                    </p>
                                    <p class="mb-0 text-muted fw-bolder">
                                        <s>$<span>1100.00</span></s>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/ Card Product-->
                    </div>
                    <div class="swiper-slide d-flex h-auto justify-content-center align-items-center">
                        <a href="./category.html"
                            class="d-flex text-decoration-none flex-column justify-content-center align-items-center">
                            <span class="btn btn-dark btn-icon mb-3"><i
                                    class="ri-arrow-right-line ri-lg lh-1"></i></span>
                            <span class="lead fw-bolder">See All</span>
                        </a>
                    </div>
                </div>

                <!-- Buttons-->
                <div
                    class="swiper-btn swiper-disabled-hide swiper-prev swiper-btn-side btn-icon bg-dark text-white ms-3 shadow-lg mt-n5 ms-n4">
                    <i class="ri-arrow-left-s-line ri-lg"></i>
                </div>
                <div
                    class="swiper-btn swiper-disabled-hide swiper-next swiper-btn-side swiper-btn-side-right btn-icon bg-dark text-white me-n4 shadow-lg mt-n5">
                    <i class="ri-arrow-right-s-line ri-lg"></i>
                </div>

                <!-- Add Scrollbar -->
                <div class="swiper-scrollbar"></div>

            </div>
            <!-- / Swiper Latest-->
        </div>
        <!--/ Related Products-->


        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    <!-- Footer -->
    <!-- Footer-->
    <?php include "footer.php"; ?>
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
                        <p class="mb-2 fs-6">
                            <i class="ri-truck-line align-bottom me-2"></i>
                            <span class="fw-bolder">$22</span> away from free delivery
                        </p>
                        <div class="progress f-h-1">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <?php
                    if (creationPanier()) {

                        $nbArticles = count($_SESSION['cart']['id_p']);
                        if ($nbArticles <= 0)
                            echo "<tr><td>Votre panier est vide </ td></tr>";
                        else {
                            for ($i = 0; $i < $nbArticles; $i++) {
                                $id = $_SESSION['cart']['id_p'][$i];
                                $sql = "SELECT * FROM `produit` WHERE id_p=$id";
                                $query = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($query);

                                while ($array = mysqli_fetch_array($query)) {
                                    $libelle         = $array['libelle_p'];
                                    $prix           = $array['prix'];
                                    $id_p         = $array['id_p'];
                                    $sql_img = "SELECT * FROM `img_produits` WHERE id_p=$id_p ";

                                    $query_img = mysqli_query($conn, $sql_img);



                                    $array_img = mysqli_fetch_array($query_img);
                                    $id_img         = $array_img['id_img'];
                                    $libelle_img    = $array_img['libelle_img'];
                                }

                    ?>
                    <!-- Cart Product-->
                    <div class="row mx-0 pb-4 mb-4 border-bottom">
                        <div class="col-3">
                            <picture class="d-block bg-light">
                                <img class="img-fluid" src="Admin/uploads/<?php echo $libelle_img; ?>"
                                    alt="<?php echo $libelle_img; ?>" />
                            </picture>
                        </div>
                        <div class="col-9">
                            <div>
                                <h6 class="justify-content-between d-flex align-items-start mb-2">
                                    <?php echo $libelle; ?>
                                    <a> <i class="ri-close-line" href="?idsupp=<?php echo $id_p; ?>"></i></a>
                                </h6>
                                <small class="d-block text-muted fw-bolder">Size: Medium</small>
                                <small class="d-block text-muted fw-bolder">Qty: 1</small>
                            </div>
                            <p class="fw-bolder text-end m-0"><?php echo $prix; ?></p>
                        </div>
                    </div>
                    <?php }
                        }
                    } ?>
                    <!-- Cart Product-->

                </div>
                <div class="border-top pt-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="m-0 fw-bolder">Subtotal</p>
                        <p class="m-0 fw-bolder"><?php echo MontantGlobal(); ?>$</p>
                    </div>
                    <a href="./checkout.php"
                        class="btn btn-orange btn-orange-chunky mt-5 mb-2 d-block text-center">Checkout</a>
                    <a href="./cart.php"
                        class="btn btn-dark fw-bolder d-block text-center transition-all opacity-50-hover">View
                        Cart</a>
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
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i>
                                            Hiking
                                            Jackets</span> <span class="text-muted ms-4">(25)</span></a>
                                </li>
                                <li class="mb-2"><a
                                        class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i>
                                            Climbing
                                            Jackets</span> <span class="text-muted ms-4">(11)</span></a>
                                </li>
                                <li class="mb-2"><a
                                        class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i>
                                            Trekking
                                            Jackets</span> <span class="text-muted ms-4">(19)</span></a>
                                </li>
                                <li class="mb-2"><a
                                        class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i>
                                            Allround
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
            <form action="" method="POST">
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewName">Your Name</label>
                    <input type="text" class="form-control" id="formReviewName" placeholder="Your Name" name="nom">
                </div>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewEmail">Your Email</label>
                    <input type="text" class="form-control" id="formReviewEmail" placeholder="Your Email" name="email">
                </div>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewTitle">Your Review Title</label>
                    <input type="text" class="form-control" id="formReviewTitle" placeholder="Review Title"
                        name="libelle">
                </div>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewReview">Your Review</label>
                    <textarea class="form-control" name="description" id="formReviewReview" cols="30" rows="5"
                        placeholder="Your Review"></textarea>
                </div>
                <button type="submit" name="valid" class="btn btn-dark hover-lift hover-boxshadow">Submit
                    Review</button>
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
                    <p class="lead fw-bolder">2 results found for <span class="fw-bold">"Waterproof Jacket"</span>
                    </p>
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