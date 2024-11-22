<?php
include "connexion.php"; 

function categoryTree($parent_id = 0, $sub_mark = ''){
    global $conn;
    $query = $conn->query("SELECT * FROM `category` WHERE id_parent = $parent_id ORDER BY libelle_c ASC");
   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['id_c'].'">'.$sub_mark.$row['libelle_c'].'</option>';
            categoryTree($row['id_c'], $sub_mark.'- ');
        }
    }
}


if(isset($_POST['envoyer']))
{
$id_cat     = $_POST['id_cat'];
$libelle 	= addslashes($_POST['libelle']);
$desc 	= addslashes($_POST['desc']);
$prix       = $_POST['prix'];
$qtt        = $_POST['qtt'];
$id_b  = $_POST['id_b'];

$sql = "INSERT INTO `produit`(`libelle_p`, `description_p`, `id_b`, `id_c`, `qte_p`, `prix`) VALUES 
('$libelle ','$desc','$id_b ','$id_cat','$qtt ','$prix ')";
echo ($sql);
// 4- exécution de la requete
$exec = mysqli_query($conn,$sql);
$dernier_id = mysqli_insert_id($conn);

//https://www.stechies.com/move-uploaded-file/
foreach ($_FILES['img_p']['tmp_name'] as $key => $value) {
 //Taking the files from input
 $file = $_FILES['img_p'];
 //Getting the file name of the uploaded file
 $fileName = $_FILES['img_p']['name'][$key];
 //Getting the Temporary file name of the uploaded file
 $fileTempName = $_FILES['img_p']['tmp_name'][$key];
 //Getting the file size of the uploaded file
 $fileSize = $_FILES['img_p']['size'][$key];
 //getting the no. of error in uploading the file
 $fileError = $_FILES['img_p']['error'][$key];
 //Getting the file type of the uploaded file
 $fileType = $_FILES['img_p']['type'][$key];

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

             $sql_img= "INSERT INTO `img_produits`( `id_p`, `libelle_img`) VALUES ('$dernier_id','$fileNemeNew')";
             $query_img = mysqli_query($conn,$sql_img);
             echo $sql_img;
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
}
// 3- Prépararyion de la requete


header('location:produits.php');
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


                    <div class="row">

                        <div class="col-12">
                            <!-- Sales by Product -->
                            <div class="card card-default">
                                <div class="card-header align-items-center">
                                    <h2 class="">Liste des produits</h2>
                                    <a href="#" class="btn btn-primary btn-pill" data-toggle="modal"
                                        data-target="#modal-stock">Ajouter Produit</a>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <table id="product-sale" class="table table-product " style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Libellé</th>
                                                    <th>Qte</th>
                                                    <th>Prix</th>
                                                    <th class="th-width-250"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>Coach Swagger</td>
                                                    <td>134</td>
                                                    <td>$24541</td>
                                                    <td>35.28%</td>
                                                    <td>
                                                        <div class="progress progress-md rounded-0">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 70%" aria-valuenow="70%" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Stock Modal -->
                    <div class="modal fade modal-stock" id="modal-stock" aria-labelledby="modal-stock"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg
                         modal-dialog-centered" role="document">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header align-items-center p3 p-md-5">
                                        <h2 class="modal-title" id="exampleModalGridTitle">Ajouter un produit</h2>
                                        <div>
                                            <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2"
                                                data-dismiss="modal">annuler </button>
                                            <button type="submit" class="btn btn-primary  btn-pill" name="envoyer">
                                                valider </button>
                                        </div>

                                    </div>
                                    <div class="modal-body p3 p-md-5">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h3 class="h5 mb-5">Information produit</h3>
                                                <div class="form-group mb-5">
                                                    <label for="new-product">Libellé produit</label>
                                                    <input type="text" class="form-control" id="new-product"
                                                        placeholder="ajouter libelle" name="libelle">
                                                </div>
                                                <div class="form-group mb-5">
                                                    <label for="new-product">Marque produit</label>

                                                    <select name="id_b" class="form-control">
                                                        <?php

// 3- Prépararyion de la requete
$sql = "SELECT * FROM `brands`  ";


//echo $sql;
// 4- exécution de la requete
$query = mysqli_query($conn,$sql);

// 5-Vérification
$num = mysqli_num_rows($query);
 

	while($array = mysqli_fetch_array($query)){
    $id_b 	    = $array['id_b'];
	$libelle_b	    = $array['libelle_b'];
    $logo        = $array['logo'];

 
 

?>
                                                        <option value="<?php echo $id_b ; ?>">
                                                            <?php echo $libelle_b ; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>

                                                </div>
                                                <div class="form-group mb-5">
                                                    <label for="new-product">Catégorie produit</label>

                                                    <select name="id_cat" class="form-control">
                                                        <option value="0">Catégorie Principale</option>
                                                        <?php categoryTree(); ?>
                                                    </select>

                                                </div>
                                                <div class="form-row mb-4">
                                                    <div class="col">
                                                        <label for="prix">Prix</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                    id="basic-addon1">$</span>
                                                            </div>
                                                            <input type="text" class="form-control" id="prix"
                                                                name="prix" placeholder="Prix" aria-label="prix"
                                                                aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="qtt">Quantité</label>
                                                        <div class="input-group">

                                                            <input type="text" class="form-control" id="qtt" name="qtt"
                                                                placeholder="Quantite" aria-label="qtt"
                                                                aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="form-group mb-5">

                                                    <label class="d-block" for="desc">Description <i
                                                            class="mdi mdi-help-circle-outline"></i></label>
                                                    <div class="col">
                                                        <textarea id="desc" class="form-control"
                                                            placeholder="Description" aria-label="desc"
                                                            aria-describedby="desc" name="desc"></textarea>
                                                    </div>



                                                </div>

                                            </div>
                                            <div class="col-lg-4">
                                                <div class="custom-file">
                                                    <label class="col-sm-2 col-form-label" for="image">Image</label>
                                                    <input type="file" class="custom-file-input" id="image"
                                                        placeholder="please imgae here" name="img_p[]" multiple>
                                                    <span class="upload-image">Click here to <span
                                                            class="text-primary">add
                                                            product image.</span> </span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>


                </div>

            </div>

            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year"></span> Copyright Mono Dashboard
                        Bootstrap Template by <a class="text-primary" href="http://www.iamabdus.com/"
                            target="_blank">Abdus</a>.
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
    <?php include "card.php"; ?>




    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/simplebar/simplebar.min.js"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>



    <script src="plugins/apexcharts/apexcharts.js"></script>



    <script src="plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js">
    </script>



    <script src="plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>



    <script src="plugins/daterangepicker/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script>
    jQuery(document).ready(function() {
        jQuery('input[name="dateRange"]').daterangepicker({
            autoUpdateInput: false,
            singleDatePicker: true,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(
            ev, picker) {
            jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
        });
        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(
            ev, picker) {
            jQuery(this).val('');
        });
    });
    </script>



    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>



    <script src="plugins/toaster/toastr.min.js"></script>



    <script src="js/mono.js"></script>
    <script src="js/chart.js"></script>
    <script src="js/map.js"></script>
    <script src="js/custom.js"></script>




    <!--  -->




    <!--  -->


</body>

</html>