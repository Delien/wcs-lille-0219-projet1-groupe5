<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $errorsNews = [];

    function test_input($input) {
        return htmlspecialchars($input);
    }    

    $name = test_input($_POST['name_new']);
    $mail = test_input($_POST['mail_new']);

    if(empty($name))
    {
        $errorsNews['empty_name'] = 'This field can not be empty';
    } else {
        $pattern_name = '/^[A-Z][\p{L}-]*$/';
        if(preg_match($pattern_name,$name))
        {
            $errorsNews['incorrect_name'] = 'Incorrect name';
        }
    }

    if(empty($mail))
    {
        $errorsNews['empty_mail'] = 'This field can not be empty';
    } else {
        //$pattern_mail = '/^[a-z0-9]+[-_.]?[a-z0-9]+[-_.]?[a-z0-9]+@[a-z]+\.[a-z]{2,}$/';
        //if(preg_match($pattern_mail,$mail))
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
           $errorsNews['incorrect_mail'] = 'Incorrect email adrress';
        }
    }

    if(count($errorsNews) == 0) {
        header('location: formContact.php?new_success');
    } else {
        header('location: formContact.php');
    }

}