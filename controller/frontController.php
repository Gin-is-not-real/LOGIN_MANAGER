<?php
require_once('globals.php');

function goToHomeView() {
    require('view/homeView.php');
    exit();
}

function goToApplicationView() {
    header('Location: view/applicationView.php');
    exit();
}

function getNotif() {
    $notif = '';
    forEach($GLOBALS['form_fields'] as $field) {
        if(isset($_POST[$field])) {
            $notif .= $_POST[$field] . " ";
        }
    }
    $GLOBALS['notif'] = $notif;
    return $notif;
}