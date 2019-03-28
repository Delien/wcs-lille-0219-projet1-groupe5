<?php

function testInput($input) {
  return htmlspecialchars($input);
} 
                                //PARTIE NEWSLETTER
                                
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  if($_POST['nameNew'] && $_POST['mailNew']) {
    $errorsNews = [];

    $nameNew = testInput($_POST['nameNew']);
    $mailNew = testInput($_POST['mailNew']);

    if(empty($nameNew)) {
      $errorsNews['emptyName'] = 'This field can not be empty';
    } else {
      $patternName = '/^[A-Z][\p{L}-]*$/';
      if(!preg_match($patternName,$nameNew)) {
        $errorsNews['incorrectName'] = 'Error need uppercase, for exemple : Dupont';
      }
    }

    if(empty($mailNew)) {
      $errorsNews['emptyMail'] = 'This field can not be empty';
    } else {
      $patternMail = '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,}$/';
      if(!preg_match($patternMail,$mailNew)) {
        $errorsNews['incorrectMail'] = 'Incorrect email adrress';
      }
    }

    if(count($errorsNews) == 0) {
      header('location: formContact.php?new_success');
      exit;
    }
  } else {
    $errorsContact = [];            //PARTIE CONTACT

    $choiceContact = testInput($_POST['choixContact']);
    $firstNameContact = testInput($_POST['firstNameContact']);
    $lastNameContact = testInput($_POST['lastNameContact']);
    $mailContact = testInput($_POST['mailContact']);
    $messageContact = testInput($_POST['messageContact']);

    if($choiceContact == 'I am ...') {
      $errorsContact['emptychoice'] = 'This field can not be empty';
    }

    if(empty($firstNameContact)) {
      $errorsContact['emptyFirstName'] = 'This field can not be empty';
    } else {
      $patternName = '/^[A-Z][\p{L}-]*$/';
      if(!preg_match($patternName,$firstNameContact)) {
        $errorsContact['incorrectFirstName'] = 'Error need uppercase, for exemple : Dupont';
      }
    }

    if(empty($lastNameContact)) {
      $errorsContact['emptyLastName'] = 'This field can not be empty';
    } else {
      $patternName = '/^[A-Z][\p{L}-]*$/';
      if(!preg_match($patternName,$lastNameContact)) {
        $errorsContact['incorrectLastName'] = 'Error need uppercase, for exemple : Bernard';
      }
    }

    if(empty($mailContact)) {
      $errorsContact['emptyMail'] = 'This field can not be empty';
    } else {
      $patternMail = '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,}$/';
      if(!preg_match($patternMail,$mailContact)) {
        $errorsContact['incorrectMail'] = 'Incorrect email adrress';
      }
    }

    if(empty($messageContact)) {
      $errorsContact['emptyMessage'] = 'This field can not be empty';
    }

    if(count($errorsContact) == 0) {
      header('location: formContact.php?mail_success');
      exit;
    }
  }
}

require 'header.php';
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="homecarousel.php">Home<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="euratech.php">Euratech</a>
                <a class="nav-item nav-link" href="DigitalEnvironment.php">Digital Environment</a>
                <a class="nav-item nav-link active" href="formContact.php">Contact us</a>
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
            <p><a href="homecarousel.php">Home</a> / <a href="formContact.php">Contact us</a></p>
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
                                  <!-- CONTACT US HERE -->
    <div class="row">
        <div class="col-6 offset-5">
            <h2><span class="subtitle">HEY !</span></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-9 offset-1"> 
            <p class="paragraph">
            Do you want us to meet?
            Would you like to share your incredible talents and join one of our companies?
            Would you like to learn the trade and do an internship with us?
            Or simply ask us a question?
            <span class="bold">Contact us with this form:</span>
            </p>
        </div>
    </div>
    <div class="contact">           <!-- LISTE DEROULANTE JE SUIS... -->
        <form action="formContact.php" method="post" id="contactPost" class="contactPost">
            <div class="row">
                <div class="col-9 offset-1">
                    <select  id="choixContact" name="choixContact">
                        <option value="I am ...">I am ...</option>
                        <option value="I am an incubator">I am an incubator</option>
                        <option value="I am a company">I am a company</option>
                        <option value="I am looking for an internship">I am looking for an internship</option>
                        <option value="I am looking for a formation">I am looking for a formation</option>
                    </select> 
                    <?php  if(isset($errorsContact['emptychoice'])) : ?>
                    <p class="form-text error"><?= $errorsContact['emptychoice']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
                                  <!-- CHAMPS MAIL/MESSAGE/NOM/PRENOM/ -->
            <div class="row">
                <div class="col-9 offset-1">
                  <input type="text" name="firstNameContact" id="firstNameContact" class="firstNameContact" placeholder="Fisrt name :" size="70" maxlength="30" />
                  <?php if (isset($errorsContact['emptyFirstName'])) : ?>
                  <p class="form-text error"><?= $errorsContact['emptyFirstName']; ?></p>
                  <?php endif; ?>
                  <?php if (isset($errorsContact['incorrectFirstName'])) : ?>
                  <p class="form-text error"><?= $errorsContact['incorrectFirstName']; ?></p>
                  <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-9 offset-1">
                  <input type="text" name="lastNameContact" id="lastNameContact" class="lastNameContact" placeholder="Last name :" size="70" maxlength="30" />
                  <?php if (isset($errorsContact['emptyLastName'])) : ?>
                  <p class="form-text error"><?= $errorsContact['emptyLastName']; ?></p>
                  <?php endif; ?>
                  <?php if (isset($errorsContact['incorrectLastName'])) : ?>
                  <p class="form-text error"><?= $errorsContact['incorrectLastName']; ?></p>
                  <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-9 offset-1"> 
                    <input type="text" id="mailContact" name="mailContact" class="mail_contact" placeholder="@ :" size="70" maxlength="30" />
                    <?php  if(isset($errorsContact['emptyMail'])) : ?>
                    <p class="form-text error"><?= $errorsContact['emptyMail']; ?></p>
                    <?php endif; ?>
                    <?php  if(isset($errorsContact['incorrectMail'])) : ?>
                    <p class="form-text error"><?= $errorsContact['incorrectMail']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-9 offset-1">
                    <textarea id="messageContact" name="messageContact" class="message" cols="70" rows="10"></textarea>
                    <?php  if(isset($errorsContact['emptyMessage'])) : ?>
                    <p class="form-text error"><?= $errorsContact['emptyMessage']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="span offset-5">
                    <input type="submit" value="SEND" class="sendContact" />
                </div>
            </div>
        </form>
    </div>
    <div class="row titrenews">
          <div class="col-6 offset-4">
          <a class="subtitle" href="#newsletter">SIGN UP TO OUR NEWSLETTER !</a>
          </div>
      </div>                            <!-- NEWSLETTER HERE --> 
    <div class="changeIMG">
        <form action="formContact.php" method="post" id="newletter" class="newletter">
            <div class="row" id="newsletter">
                <div class="col-9 offset-1">
                    <input type="text" id="nameNew" name="nameNew" class="name" placeholder="Name :" size="70" maxlength="30"/>
                    <?php  if(isset($errorsNews['emptyName'])) : ?>
                    <p class="form-text error"><?= $errorsNews['emptyName']; ?></p>
                    <?php endif; ?>
                    <?php  if(isset($errorsNews['incorrectName'])) : ?>
                    <p class="form-text error"><?= $errorsNews['incorrectName']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-9 offset-1">
                    <input type="text" id="mailNew" name="mailNew" class="mail_new" placeholder="Mail :" size="70" maxlength="30" />
                    <?php  if(isset($errorsNews['emptyMail'])) : ?>
                    <p class="form-text error"><?= $errorsNews['emptyMail']; ?></p>
                    <?php endif; ?>
                    <?php  if(isset($errorsNews['incorrectMail'])) : ?>
                    <p class="form-text error"><?= $errorsNews['incorrectMail']; ?></p>
                    <?php endif; ?>
                </div>
            </div>    
            <div class="row">
                <div class="span offset-5">
                    <input type="submit" class="sendNewsletter" value="SEND"/>
                </div>
            </div>
        </form>
    </div>
    <!-- FOOTER HERE -->
<?php require 'footer.php'; ?>