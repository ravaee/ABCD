<?php

require_once "./functions/helper.php";

$status = null;

authLogin();

if(!adminCheck()){
    getError('404','The URL does not found!');
}

if(isPost()){

    extract($_POST);
    $status = validationRequired($_POST);

    if($status['STATUS'] == "SUCCESS"){

        $pdo = DBConnect();

        $data = [
            "name" => $name,
            "description" => $description
        ];

        if(createTest($data,$pdo)){
            $status = [
                'STATUS' => 'SUCCESS',
            ];
        }else{
            $status = [
                'STATUS' => 'ERROR',
                'ERRORS' => ['internal server error...!']
            ];
        }
    }
}

require './views/createTest.view.php';