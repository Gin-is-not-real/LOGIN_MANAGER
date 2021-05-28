<?php
require_once('model/AccountManager.php');

// CONTROLLER
if(session_id() == '') {
    session_start();
}

function goToSite() {
    header('Location: index.php?action=go-site');
}

function deconnection() {
    unset($_SESSION['pseudo']);
    session_destroy();

    goToSite();
}

function connection($pseudo, $pass) {
    $accountManager = new AccountDatabaseManager();
    $logsDb = $accountManager->getLogs($pseudo);

    if($data = $logsDb->fetch()) {
        if($pass == $data['pass']) {
            $_SESSION['pseudo'] = $pseudo;
        }    
        else {    
            $_POST['log-error'] = 'Wrong password or pseudo';
            goToSite();
        }
    }
    else { 
        $_POST['log-error'] = 'Wrong password or pseudo';
        goToSite();
    }       
}

function registration($pseudo, $mail, $pass, $pass_repeat) {
    $accountManager = new AccountDatabaseManager();
    $logsDb = $accountManager->getLogs($pseudo);

    if($pass != $pass_repeat) {
        $_POST['log-error'] = 'The two passwords must be identical';
        goToSite();
    }
    elseif($data = $logsDb->fetch()) {
        $_POST['log-error'] = 'This pseudo is not available';
        goToSite();
    }
    else {
        $accountManager->insertLogs($pseudo, $mail, $pass);
        $_SESSION['pseudo'] = $pseudo; 
    }

}

