<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png" />
    <link rel="mask-icon" href="./assets/favicon/safari-pinned-tab.svg" color="#5bbad5" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />

    <title>Login Page</title>

</head>



<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                    <h3>Login to <strong>Colorlib</strong></h3>
                    <?php if(isset($_GET['error'])){ ?>
                    <p class="mb-4" style="color:red;">Merci de vérifier vos accès !!!</p>
                    <?php }else{ ?>
                    <p class="mb-4">Please sign-in to your account and start the adventure</p>
                    <?php } ?>
                    <form action="auth.php" method="post">
                        <div class="form-group first">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="email" placeholder="your-email@gmail.com"
                                id="username">
                        </div>
                        <div class="form-group last mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Your Password"
                                id="password">
                        </div>

                        <div class="d-flex mb-5 align-items-center">
                            <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                <input type="checkbox" checked="checked" />
                                <div class="control__indicator"></div>
                            </label>
                            <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                        </div>

                        <button type="submit" name="submit" class="btn btn-block btn-primary"> Log In
                        </button>
                        <span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span>
                        <div style="text-align:center;">
                            <!-- Facebook -->
                            <a style="color: #3b5998;" href="#!" role="button"><i
                                    class="fab fa-facebook-f fa-lg"></i></a>

                            <!-- Twitter -->
                            <a style="color: #55acee;margin-left: 14px;" href="#!" role="button"><i
                                    class="fab fa-twitter fa-lg"></i></a>

                            <!-- Google -->
                            <a style="color: #dd4b39;margin-left: 14px;" href="#!" role="button"><i
                                    class="fab fa-google fa-lg"></i></a>

                            <!-- Instagram -->
                            <a style="color: #ac2bac;margin-left: 14px;" href="#!" role="button"><i
                                    class="fab fa-instagram fa-lg"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>



<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>