<?php
session_start();
unset($_SESSION['msg']);
require_once('./core/contracts.php');

require_once('parser.php');
require_once('dependency-container.php');

$msg = '';
if (isset($_POST['email'])) $email = sanitizeEmail($_POST['email']);
if (!$email) $msg = ' please, provide correct email. ';
if (isset($_POST['url'])) $url = sanitizeURL($_POST['url']);
if (!$url) $msg .= ' please, provide correct url. ';

if ($email AND $url) {
    $_SESSION['email'] = $email;
    echo 'hello,' . $email . ' you want ' . $url . '<br>';
    $urlWatcher = getDependency(UrlWatcher::class);
    $user = getDependency(CanBeEmailed::class);
    $user->getUserByEmail($email);

    try {
        //$url = './bike.html';
        $rez = processPage(file_get_contents($url));

        if ($rez) {
            $rez['url'] = $url;
            print_r($rez); echo '<br>';
            $url = new Url($rez['id'], $rez['url'], $rez['price'], $rez['title']);

            $urlWatcher->addUrlToWatchList($url);
            $urlWatcher->addUserAsWatcher($url, $user);

            $msg = " we subscribed you to price changes for item $url->title";
            $_SESSION['email'] = $email;
        } else {
            $msg .= ' we cannot grab all parametres from .';
        }
    } catch (Exception $err) {
        $msg .= 'something wrong with notification adding: may be you already subscribed ';
    }
}
$_SESSION['msg'] = $msg;


function sanitizeEmail($email)
{
    // Remove unwanted characters
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate the email address
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $email;
    } else {
        return false; // Invalid email address
    }
}

function sanitizeURL($url)
{
    // Remove unwanted characters from the URL
    $sanitizedURL = filter_var($url, FILTER_SANITIZE_URL);

    // Check if the sanitized URL is valid
    if (filter_var($sanitizedURL, FILTER_VALIDATE_URL)) {
        return $sanitizedURL;
    } else {
        return false; // Invalid URL
    }
}