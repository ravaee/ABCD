<?php 

require_once "./functions/helper.php";

$test = null;
$questions = null;
$testQuestions = [];

if(isGet()){

    extract($_GET);
    $test = getTest($test);
    $questions = ($test != false) ? getQuestions($test->id) : false;

    if($test == false || $questions == false ){

        getError('404','Not found.');
    }

    foreach ($questions as $question) {
        
        if($question->TestId == $test->id){
            $testQuestions[] = $question;
        }
    }

}else{

    getError('400','Bad Request.');
}

require './views/adminEditQuestions.view.php';