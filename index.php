<?php
include "connexion.php";

include "fonction_panier.php";


?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->

<?php include "head.php"; ?>

<body class="">
    <!-- Navbar -->
    <div class="position-relative z-index-30">
        <!-- Navbar -->
        <nav
            class="navbar navbar-expand-lg navbar-light bg-white border-bottom mx-0 p-0 flex-column border-0 position-absolute w-100 z-index-30 bg-transparent navbar-dark navbar-transparent bg-white-hover transition-all">
            <?php include "navbar.php"; ?></nav>
        <!-- / Navbar-->
    </div>
    <!-- / Navbar-->

    <!-- Main Section-->
    <section class="mt-0">
        <!-- Page Content Goes Here -->

        <!-- / Hero Section -->
        <section class="vh-100 position-relative bg-overlay-dark">
            <div class="container d-flex h-100 justify-content-center align-items-center position-relative z-index-10">
                <div
                    class="d-flex justify-content-center align-items-center h-100 position-relative z-index-10 text-white">
                    <div>
                        <h1 class="display-1 fw-bold px-2 px-md-5 text-center mx-auto col-lg-8 mt-md-0"
                            data-aos="fade-up" data-aos-delay="1000">
                            Where will your next adventure take you?
                        </h1>
                        <div data-aos="fade-in" data-aos-delay="2000">
                            <div class="d-md-flex justify-content-center mt-4 mb-3 my-md-5">
                                <a href="./category.html"
                                    class="btn btn-skew-left btn-orange btn-orange-chunky text-white mx-1 w-100 w-md-auto mb-2 mb-md-0"><span>Shop
                                        Menswear
                                        <i class="ri-arrow-right-line align-middle fw-bold"></i></span></a>
                                <a href="./category.html"
                                    class="btn btn-skew-left btn-orange btn-orange-chunky text-white mx-1 w-100 w-md-auto mb-2 mb-md-0"><span>Shop
                                        Womenswear
                                        <i class="ri-arrow-right-line align-middle fw-bold"></i></span></a>
                            </div>
                            <i class="ri-mouse-line d-block text-center animation-float ri-2x transition-all opacity-50-hover text-white"
                                data-pixr-scrollto data-target=".brand-section" data-aos="fade-up"
                                data-aos-delay="700"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute z-index-1 top-0 bottom-0 start-0 end-0">
                <!-- Swiper Info -->
                <div class="swiper-container overflow-hidden bg-light w-100 h-100" data-swiper data-options='{
                    "slidesPerView": 1,
                    "speed": 1500,
                    "loop": true,
                    "effect": "fade",
                    "autoplay": {
                      "delay": 5000
                    }
                  }'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide position-relative">
                            <div class="w-100 h-100 bg-img-cover animation-move bg-pos-center-center" style="
                    background-image: url(./assets/images/slideshows/slideshow-1.jpg);
                  "></div>
                        </div>
                        <div class="swiper-slide position-relative">
                            <div class="w-100 h-100 bg-img-cover animation-move bg-pos-center-center" style="
                    background-image: url(./assets/images/slideshows/slideshow-2.jpg);
                  "></div>
                        </div>
                        <div class="swiper-slide position-relative">
                            <div class="w-100 h-100 bg-img-cover animation-move bg-pos-center-center" style="
                    background-image: url(./assets/images/slideshows/slideshow-3.jpg);
                  "></div>
                        </div>
                    </div>
                </div>
                <!-- / Swiper Info-->
            </div>
        </section>
        <!--/ Hero Section-->

        <!-- Featured Brands-->
        <div class="mb-lg-7 bg-light py-4" data-aos="fade-in">
            <div class="container">
                <div class="row gx-3 align-items-center">
                    <div
                        class="col-12 justify-content-center justify-content-md-between align-items-center d-flex flex-wrap">
                        <?php

                        // 3- Prépararyion de la requete
                        $sql = "SELECT * FROM `brands` LIMIT 8";

                        //echo $sql;
                        // 4- exécution de la requete
                        $query = mysqli_query($conn, $sql);

                        // 5-Vérification
                        $num = mysqli_num_rows($query);


                        while ($array = mysqli_fetch_array($query)) {
                            $id_b         = $array['id_b'];
                            $libelle_b         = $array['libelle_b'];
                            $logo        = $array['logo'];




                        ?>

                        <div class="me-2 f-w-20 m-4 ms-md-0 mt-md-0 mb-md-0">
                            <a class="d-block" href="product_brand.php?id=<?php echo $id_b; ?>" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="<?php echo $libelle_b; ?>">
                                <img class="img-fluid d-table mx-auto" src="Admin/uploads/<?php echo $logo; ?>"
                                    alt="logo" />
                            </a>
                        </div>
                        <?php } ?>
                        <a href="./category.html" class="btn btn-link fw-bolder">Explore All Brands
                            <i class="ri-arrow-right-line align-bottom fw-bold"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Featured Brands-->

        <!-- Staff Picks-->

        <section class="mb-9 mt-5" data-aos="fade-up">
            <div class="container">
                <div class="w-md-50 mb-5">
                    <p class="small fw-bolder text-uppercase tracking-wider mb-2 text-muted">
                        Summer Favourites
                    </p>
                    <h2 class="display-5 fw-bold mb-3">Staff Picks</h2>
                    <p class="lead">
                        We've sorted through our feed to put together a collection of our
                        products perfect for a summer outdoors.
                    </p>
                </div>
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

                        <?php

                        // 3- Prépararyion de la requete liste produits
                        $sql = "SELECT * FROM `produit`  ";

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
                            $id_c       = $array['id_c'];
                            $id_b       = $array['id_b'];


                            // 3- Prépararyion de la requete categorie
                            $sql_c = "SELECT * FROM `category` WHERE id_c=$id_c;";

                            $exec_c = mysqli_query($conn, $sql_c);
                            $array_c      = mysqli_fetch_array($exec_c);
                            $libelle_c     = $array_c['libelle_c'];

                            // 3- Prépararyion de la requete brand
                            $sql_b = "SELECT * FROM `brands` WHERE id_b=$id_b;";

                            $exec_b = mysqli_query($conn, $sql_b);
                            $array_b      = mysqli_fetch_array($exec_b);
                            $libelle_b     = $array_b['libelle_b'];
                            $logo     = $array_b['logo'];
                            // 3- Prépararyion de la requete images produits
                            $sql_img = "SELECT * FROM `img_produits` WHERE id_p=$id_p  LIMIT 1";

                            //echo $sql;
                            // 4- exécution de la requete
                            $query_img = mysqli_query($conn, $sql_img);



                            $array_img = mysqli_fetch_array($query_img);
                            $id_img         = $array_img['id_img'];
                            $libelle_img    = $array_img['libelle_img'];


                        ?>
                        <div class="swiper-slide d-flex h-auto">

                            <!-- Card Product-->
                            <div class="card position-relative h-100 card-listing hover-trigger">


                                <div class="card-header" style="height: 402px;">
                                    <picture class="position-relative overflow-hidden d-block bg-light">
                                        <img class="w-100 img-fluid position-relative z-index-10" title=""
                                            src="Admin/uploads/<?php echo $libelle_img; ?>" alt="" />
                                    </picture>
                                    <picture class="position-absolute z-index-20 start-0 top-0 hover-show bg-light">
                                        <img class="w-100 img-fluid" title=""
                                            src="Admin/uploads/<?php echo $libelle_img; ?>" alt="" />
                                    </picture>
                                    <div class="card-actions">
                                        <span
                                            class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
                                            Add</span>
                                        <div class="d-flex justify-content-center align-items-center flex-wrap mt-3">
                                            <button class="btn btn-outline-dark btn-sm mx-2">
                                                S
                                            </button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">
                                                M
                                            </button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">
                                                L
                                            </button>
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
                                        </div>
                                        <span class="small fw-bolder ms-2 text-muted">
                                            4.7 (456)</span>
                                    </div>
                                    <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                        href="product.php?id=<?php echo $id_p; ?>"><?php echo $libelle; ?></a>
                                    <p class="fw-bolder m-0 mt-2"><?php echo $prix; ?>$</p>
                                </div>
                            </div>

                            <!--/ Card Product-->
                        </div>
                        <?php } ?>
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
        </section>
        <!-- / Staff Picks-->

        <!-- Image Hotspot Banner-->
        <section class="my-10 position-relative">
            <!-- SVG Shape Divider-->
            <div class="position-absolute z-index-50 text-white top-0 start-0 end-0">
                <svg class="align-self-start d-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1283 53.25">
                    <polygon fill="currentColor" points="1283 0 0 0 0 53.25 1283 0" />
                </svg>
            </div>
            <!-- /SVG Shape Divider-->

            <div class="w-100 h-100 bg-img-cover bg-pos-center-center hotspot-container py-5 py-md-7 py-lg-10" style="
            background-image: url(https://images.unsplash.com/photo-1508746829417-e6f548d8d6ed?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80);
          ">
                <div class="hotspot d-none d-lg-block" data-options='{
                    "placement": {
                        "left": "68%",
                        "bottom": "40%"
                    },
                    "alwaysVisible": true,
                    "alwaysAnimate": true,
                    "contentTarget": "#hotspot-one",
                    "trigger": "mouseenter"
                }'></div>
                <div class="hotspot d-none d-lg-block" data-options='{
                    "placement": {
                        "left": "53%",
                        "top": "40%"
                    },
                    "alwaysVisible": true,
                    "alwaysAnimate": true,
                    "contentTarget": "#hotspot-one"
                }'></div>
                <div class="container py-lg-8 position-relative z-index-10 d-flex align-items-center"
                    data-aos="fade-left">
                    <div
                        class="py-8 d-flex justify-content-end align-items-start align-items-lg-end flex-column col-lg-4 text-lg-end">
                        <p class="small fw-bolder text-uppercase tracking-wider mb-2 text-muted">
                            Extreme Performance
                        </p>
                        <h2 class="display-5 fw-bold mb-3">The North Face</h2>
                        <p class="lead d-none d-lg-block">
                            Be ready all year round with our selection of North Face outdoor
                            jackets — perfect for any time of the year and year round.
                            Choose from a variety of colour shades and styles to warm you up
                            in cold conditions.
                        </p>
                        <a class="text-decoration-none fw-bolder" href="#">Shop The North Face &rarr;</a>
                    </div>
                </div>

                <!-- Example Hotspot HTML Content -->
                <div id="hotspot-one" class="d-none">
                    <div class="m-n2 rounded overflow-hidden">
                        <div class="mb-1 bg-light d-flex justify-content-center">
                            <div class="f-w-48 px-3 pt-3">
                                <img class="img-fluid" src="./assets/images/products/product-3.jpg"
                                    alt="Bootstrap 5 Template by Pixel Rocket" />
                            </div>
                        </div>
                        <div class="px-4 py-4 text-center">
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
                                </div>
                                <span class="small fw-bolder ms-2 text-muted">
                                    4.4 (1289)</span>
                            </div>
                            <p class="mb-0 mx-4">Pusher Outdoor Jeans Black Women</p>
                            <p class="lead lh-1 m-0 fw-bolder mt-2 mb-3">$199.87</p>
                            <a href="./product.html" class="fw-bolder text-link-border pb-1 fs-6">Full details <i
                                    class="ri-arrow-right-line align-bottom"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SVG Shape Divider-->
            <div class="position-absolute z-index-50 text-white bottom-0 start-0 end-0">
                <svg class="align-self-end d-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1283 53.25">
                    <polygon fill="currentColor" points="0 53.25 1283 53.25 1283 0 0 53.25" />
                </svg>
            </div>
            <!-- /SVG Shape Divider-->
        </section>
        <!-- / Image Hotspot Banner-->

        <!-- Linked Product Carousels-->
        <section class="py-5" data-aos="fade-in">
            <div class="container">
                <div class="row g-5">
                    <div class="col-12 col-md-7" data-aos="fade-right"">
                        <div class=" m-0">
                        <p class="small fw-bolder text-uppercase tracking-wider mb-2 text-muted">
                            Hiking Essentials
                        </p>
                        <h2 class="display-5 fw-bold mb-6">
                            Our Latest Must-Have Products
                        </h2>
                        <div class="px-8 position-relative">
                            <!-- Swiper-->
                            <div class="swiper-container swiper-linked-carousel-small">
                                <!-- Add Pagination -->
                                <div class="swiper-pagination-blocks mb-4">
                                    <div class="swiper-pagination-custom"></div>
                                </div>

                                <div class="swiper-wrapper">
                                    <!-- Swiper Slide-->
                                    <?php

                                    // 3- Prépararyion de la requete liste produits
                                    $sql = "SELECT * FROM `produit`  LIMIT 3";

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
                                        $id_c       = $array['id_c'];
                                        $id_b       = $array['id_b'];
                                        // 3- Prépararyion de la requete images produits
                                        $sql_img = "SELECT * FROM `img_produits` WHERE id_p=$id_p  LIMIT 1";

                                        //echo $sql;
                                        // 4- exécution de la requete
                                        $query_img = mysqli_query($conn, $sql_img);



                                        $array_img = mysqli_fetch_array($query_img);
                                        $id_img         = $array_img['id_img'];
                                        $libelle_img    = $array_img['libelle_img'];

                                    ?>
                                    <!-- Swiper Slide-->
                                    <div class="swiper-slide overflow-hidden">
                                        <!-- Card-->
                                        <!-- Card Product-->
                                        <div class="card position-relative h-100 card-listing hover-trigger">
                                            <div class="card-header" style=" height: 786px;">
                                                <picture class=" position-relative overflow-hidden d-block bg-light">
                                                    <img class="w-100 img-fluid position-relative z-index-10" title=""
                                                        src="Admin/uploads/<?php echo $libelle_img; ?>"
                                                        alt="Bootstrap 5 Template by Pixel Rocket" />
                                                </picture>
                                                <div class="card-actions">
                                                    <span
                                                        class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
                                                        Add</span>
                                                    <div
                                                        class="d-flex justify-content-center align-items-center flex-wrap mt-3">
                                                        <button class="btn btn-outline-dark btn-sm mx-2">
                                                            S
                                                        </button>
                                                        <button class="btn btn-outline-dark btn-sm mx-2">
                                                            M
                                                        </button>
                                                        <button class="btn btn-outline-dark btn-sm mx-2">
                                                            L
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body px-0 text-center">
                                                <div
                                                    class="d-flex justify-content-center align-items-center mx-auto mb-1">
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
                                                    <span class="small fw-bolder ms-2 text-muted">
                                                        4.7 (1669)</span>
                                                </div>
                                                <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                                    href="product.php?id=<?php echo $id_p; ?>"><?php echo $libelle; ?></a>
                                                <p class="fw-bolder m-0 mt-2">$<?php echo $prix; ?></p>
                                            </div>
                                        </div>
                                        <!--/ Card Product-->
                                        <!--/ Card-->
                                    </div>

                                    <!-- / Swiper Slide-->
                                    <?php } ?>

                                </div>
                            </div>
                            <!-- /Swiper-->

                            <!-- Swiper Arrows -->
                            <div
                                class="swiper-prev-linked position-absolute top-50 start-0 mt-n8 cursor-pointer transition-all opacity-50-hover">
                                <i class="ri-arrow-left-s-line ri-2x"></i>
                            </div>
                            <div
                                class="swiper-next-linked position-absolute top-50 end-0 me-3 mt-n8 cursor-pointer transition-all opacity-50-hover">
                                <i class="ri-arrow-right-s-line ri-2x"></i>
                            </div>
                            <!-- / Swiper Arrows-->
                        </div>
                    </div>
                </div>
                <div class="col-md-5 d-none d-md-flex" data-aos="fade-left" style="    margin-top: 217px;">
                    <div class="w-100 h-100">
                        <!-- Swiper-->
                        <div class="swiper-container h-100 swiper-linked-carousel-large">
                            <div class="swiper-wrapper h-100">

                                <!-- Swiper Slide-->
                                <div class="swiper-slide">
                                    <div class="row g-3">
                                        <?php

                                        // 3- Prépararyion de la requete liste produits
                                        $sql = "SELECT * FROM `produit`  LIMIT 4";

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
                                            $id_c       = $array['id_c'];
                                            $id_b       = $array['id_b'];
                                            // 3- Prépararyion de la requete images produits
                                            $sql_img = "SELECT * FROM `img_produits` WHERE id_p=$id_p  LIMIT 1";

                                            //echo $sql;
                                            // 4- exécution de la requete
                                            $query_img = mysqli_query($conn, $sql_img);



                                            $array_img = mysqli_fetch_array($query_img);
                                            $id_img         = $array_img['id_img'];
                                            $libelle_img    = $array_img['libelle_img'];

                                        ?>
                                        <div class="col-12 col-md-6">

                                            <!-- Card Product-->
                                            <div class="card position-relative h-100 card-listing hover-trigger">
                                                <div class="card-header">
                                                    <picture class="position-relative overflow-hidden d-block bg-light">
                                                        <img style=" height: 324px;"
                                                            class="w-100 img-fluid position-relative z-index-10"
                                                            title="" src="Admin/uploads/<?php echo $libelle_img; ?>"
                                                            alt="Bootstrap 5 Template by Pixel Rocket" />
                                                    </picture>
                                                    <div class="card-actions">
                                                        <span
                                                            class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
                                                            Add</span>
                                                        <div
                                                            class="d-flex justify-content-center align-items-center flex-wrap mt-3">
                                                            <button class="btn btn-outline-dark btn-sm mx-2">
                                                                S
                                                            </button>
                                                            <button class="btn btn-outline-dark btn-sm mx-2">
                                                                M
                                                            </button>
                                                            <button class="btn btn-outline-dark btn-sm mx-2">
                                                                L
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body px-0 text-center">
                                                    <div
                                                        class="d-flex justify-content-center align-items-center mx-auto mb-1">
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
                                                        <span class="small fw-bolder ms-2 text-muted">
                                                            4.7 (1669)</span>
                                                    </div>
                                                    <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                                        href="product.php?id=<?php echo $id_p; ?>"><?php echo $libelle; ?></a>
                                                    <p class="fw-bolder m-0 mt-2">$<?php echo $prix; ?></p>
                                                </div>
                                            </div>
                                            <!--/ Card Product-->

                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <!-- /Swiper Slide-->
                            </div>
                        </div>
                        <!-- / Swiper-->
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- / Linked Product Carousels-->

        <!-- Sale Banner -->
        <section class="position-relative my-5 my-md-7 my-lg-9 bg-dark" data-aos="fade-in">
            <!-- SVG Shape Divider-->
            <div class="position-absolute text-white z-index-50 top-0 end-0 start-0">
                <svg class="align-self-start d-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1283 53.25">
                    <polygon fill="currentColor" points="1283 0 0 0 0 53.25 1283 0" />
                </svg>
            </div>
            <!-- /SVG Shape Divider-->

            <div class="py-7 py-lg-10">
                <div class="container text-white py-4 py-md-6">
                    <div class="row g-5 align-items-center">
                        <div class="col-12 col-lg-4 justify-content-center d-flex justify-content-lg-start"
                            data-aos="fade-right" data-aos-delay="250">
                            <h3 class="fs-1 fw-bold mb-0 lh-1">
                                <i class="ri-timer-flash-line align-bottom"></i> Sale Extended
                            </h3>
                        </div>
                        <div class="col-12 col-lg-4 d-flex justify-content-center flex-column" data-aos="fade-up"
                            data-aos-delay="250">
                            <?php

                            include "connexion.php";

                            // 3- Prépararyion de la requete
                            $sql = "SELECT * FROM `category` WHERE id_parent=0 ";

                            //echo $sql;
                            // 4- exécution de la requete
                            $query = mysqli_query($conn, $sql);

                            // 5-Vérification
                            $num = mysqli_num_rows($query);


                            while ($array = mysqli_fetch_array($query)) {
                                $libelle_c        = $array['libelle_c'];
                                $id_c           = $array['id_c'];
                                $description    = $array['description'];
                                $id_parent      = $array['id_parent'];




                            ?>
                            <a href="category.php?id=<?php echo $id_c?>"
                                class="btn btn-orange btn-orange-chunky text-white my-1"><span>
                                    <?php echo $libelle_c ;?></span></a>
                            <?php } ?>
                        </div>
                        <div class="col-12 col-lg-4 text-center text-lg-end" data-aos="fade-left" data-aos-delay="250">
                            <p class="lead fw-bolder">
                                Discount applied to products at checkout.
                            </p>
                            <a class="text-white fw-bolder text-link-border border-2 border-white align-self-start pb-1 transition-all opacity-50-hover"
                                href="#">Exclusions apply. Learn more
                                <i class="ri-arrow-right-line align-bottom"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SVG Shape Divider-->
            <div class="position-absolute z-index-50 text-white bottom-0 start-0 end-0">
                <svg class="align-self-end d-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1283 53.25">
                    <polygon fill="currentColor" points="0 53.25 1283 53.25 1283 0 0 53.25" />
                </svg>
            </div>
            <!-- /SVG Shape Divider-->
        </section>
        <!-- /Sale Banner -->

        <!-- Reviews-->
        <section>
            <div class="container" data-aos="fade-in">
                <h2 class="fs-1 fw-bold mb-3 text-center mb-5">Customer Reviews</h2>
                <div class="row g-3">
                    <?php

// 3- Prépararyion de la requete liste produits
$sql = "SELECT * FROM `reviews` WHERE id_p=0 LIMIT 3;";

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
                    <div class="col-12 col-lg-4" data-aos="fade-left">
                        <div
                            class="bg-light p-4 d-flex h-100 justify-content-start align-items-center flex-column text-center">
                            <p class="fw-bolder lead">
                                <?php echo $libelle ?></p>
                            <p class="mb-3">
                                <?php echo  $description ?>
                            </p>
                            <small class="text-muted d-block mb-2 fw-bolder"><?php echo  $nom ?></small>
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
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="d-flex justify-content-center flex-column mt-7 align-items-center">
                    <h3 class="mb-4 fw-bold fs-4">See what others have said</h3>
                    <div class="d-flex justify-content-center align-items-center">
                        <span class="fs-3 fw-bold me-4">4.85 / 5</span>
                        <!-- Review Stars Medium-->
                        <div class="rating position-relative d-table">
                            <div class="position-absolute stars" style="width: 88%">
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
                    <a href="#" class="btn btn-dark rounded-0 mt-4">Read 4,215 more reviews</a>
                </div>
            </div>
        </section>
        <!-- /Reviews-->

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    <!-- Footer -->
    <!-- Footer-->
    <?php include "footer.php"; ?>
    <!-- / Footer-->
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
    if (creationPanier())
    {
		
        $nbArticles=count($_SESSION['cart']['id_p']);
        if ($nbArticles <= 0)
        echo "<tr><td>Votre panier est vide </ td></tr>";
        else
        {
            for ($i=0 ;$i < $nbArticles ; $i++)
            {
				 $id = $_SESSION['cart']['id_p'][$i];
				$sql= "SELECT * FROM `produit` WHERE id_p=$id";
$query = mysqli_query($conn,$sql);
$num = mysqli_num_rows($query);

	while($array = mysqli_fetch_array($query)){
	$libelle 	    = $array['libelle_p'];
	$prix           = $array['prix'];
	$id_p 	    = $array['id_p'];
	$sql_img = "SELECT * FROM `img_produits` WHERE id_p=$id_p ";

$query_img = mysqli_query($conn,$sql_img);
 
 

$array_img = mysqli_fetch_array($query_img);
    $id_img 	    = $array_img['id_img'];
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
                                    <a> <i class="ri-close-line"></i></a>
                                </h6>
                                <small class="d-block text-muted fw-bolder">Size: Medium</small>
                                <small class="d-block text-muted fw-bolder">Qty: 1</small>
                            </div>
                            <p class="fw-bolder text-end m-0"><?php echo $prix; ?></p>
                        </div>
                    </div>
                    <?php }}} ?>
                    <!-- Cart Product-->

                </div>
                <div class="border-top pt-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="m-0 fw-bolder">Subtotal</p>
                        <p class="m-0 fw-bolder"><?php echo MontantGlobal();?>$</p>
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
            <h5 class="offcanvas-title" id="offcanvasFiltersLabel">
                Category Filters
            </h5>
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
                                <li class="mb-2">
                                    <a class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i>
                                            Waterproof Jackets</span>
                                        <span class="text-muted ms-4">(21)</span></a>
                                </li>
                                <li class="mb-2">
                                    <a class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i>
                                            Down Jackets</span>
                                        <span class="text-muted ms-4">(13)</span></a>
                                </li>
                                <li class="mb-2">
                                    <a class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i>
                                            Windproof Jackets</span>
                                        <span class="text-muted ms-4">(18)</span></a>
                                </li>
                                <li class="mb-2">
                                    <a class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i>
                                            Hiking Jackets</span>
                                        <span class="text-muted ms-4">(25)</span></a>
                                </li>
                                <li class="mb-2">
                                    <a class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i>
                                            Climbing Jackets</span>
                                        <span class="text-muted ms-4">(11)</span></a>
                                </li>
                                <li class="mb-2">
                                    <a class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i>
                                            Trekking Jackets</span>
                                        <span class="text-muted ms-4">(19)</span></a>
                                </li>
                                <li class="mb-2">
                                    <a class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i>
                                            Allround Jackets</span>
                                        <span class="text-muted ms-4">(24)</span></a>
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
                                        class="filter-min form-control-sm border flex-grow-1 text-muted border-0" />
                                </div>
                                <div class="input-group mb-0 ms-2 border">
                                    <span class="input-group-text bg-transparent fs-7 p-2 text-muted border-0">$</span>
                                    <input type="number" min="00" max="1000" step="1"
                                        class="filter-max form-control-sm flex-grow-1 text-muted border-0" />
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
                                    aria-label="Search" />
                                <span
                                    class="input-group-text bg-transparent p-2 position-absolute top-2 end-0 border-0 z-index-20"><i
                                        class="ri-search-2-line text-muted"></i></span>
                            </div>
                            <div class="simplebar-wrapper">
                                <div class="filter-options" data-pixr-simplebar>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-0" />
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-0">Adidas <span
                                                class="text-muted">(21)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-1" />
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-1">Asics <span
                                                class="text-muted">(13)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-2" />
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-2">Canterbury <span
                                                class="text-muted">(18)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-3" />
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-3">Converse <span
                                                class="text-muted">(25)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-4" />
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-4">Donnay <span
                                                class="text-muted">(11)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-5" />
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-5">Nike <span
                                                class="text-muted">(19)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-6" />
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-6">Millet <span
                                                class="text-muted">(24)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-7" />
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-7">Puma <span
                                                class="text-muted">(11)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-8" />
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-8">Reebok <span
                                                class="text-muted">(19)</span></label>
                                    </div>
                                    <div class="form-group form-check mb-0">
                                        <input type="checkbox" class="form-check-input" id="filter-brands-modal-9" />
                                        <label
                                            class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                            for="filter-brands-modal-9">Under Armour
                                            <span class="text-muted">(24)</span></label>
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
                                    aria-label="Search" />
                                <span
                                    class="input-group-text bg-transparent p-2 position-absolute top-2 end-0 border-0 z-index-20"><i
                                        class="ri-search-2-line text-muted"></i></span>
                            </div>
                            <div class="filter-options">
                                <div class="form-group form-check mb-0">
                                    <input type="checkbox" class="form-check-input" id="filter-type-modal-0" />
                                    <label
                                        class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                        for="filter-type-modal-0">Slip On
                                    </label>
                                </div>
                                <div class="form-group form-check mb-0">
                                    <input type="checkbox" class="form-check-input" id="filter-type-modal-1" />
                                    <label
                                        class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                        for="filter-type-modal-1">Strap Up
                                    </label>
                                </div>
                                <div class="form-group form-check mb-0">
                                    <input type="checkbox" class="form-check-input" id="filter-type-modal-2" />
                                    <label
                                        class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                        for="filter-type-modal-2">Zip Up
                                    </label>
                                </div>
                                <div class="form-group form-check mb-0">
                                    <input type="checkbox" class="form-check-input" id="filter-type-modal-3" />
                                    <label
                                        class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                        for="filter-type-modal-3">Toggle
                                    </label>
                                </div>
                                <div class="form-group form-check mb-0">
                                    <input type="checkbox" class="form-check-input" id="filter-type-modal-4" />
                                    <label
                                        class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                        for="filter-type-modal-4">Auto
                                    </label>
                                </div>
                                <div class="form-group form-check mb-0">
                                    <input type="checkbox" class="form-check-input" id="filter-type-modal-5" />
                                    <label
                                        class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                        for="filter-type-modal-5">Click
                                    </label>
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
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-0" />
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-0">6.5</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-1" />
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-1">7</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-2" />
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-2">7.5</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-3" />
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-3">8</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-4" />
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-4">8.5</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-5" />
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-5">9</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-6" />
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-6">9.5</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-7" />
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-7">10</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-8" />
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-8">10.5</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-9" />
                                    <label class="form-check-label fw-normal" for="filter-sizes-modal-9">11</label>
                                </div>
                                <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                    <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-10" />
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
                                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-0" />
                                    <label class="form-check-label" for="filter-colours-modal-0"></label>
                                </div>
                                <div
                                    class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-success">
                                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-1" />
                                    <label class="form-check-label" for="filter-colours-modal-1"></label>
                                </div>
                                <div
                                    class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-danger">
                                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-2" />
                                    <label class="form-check-label" for="filter-colours-modal-2"></label>
                                </div>
                                <div
                                    class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-info">
                                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-3" />
                                    <label class="form-check-label" for="filter-colours-modal-3"></label>
                                </div>
                                <div
                                    class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-warning">
                                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-4" />
                                    <label class="form-check-label" for="filter-colours-modal-4"></label>
                                </div>
                                <div
                                    class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-dark">
                                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-5" />
                                    <label class="form-check-label" for="filter-colours-modal-5"></label>
                                </div>
                                <div
                                    class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-secondary">
                                    <input type="checkbox" class="form-check-color-input" id="filter-colours-modal-6" />
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
            <h5 class="offcanvas-title" id="offcanvasReviewLabel">
                Leave A Review
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Review Form -->
            <form method="POST" action="">
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewName">Your Name</label>
                    <input type="text" class="form-control" id="formReviewName" name="nom" placeholder="Your Name" />
                </div>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewEmail">Your Email</label>
                    <input type="text" class="form-control" id="formReviewEmail" name="email"
                        placeholder="Your Email" />
                </div>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewTitle">Your Review Title</label>
                    <input type="text" class="form-control" id="formReviewTitle" name="libelle"
                        placeholder="Review Title" />
                </div>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewReview">Your Review</label>
                    <textarea class="form-control" id="formReviewReview" name="description" cols="30" rows="5"
                        placeholder="Your Review"></textarea>
                </div>
                <button type="submit" class="btn btn-dark hover-lift hover-boxshadow">
                    Submit Review
                </button>
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
                    <button class="btn btn-light btn-close-search">
                        <i class="ri-close-circle-line align-bottom"></i> Close search
                    </button>
                </div>
                <form>
                    <input type="text" class="form-control" id="searchForm"
                        placeholder="Search by product or category name..." />
                </form>
                <div class="my-5">
                    <p class="lead fw-bolder">
                        2 results found for
                        <span class="fw-bold">"Waterproof Jacket"</span>
                    </p>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
                            <!-- Card Product-->
                            <div class="card position-relative h-100 card-listing hover-trigger">
                                <div class="card-header">
                                    <picture class="position-relative overflow-hidden d-block bg-light">
                                        <img class="w-100 img-fluid position-relative z-index-10" title=""
                                            src="./assets/images/products/product-1.jpg"
                                            alt="Bootstrap 5 Template by Pixel Rocket" />
                                    </picture>
                                    <div class="card-actions">
                                        <span
                                            class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
                                            Add</span>
                                        <div class="d-flex justify-content-center align-items-center flex-wrap mt-3">
                                            <button class="btn btn-outline-dark btn-sm mx-2">
                                                S
                                            </button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">
                                                M
                                            </button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">
                                                L
                                            </button>
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
                                        </div>
                                        <span class="small fw-bolder ms-2 text-muted">
                                            4.2 (123)</span>
                                    </div>
                                    <a class="mb-0 mx-2 mx-md-4 fs-p link-cover text-decoration-none d-block text-center"
                                        href="./product.html">Mens Pennie II Waterproof
                                        Jacket</a>
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
                                            alt="Bootstrap 5 Template by Pixel Rocket" />
                                    </picture>
                                    <div class="card-actions">
                                        <span
                                            class="small text-uppercase tracking-wide fw-bolder text-center d-block">Quick
                                            Add</span>
                                        <div class="d-flex justify-content-center align-items-center flex-wrap mt-3">
                                            <button class="btn btn-outline-dark btn-sm mx-2">
                                                S
                                            </button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">
                                                M
                                            </button>
                                            <button class="btn btn-outline-dark btn-sm mx-2">
                                                L
                                            </button>
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
                                        </div>
                                        <span class="small fw-bolder ms-2 text-muted">
                                            4.5 (1289)</span>
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
                    <p class="lead m-0">
                        Didn't find what you are looking for?
                        <a class="transition-all opacity-50-hover text-white text-link-border border-white pb-1 border-2"
                            href="#">Send us a message.</a>
                    </p>
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