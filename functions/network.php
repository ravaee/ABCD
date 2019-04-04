<?php

$isAuth = false;

function isPost(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function isGet(){
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function redirect($url){
    // header("Location: http://".$_SERVER['HTTP_HOST'].$url);
    header("Location: /".$url);
    exit;
}

function authLogin($location = "login.php",$redirect = true) {
    
    if( !isset($_SESSION['email']) ) {
        
        if( isset($_COOKIE['email']) && isset($_COOKIE['password']) ) {

            $email = $_COOKIE['email'];
            $password = $_COOKIE['password'];
            $pdo = DBConnect();
            $user = getUser($email , $pdo);

            if($user) {

                if($password == $user->password) {
                    
                    $_SESSION['email'] = $email;
                    $isAuth = true;
                    return;
                }
            }
        }
        if($redirect){
            redirect($location);
        }
    }

    $isAuth = true;

}

function authCheck() { 
    
    return isset($_SESSION['email']);
}

function adminCheck() { 

    if(isset($_SESSION['email'])) {
        if($_SESSION['email'] == 'ravaeimohamad@gmail.com'){
            return true;
        }
    }
    return false;
}

function authLogout($location = "index.php") {

    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time()-1000);
            setcookie($name, '', time()-1000, '/');
        }
    }

    session_destroy();
    redirect($location);
}

function old($key) {
    if( ! empty($_REQUEST[$key]) )
        return htmlspecialchars($_REQUEST[$key]);
    return '';
}

function getError($code , $message){
    $error = ['CODE' => $code , 'MESSAGE' => $message];
    $_SESSION['ERRORS'][] = $error;
    redirect('error.php');
}
