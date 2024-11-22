<?php
include "connexion.php";
if ( empty(session_id()) ) session_start();
if(isset($_GET['id'])){
// 1- Récupération des variables
$id = $_GET['id'];

// 3- Prépararyion de la requete
$sql = "DELETE FROM `users` WHERE id_u= $id   ";

//echo $sql;
// 4- exécution de la requete
$query = mysqli_query($conn,$sql);

header("location:contacts.php");
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
            <?php include "header.php"; ?>

            <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
            <div class="content-wrapper">
                <div class="content">
                    <div class="card card-default">
                        <div class="card-header align-items-center px-3 px-md-5">
                            <h2>Contacts</h2>

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-add-contact"> Add Contact
                            </button>
                        </div>

                        <div class="card-body px-3 px-md-5">
                            <div class="row">
                                <?php
                               
                               
                               $user=$_SESSION['id_u'];
// 3- Prépararyion de la requete
$sql = "SELECT * FROM `users` WHERE id_u != $user ";

//echo $sql;
// 4- exécution de la requete
$query = mysqli_query($conn,$sql);

// 5-Vérification

 

	while($array = mysqli_fetch_array($query)){
    $id_u        = $array['id_u'];
	$nom        = $array['nom'];
  $prenom        = $array['prenom'];
    $email    = $array['email'];
    $tel      = $array['tel'];
   /* $sql = "SSELECT count(*) AS total FROM `order` WHERE id_u=$id_u ";
    
if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    
    // Display result
    printf("Total rows in this table :  %d\n", $rowcount);
 
    // 5-Vérification
    
     
    */
    
 
 

?>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="card card-default p-4">
                                        <a href="javascript:0" class="media text-secondary" data-toggle="modal"
                                            data-target="#modal-contact">
                                            <img src="images/user/u-xl-1.jpg" class="mr-3 img-fluid rounded"
                                                alt="Avatar Image">

                                            <div class="media-body">
                                                <h5 class="mt-0 mb-2 text-dark"><?php echo $prenom ?> <?php echo $nom ?>
                                                </h5>
                                                <ul class="list-unstyled text-smoke text-smoke">

                                                    <li class="d-flex">
                                                        <i class="mdi mdi-email mr-1"></i>
                                                        <span><?php echo $email ?></span>
                                                    </li>
                                                    <li class="d-flex">
                                                        <i class="mdi mdi-phone mr-1"></i>
                                                        <span><?php echo $tel ?></span>
                                                    </li>
                                                    <!---- <li class="d-flex">
                                                        <i class="mdi mdi-phone mr-1"></i>
                                                        <span></span>
                                                        </li>---->
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal-contact" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header justify-content-end border-bottom-0">
                                                <button type="button" class="btn-edit-icon" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>

                                                <div class="dropdown">
                                                    <button class="btn-dots-icon" type="button" id="dropdownMenuButton"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </button>

                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="?id=<?php echo $id_u; ?>">Delete</a>

                                                    </div>
                                                </div>

                                                <button type="button" class="btn-close-icon" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i class="mdi mdi-close"></i>
                                                </button>
                                            </div>

                                            <div class="modal-body pt-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-6">
                                                        <div class="profile-content-left px-4">
                                                            <div class="card text-center px-0 border-0">
                                                                <div class="card-img mx-auto">
                                                                    <img class="rounded-circle" src="images/user/u6.jpg"
                                                                        alt="user image">
                                                                </div>

                                                                <div class="card-body">
                                                                    <h4 class="py-2"><?php echo $prenom ?>
                                                                        <?php echo $nom ?></h4>
                                                                    <p><?php echo $email ?></p>

                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="contact-info px-4">
                                                            <h4 class="mb-1">Contact Details</h4>
                                                            <p class="text-dark font-weight-medium pt-4 mb-2">Email
                                                                address</p>
                                                            <p><?php echo $email ?></p>
                                                            <p class="text-dark font-weight-medium pt-4 mb-2">Phone
                                                                Number</p>
                                                            <p><?php echo $tel ?></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php  }?>
                            </div>
                        </div>
                    </div>


                    <!-- Contact Modal -->


                    <!-- Add Contact Button  -->
                    <div class="modal fade" id="modal-add-contact" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header px-4">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Create New
                                            Contact</h5>
                                    </div>
                                    <div class="modal-body px-4">

                                        <div class="form-group row mb-6">
                                            <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">User
                                                Image</label>
                                            <div class="col-sm-8 col-lg-10">
                                                <div class="custom-file mb-1">
                                                    <input type="file" class="custom-file-input" id="coverImage"
                                                        required>
                                                    <label class="custom-file-label" for="coverImage">Choose
                                                        file...</label>
                                                    <div class="invalid-feedback">
                                                        Example invalid custom file
                                                        feedback
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="firstName">First
                                                        name</label>
                                                    <input type="text" class="form-control" id="firstName"
                                                        value="Albrecht">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Last
                                                        name</label>
                                                    <input type="text" class="form-control" id="lastName"
                                                        value="Straub">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group mb-4">
                                                    <label for="userName">User
                                                        name</label>
                                                    <input type="text" class="form-control" id="userName" value="Doe">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group mb-4">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        value="albrecht.straub@gmail.com">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group mb-4">
                                                    <label for="Birthday">Birthday</label>
                                                    <input type="text" class="form-control" id="Birthday"
                                                        value="01-10-1993">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group mb-4">
                                                    <label for="event">Event</label>
                                                    <input type="text" class="form-control" id="event"
                                                        value="Some value for event">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer px-4">
                                        <button type="button" class="btn btn-smoke btn-pill"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary btn-pill">Save
                                            Contact</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap
                        Template by <a class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
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
    <div class="card card-offcanvas" id="contact-off">
        <div class="card-header">
            <h2>Contacts</h2>
            <a href="#" class="btn btn-primary btn-pill px-4">Add New</a>
        </div>
        <div class="card-body">

            <div class="mb-4">
                <input type="text" class="form-control form-control-lg form-control-secondary rounded-0"
                    placeholder="Search contacts...">
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="images/user/user-sm-01.jpg" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Selena Wagner</span>
                        <span class="discribe">Designer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="images/user/user-sm-02.jpg" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Walter Reuter</span>
                        <span>Developer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="images/user/user-sm-03.jpg" alt="User Image">
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Larissa Gebhardt</span>
                        <span>Cyber Punk</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="images/user/user-sm-04.jpg" alt="User Image">
                    </a>

                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Albrecht Straub</span>
                        <span>Photographer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="images/user/user-sm-05.jpg" alt="User Image">
                        <span class="active bg-danger"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Leopold Ebert</span>
                        <span>Fashion Designer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="images/user/user-sm-06.jpg" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Selena Wagner</span>
                        <span>Photographer</span>
                    </a>
                </div>
            </div>

        </div>
    </div>




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