<?php

function sanatizeFormPassword($inputText)
{
    $inputText = strip_tags($inputText);
    return $inputText;
}
function sanatizeForm($inputText)
{
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}
function sanatizeFormName($inputText)
{
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
}


if (isset($_POST['registerButton'])) {
    // Register button was pressed

    $username = sanatizeForm($_POST['username']);
    $firstName = sanatizeFormName($_POST['firstName']);
    $lastName = sanatizeFormName($_POST['lastName']);
    $email = sanatizeForm($_POST['email']);
    $emailConfirmation = sanatizeForm($_POST['emailConfirmation']);
    $password = sanatizeFormPassword($_POST['registerPassword']);
    $passwordConfirmation = sanatizeFormPassword($_POST['passwordConfirmation']);

    $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $emailConfirmation, $password, $passwordConfirmation);

    if ($wasSuccessful) {
        // Creating session variables
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }
}
