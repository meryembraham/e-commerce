<?php 
if ( empty(session_id()) ) session_start();



 ?>

<div class="w-100 pb-lg-0 pt-lg-0 pt-4 pb-3">
    <div class="container-fluid d-flex justify-content-between align-items-center flex-wrap">
        <!-- Logo-->
        <a class="navbar-brand fw-bold fs-3 m-0 p-0 flex-shrink-0" href="./index.php">
            <!-- Start of Logo-->
            <div class="d-flex align-items-center">
                <div class="f-w-6 d-flex align-items-center me-2 lh-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 194 194">
                        <path fill="currentColor" class="svg-logo-white"
                            d="M47.45,60l1.36,27.58,53.41-51.66,50.87,50,3.84-26L194,100.65V31.94A31.94,31.94,0,0,0,162.06,0H31.94A31.94,31.94,0,0,0,0,31.94v82.57Z" />
                        <path fill="currentColor" class="svg-logo-dark"
                            d="M178.8,113.19l1,34.41L116.3,85.92l-14.12,15.9L88.07,85.92,24.58,147.53l.93-34.41L0,134.86v27.2A31.94,31.94,0,0,0,31.94,194H162.06A31.94,31.94,0,0,0,194,162.06V125.83Z" />
                    </svg>
                </div>
                <span class="fs-5">Alpine</span>
            </div>
            <!-- / Logo-->
        </a>
        <!-- / Logo-->

        <!-- Main Navigation-->
        <div class="ms-5 flex-shrink-0 collapse navbar-collapse navbar-collapse-light w-auto flex-grow-1"
            id="navbarNavDropdown">
            <!-- Mobile Nav Toggler-->
            <button
                class="btn btn-link px-2 text-decoration-none navbar-toggler border-0 position-absolute top-0 end-0 mt-3 me-2"
                data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                aria-expanded="false" aria-label="Toggle navigation">
                <i class="ri-close-circle-line ri-2x"></i>
            </button>
            <!-- / Mobile Nav Toggler-->

            <ul class="navbar-nav py-lg-2 mx-auto">
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
                <li class="nav-item me-lg-4 dropdown position-static">

                    <a class="nav-link fw-bolder dropdown-toggle py-lg-4" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <?php echo $libelle_c; ?>
                    </a>

                    <!-- Menswear dropdown menu-->
                    <div class="dropdown-menu dropdown-megamenu">
                        <div class="container">
                            <div class="row g-0">
                                <!-- Dropdown Menu Links Section-->
                                <div class="col-12 col-lg-7">
                                    <div class="row py-lg-5">
                                        <!-- menu row-->


                                        <div class="col col-lg-6 mb-5 mb-sm-0">



                                            <ul class="list-unstyled ">
                                                <?php

                                                        $sql_s = "SELECT * FROM `category` WHERE id_parent=$id_c";
                                                        $query = mysqli_query($conn, $sql_s);
                                                        $num = mysqli_num_rows($query);
                                                        $count = 0;

                                                        while ($array = mysqli_fetch_array($query)) {
                                                            $libelle_s = $array['libelle_c'];
                                                            $id_s = $array['id_c'];
                                                            $description = $array['description'];
                                                            $id_parent = $array['id_parent'];


                                                            if ($count < 6) { // Display only the first 5 list items 
                                                        ?>

                                                <li <a class="dropdown-item" style="display:flex
                                                " <li><a class="dropdown-item" style="display:flex" href="
                                                        products_categoryS.php?id=<?php echo $id_s; ?>">
                                                        <?php echo $libelle_s; ?></a>
                                                </li>

                                                <?php
                                                                $count++;
                                                            } else {

                                                                echo "</div>
                                                <div class='col col-lg-6'>" ?>
                                                <ul class="list-unstyled ">
                                                    <li><a class="dropdown-item" style="display:flex" href="
                                                        products_categoryS.php?id=<?php echo $id_s; ?>">
                                                            <?php echo $libelle_s; ?> </a>
                                                    </li>
                                                </ul>
                                                </ <?php

                                                                }
                                                            }
                                                        } ?> <!-- /menu row-->

                                                <!-- menu row-->


                                                <!-- /menu row-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Dropdown Menu Images Section-->
                                <div class="d-none d-lg-block col-lg-5">
                                    <div class="vw-50 h-100 bg-img-cover bg-pos-center-center position-absolute" style=" right: 0;
    top: 0;
                              background-image: url(./assets/images/banners/banner-2.jpg);
                            "></div>
                                </div>
                                <!-- Dropdown Menu Images Section-->

                            </div>
                        </div>
                        <!-- / Menswear dropdown menu-->

                </li>
                <li class="nav-item dropdown me-lg-4">
                    <a class="nav-link fw-bolder dropdown-toggle py-lg-4" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Brands
                    </a>
                    <ul class="dropdown-menu">
                        <?php

                                //3- Prépararyion de la requete
                                $sql_b = "SELECT * FROM `brands`";

                                //echo $sql;
                                // 4- exécution de la requete
                                $query = mysqli_query($conn, $sql_b);

                                // 5-Vérification
                                $num = mysqli_num_rows($query);


                                while ($array = mysqli_fetch_array($query)) {
                                    $id_b         = $array['id_b'];
                                    $libelle_b         = $array['libelle_b'];
                                    $logo        = $array['logo'];

                                ?>
                        <li>
                            <a class="dropdown-item"
                                href="product_brand.php?id=<?php echo $id_b; ?>"><?php echo $libelle_b; ?></a>
                        </li>
                        <?php  } ?>
                    </ul>
                </li>
                <li class="nav-item dropdown me-lg-4">
                    <a class="nav-link fw-bolder dropdown-toggle py-lg-4" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Demo Pages
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="./index.php">Homepage</a>
                        </li>


                        <li>
                            <a class="dropdown-item" href="./cart.php">Cart</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="./checkout.php">Checkout</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- / Main Navigation-->

        <!-- Navbar Icons-->
        <ul class="list-unstyled mb-0 d-flex align-items-center">
            <!-- Navbar Toggle Icon-->
            <li class="d-inline-block d-lg-none">
                <button class="btn btn-link px-2 text-decoration-none navbar-toggler border-0 d-flex align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ri-menu-line ri-lg align-middle"></i>
                </button>
            </li>
            <!-- /Navbar Toggle Icon-->

            <!-- Navbar Search-->
            <li class="ms-1 d-inline-block">
                <button class="btn btn-link px-2 text-decoration-none d-flex align-items-center" data-pr-search>
                    <i class="ri-search-2-line ri-lg align-middle"></i>
                </button>
            </li>
            <!-- /Navbar Search-->

            <!-- Navbar Wishlist-->
            <li class="ms-1 d-none d-lg-inline-block">
                <a class="btn btn-link px-2 py-0 text-decoration-none d-flex align-items-center" href="#">
                    <i class="ri-heart-line ri-lg align-middle"></i>
                </a>
            </li>
            <!-- /Navbar Wishlist-->

            <!-- Navbar Login-->
            <li class="ms-1 d-none d-lg-inline-block">
                <div class="dropdown">
                    <a class="btn btn-link px-2 text-decoration-none d-flex align-items-center" href="#" role="button"
                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ri-user-line ri-lg align-middle"></i>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <!-- Dropdown menu items -->
                        <?php if (isset($_SESSION['id_u']) && $_SESSION['id_u'] !== null ) { ?>
                        <li><a class="dropdown-item" href="logout.php">logout</a></li>
                        <?php } else { ?>
                        <li><a class="dropdown-item" href="sign-in.php">sign-in</a></li>
                        <li><a class="dropdown-item" href="sign-up.php">sign-up</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </li>







            <!-- /Navbar Login-->

            <!-- Navbar Cart-->
            <li class="ms-1 d-inline-block position-relative">
                <button class="btn btn-link px-2 text-decoration-none d-flex align-items-center disable-child-pointer"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                    <i class="ri-shopping-cart-2-line ri-lg align-middle position-relative z-index-10"></i>
                    <span
                        class="fs-xs fw-bolder f-w-5 f-h-5 bg-orange rounded-lg d-block lh-1 pt-1 position-absolute top-0 end-0 z-index-20 mt-2 text-white">0</span>
                </button>
            </li>
            <!-- /Navbar Cart-->
        </ul>
        <!-- Navbar Icons-->
    </div>
</div>