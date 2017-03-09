<?php
  include  "php/connect.php";
  $adminUserId = $_GET["userId"];
  $adminContentId = $_GET["contentId"];

  $adminSql ="SELECT * FROM `content` WHERE `contentId`=".$adminContentId;

  //check for forms
  if($_POST['headerSave'] === 'newHeaderSave'){
	//echo "see newHeader<br><br>";
	   $headerSql ="UPDATE content SET contentBusinessName='Blossom NameChange' WHERE contentId = 1".$adminContentId;
	//print_r($headerSql);

  }
  /* Prepare statement */
  if($_GET["contentId"]) {
    if($res = $conn->query($adminSql)){
    //print_r($res);
    while($row = $res->fetch_assoc()) {
      $adminContentId         = $row['contentId'];
      $adminUserId            = $row['contentUserId'];
      $adminStyle             = $row['contentStyle'];
      $adminBusinessName      = $row['contentBusinessName'];
      $adminDiffDesc          = $row['contentDifferentStatement'];
      $adminShortDesc         = $row['contentShortDesc'];
      $adminUniqueDesc        = $row['contentUniqueDesc'];
      $adminBusinessPitch     = $row['contentBusinessPitch'];
      $adminServcies          = $row['contentServices'];
      $adminContentFb         = $row['contentFb'];
      $adminContentIg         = $row['contentIg'];
      $adminContentLk         = $row['contentLk'];
      $adminContentTw         = $row['contentTw'];
      }
    }
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
    <title>Blossom Dashboard</title>

    <!-- Color Wheel Plug in -->
    <link type="text/css" rel="stylesheet" href="css/admin/wheelcolorpicker.css" />
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom CSS -->
    <!-- <link href="dist/css/flat-ui.min.css" rel="stylesheet"> -->
    <link href="css/admin/admin-styles.css" rel="stylesheet" type="text/css">
    <script>var jscontentId = <?php echo $adminContentId; ?>;console.log(jscontentId);</script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row header">
        <div class="col-md-6">
          <div class="logo">
            <h2><a href="index.html">Blossom Build</a></h2>
          </div><!-- logo -->
        </div> <!-- col-md-6 -->

        <div class="col-md-5">
          <ul class="mainNav">
            <li><a href="admin.php">Admin</a></li>
            <li><a href="https://www.godaddy.com/domains/domain-name-search">Domain</a></li>
            <li><a href="#">Support</a></li>
          </ul>
        </div>
        <div class="col-md-1">
          <h5 id="sitName"><?php echo $adminBusinessName;?></h5>
        </div> <!-- col-md-1 -->
      </div>
      <div class="row">
          <div class="col-md-2 side-nav1">
            <h2>Dashboard</h2>
            <div class="dropdown">
              <button class="btn btn-default dropdown-btn dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><span id="active-dropdown-text">Site 1</span>  <span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="site1" value="site1">Site1</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="site2" value="site2">Site2</a></li>
              </ul>
            </div>
            <hr />
            <ul class="sideNav">
              <li><a href="#" id="editNav">Edit</a></li>
              <li><a href="preview.php?contentId=<?php echo contentId; ?>" id="previewNav" target="_blank">Preview</a></li>
              <li><a href="#" id="accountNav">Account</a></li>
             <!-- <li><a href="#">Addons</a></li>
              <li><a href="#">Cart</a></li>
              <li><a href="#">Image Upload</a></li> -->
              <li><a href="#" id="publishNav">Publish</a></li>
            </ul>
        </div>
          <div class="col-md-10">
            <div class="container bg-image">
              <div class="edit">
                <div class="edit-header">
                  <h1>Dashboard Editor</h1>
                </div>
                <div class="edit-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h2>Header <?php echo $adminContentId; ?></h2>
                        </div>
                        <div class="panel-body">
                          <form id="headerEditForm" action="?contentId=<?php echo $adminContentId; ?>" method="post">
                            <div class="input-group">
                              <!--
                              <label for="header-font-family">Font Family</label>

								<select id="headerFontSelect">
                                <option value="serif"><span class="serif-font">Serif</span></option>
                                <option value="sans-serif"><span class="sans-serif-font">Sans-Serif</span></option>
                                <option value="cursive-font"><span class="cursive-font">Cursive</span></option>
                              </select>
							 -->
                            </div>
                            <div class="input-group">
                              <label for="header-color">Site Title</label>
                              <input type="text" id="businessName" name="businessNameChange" class="form-control">
                            </div>
                            <div class="edit-button">
                              <button id="headerSave" name="newBusinessName" value="NameChangeSubmit" class="btn btn-default save-buttons" type="submit">Save</button>
                            </div>
                            <div class="alert header-alert alert-success alert-dismissable">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                              <strong>Success!</strong> your changes have been saved.
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h2>Paragraph</h2>
                        </div>
                        <div class="panel-body">
                          <form id="paragraphEditForm" action="?contentId=<?php echo $adminContentId; ?>" method="post">
                            <div class="input-group">
                              <label for="paragraph-font-family">Font Family</label>
                              <select id="paragraphFontSelect">
                                <option value="serif"><span class="serif-font">Serif</span></option>
                                <option value="sans-serif"><span class="sans-serif-font">Sans-Serif</span></option>
                                <option value="cursive-font"><span class="cursive-font">Cursive</span></option>
                              </select>
                            </div>
                            <div class="input-group">
                              <label for="paragraph-color">Paragraph Color</label>
                              <input type="text" id="paragraph-color" name="paragraph-color" class="form-control" data-wheelcolorpicker="" data-wcp-sliders="wv" data-wcp-preview="true">
                            </div>
                            <div class="edit-button">
                              <button class="btn btn-default save-buttons" type="submit" id="paragraphSave" name="paragraphEditForm">Save</button>
                            </div>
                            <div class="alert paragraph-alert alert-success alert-dismissable">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                              <strong>Success!</strong> your changes have been saved.
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h2>Background Color</h2>
                        </div>
                        <div class="panel-body">
                          <form id="backgroundEditForm" action="?contentId=<?php echo $adminContentId; ?>" method="post">
                            <div class="input-group">
                              <label for="header-font-family">Select a preselected color</label>
                              <select id="backgroundColorSelect">
                                <option value="red"><span class="firebrick-red">Firebrick Red</span></option>
                                <option value="blue"><span class="collosal-blue">Collosal Blue</span></option>
                                <option value="orange"><span class="tango-orange">Tango Orange</span></option>
                              </select>
                            </div>
                            <div class="input-group">
                              <label for="background-color">Background Color</label>
                              <input type="text" id="background-color" name="background-color" class="form-control" data-wheelcolorpicker="" data-wcp-sliders="wv" data-wcp-preview="true">
                            </div>
                            <div class="edit-button">
                              <button class="btn btn-default save-buttons" type="submit" id="backgroundSave" name="backgroundEditForm">Save</button>
                            </div>
                            <div class="alert background-alert alert-success alert-dismissable">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                              <strong>Success!</strong> your changes have been saved.
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- GOLD PLATING -->
                    <div class="col-md-6">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h2>Theme Selection</h2>
                        </div>
                        <div class="panel-body">
                          <form id="themeEditForm" action="?contentId=<?php echo $adminContentId; ?>" method="post">
                            <div class="input-group">
                              <label for="themeSelect">Select a theme</label>
                              <select id="themeSelect">
                                <option value="template1">Theme 1</option>
                                <option value="template2">Theme 2</option>
                              </select>
                            </div>
                            <div class="edit-button">
                              <button class="btn btn-default save-buttons" type="submit" id="themeSave" name="themeEditForm">Save</button>
                            </div>
                            <div class="alert theme-alert alert-success alert-dismissable">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                              <strong>Success!</strong> your changes have been saved.
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="account">
              <div class="account-header">
              </div>
              <div class="account-body">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h2>Account Information</h2>
                  </div>
                  <div class="panel-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><a href="#">Email</a></th>
                          <th><a href="#">Websites</a></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th class="user-info" id="accountEmail">example@gmail.com</th>
                          <th class="user-info" id="accountWebsite">https://blossom.com</th>
                        </tr>
                      </tbody>
                    </table>
                    <div class="row">
                      <div class="col-md-6">
                        <h3 class="panelH3">Change Password</h3>
                    <form class="changePassword">
                      <div class="input-group">
                        <span class="input-group-addon">Current Password</span>
                        <input class="form-control" type="password" id="accountPassword" />
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">New Password</span>
                        <input class="form-control" type="password" id="newAccountPassword" />
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">Confirm Password</span>
                        <input class="form-control" type="password" id="changePasswordConfirmation" />
                      </div>
                      <div class="buttonStyles change-pass-btn">
                        <a href="https://google.com" target="_blank">
                          <button class="btn btn-default" type="submit" id="changePasswordBtn">
                            <span class="glyphicon glyphicon-transfer iconStyle"></span>Change Password
                          </button>
                        </a>
                      </div>
                    </form>
                      </div>
                      <div class="col-md-6">
                        <h3 class="panelH3">Change Email</h3>
                    <form class="changeEmail">
                      <div class="input-group">
                        <span class="input-group-addon">Current Email</span>
                        <input class="form-control" type="text" value="example@gmail.com" readonly>
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">Change Email</span>
                        <input class="form-control" type="email">
                      </div>
                      <div class="buttonStyles change-email-btn">
                        <a href="https://google.com" target="_blank">
                          <button class="btn btn-default" type="submit" id="changeEmailBtn">
                            <span class="glyphicon glyphicon-transfer iconStyle"></span>Change Email
                          </button>
                        </a>
                      </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="domains">
              <div class="domains-header">
              </div>
              <div class="domains-body">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h2>Registered Domains</h2>
                  </div>
                  <div class="panel-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><a href="#">ID</a></th>
                          <th><a href="#">Domain URL</a></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th class="user-info" id="domainsID1">1</th>
                          <th class="user-info" id="domainsURL1">https://www.blossom.com</th>
                        </tr>
                        <tr>
                          <th class="user-info" id="domainsID2">2</th>
                          <th class="user-info" id="domainsURL2">https://www.unitarian.com</th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
          </div>
      </div>
    </div>
    <!-- JQuery JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <!-- Color Wheel JS Plugin -->
    <script type="text/javascript" src="js/admin/jquery.wheelcolorpicker-3.0.2.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Admin JS -->
    <script type="text/javascript" src="js/admin/admin.js"></script>
    <!-- Default JS -->
    <script type="text/javascript" src="js/default.js"></script>
  </body>
</html>
