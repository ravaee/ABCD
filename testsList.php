<?php

require_once "./functions/helper.php";

$status = null;

authLogin();

if(!adminCheck()){
    getError('404','The URL does not found!');
}


if($tests = getTests()){
    require './views/testsList.view.php';
}else{
    getError('500','Internal Server Error!');
}


