<?php 
    $startOfExecutionTime = hrtime()[1];
    include("check_attempt.php");
    include("db_manager.php");

    $x = null;
    $y = null;
    $r = null;
    if (isset($_POST["x"])) { $x = floatval($_POST["x"]); }
    if (isset($_POST["y"])) { $y = floatval($_POST["y"]); }
    if (isset($_POST["r"])) { $r = floatval($_POST["r"]); }
    if (($x != null) & ($y != null) & ($r != null))
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