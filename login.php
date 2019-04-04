<?php

require_once './functions/helper.php';
$status = null;

if(isPost()){

    extract($_POST);

    $status = validationRequired($_POST);

    if($status['STATUS'] == "SUCCESS"){

        if(validationEmail($email)){

            $pdo = DBConnect();
            $user = getUser($email,$pdo);
            
            if($user){

                if($user->password == $password){

                    setcookie('email',$email,time()+ 900000);
                    setcookie('password',$password,time()+ 900000);
                    $_SESSION['email'] = $email;
                    redirect('admin.php');

                }else{

                    $status = [
                        'STATUS' => 'ERROR',
                        'ERRORS' => ['The username or password is incorrect']
                    ];

                }
                
            }else{

                $status = [
                    'STATUS' => 'ERROR',
                    'ERRORS' => ['The username not exist...!']
                ];

            }
        }
    }
}

require './views/login.view.php';