<?php
include "connexion.php";


if(isset($_POST['envoyer'])){

    $libelle        = addslashes($_POST['libelle']);

//https://www.stechies.com/move-uploaded-file/

 //Taking the files from input
 $file = $_FILES['logo'];
 //Getting the file name of the uploaded file
 $fileName = $_FILES['logo']['name'];
 //Getting the Temporary file name of the uploaded file
 $fileTempName = $_FILES['logo']['tmp_name'];
 //Getting the file size of the uploaded file
 $fileSize = $_FILES['logo']['size'];
 //getting the no. of error in uploading the file
 $fileError = $_FILES['logo']['error'];
 //Getting the file type of the uploaded file
 $fileType = $_FILES['logo']['type'];

 //Getting the file ext
 $fileExt = explode('.',$fileName);
 $fileActualExt = strtolower(end($fileExt));

 //Array of Allowed file type
 $allowedExt = array("jpg","jpeg","png","gif","webp","jfif");

 //Checking, Is file extentation is in allowed extentation array
 if(in_array($fileActualExt, $allowedExt)){
     //Checking, Is there any file error
     if($fileError == 0){
         //Checking,The file size is bellow than the allowed file size
         if($fileSize < 10000000){
             //Creating a unique name for file
             $fileNemeNew = uniqid('',true).".".$fileActualExt;
             //File destination
             $fileDestination = 'uploads/'.$fileNemeNew;
             //function to move temp location to permanent location
             move_uploaded_file($fileTempName, $fileDestination);
             //Message after success
             echo "File Uploaded successfully";
         }else{
             //Message,If file size greater than allowed size
             echo "File Size Limit beyond acceptance";
         }
     }else{
         //Message, If there is some error
         echo "Something Went Wrong Please try again!";
     }
 }else{
     //Message,If this is not a valid file type
     echo "You can't upload this extention of file";
 }


    //3- préparation de la requête
    $sql = "INSERT INTO `brands`(`libelle_b`, `logo`) VALUES ('$libelle ','$fileNemeNew')";
   // echo $sql;

    //4- exécution de la requête
    $exec = mysqli_query($conn,$sql);

    header('location:brands.php');
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
                                <h5 class="mb-0">Ajouter Brand</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">


                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Libellé</label>
                                        <div class="col-sm-10">
                                            <input type="text" required class="form-control" id="basic-default-name"
                                                name="libelle" placeholder="Libellé" />
                                        </div>
                                    </div>



                                    <div class="row mb-3">

                                        <label for="logo" class="col-sm-4 col-lg-2 col-form-label">Logo</label>
                                        <div class="col-sm-8 col-lg-10">
                                            <div class="custom-file mb-1">
                                                <input type="file" class="custom-file-input" id="logo" required
                                                    name="logo">
                                                <label class="custom-file-label" for="logo">Choose
                                                    file...</label>
                                                <div class="invalid-feedback">Example invalid custom file feedback
                                                </div>
                                            </div>
                                            <span class="d-block ">Upload a new logo, JPG 1200x300</span>
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