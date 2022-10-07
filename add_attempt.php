<?php 
    $startOfExecutionTime = hrtime()[1];
    include("check_attempt.php");
    include("db_manager.php");

    $x = floatval($_POST["x"]);
    $y = floatval($_POST["y"]);
    $r = floatval($_POST["r"]);
    
    $flag = true;
    if (!(($x == -3) | ($x == -2) | ($x == -1) | ($x == 0) | ($x == 2) | ($x == 3) | ($x == 4) | ($x == 5))) $flag = false;
    if (!(($y < 5) & ($y > -3))) $flag = false;
    if (!(($r == 1) | ($r == 1.5) | ($r == 2) | ($r == 2.5) | ($r == 3))) $flag = false;
    if ($flag)
    {

        $result = checkAttempt($x, $y, $r);
        $dbManager = new DbManager();
        $id = $dbManager->getIdForNewAttempt();
        $dbManager->addAttempt($id, $x, $y, $r, $result, $startOfExecutionTime);
        header("Location: https://se.ifmo.ru/~s335120/itmo_web_lab1/?attemptId={$id}");
    }
    else header("Location: https://se.ifmo.ru/~s335120/itmo_web_lab1/");
    exit();
?>