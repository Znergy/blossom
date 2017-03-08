<?php

  include_once  "php/connect.php";

  //print_r("<br>Globals: ".$GLOBALS);
  //echo '<br><br>post those globs '.phpinfo();
//  print_r("<br><br><br>Post: ".$_POST['business-name']);


//CONTENT VARIBLES
  $contentBusinessName        = $_POST['business-name'];
  $contentDifferentStatement  = $_POST['different-statement'];
  $contentSmallDesc           = $_POST['small-description'];
  $contentUniqueStatement     = $_POST['unique-statement'];
  $contentBusinessPitch       = $_POST['business-pitch'];
  $contentService1            = $_POST['service-item-1'];
  $contentService2            = $_POST['service-item-2'];
  $contentService3            = $_POST['service-item-3'];
  $contentService4            = $_POST['service-item-4'];
  $contentFb                  = $_POST['social-link-facebook'];
  $contentIg                  = $_POST['social-link-instagram'];
  $contentLk                  = $_POST['social-link-linkedin'];
  $contentTw                  = $_POST['social-link-twitter'];

//CONTACT VARIBLES
  $contactFullName            = $_POST['contact-full-name'];
  $contactPhone               = $_POST['contact-phone'];
  $contactEmail               = $_POST['contact-email'];
  $contactAddress             = $_POST['contact-address'];
  $contactCity                = $_POST['contact-city'];
  $contactState               = $_POST['contact-state'];
  $contactZip                 = $_POST['contact-zip'];

//USER VARIBLES
  //$userName ="";

  $contentUserId = $_GET["userId"];
  $contentContactId = "1";

  //INSERTING new Content into Table
  $contentSql="INSERT INTO content (contentUserId, contentContactId, contentDifferentStatement, contentShortDesc, contentUniqueDesc, contentShortPitch, contentServices, contentFb, contentIg, contentLk, contentTw) VALUES ('".$contentUserId."', '".$contentContactId."', '".$contentDifferentStatement."', '".$contentSmallDesc."', '".$contentUniqueStatement."', '".$contentBusinessPitch."', '".$contentService1."', '".$contentFb."', '".$contentIg."', '".$contentLk."', '".$contentTw."')";

  /* Prepare statement */
  if($conn->query($contentSql)) {
    $contentId = mysqli_insert_id($conn);
    header('Location: admin.php?userId='.$contentUserId.'&contentId='.$contentId);
  } else {
    echo "query Failure" .$conn->error;
  }

  $conn->close();
 ?>
<!DOCTYPE html>
<html>

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="description" content="Web Application">
    <meta name="keywords" content="HTML,CSS,JQuery,JavaScript, php, sql">
    <meta name="author" content="Ryan Jones">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blossom Build</title>
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Questionnaire</h2>
            </div>
            <div class="panel-body">
                <form class="client-question-form" action="?" method="POST">
                    <div class="col-md-12">
                        <div class="input-group">
                            <label for="business-name">What is your business name?</label>
                            <input class="form-control" name="business-name" id="business-name" placeholder="Bob's Burgers" type="text" />
                        </div>
                        <div class="input-group">
                            <label for="different-statement">What makes you different?</label>
                            <input class="form-control" id="different-statement" name="different-statement" placeholder="We make the complex simple." type="text" />
                        </div>
                        <div class="input-group">
                            <label for="small-description">Write a small description about what your company does.</label>
                            <textarea class="form-control col-xs-12" rows="3" name="small-description" id="small-description" type="text"></textarea>
                        </div>
                        <div class="input-group">
                            <label for="unique-statement">What makes your business unique?</label>
                            <textarea class="form-control col-xs-12" rows="3" name="unique-statement" id="unique-statement" type="text"></textarea>
                        </div>
                        <div class="input-group">
                            <label for="business-pitch">Write a small description, as if you're pitching your business to a new customer.</label>
                            <textarea class="form-control col-xs-12" rows="3" name="business-pitch" id="business-pitch" type="text"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3>Profile Details</h3>
                        <div class="input-group">
                            <span class="input-group-addon">Full Name      </span><input class="form-control" name="contact-full-name" type="text" id="contact-full-name" placeholder="Bob Belcher" />
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">Phone Number</span><input class="form-control" name="contact-phone" id="contact-phone" type="text" placeholder="503-864-3213" />
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">Email Address </span><input class="form-control" name="contact-email" id="contact-email" type="text" placeholder="example@mail.com" />
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">Street Address</span><input class="form-control" name="contact-streeaddress" id="contact-address" type="text" placeholder="123 A Street" />
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">City</span><input class="form-control" name="contact-state" id="contact-address" type="text" placeholder="City" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">State</span><input class="form-control" name="contact-state" id="contact-address" type="text" placeholder="State" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Zipcode</span><input class="form-control" name="contact-state" id="contact-address" type="text" placeholder="Zipcode" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- input user info div -->
                    <div class="col-md-6">
                        <div class="input-group">
                            <br />
                            <label>What services do you provide?</label>
                            <footer>Write your four core services.</footer>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">1.</span><input class="form-control" name="service-item-1" id="service-item-1" placeholder="Ex: Demolition" type="text" />
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">2.</span><input class="form-control" name="service-item-2" placeholder="Ex: Flooring" id="service-item-2" type="text" />
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">3.</span><input class="form-control" name="service-item-3" id="service-item-3" placeholder="Ex: Interior Construction" type="text" />
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">4.</span><input class="form-control" name="service-item-4" id="service-item-4" placeholder="Ex: Framing" type="text" />
                        </div>
                    </div>
                    <!-- closes col-md-6 -->
                    <div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <br />
                            <label for="site-title">Social Media Links</label>
                            <footer>Please fill out all relevant fields</footer>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-facebook">Facebook</span></span><input class="form-control" id="social-link-facebook" name="social-link-facebook" type="text" placeholder="https://facebook.com/your-name-here"
                            />
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-facebook">Instagram</span></span><input class="form-control" id="social-link-instagram" name="social-link-instagram" type="text" placeholder="https://instagram.com/your-name-here"
                            />
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-facebook">LinkedIn</span></span><input class="form-control" id="social-link-linkedin" name="social-link-linkedin" type="text" placeholder="https://linkedin.com/your-name-here"
                            />
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-facebook">Twitter</span></span><input class="form-control" type="text" name="social-link-twitter" id="social-link-twitter" placeholder="https://twitter.com/your-name-here"
                            />
                        </div>
                        <br />
                    </div>
                    <!--closes col-md-6 -->
                    <div class="buttonStyles">
                        <button class="btn btn-primary" type="submit" id="submitBtn">
                 <span class="glyphicon glyphicon-list-alt iconStyle"></span>Save
              </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <!-- Custom JavaScript -->
    <script type="text/javascript" src="js/default.js"></script>
</body>

</html>
