<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login Page</title>
</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3>Login to <strong>Alpine</strong></h3>

                        <form action="inscription.php" method="POST">
                            <div class="form-group first">
                                <label for="prenom">First name</label>
                                <input type="text" class="form-control" name="prenom" placeholder="First name"
                                    id="prenom" required>
                            </div>
                            <div class="form-group first">
                                <label for="nom">last name</label>
                                <input type="text" class="form-control" name="nom" placeholder="last name" id="nom"
                                    required>
                            </div>
                            <div class="form-group first">
                                <label for="tel">Phone</label>
                                <input type="tel" class="form-control" name="tel" placeholder="Phone" id="tel" required>
                            </div>
                            <div class="form-group first">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="your-email@gmail.com"
                                    id="email" required>
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="pass" placeholder="Your Password"
                                    id="password" required>
                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                    <input type="checkbox" checked="checked" />
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                            </div>

                            <button type="submit" name="submit" class="btn btn-block btn-primary">
                                Sign Up
                            </button>
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