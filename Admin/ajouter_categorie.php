<?php
include "connexion.php";
function categoryTree($parent_id = 0, $sub_mark = ''){
    global $conn;
    $query = $conn->query("SELECT * FROM `category` WHERE id_parent = $parent_id ORDER BY libelle_c ASC");
   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['id_c'].'">'.$sub_mark.$row['libelle_c'].'</option>';
            categoryTree($row['id_c'], $sub_mark.'-');
        }
    }
}

if(isset($_POST['envoyer'])){
    $id_parent      = $_POST['id_parent'];
    $libelle        = addslashes($_POST['libelle']);
    $description    = addslashes($_POST['description']);
    



    //3- préparation de la requête
    $sql = "INSERT INTO `category`(`libelle_c`, `description`, `id_parent`) VALUES 
    ('$libelle ',' $description','$id_parent ')";
   // echo $sql;

    //4- exécution de la requête
    $exec = mysqli_query($conn,$sql);

    header('location:categorie.php');
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
<?php include "head.php"; ?>


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



                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Ajouter Catégorie</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                            for="basic-default-name">Catégories</label>
                                        <div class="col-sm-10">
                                            <select name="id_parent" class="form-control">
                                                <option value="0">Catégorie Principale</option>
                                                <?php categoryTree(); ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Libellé</label>
                                        <div class="col-sm-10">
                                            <input type="text" required class="form-control" id="basic-default-name"
                                                name="libelle" placeholder="Libellé" />
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                            for="basic-default-message">Description</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" required id="basic-default-message"
                                                class="form-control" placeholder="Description" aria-label="Description"
                                                aria-describedby="basic-icon-default-message2"></textarea>
                                        </div>
                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary"
                                                name="envoyer">Valider</button>
                                        </div>
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