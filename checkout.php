<?php
include "connexion.php";
session_start();
include "fonction_panier.php";

if (isset($_GET['idsupp'])) {
  $isup = $_GET['idsupp'];
  supprimerArticle($isup);
  header('location: cart.php');
}

if (isset($_POST['btnm'])) {
  $idm = $_POST["idm"];
  $qtt = $_POST["quant"];
  modifierQTeArticle($idm, $qtt);
  header('location: cart.php');
}
if(isset($_POST['order_btn'])){

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $number = $_POST['phone'];
  $email = $_POST['email'];
  $payment = $_POST['checkoutPaymentMethod'];
  $shipping = $_POST['checkoutShippingMethod'];
  $street = $_POST['address'];
  $zip = $_POST['zip'];
  $state = $_POST['state'];
  $country = $_POST['country'];
  
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
                $sql_img = "SELECT * FROM `img_produits` WHERE id_p=$id_p  ";

                $query_img = mysqli_query($conn, $sql_img);



                $array_img = mysqli_fetch_array($query_img);
                $id_img         = $array_img['id_img'];
                $libelle_img    = $array_img['libelle_img'];
            }
  $price_total=MontantGlobal()+$shipping;
  $total_product = compterArticles();
  $id_u=$_SESSION['id_u'];
  $detail_query = mysqli_query($conn, "INSERT INTO `order`( `prenom`, `nom`, `tel`, `email`, `payment`, `shipping`, `address`, `zip`, `state`, `country`, `total_produit`, `prix_total`, `id_u`) 
  VALUES('$firstname','$lastname','$number','$email','$payment','$shipping','$street','$zip','$state','$country','$total_product','$price_total','$id_u')") or die('query failed');

  if($detail_query){
     echo "
     <div class='order-message-container'>
     <div class='message-container'>
        <h3>thank you for shopping!</h3>
        <div class='order-detail'>
           <span>".$total_product."</span>
           <span class='total'> total : $".$price_total."/-  </span>
        </div>
        <div class='customer-details'>
           <p> your name : <span>".$firstname."</span> </p>
           <p> your number : <span>".$number."</span> </p>
           <p> your email : <span>".$email."</span> </p>
           <p> your address : <span>".$street.",".$state.", ".$country." - ".$zip."</span> </p>
           <p> your payment mode : <span>".$payment."</span> </p>
           <p> your shipping mode : <span>".$shipping."</span> </p>
           <p>(*pay when product arrives*)</p>
        </div>
           <a href='products.php' class='btn'>continue shopping</a>
        </div>
     </div>
     ";
     supprimePanier();
  }
}}}
}
?>
<!doctype html>
<html lang="en">


<!-- Head -->

<?php include "head.php"; ?>

<body class="">

    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom mx-0 p-0 flex-column  ">
        <?php include "navbar.php"; ?>
    </nav>
    <!-- / Navbar-->
    <!-- / Navbar-->

    <!-- Main Section-->
    <section class="mt-5 container ">
        <!-- Page Content Goes Here -->

        <h1 class="mb-4 display-5 fw-bold text-center">Checkout Securely</h1>
        <p class="text-center mx-auto">Please fill in the details below to complete your order. Already registered?
            <a href="#">Login here.</a>
        </p>

        <div class="row g-md-8 mt-4">
            <!-- Checkout Panel Left -->

            <div class="col-12 col-lg-6 col-xl-7">
                <!-- Checkout Panel Contact -->
                <div class="checkout-panel">
                    <h5 class="title-checkout">Contact Information</h5>
                    <div class="row">
                        <form action="" method="post">
                            <!-- Email-->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="you@example.com" value="">
                                </div>

                                <!-- Mailing List Signup-->
                                <div class="form-group form-check m-0">
                                    <input type="checkbox" class="form-check-input" id="add-mailinglist" checked>
                                    <label class="form-check-label" for="add-mailinglist">Keep me updated with your
                                        latest
                                        news and offers</label>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- /Checkout Panel Contact -->
                <!-- Checkout Shipping Address -->
                <div class="checkout-panel">
                    <h5 class="title-checkout">Shipping Address</h5>
                    <div class="row">
                        <!-- First Name-->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" name="firstname"
                                    value="" required="">
                            </div>
                        </div>

                        <!-- Last Name-->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" name="lastname"
                                    value="" required="">
                            </div>
                        </div>
                        <!-------tel------->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone"
                                    placeholder="123 Some Street Somewhere" required="" name="phone">
                            </div>
                        </div>
                        <!-- Address-->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address"
                                    placeholder="123 Some Street Somewhere" required="" name="address">
                            </div>
                        </div>

                        <!-- Country-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" id="country" name="country" required="">
                                    <option value="">Please Select...</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">Åland Islands</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="VG">British Virgin Islands</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos [Keeling] Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo - Brazzaville</option>
                                    <option value="CD">Congo - Kinshasa</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">Côte d’Ivoire</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Islands</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard Island and McDonald Islands</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong SAR China</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Laos</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macau SAR China</option>
                                    <option value="MK">Macedonia</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar [Burma]</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="KP">North Korea</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS">Palestinian Territories</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn Islands</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Réunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russia</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="BL">Saint Barthélemy</option>
                                    <option value="SH">Saint Helena</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="MF">Saint Martin</option>
                                    <option value="PM">Saint Pierre and Miquelon</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">São Tomé and Príncipe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia</option>
                                    <option value="KR">South Korea</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syria</option>
                                    <option value="TW">Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="US" selected="selected">United Kingdom</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UM">U.S. Minor Outlying Islands</option>
                                    <option value="VI">U.S. Virgin Islands</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VA">Vatican City</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                            </div>
                        </div>

                        <!-- State-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state" class="form-label">State</label>

                                <input type="text" class="form-control" id="state" placeholder="" name="state"
                                    required="">

                            </div>
                        </div>

                        <!-- Post Code-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="zip" class="form-label">Zip/Post Code</label>
                                <input type="text" class="form-control" id="zip" placeholder="" name="zip" required="">
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Checkout Shipping Method-->
                <div class="checkout-panel">
                    <h5 class="title-checkout">Shipping Method</h5>

                    <!-- Shipping Option-->
                    <div class="form-check form-group form-check-custom form-radio-custom mb-3">
                        <input class="form-check-input" type="radio" name="checkoutShippingMethod"
                            id="checkoutShippingMethodOne" checked value="0">
                        <label class="form-check-label" for="checkoutShippingMethodOne">
                            <span class="d-flex justify-content-between align-items-start w-100">
                                <span>
                                    <span class="mb-0 fw-bolder d-block">Click & Collect Shipping</span>
                                    <small class="fw-bolder">Collect from our London store</small>
                                </span>
                                <span class="small fw-bolder text-uppercase">Free</span>
                            </span>
                        </label>
                    </div>

                    <!-- Shipping Option-->
                    <div class="form-check form-group form-check-custom form-radio-custom mb-3">
                        <input class="form-check-input" type="radio" name="checkoutShippingMethod" value="19.99"
                            id="checkoutShippingMethodTwo">
                        <label class="form-check-label" for="checkoutShippingMethodTwo">
                            <span class="d-flex justify-content-between align-items-start">
                                <span>
                                    <span class="mb-0 fw-bolder d-block">UPS Next Day</span>
                                    <small class="fw-bolder">For all orders placed before 1pm Monday to
                                        Thursday</small>
                                </span>
                                <span class="small fw-bolder text-uppercase">$19.99</span>
                            </span>
                        </label>
                    </div>

                    <!-- Shipping Option-->
                    <div class="form-check form-group form-check-custom form-radio-custom mb-3">
                        <input class="form-check-input" type="radio" name="checkoutShippingMethod" value="9.99"
                            id="checkoutShippingMethodThree">
                        <label class="form-check-label" for="checkoutShippingMethodThree">
                            <span class="d-flex justify-content-between align-items-start">
                                <span>
                                    <span class="mb-0 fw-bolder d-block">DHL Priority Service</span>
                                    <small class="fw-bolder">24 - 36 hour delivery</small>
                                </span>
                                <span class="small fw-bolder text-uppercase">$9.99</span>
                            </span>
                        </label>
                    </div>
                </div>
                <!-- /Checkout Shipping Method -->
                <!-- Checkout Payment Method-->
                <div class="checkout-panel">
                    <h5 class="title-checkout">Payment Information</h5>

                    <div class="row">
                        <!-- Payment Option-->
                        <div class="col-12">
                            <div class="form-check form-group form-check-custom form-radio-custom mb-3">
                                <input class="form-check-input" type="radio" name="checkoutPaymentMethod" value="Stripe"
                                    id="checkoutPaymentStripe" checked>
                                <label class="form-check-label" for="checkoutPaymentStripe">
                                    <span class="d-flex justify-content-between align-items-start">
                                        <span>
                                            <span class="mb-0 fw-bolder d-block">Credit Card (Stripe)</span>
                                        </span>
                                        <i class="ri-bank-card-line"></i>
                                    </span>
                                </label>
                            </div>
                        </div>

                        <!-- Payment Option-->
                        <div class="col-12">
                            <div class="form-check form-group form-check-custom form-radio-custom mb-3">
                                <input class="form-check-input" type="radio" name="checkoutPaymentMethod" value="paypal"
                                    id="checkoutPaymentPaypal">
                                <label class="form-check-label" for="checkoutPaymentPaypal">
                                    <span class="d-flex justify-content-between align-items-start">
                                        <span>
                                            <span class="mb-0 fw-bolder d-block">PayPal</span>
                                        </span>
                                        <i class="ri-paypal-line"></i>
                                    </span>
                                </label>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- /Checkout Payment Method-->
            </div>
            <!-- / Checkout Panel Left -->

            <!-- Checkout Panel Summary -->
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="bg-light p-4 sticky-md-top top-5">
                    <div class="border-bottom pb-3">
                        <!-- Cart Item-->
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
                                            $sql_img = "SELECT * FROM `img_produits` WHERE id_p=$id_p  ";

                                            $query_img = mysqli_query($conn, $sql_img);



                                            $array_img = mysqli_fetch_array($query_img);
                                            $id_img         = $array_img['id_img'];
                                            $libelle_img    = $array_img['libelle_img'];
                                        }

                            ?>
                        <div class=" d-none d-md-flex justify-content-between align-items-start py-2">
                            <div class="d-flex flex-grow-1 justify-content-start align-items-start">
                                <div class="position-relative f-w-20 border p-2 me-4">
                                    <span class="checkout-item-qty">
                                        <?php  echo $_SESSION['cart']['qteProduit'][$i]; ?>
                                    </span>
                                    <img src="Admin/uploads/<?php echo $libelle_img; ?>" alt=""
                                        class="rounded img-fluid">
                                </div>
                                <div>
                                    <p class="mb-1 fs-6 fw-bolder"><?php echo $libelle; ?></p>
                                    <span class="fs-xs text-uppercase fw-bolder text-muted">Mens / Blue /
                                        Medium</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0 fw-bolder">
                                <span>
                                    <?php echo $_SESSION['cart']['prixProduit'][$i] * $_SESSION['cart']['qteProduit'][$i]; ?>$</span>
                            </div>
                        </div>
                        <?php }} }?>
                        <!-- / Cart Item-->
                    </div>
                    <div class="py-3 border-bottom">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <p class="m-0 fw-bolder fs-6">Subtotal</p>
                            <p class="m-0 fs-6 fw-bolder"><?php echo MontantGlobal(); ?></p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center ">
                            <p class="m-0 fw-bolder fs-6">Shipping</p>
                            <p class="m-0 fs-6 fw-bolder">$0</p>
                        </div>
                    </div>
                    <div class="py-3 border-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="m-0 fw-bold fs-5">Grand Total</p>
                                <span class="text-muted small"> <?php echo MontantGlobal(); ?> $ sales
                                    tax</span>
                            </div>
                            <p class="m-0 fs-5 fw-bold">$<?php echo MontantGlobal(); ?></p>
                        </div>
                    </div>
                    <div class="py-3 border-bottom">
                        <div class="input-group mb-0">
                            <input type="text" class="form-control" placeholder="Enter your coupon code">
                            <button class="btn btn-dark btn-sm px-4">Apply</button>
                        </div>
                    </div>
                    <!-- Accept Terms Checkbox-->
                    <div class="form-group form-check my-4">
                        <input type="checkbox" class="form-check-input" id="accept-terms" checked>
                        <label class="form-check-label fw-bolder" for="accept-terms">I agree to Alpine's <a
                                href="#">terms & conditions</a></label>
                    </div>
                    <?php if (isset($_SESSION['id_u']) && $_SESSION['id_u'] !== null ) { ?>
                    <button type="submit" class="btn btn-dark w-100" name="order_btn" role="button">Complete
                        Order</button>
                    <?php } else { ?>

                    <?php } ?>

                    </form>
                </div>

            </div>

            <!-- /Checkout Panel Summary -->
        </div>

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
                                    <a href="?idsupp=<?php echo $id_p;?>"> <i class="ri-close-line"></i></a>
                                </h6>
                                <small class="d-block text-muted fw-bolder">Size: Medium</small>
                                <small class="d-block text-muted fw-bolder">Qty:
                                    <?php echo $_SESSION['cart']['qteProduit'][$i] ; ?></small>
                            </div>
                            <p class="fw-bolder text-end m-0">
                                <?php echo $_SESSION['cart']['qteProduit'][$i] * $_SESSION['cart']['prixProduit'][$i]; ?>
                            </p>
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
                    <a href="./checkout.html"
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
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Hiking
                                            Jackets</span> <span class="text-muted ms-4">(25)</span></a>
                                </li>
                                <li class="mb-2"><a
                                        class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Climbing
                                            Jackets</span> <span class="text-muted ms-4">(11)</span></a>
                                </li>
                                <li class="mb-2"><a
                                        class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Trekking
                                            Jackets</span> <span class="text-muted ms-4">(19)</span></a>
                                </li>
                                <li class="mb-2"><a
                                        class="text-decoration-none text-body text-secondary-hover transition-all d-flex justify-content-between align-items-center"
                                        href="#"><span><i class="ri-arrow-right-s-line align-bottom ms-n1"></i> Allround
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
            <form>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewName">Your Name</label>
                    <input type="text" class="form-control" id="formReviewName" placeholder="Your Name">
                </div>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewEmail">Your Email</label>
                    <input type="text" class="form-control" id="formReviewEmail" placeholder="Your Email">
                </div>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewTitle">Your Review Title</label>
                    <input type="text" class="form-control" id="formReviewTitle" placeholder="Review Title">
                </div>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label" for="formReviewReview">Your Review</label>
                    <textarea class="form-control" name="formReviewReview" id="formReviewReview" cols="30" rows="5"
                        placeholder="Your Review"></textarea>
                </div>
                <button type="submit" class="btn btn-dark hover-lift hover-boxshadow">Submit Review</button>
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
                    <p class="lead fw-bolder">2 results found for <span class="fw-bold">"Waterproof Jacket"</span></p>
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