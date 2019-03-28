<?php

function testInput($input) {
  return htmlspecialchars($input);
} 

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
        $errorsNews['incorrectName'] = 'Incorrect name';
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
    $errorsContact = [];

    $choiceContact = testInput($_POST['choixContact']);
    $mailContact = testInput($_POST['mailContact']);
    $messageContact = testInput($_POST['messageContact']);

    if($choiceContact == 'I am ...') {
      $errorsContact['emptychoice'] = 'This field can not be empty';
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
        <form action="formContact.php" method="post" id="newletter" class="newletter">
            <div class="row">
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
                <div class="col-3 offset-9">
                    <input type="submit" class="send_newsletter" value="SEND"/>
                </div>
            </div>
        </form>
    </div>
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
    <div class="contact">
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
                <div class="col-3 offset-9">
                    <input type="submit" value="SEND" class="send_contact" />
                </div>
            </div>
        </form>
    </div>

<?php require 'footer.php'; ?>