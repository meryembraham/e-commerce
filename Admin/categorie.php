<?php
include "connexion.php";

if(isset($_GET['id'])){
// 1- Récupération des variables
$id 	= $_GET['id'];

// 3- Prépararyion de la requete
$sql = "DELETE FROM `category` WHERE id_c=$id ";

//echo $sql;
// 4- exécution de la requete
$query = mysqli_query($conn,$sql);

header("location:categorie.php"); 
}
?>
<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Mono - Responsive Admin & Dashboard Template</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />

    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="css/style.css" />




    <!-- FAVICON -->
    <link href="images/favicon.png" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="plugins/nprogress/nprogress.js"></script>
</head>


<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
    NProgress.configure({
        showSpinner: false
    });
    NProgress.start();
    </script>



    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">


        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <?php include "sidebar.php"; ?>



        <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>

                    <span class="page-title">user activities</span>

                    <div class="navbar-right ">

                        <!-- search form -->
                        <div class="search-form">
                            <form action="index.html" method="get">
                                <div class="input-group input-group-sm" id="input-group-search">
                                    <input type="text" autocomplete="off" name="query" id="search-input"
                                        class="form-control" placeholder="Search..." />
                                    <div class="input-group-append">
                                        <button class="btn" type="button">/</button>
                                    </div>
                                </div>
                            </form>
                            <ul class="dropdown-menu dropdown-menu-search">

                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Morbi leo risus</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Dapibus ac facilisis in</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Porta ac consectetur ac</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Vestibulum at eros</a>
                                </li>

                            </ul>

                        </div>

                        <ul class="nav navbar-nav">
                            <!-- Offcanvas -->
                            <li class="custom-dropdown">
                                <a class="offcanvas-toggler active custom-dropdown-toggler" data-offcanvas="contact-off"
                                    href="javascript:">
                                    <i class="mdi mdi-contacts icon"></i>
                                </a>
                            </li>
                            <li class="custom-dropdown">
                                <button class="notify-toggler custom-dropdown-toggler">
                                    <i class="mdi mdi-bell-outline icon"></i>
                                    <span class="badge badge-xs rounded-circle">21</span>
                                </button>
                                <div class="dropdown-notify">

                                    <header>
                                        <div class="nav nav-underline" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="all-tabs" data-toggle="tab"
                                                href="#all" role="tab" aria-controls="nav-home" aria-selected="true">All
                                                (5)</a>
                                            <a class="nav-item nav-link" id="message-tab" data-toggle="tab"
                                                href="#message" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">Msgs (4)</a>
                                            <a class="nav-item nav-link" id="other-tab" data-toggle="tab" href="#other"
                                                role="tab" aria-controls="nav-contact" aria-selected="false">Others
                                                (3)</a>
                                        </div>
                                    </header>

                                    <div class="" data-simplebar style="height: 325px;">
                                        <div class="tab-content" id="myTabContent">

                                            <div class="tab-pane fade show active" id="all" role="tabpanel"
                                                aria-labelledby="all-tabs">

                                                <div class="media media-sm bg-warning-10 p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-02.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">John Doe</span>
                                                            <span class="discribe">Extremity sweetness difficult
                                                                behaviour he of. On disposal of as landlord horrible.
                                                                Afraid at highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>Just now</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 bg-light mb-0">
                                                    <div class="media-sm-wrapper bg-primary">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-calendar-check-outline"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">New event added</span>
                                                            <span class="discribe">1/3/2014 (1pm - 2pm)</span>
                                                            <span class="time">
                                                                <time>10 min ago...</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-03.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Sagge Hudson</span>
                                                            <span class="discribe">On disposal of as landlord Afraid at
                                                                highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>1 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper bg-info-dark">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-account-multiple-check"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Add request</span>
                                                            <span class="discribe">Add Dany Jones as your
                                                                contact.</span>
                                                            <div class="buttons">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-success shadow-none text-white">accept</a>
                                                                <a href="#" class="btn btn-sm shadow-none">delete</a>
                                                            </div>
                                                            <span class="time">
                                                                <time>6 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper bg-info">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-playlist-check"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Task complete</span>
                                                            <span class="discribe">Afraid at highly months do things on
                                                                at.</span>
                                                            <span class="time">
                                                                <time>1 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="message" role="tabpanel"
                                                aria-labelledby="message-tab">

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-01.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Selena Wagner</span>
                                                            <span class="discribe">Lorem ipsum dolor sit amet,
                                                                consectetur adipisicing elit.</span>
                                                            <span class="time">
                                                                <time>15 min ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-03.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Sagge Hudson</span>
                                                            <span class="discribe">On disposal of as landlord Afraid at
                                                                highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>1 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm bg-warning-10 p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-02.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">John Doe</span>
                                                            <span class="discribe">Extremity sweetness difficult
                                                                behaviour he of. On disposal of as landlord horrible.
                                                                Afraid
                                                                at highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>Just now</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-04.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Albrecht Straub</span>
                                                            <span class="discribe"> Beatae quia natus assumenda
                                                                laboriosam, nisi perferendis aliquid consectetur
                                                                expedita non tenetur.</span>
                                                            <span class="time">
                                                                <time>Just now</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="other" role="tabpanel"
                                                aria-labelledby="contact-tab">

                                                <div class="media media-sm p-4 bg-light mb-0">
                                                    <div class="media-sm-wrapper bg-primary">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-calendar-check-outline"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">New event added</span>
                                                            <span class="discribe">1/3/2014 (1pm - 2pm)</span>
                                                            <span class="time">
                                                                <time>10 min ago...</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper bg-info-dark">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-account-multiple-check"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Add request</span>
                                                            <span class="discribe">Add Dany Jones as your
                                                                contact.</span>
                                                            <div class="buttons">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-success shadow-none text-white">accept</a>
                                                                <a href="#" class="btn btn-sm shadow-none">delete</a>
                                                            </div>
                                                            <span class="time">
                                                                <time>6 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper bg-info">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-playlist-check"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Task complete</span>
                                                            <span class="discribe">Afraid at highly months do things on
                                                                at.</span>
                                                            <span class="time">
                                                                <time>1 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <footer class="border-top dropdown-notify-footer">
                                        <div class="d-flex justify-content-between align-items-center py-2 px-4">
                                            <span>Last updated 3 min ago</span>
                                            <a id="refress-button" href="javascript:"
                                                class="btn mdi mdi-cached btn-refress"></a>
                                        </div>
                                    </footer>
                                </div>
                            </li>
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="images/user/user-xs-01.jpg" class="user-image rounded-circle"
                                        alt="User Image" />
                                    <span class="d-none d-lg-inline-block">John Doe</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-link-item" href="user-profile.html">
                                            <i class="mdi mdi-account-outline"></i>
                                            <span class="nav-text">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="email-inbox.html">
                                            <i class="mdi mdi-email-outline"></i>
                                            <span class="nav-text">Message</span>
                                            <span class="badge badge-pill badge-primary">24</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="user-activities.html">
                                            <i class="mdi mdi-diamond-stone"></i>
                                            <span class="nav-text">Activitise</span></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="user-account-settings.html">
                                            <i class="mdi mdi-settings"></i>
                                            <span class="nav-text">Account Setting</span>
                                        </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <a class="dropdown-link-item" href="sign-in.html"> <i
                                                class="mdi mdi-logout"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>


            </header>

            <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
            <div class="content-wrapper">
                <div class="content">


                    <div class="row">

                        <div class="col-12">
                            <!-- Sales by Product -->
                            <div class="card card-default">
                                <div class="card-header align-items-center">
                                    <h2 class="">liste des Catégories</h2>

                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <table id="product-sale" class="table table-product " style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>libelle</th>
                                                    <th>Description</th>
                                                    <th>type</th>
                                                    <th class="th-width-250">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

// 3- Prépararyion de la requete
$sql = "SELECT * FROM `category` ";

//echo $sql;
// 4- exécution de la requete
$query = mysqli_query($conn,$sql);

// 5-Vérification
$num = mysqli_num_rows($query);
 

	while($array = mysqli_fetch_array($query)){
	$libelle 	    = $array['libelle_c'];
	$id_c           = $array['id_c'];
    $description    = $array['description'];
    $id_parent      = $array['id_parent'];

 
 

?>
                                                <tr>
                                                    <td><?php echo $id_c; ?></td>
                                                    <td><?php echo $libelle; ?></td>
                                                    <td><?php echo mb_strimwidth($description, 0, 50, "...") ; ?></td>
                                                    <td><?php echo $id_parent; ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle icon-burger-mini" href="#"
                                                                role="button" id="dropdownMenuLink"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item"
                                                                    href="
                                                                    modifier_categorie.php?id=<?php echo $id_c; ?>">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="?id=<?php echo $id_c; ?>">Delete</a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>

            </div>

            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a
                            class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
                    </p>
                </div>
                <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>

        </div>
    </div>

    <!-- Card Offcanvas -->
    <?php include "head.php"; ?>




    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/simplebar/simplebar.min.js"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>


    <script src="js/mono.js"></script>
    <script src="js/chart.js"></script>
    <script src="js/map.js"></script>
    <script src="js/custom.js"></script>




    <!--  -->


</body>

</html>