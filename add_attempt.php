<?php 
    $startOfExecutionTime = hrtime()[1];
    include("check_attempt.php");
    include("db_manager.php");

    $x = floatval($_POST["x"]);
    $y = floatval($_POST["y"]);
    $r = floatval($_POST["r"]);
    
    $result = checkAttempt($x, $y, $r);
    $dbManager = new DbManager();
    $id = $dbManager->getIdForNewAttempt();
    $dbManager->addAttempt($id, $x, $y, $r, $result, $startOfExecutionTime);
    header("Location: https://se.ifmo.ru/~s335120/itmo_web_lab1/?attemptId={$id}");
    exit();
?>