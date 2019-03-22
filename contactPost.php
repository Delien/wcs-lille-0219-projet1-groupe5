<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $errorsContact = [];

    function test_input($input) {
        return htmlspecialchars($input);
    }

    $choice = test_input($_POST['choix_contact']);
    $mail = test_input($_POST['mail_contact']);
    $message = test_input($_POST['message_contact']);

    if(empty($choice) || $choice == 'I am ...')
    {
        $errorsContact['empty_choice'] = 'This field can not be empty';
    }

    if(empty($mail))
    {
        $errorsContact['empty_mail'] = 'This field can not be empty';
    } else {
        //$pattern_mail = '/^[a-z0-9]+[-_.]?[a-z0-9]+[-_.]?[a-z0-9]+@[a-z]+\.[a-z]{2,}$/';
        //if(preg_match($pattern_mail,$mail))
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
            $errorsContact['incorrect_mail'] = 'Incorrect email adrress';
        }
    }

    if(empty($message))
    {
        $errorsContact['empty_message'] = 'This field can not be empty';
    }

    if(count($errorsContact) == 0) {
        header('location: formContact.php?mail_success');
    }

}