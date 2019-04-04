<?php

require_once "validation.php";
require_once "network.php";

function DBConnect(){

    try{

        $pdo = new PDO("mysql:host=127.0.0.1;dbname=abcd_db","root","");
        return $pdo;

    }catch(PDOException $e){

        getError('500','Internal server error!');

    }
}

function getUser($email,$pdo){

    $statment = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $statment->bindParam("email",$email);
    $statment->execute();

    $user = $statment->fetch(PDO::FETCH_OBJ);
    
    return $user ? $user : false;
}

function saveUser($data,$pdo){

    extract($data);
    $statment = $pdo->prepare("INSERT INTO users (firstName,lastName,email,password) VALUES (:firstName , :lastName , :email , :password)");
    $statment->bindParam("firstName",$firstName);
    $statment->bindParam("lastName",$lastName);
    $statment->bindParam("email",$email);
    $statment->bindParam("password",$password);

    try{

        $statment->execute();
        return true;

    }catch(PDOException $e){

        die($e->getMessage());
        return false;
        
    }
    
}

function createTest($data,$pdo){

    extract($data);
    var_dump($data);
    $statment = $pdo->prepare("INSERT INTO tests (name,description,createDate) VALUES (:name , :description , :createDate)");
    $statment->bindParam("name" , $name);
    $statment->bindParam("description" , $description);
    $date = date("Y/m/d");
    $statment->bindParam("createDate" , $date);

    try{
        
        $statment->execute();
        return true;

    }catch(PDOException $e){

        die($e->getMessage());
        return false;

    }
}

function getTests(){
    
    $pdo = DBConnect();
    $statment = $pdo->prepare("select * from (select * from (SELECT testId, COUNT(*) as count FROM user_test GROUP BY testId) x
                                RIGHT JOIN (select * from tests) y on x.testId = y.id) a
                                left join (select TestId, COUNT(*) as qcount from quastion_test group by testId) b
                                on a.testId = b.TestId;");

    try{

        $statment->execute();
        $tests = $statment->fetchAll(PDO::FETCH_OBJ);
        return $tests ? $tests : false;

    }catch(PDOException $e){

        die($e->getMessage());
        return false;
    }
    
}

function getTest($testId){

    $pdo = DBConnect();
    $statment = $pdo->prepare("select * from tests where id = " . $testId);

    try{

        $statment->execute();
        $test = $statment->fetch(PDO::FETCH_OBJ);
        return $test ? $test : false;

    }catch(PDOException $e){
        
        die($e->getMessage());
        return false;

    }

}

function getQuestions($id){

    $pdo = DBConnect();
    $statment = $pdo->prepare("select * from (select * from quastion_test where TestId = :id) as a right join questions on a.QuestionId = questions.Id;");
    $statment->bindParam("id" , $id);
    try{

        $statment->execute();
        $questions = $statment->fetchAll(PDO::FETCH_OBJ);
        return $questions ? $questions : false;

    }catch(PDOException $e){
        
        die($e->getMessage());
        return false;

    }
}

