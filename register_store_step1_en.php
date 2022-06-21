<?php
require('connection.inc.php');
require('functions.inc.php');

$commercial_name='';
$commercial_number='';
$country='';
$city='';
$store_email='';
$store_phone1='';
$mailbox='';
$postal_code='';
$type_of_activity='';
$categories='';
$​director_name='';
$civil_id='';

if($_SERVER['REQUEST_METHOD'] == "POST"){

  $commercial_name=get_safe_value($con,$_POST['commercial_name']);
  $commercial_number=get_safe_value($con,$_POST['commercial_number']);
  $country=get_safe_value($con,$_POST['country']);
  $city=get_safe_value($con,$_POST['city']);
  $store_email=get_safe_value($con,$_POST['store_email']);
  $store_phone1=get_safe_value($con,$_POST['store_phone1']);
  $mailbox=get_safe_value($con,$_POST['mailbox']);
  $postal_code=get_safe_value($con,$_POST['postal_code']);
  $type_of_activity=get_safe_value($con,$_POST['type_of_activity']);
  $categories=get_safe_value($con,$_POST['categories']);
  $​director_name=get_safe_value($con,$_POST['​director_name']);
  $civil_id=get_safe_value($con,$_POST['civil_id']);

  $res = mysqli_query($con, "select * from stores where store_email='$store_email'");
  $check_user=mysqli_num_rows($res);
  if($check_user>0){
    echo "<script>if(confirm('This email is registered Sucessfully. Now Login')){document.location.href='login_cutomer_en.php'};</script>";
    die();
  }else{
    $commercail_register_paper = rand(111111111,999999999).'_'.$_FILES['commercail_register_paper']['name'];
    move_uploaded_file($_FILES['commercail_register_paper']['tmp_name'],'media/stores/commercail_register_paper/'.$commercail_register_paper);

    $store_logo = rand(111111111,999999999).'_'.$_FILES['store_logo']['name'];
    move_uploaded_file($_FILES['store_logo']['tmp_name'],'media/stores/store_logo/'.$store_logo);

    $passport_photo = rand(111111111,999999999).'_'.$_FILES['passport_photo']['name'];
    move_uploaded_file($_FILES['passport_photo']['tmp_name'],'media/stores/passport_photo/'.$passport_photo);


    $added_on=date('Y-m-d h:i:s');
    //save to database
    mysqli_query($con,"insert into stores(commercial_name,commercial_number,country,city,store_email,store_phone1,mailbox,postal_code,type_of_activity,categories,commercail_register_paper,store_logo,civil_id,passport_photo,added_on,status,request) 
    values('$commercial_name','$commercial_number','$country','$city','$store_email','$store_phone1','$mailbox','$postal_code','$type_of_activity','$categories','$commercail_register_paper','$store_logo','$civil_id','$passport_photo','$added_on','0','0')");
  
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register store To Hexa Store</title>

  <!-- endinject -->
  <!-- add icon link -->
  <link rel="shortcut icon" href="images/icon_logo.png" />

  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="path-to/node_modules/mdi/css/materialdesignicons.min.css"/>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  
  <!-- BOX ICONS -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <!-- Fontawesome -->
  <script src="https:kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 </head>
 <body>
 </body>
</html>
</head>
<body>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h2>Registeration Request</h2>
              <p class="card-description" >Since all fields are mandatory and an appreciation of your time, please review all fields to make sure that you have all the requirements before starting.</p>
              <!--====== sign up store form======-->
              <form class="form-sample" method="post" enctype="multipart/form-data">
                <br><hr>
                <h3>Store info</h3>
                <div class="row">
                  <!-- Commercial Name-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-form-label">Commercial Name</label>
                      <div class="col-sm-12">
                        <input name="commercial_name" type="text" class="form-control form-control-lg" required>
                      </div>
                    </div>
                  </div>
                   <!-- Commercial Number-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-form-label">Commercial Number</label>
                      <div class="col-sm-12">
                        <input name="commercial_number" type="number" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <!-- Country-->
                      <label class="col-sm-12 col-form-label">Country</label>
                      <div class="col-sm-12">
                        <select id="country" name="country" class="form-control" required>
                          <option value="Afganistan">Afghanistan</option>
                          <option value="Albania">Albania</option>
                          <option value="Algeria">Algeria</option>
                          <option value="American Samoa">American Samoa</option>
                          <option value="Andorra">Andorra</option>
                          <option value="Angola">Angola</option>
                          <option value="Anguilla">Anguilla</option>
                          <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                          <option value="Argentina">Argentina</option>
                          <option value="Armenia">Armenia</option>
                          <option value="Aruba">Aruba</option>
                          <option value="Australia">Australia</option>
                          <option value="Austria">Austria</option>
                          <option value="Azerbaijan">Azerbaijan</option>
                          <option value="Bahamas">Bahamas</option>
                          <option value="Bahrain">Bahrain</option>
                          <option value="Bangladesh">Bangladesh</option>
                          <option value="Barbados">Barbados</option>
                          <option value="Belarus">Belarus</option>
                          <option value="Belgium">Belgium</option>
                          <option value="Belize">Belize</option>
                          <option value="Benin">Benin</option>
                          <option value="Bermuda">Bermuda</option>
                          <option value="Bhutan">Bhutan</option>
                          <option value="Bolivia">Bolivia</option>
                          <option value="Bonaire">Bonaire</option>
                          <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                          <option value="Botswana">Botswana</option>
                          <option value="Brazil">Brazil</option>
                          <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                          <option value="Brunei">Brunei</option>
                          <option value="Bulgaria">Bulgaria</option>
                          <option value="Burkina Faso">Burkina Faso</option>
                          <option value="Burundi">Burundi</option>
                          <option value="Cambodia">Cambodia</option>
                          <option value="Cameroon">Cameroon</option>
                          <option value="Canada">Canada</option>
                          <option value="Canary Islands">Canary Islands</option>
                          <option value="Cape Verde">Cape Verde</option>
                          <option value="Cayman Islands">Cayman Islands</option>
                          <option value="Central African Republic">Central African Republic</option>
                          <option value="Chad">Chad</option>
                          <option value="Channel Islands">Channel Islands</option>
                          <option value="Chile">Chile</option>
                          <option value="China">China</option>
                          <option value="Christmas Island">Christmas Island</option>
                          <option value="Cocos Island">Cocos Island</option>
                          <option value="Colombia">Colombia</option>
                          <option value="Comoros">Comoros</option>
                          <option value="Congo">Congo</option>
                          <option value="Cook Islands">Cook Islands</option>
                          <option value="Costa Rica">Costa Rica</option>
                          <option value="Cote DIvoire">Cote DIvoire</option>
                          <option value="Croatia">Croatia</option>
                          <option value="Cuba">Cuba</option>
                          <option value="Curaco">Curacao</option>
                          <option value="Cyprus">Cyprus</option>
                          <option value="Czech Republic">Czech Republic</option>
                          <option value="Denmark">Denmark</option>
                          <option value="Djibouti">Djibouti</option>
                          <option value="Dominica">Dominica</option>
                          <option value="Dominican Republic">Dominican Republic</option>
                          <option value="East Timor">East Timor</option>
                          <option value="Ecuador">Ecuador</option>
                          <option value="Egypt">Egypt</option>
                          <option value="El Salvador">El Salvador</option>
                          <option value="Equatorial Guinea">Equatorial Guinea</option>
                          <option value="Eritrea">Eritrea</option>
                          <option value="Estonia">Estonia</option>
                          <option value="Ethiopia">Ethiopia</option>
                          <option value="Falkland Islands">Falkland Islands</option>
                          <option value="Faroe Islands">Faroe Islands</option>
                          <option value="Fiji">Fiji</option>
                          <option value="Finland">Finland</option>
                          <option value="France">France</option>
                          <option value="French Guiana">French Guiana</option>
                          <option value="French Polynesia">French Polynesia</option>
                          <option value="French Southern Ter">French Southern Ter</option>
                          <option value="Gabon">Gabon</option>
                          <option value="Gambia">Gambia</option>
                          <option value="Georgia">Georgia</option>
                          <option value="Germany">Germany</option>
                          <option value="Ghana">Ghana</option>
                          <option value="Gibraltar">Gibraltar</option>
                          <option value="Great Britain">Great Britain</option>
                          <option value="Greece">Greece</option>
                          <option value="Greenland">Greenland</option>
                          <option value="Grenada">Grenada</option>
                          <option value="Guadeloupe">Guadeloupe</option>
                          <option value="Guam">Guam</option>
                          <option value="Guatemala">Guatemala</option>
                          <option value="Guinea">Guinea</option>
                          <option value="Guyana">Guyana</option>
                          <option value="Haiti">Haiti</option>
                          <option value="Hawaii">Hawaii</option>
                          <option value="Honduras">Honduras</option>
                          <option value="Hong Kong">Hong Kong</option>
                          <option value="Hungary">Hungary</option>
                          <option value="Iceland">Iceland</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="India">India</option>
                          <option value="Iran">Iran</option>
                          <option value="Iraq">Iraq</option>
                          <option value="Ireland">Ireland</option>
                          <option value="Isle of Man">Isle of Man</option>
                          <option value="Israel">Israel</option>
                          <option value="Italy">Italy</option>
                          <option value="Jamaica">Jamaica</option>
                          <option value="Japan">Japan</option>
                          <option value="Jordan">Jordan</option>
                          <option value="Kazakhstan">Kazakhstan</option>
                          <option value="Kenya">Kenya</option>
                          <option value="Kiribati">Kiribati</option>
                          <option value="Korea North">Korea North</option>
                          <option value="Korea Sout">Korea South</option>
                          <option value="Kuwait">Kuwait</option>
                          <option value="Kyrgyzstan">Kyrgyzstan</option>
                          <option value="Laos">Laos</option>
                          <option value="Latvia">Latvia</option>
                          <option value="Lebanon">Lebanon</option>
                          <option value="Lesotho">Lesotho</option>
                          <option value="Liberia">Liberia</option>
                          <option value="Libya">Libya</option>
                          <option value="Liechtenstein">Liechtenstein</option>
                          <option value="Lithuania">Lithuania</option>
                          <option value="Luxembourg">Luxembourg</option>
                          <option value="Macau">Macau</option>
                          <option value="Macedonia">Macedonia</option>
                          <option value="Madagascar">Madagascar</option>
                          <option value="Malaysia">Malaysia</option>
                          <option value="Malawi">Malawi</option>
                          <option value="Maldives">Maldives</option>
                          <option value="Mali">Mali</option>
                          <option value="Malta">Malta</option>
                          <option value="Marshall Islands">Marshall Islands</option>
                          <option value="Martinique">Martinique</option>
                          <option value="Mauritania">Mauritania</option>
                          <option value="Mauritius">Mauritius</option>
                          <option value="Mayotte">Mayotte</option>
                          <option value="Mexico">Mexico</option>
                          <option value="Midway Islands">Midway Islands</option>
                          <option value="Moldova">Moldova</option>
                          <option value="Monaco">Monaco</option>
                          <option value="Mongolia">Mongolia</option>
                          <option value="Montserrat">Montserrat</option>
                          <option value="Morocco">Morocco</option>
                          <option value="Mozambique">Mozambique</option>
                          <option value="Myanmar">Myanmar</option>
                          <option value="Nambia">Nambia</option>
                          <option value="Nauru">Nauru</option>
                          <option value="Nepal">Nepal</option>
                          <option value="Netherland Antilles">Netherland Antilles</option>
                          <option value="Netherlands">Netherlands (Holland, Europe)</option>
                          <option value="Nevis">Nevis</option>
                          <option value="New Caledonia">New Caledonia</option>
                          <option value="New Zealand">New Zealand</option>
                          <option value="Nicaragua">Nicaragua</option>
                          <option value="Niger">Niger</option>
                          <option value="Nigeria">Nigeria</option>
                          <option value="Niue">Niue</option>
                          <option value="Norfolk Island">Norfolk Island</option>
                          <option value="Norway">Norway</option>
                          <option value="Oman">Oman</option>
                          <option value="Pakistan">Pakistan</option>
                          <option value="Palau Island">Palau Island</option>
                          <option value="Palestine">Palestine</option>
                          <option value="Panama">Panama</option>
                          <option value="Papua New Guinea">Papua New Guinea</option>
                          <option value="Paraguay">Paraguay</option>
                          <option value="Peru">Peru</option>
                          <option value="Phillipines">Philippines</option>
                          <option value="Pitcairn Island">Pitcairn Island</option>
                          <option value="Poland">Poland</option>
                          <option value="Portugal">Portugal</option>
                          <option value="Puerto Rico">Puerto Rico</option>
                          <option value="Qatar">Qatar</option>
                          <option value="Republic of Montenegro">Republic of Montenegro</option>
                          <option value="Republic of Serbia">Republic of Serbia</option>
                          <option value="Reunion">Reunion</option>
                          <option value="Romania">Romania</option>
                          <option value="Russia">Russia</option>
                          <option value="Rwanda">Rwanda</option>
                          <option value="St Barthelemy">St Barthelemy</option>
                          <option value="St Eustatius">St Eustatius</option>
                          <option value="St Helena">St Helena</option>
                          <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                          <option value="St Lucia">St Lucia</option>
                          <option value="St Maarten">St Maarten</option>
                          <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                          <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                          <option value="Saipan">Saipan</option>
                          <option value="Samoa">Samoa</option>
                          <option value="Samoa American">Samoa American</option>
                          <option value="San Marino">San Marino</option>
                          <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                          <option value="Saudi Arabia">Saudi Arabia</option>
                          <option value="Senegal">Senegal</option>
                          <option value="Seychelles">Seychelles</option>
                          <option value="Sierra Leone">Sierra Leone</option>
                          <option value="Singapore">Singapore</option>
                          <option value="Slovakia">Slovakia</option>
                          <option value="Slovenia">Slovenia</option>
                          <option value="Solomon Islands">Solomon Islands</option>
                          <option value="Somalia">Somalia</option>
                          <option value="South Africa">South Africa</option>
                          <option value="Spain">Spain</option>
                          <option value="Sri Lanka">Sri Lanka</option>
                          <option value="Sudan">Sudan</option>
                          <option value="Suriname">Suriname</option>
                          <option value="Swaziland">Swaziland</option>
                          <option value="Sweden">Sweden</option>
                          <option value="Switzerland">Switzerland</option>
                          <option value="Syria">Syria</option>
                          <option value="Tahiti">Tahiti</option>
                          <option value="Taiwan">Taiwan</option>
                          <option value="Tajikistan">Tajikistan</option>
                          <option value="Tanzania">Tanzania</option>
                          <option value="Thailand">Thailand</option>
                          <option value="Togo">Togo</option>
                          <option value="Tokelau">Tokelau</option>
                          <option value="Tonga">Tonga</option>
                          <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                          <option value="Tunisia">Tunisia</option>
                          <option value="Turkey">Turkey</option>
                          <option value="Turkmenistan">Turkmenistan</option>
                          <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                          <option value="Tuvalu">Tuvalu</option>
                          <option value="Uganda">Uganda</option>
                          <option value="United Kingdom">United Kingdom</option>
                          <option value="Ukraine">Ukraine</option>
                          <option value="United Arab Erimates">United Arab Emirates</option>
                          <option value="United States of America">United States of America</option>
                          <option value="Uraguay">Uruguay</option>
                          <option value="Uzbekistan">Uzbekistan</option>
                          <option value="Vanuatu">Vanuatu</option>
                          <option value="Vatican City State">Vatican City State</option>
                          <option value="Venezuela">Venezuela</option>
                          <option value="Vietnam">Vietnam</option>
                          <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                          <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                          <option value="Wake Island">Wake Island</option>
                          <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                          <option value="Yemen">Yemen</option>
                          <option value="Zaire">Zaire</option>
                          <option value="Zambia">Zambia</option>
                          <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <!--City-->
                      <label class="col-sm-12 col-form-label">City</label>
                      <div class="col-sm-12">
                        <input name="city" type="text" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- E-mail-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-form-label">Email</label>
                      <div class="col-sm-12">
                        <input name="store_email" type="text" class="form-control form-control-lg" required>
                      </div>
                    </div>
                  </div>
                   <!-- Phone number -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-form-label">Phone number</label>
                      <div class="col-sm-12">
                        <input name="store_phone1" class="form-control" type="tel" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!--Mail Box-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-13 col-form-label">MailBox</label>
                      <div class="col-sm-12">
                        <input name="mailbox" type="text" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <!--Postal code-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-form-label">Postal code</label>
                      <div class="col-sm-12">
                        <input name="postal_code" type="number" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                   <!--Type of activity-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-form-label">Type of activity</label>
                      <div class="col-sm-12">
                        <select class="form-control" name="type_of_activity" required>
                          <option value="Indusstrial activity">Indusstrial activity</option>
                          <option value="commercial activity">commercial activity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!--Categories-->
                  <div class="col-md-6">
                    <div class="form-group"> 
                      <label class="col-sm-12 col-form-label">Categories</label>
                      <div class="col-sm-12">
                        <select class="form-control" name="categories" required>
                          <option value="cat1">Indusstrial activity</option>
                          <option value="cat2">commercial activity</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!--Commercail register paper-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-form-label">Commercail register paper</label>
                      <div class="col-sm-12">
                        <input type="file" class="form-control" name="commercail_register_paper" required>
                      </div>
                    </div>
                  </div>
                  <!--Store logo-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-form-label">Store logo</label>
                      <div class="col-sm-12">
                        <input type="file" class="form-control" name="store_logo" required>
                      </div>
                    </div>
                  </div>
                </div>
                <br><hr>
                <h3>​Owner's Information</h3>
                <div class="row">
                  <!-- ​Director Name-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-form-label">​Director Name</label>
                      <div class="col-sm-12">
                        <input name="​director_name" type="text" class="form-control form-control-lg" required>
                      </div>
                    </div>
                  </div>
                   <!-- ​Civil ID/Passpot-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-form-label">​Civil ID/Passpot</label>
                      <div class="col-sm-12">
                        <input name="civil_id" type="number" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!--Passport photo-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-form-label">Passport photo</label>
                      <div class="col-sm-12">
                        <input type="file" class="form-control" name="passport_photo" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>

