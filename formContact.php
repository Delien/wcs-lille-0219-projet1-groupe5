<?php
require 'newsletterPost.php';
require 'contactPost.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>WILD - Wild Information Of the Lille's Digital  </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="cssGlobal.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <meta charset="utf-8" />
</head>
<body>
  <div class="container ">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="homecarousel.html">Home<span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="euratech.html">Euratech</a>
          <a class="nav-item nav-link" href="DigitalEnvironment.html">Digital Environment</a>
          <a class="nav-item nav-link active" href="formContact.html">Contact us</a>
        </div>
      </div>
    </nav>
    <div class="row-1">
      <div class="span-3 titre1">
        <h1><span class="titrepage">Contact Us</span></h1>
      </div>   
    </div>   
    <div class="row-2">
      <div class="span-2 offset-2 header">
        <p>Home / Euratechnologie / DigitalEnvironment / </p>
      </div>
    </div> 
    <?php if(isset($_GET['new_success'])): ?>
        <div class='alert alert-success'> 
            Your newsletter inscription is done !
        </div>
    <?php endif; ?>
    <?php if(isset($_GET['mail_success'])): ?>
        <div class='alert alert-success'> 
            Your contact message is done !
        </div>
    <?php endif; ?>
    <div class="changeIMG">
      <div class="row">
        <div class="span offset-4">
            <h6 class="newletter_title">Sign up to our Newsletter !</h6>
        </div>
      </div>
      <form action="newsletterPost.php" method="post" id="newletter" class="newletter">
        <div class="row">
          <div class="col-9 offset-1">
            <input type="text" id="name_new" name="name_new" class="name" placeholder="Name :" size="70" maxlength="30"/>
            <?php  if(isset($errorsNews['empty_name'])) : ?>
            <small class="form-text error"><?= $errorsNews['empty_name']; ?></small>
            <?php endif; ?>
            <?php  if(isset($errorsNews['incorrect_name'])) : ?>
            <small class="form-text error"><?= $errorsNews['incorrect_name']; ?></small>
            <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-9 offset-1">
            <input type="text" id="mail_new" name="mail_new" class="mail_new" placeholder="Mail :" size="70" maxlength="30" />
            <?php  if(isset($errorsNews['empty_mail'])) : ?>
            <small class="form-text error"><?= $errorsNews['empty_mail']; ?></small>
            <?php endif; ?>
            <?php  if(isset($errorsNews['incorrect_mail'])) : ?>
            <small class="form-text error"><?= $errorsNews['incorrect_mail']; ?></small>
            <?php endif; ?>
          </div>
        </div>    
        <div class="row">
          <div class="col-3 offset-9">
            <input type="submit" class="send_newsletter" value="SEND"/>
          </div>
        </div>
      </form>
    </div>
    <div class="change">
      <div class="row">
        <div class="col-6 offset-5">
          <h2><span class="subtitle">Contact Us</span></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-9 offset-1"> 
          <p class="paragraph">
            <span class="bold">HEY !</span><br>
            Do you want us to meet?
            Would you like to share your incredible talents and join one of our companies?
            Would you like to learn the trade and do an internship with us?
            Or simply ask us a question?
            <span class="bold">Contact us with this form:</span>
          </p>
        </div>
      </div>
      <form action="contactPost.php" method="post">
        <div class="row">
          <div class="col-9 offset-1">
            <select  id="choix_contact" name="choix_contact">
              <option>I am ...</option>
              <option>I am an incubator</option>
              <option>I am a company</option>
              <option>I am looking for an internship</option>
              <option>I am looking for a formation</option>
            </select> 
            <?php  if(isset($errorsContact['empty_choice'])) : ?>
            <small class="form-text error"><?= $errorsContact['empty_choice']; ?></small>
            <?php endif; ?>
          </div>
        </div>
        <div class="row">
            <div class="col-9 offset-1">
              <input type="text" id="mail_contact" name="mail_contact" class="mail_contact" placeholder="@ :" size="70" maxlength="30" />
              <?php  if(isset($errorsContact['empty_mail'])) : ?>
              <small class="form-text error"><?= $errorsContact['empty_mail']; ?></small>
              <?php endif; ?>
              <?php  if(isset($errorsContact['incorrect_mail'])) : ?>
              <small class="form-text error"><?= $errorsContact['incorrect_mail']; ?></small>
              <?php endif; ?>
            </div>
        </div>
        <div class="row">
          <div class="col-9 offset-1">
            <textarea id="message_contact" name="message_contact" class="message" cols="70" rows="10"></textarea>
            <?php  if(isset($errorsContact['empty_message'])) : ?>
            <small class="form-text error"><?= $errorsContact['empty_message']; ?></small>
            <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-3 offset-9">
              <input type="submit" value="SEND" class="send_contact" />
          </div>
        </div>
      </form>
      <footer class="page-footer font-small">
          <!-- Footer Links -->
          <div class="container">
            <!-- Grid row-->
            <div class="row text-center d-flex justify-content-center pt-5 mb-3 footer">
              <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                  <a href="homecarousel.html">About us</a>
                </h6>
              </div>
              <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                  <a href="#!">Legal notice</a>
                </h6>
              </div>
              <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                  <a href="#!">Annex</a>
                </h6>
              </div>
              <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                  <a href="#!">Help</a>
                </h6>
              </div>
              <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                  <a href="formContact.html">Contact</a>
                </h6>
              </div> 
            </div>
            <hr class="rgba-white-light" style="margin: 0 15%;">        
            <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">   
            <div class="row pb-3">   
            </div>
          </div>
          <div class="footer-copyright text-center py-3">© 2018 Copyright: The club 5!
          </div>
          <!-- Copyright -->
      
        </footer>
    </div> 
  </div>
</body>
</html>