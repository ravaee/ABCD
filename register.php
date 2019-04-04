<?php

require_once "./functions/helper.php";

$status = null;

authLogin();

if(isPost()){

    extract($_POST);

    $status = validationRequired($_POST);

    if($status['STATUS'] == "SUCCESS"){

        if(validationEmail($email)){

            $password = hash_hmac("sha256",$password,"secret");

            $pdo = DBConnect();

            if(!getUser($email,$pdo)){

                $data = [
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "email" => $email,
                    "password" => $password,
                ];

                if(saveUser($data,$pdo)){
                    $status = [
                        'STATUS' => 'SUCCESS',
                    ];
                }else{
                    $status = [
                        'STATUS' => 'ERROR',
                        'ERRORS' => ['internal server error...!']
                    ];
                }
                
            }else{
                $status = [
                    'STATUS' => 'ERROR',
                    'ERRORS' => ['The username is exist...!']
                ];
            }
        }
    }
}

require "./views/register.view.php";
